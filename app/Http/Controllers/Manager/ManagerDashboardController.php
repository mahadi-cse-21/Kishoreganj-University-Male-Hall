<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Bazar;
use App\Models\GuestMeal;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meal;
use Carbon\Carbon;

class ManagerDashboardController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');

        // Get current month and year
        $currentMonth = now()->month;
        $currentYear = now()->year;

        //payment
        $store_payment = Payment::sum('amount');

        //total_bazar cost
        $bazar_total_cost = Bazar::sum('cost');

        // Get all active users
        $users = User::where('status', 'active')->get();

        // Get all payments with user data
        $payments = Payment::with('user')->get();

        // Calculate today's meals count (for the stats card)
        $todayMealsCount = Meal::whereDate('date', $today)
            ->selectRaw('SUM((breakfast = 1) + (lunch = 1) + (dinner = 1)) as total_meals')
            ->value('total_meals') ?? 0;

        // Get ALL meals for the current month
        $meals = Meal::with('user')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->get();

        // Calculate meal stats for today (for display)
        $todayMeals = $meals->where('date', $today);

        //todays stat
        $today_breakfast = Meal::where('date', $today)->sum('breakfast');
        $today_lunch = Meal::where('date', $today)->sum('lunch');
        $today_dinner = Meal::where('date', $today)->sum('dinner');

        $mealStats = [
            'breakfast' => $todayMeals->where('breakfast', true)->count(),
            'lunch' => $todayMeals->where('lunch', true)->count(),
            'dinner' => $todayMeals->where('dinner', true)->count(),
        ];

        // Get total payment for the month
        $totalPayment = Bazar::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->sum('cost') ?? 0;

        return view('manager.dashboard', compact(
            'users',
            'payments', // Add payments to compact
            'todayMealsCount',
            'totalPayment',
            'store_payment',
            'meals',
            'bazar_total_cost',
            'mealStats',
            'today_breakfast',
            'today_lunch',
            'today_dinner',
            'today'
        ));
    }

    // Add Payment Method
    public function addPayment(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'notes' => 'nullable|string|max:500'
        ]);

        Payment::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'date' => $request->date,
            'notes' => $request->notes
        ]);

        return redirect()->back()->with('success', 'Payment added successfully!');
    }

    public function updateMealStatus(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'meal_type' => 'required|in:breakfast,lunch,dinner',
            'status'    => 'required|boolean',
        ]);
        $meal = Meal::firstOrCreate(
            ['user_id' => $request->user_id, 'date' => $request->date]
        );

        $meal->{$request->meal_type} = $request->status;
        $meal->save();

        return response()->json(['success' => true]);
    }

    public function updatemeal(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'meals' => 'required|array',
        ]);

        $updatedCount = 0;
        $createdCount = 0;
        $unchangedCount = 0;

        // Collect all user IDs and dates from the request
        $userIds = [];
        $dates = [];

        foreach ($validated['meals'] as $userId => $userDates) {
            $userIds[] = $userId;
            foreach ($userDates as $date => $mealData) {
                if (is_array($mealData) && isset($mealData['date'])) {
                    $dates[] = $mealData['date'];
                }
            }
        }

        // Get existing meals for these users and dates
        $existingMeals = Meal::whereIn('user_id', array_unique($userIds))
            ->whereIn('date', array_unique($dates))
            ->get()
            ->keyBy(function ($meal) {
                return $meal->user_id . '_' . $meal->date->format('Y-m-d');
            });

        foreach ($validated['meals'] as $userId => $userDates) {
            foreach ($userDates as $date => $mealData) {
                // Skip if this is just metadata
                if (!is_array($mealData)) {
                    continue;
                }

                $actualDate = $mealData['date'] ?? $date;
                $actualUserId = $mealData['user_id'] ?? $userId;

                // Prepare new meal data
                $newBreakfast = isset($mealData['breakfast']) && $mealData['breakfast'] == '1';
                $newLunch = isset($mealData['lunch']) && $mealData['lunch'] == '1';
                $newDinner = isset($mealData['dinner']) && $mealData['dinner'] == '1';

                $mealKey = $actualUserId . '_' . $actualDate;

                if (isset($existingMeals[$mealKey])) {
                    $existingMeal = $existingMeals[$mealKey];

                    // Check if any field has changed
                    $hasChanges = $existingMeal->breakfast != $newBreakfast ||
                        $existingMeal->lunch != $newLunch ||
                        $existingMeal->dinner != $newDinner;

                    if ($hasChanges) {
                        $existingMeal->update([
                            'breakfast' => $newBreakfast,
                            'lunch' => $newLunch,
                            'dinner' => $newDinner,
                        ]);
                        $updatedCount++;
                    } else {
                        $unchangedCount++;
                    }
                } else {
                    // Only create if at least one meal is selected
                    if ($newBreakfast || $newLunch || $newDinner) {
                        Meal::create([
                            'user_id' => $actualUserId,
                            'date' => $actualDate,
                            'breakfast' => $newBreakfast,
                            'lunch' => $newLunch,
                            'dinner' => $newDinner,
                        ]);
                        $createdCount++;
                    }
                }
            }
        }

        $message = "Meal update completed! Created: {$createdCount}, Updated: {$updatedCount}, Unchanged: {$unchangedCount}";

        return redirect()->back()->with('success', $message);
    }

    public function addbazar(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:1000',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'names' => 'nullable|string|max:255',
        ]);

        $bazar = Bazar::updateOrCreate(
            ['date' => $validated['date']],
            [
                'description' => $validated['description'],
                'cost' => $validated['amount'],
                'names' => $validated['names'],
            ]
        );

        return redirect()->back()->with('success', 'Bazar record added successfully!');
    }

    public function guestmeal(Request $request)
    {
        // ✅ Validate input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'number_of_guest_meal' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        // ✅ Save or update guest meal for that user and date
        GuestMeal::updateOrCreate(
            [
                'user_id' => $validated['user_id'],
                'date' => $validated['date'],
            ],
            [
                'number_of_guest_meal' => (float) $validated['number_of_guest_meal'],
            ]
        );

        return redirect()->back()->with('success', 'Guest meal saved successfully!');
    }
}