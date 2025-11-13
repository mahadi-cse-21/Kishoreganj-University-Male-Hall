<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bazar;
use App\Models\Meal;
use App\Models\User;
use App\Models\Payment; // Add Payment model
use Carbon\Carbon;
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

        // Calculate total meals
        foreach ($myMeals as $meal) {
            $total_meal += ($meal->breakfast ? 0.5 : 0)
                + ($meal->lunch ? 1.0 : 0)
                + ($meal->dinner ? 1.0 : 0);
        }

        // Calculate last 7 days' total meals
        foreach ($myWeekMeals as $meal) {
            $total_week_meal += ($meal->breakfast ? 0.5 : 0)
                + ($meal->lunch ? 1.0 : 0)
                + ($meal->dinner ? 1.0 : 0);
        }

        // Total meals of all users
        $allMeals = Meal::all();
        $current_total_meal = 0.0;
        foreach ($allMeals as $c_meal) {
            $current_total_meal += ($c_meal->breakfast ? 0.5 : 0)
                + ($c_meal->lunch ? 1.0 : 0)
                + ($c_meal->dinner ? 1.0 : 0);
        }

        // Total bazar cost
        $bazars = Bazar::all();
        $total_cost = round($bazars->sum('cost') ?? 0, 2);

        // Avoid division by zero and calculate cost per meal
        $cost_per_meal = ($current_total_meal > 0)
            ? round($total_cost / $current_total_meal, 2)
            : 0;

        // Amount due for this user based on their meals
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
            'myPayments'       => $myPayments, // Add payments to view
            'payment_stats'    => $payment_stats, // Add payment stats
        ]);
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
