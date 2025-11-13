<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bazar;
use App\Models\Meal;
use App\Models\User;
use App\Models\Payment;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $total_payment = (float) ($user->total_payment ?? 0);

        $myMeals = Meal::where('user_id', $user->id)->get();
        $today = now()->toDateString();

        // Fetch today's meal for the logged-in user
        $todayMeal = Meal::where('user_id', $user->id)
            ->whereDate('date', $today)
            ->first();

        $myWeekMeals = Meal::where('user_id', $user->id)
            ->where('created_at', '>=', now()->subDays(7))
            ->get();

        // Get user's payment history
        $myPayments = Payment::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->get();

        // Calculate total paid from payments table
        $total_paid_from_payments = $myPayments->sum('amount');

        // Initialize counters
        $total_meal = 0.0;
        $total_week_meal = 0.0;

        // Safely access today's meal booleans
        $meal_breakfast = $todayMeal->breakfast ?? false;
        $meal_lunch     = $todayMeal->lunch ?? false;
        $meal_dinner    = $todayMeal->dinner ?? false;

        // Get user's meal floor (default to 1 if not set)
        $meal_floor = $user->meal_floor ?? 1;

        // Calculate total meals considering meal_floor
        foreach ($myMeals as $meal) {
            $total_meal += $this->calculateMealWithFloor($meal, $meal_floor);
        }

        // Calculate last 7 days' total meals considering meal_floor
        foreach ($myWeekMeals as $meal) {
            $total_week_meal += $this->calculateMealWithFloor($meal, $meal_floor);
        }

        // Total meals of all users (considering each user's meal_floor)
        $allMeals = Meal::with('user')->get();
        $current_total_meal = 0.0;
        foreach ($allMeals as $c_meal) {
            $user_meal_floor = $c_meal->user->meal_floor ?? 1;
            $current_total_meal += $this->calculateMealWithFloor($c_meal, $user_meal_floor);
        }

        // Total bazar cost
        $bazars = Bazar::all();
        $total_cost = round($bazars->sum('cost') ?? 0, 2);

        // Avoid division by zero and calculate cost per meal
        $cost_per_meal = ($current_total_meal > 0)
            ? round($total_cost / $current_total_meal, 2)
            : 0;

        // Amount due for this user based on their meals (considering meal_floor)
        $amount_due = round(($total_meal * $cost_per_meal) - $total_paid_from_payments, 2);

        // Payment statistics
        $payment_stats = [
            'total_paid' => $total_paid_from_payments,
            'last_payment' => $myPayments->first(),
            'payment_count' => $myPayments->count(),
            'average_payment' => $myPayments->count() > 0 ? round($total_paid_from_payments / $myPayments->count(), 2) : 0,
        ];

        return view('user.dashboard', [
            'total_payment'    => $total_payment,
            'total_meal'       => round($total_meal, 1),
            'total_week_meal'  => round($total_week_meal, 1),
            'meal_breakfast'   => $meal_breakfast,
            'meal_lunch'       => $meal_lunch,
            'meal_dinner'      => $meal_dinner,
            'todayMeal'        => $todayMeal,
            'cost_per_meal'    => $cost_per_meal,
            'amount_due'       => $amount_due,
            'myPayments'       => $myPayments,
            'payment_stats'    => $payment_stats,
            'meal_floor'       => $meal_floor, // Add meal_floor to view
        ]);
    }

    /**
     * Calculate meal count considering meal_floor
     */
    private function calculateMealWithFloor($meal, $meal_floor)
    {
        $breakfast_value = $meal->breakfast ? 0.5 : 0;
        $lunch_value = $meal->lunch ? 1.0 : 0;
        $dinner_value = $meal->dinner ? 1.0 : 0;
        
        $total_meal_value = $breakfast_value + $lunch_value + $dinner_value;
        
        // Apply meal floor - if total is less than meal_floor, use meal_floor instead
        return max($total_meal_value, $meal_floor);
    }

    public function saveMeal(Request $request)
    {
        $user = Auth::user();
        $timezone = config('app.timezone');
        $now = Carbon::now($timezone);
        $today = $now->toDateString();

        // Safely get existing meal or new
        $meal = Meal::firstOrNew([
            'user_id' => $user->id,
            'date'    => $today,
        ]);

        // Cutoff times
        $breakfastCutoff = Carbon::today($timezone)->setHour(6);
        $lunchCutoff     = Carbon::today($timezone)->setHour(11)->setMinute(30);
        $dinnerCutoff    = Carbon::today($timezone)->setHour(17);

        // Convert checkbox values safely
        $breakfast = $request->boolean('breakfast');
        $lunch     = $request->boolean('lunch');
        $dinner    = $request->boolean('dinner');

        // Cutoff protection
        if ($breakfast != $meal->breakfast && $now->gte($breakfastCutoff)) {
            return redirect()->back()->with('error', 'Breakfast booking time is over!');
        }
        if ($lunch != $meal->lunch && $now->gte($lunchCutoff)) {
            return redirect()->back()->with('error', 'Lunch booking time is over!');
        }
        if ($dinner != $meal->dinner && $now->gte($dinnerCutoff)) {
            return redirect()->back()->with('error', 'Dinner booking time is over!');
        }

        // Save or update safely
        $meal->breakfast = $breakfast;
        $meal->lunch     = $lunch;
        $meal->dinner    = $dinner;
        $meal->save();

        return redirect()->back()->with('success', 'Meals saved successfully!');
    }

    public function saveMealOff(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'meals' => 'required|array|min:1',
            'meals.*' => 'in:breakfast,lunch,dinner',
            'reason' => 'nullable|string|max:500',
        ]);

        $start_date = Carbon::parse($validated['start_date']);
        $end_date = Carbon::parse($validated['end_date']);
        $selected_meals = $validated['meals'];

        // Process each date in the range
        $period = CarbonPeriod::create($start_date, $end_date);
        $processed_days = 0;

        foreach ($period as $date) {
            $meal = Meal::firstOrNew([
                'user_id' => $user->id,
                'date'    => $date->format('Y-m-d'),
            ]);

            // Update meal selections based on user input
            if (in_array('breakfast', $selected_meals)) {
                $meal->breakfast = false;
            }
            else{
                $meal->breakfast = true;
            }
            if (in_array('lunch', $selected_meals)) {
                $meal->lunch = false;
            }
            else{
                $meal->lunch = true;
            }
            if (in_array('dinner', $selected_meals)) {
                $meal->dinner = false;
            }
            else{
                $meal->dinner = true;
            }

            $meal->save();
            $processed_days++;
        }

        return redirect()->back()->with('success', "Meal off request submitted successfully! {$processed_days} days updated.");
    }

    // New method to show payment history
    public function paymentHistory()
    {
        $user = Auth::user();

        $payments = Payment::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $total_paid = $payments->sum('amount');

        return view('user.payment-history', [
            'payments' => $payments,
            'total_paid' => $total_paid,
        ]);
    }

    // New method to show payment details
    public function paymentDetails($id)
    {
        $user = Auth::user();

        $payment = Payment::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();

        return view('user.payment-details', [
            'payment' => $payment,
        ]);
    }
}