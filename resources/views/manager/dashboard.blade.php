<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-xl text-gray-900 leading-tight flex items-center">
                    <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Manager
                        Dashboard</span>
                </h2>
                <p class="text-sm text-gray-500 mt-1">{{ now()->format('l, F d, Y') }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-gray-50 via-indigo-50/30 to-purple-50/30 min-h-screen p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Today's Meal Summary Section -->
            <div class="mt-8 relative overflow-hidden">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-3xl blur-lg opacity-20">
                </div>
                <div
                    class="relative bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 rounded-3xl p-8 border-2 border-indigo-200 shadow-xl">
                    <div class="flex items-center justify-center mb-6">
                        <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl p-3 mr-4 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h4
                            class="text-xl font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            Today's Meal Summary
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Meal Count Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Breakfast Total -->
                <div class="group relative overflow-hidden">
                    <div
                        class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-300">
                    </div>
                    <div
                        class="relative bg-white rounded-2xl p-6 shadow-lg transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center justify-between mb-3">
                            <div class="bg-blue-100 rounded-xl p-3">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-sm font-semibold text-gray-600 mb-2">Breakfast</div>
                        <div
                            class="text-4xl font-black bg-gradient-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent">
                            {{ $today_breakfast }}
                        </div>
                        <div class="text-xs text-gray-500 mt-2">meals today</div>
                    </div>
                </div>

                <!-- Lunch Total -->
                <div class="group relative overflow-hidden">
                    <div
                        class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-300">
                    </div>
                    <div
                        class="relative bg-white rounded-2xl p-6 shadow-lg transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center justify-between mb-3">
                            <div class="bg-green-100 rounded-xl p-3">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-sm font-semibold text-gray-600 mb-2">Lunch</div>
                        <div
                            class="text-4xl font-black bg-gradient-to-r from-green-600 to-green-700 bg-clip-text text-transparent">
                            {{ $today_lunch }}
                        </div>
                        <div class="text-xs text-gray-500 mt-2">meals today</div>
                    </div>
                </div>

                <!-- Dinner Total -->
                <div class="group relative overflow-hidden">
                    <div
                        class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-300">
                    </div>
                    <div
                        class="relative bg-white rounded-2xl p-6 shadow-lg transform hover:scale-105 transition-all duration-300">
                        <div class="flex items-center justify-between mb-3">
                            <div class="bg-purple-100 rounded-xl p-3">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-sm font-semibold text-gray-600 mb-2">Dinner</div>
                        <div
                            class="text-4xl font-black bg-gradient-to-r from-purple-600 to-purple-700 bg-clip-text text-transparent">
                            {{ $today_dinner }}
                        </div>
                        <div class="text-xs text-gray-500 mt-2">meals today</div>
                    </div>
                </div>
            </div>

            <!-- User Payment Tracking Section -->
            <div class="relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-teal-600/5 to-cyan-600/5 rounded-3xl"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/20">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8 gap-4">
                        <div>
                            <h3 class="text-xl font-black text-gray-900 flex items-center mb-2">
                                <div class="bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl p-3 mr-4 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <span class="bg-gradient-to-r from-teal-600 to-cyan-600 bg-clip-text text-transparent">
                                    User Payment Tracking
                                </span>
                            </h3>
                            <p class="text-gray-600 ml-20">Track all user payments with associated dates</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div
                                class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl px-6 py-3 border border-teal-200">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-teal-600">{{ $users->count() }}</div>
                                    <div class="text-xs text-gray-600">Total Users</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Payment Table -->
                    <div class="overflow-hidden rounded-2xl border-2 border-gray-200 shadow-xl">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border-collapse">
                                <thead>
                                    <tr class="bg-gradient-to-r from-teal-100 to-cyan-100">
                                        <th
                                            class="border-r border-gray-300 py-4 px-4 font-bold text-gray-800 text-left min-w-[180px]">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                <span>User Name</span>
                                            </div>
                                        </th>
                                        <th
                                            class="border-r border-gray-300 py-4 px-4 font-bold text-gray-800 text-center min-w-[120px]">
                                            <div class="flex flex-col items-center space-y-1">
                                                <span>Total Paid</span>
                                                <div class="text-xs font-medium text-gray-500">Amount</div>
                                            </div>
                                        </th>
                                        <th
                                            class="border-r border-gray-300 py-4 px-4 font-bold text-gray-800 text-center min-w-[120px]">
                                            <div class="flex flex-col items-center space-y-1">
                                                <span>Last Payment</span>
                                                <div class="text-xs font-medium text-gray-500">Date</div>
                                            </div>
                                        </th>
                                        <th
                                            class="border-r border-gray-300 py-4 px-4 font-bold text-gray-800 text-center min-w-[150px]">
                                            <div class="flex flex-col items-center space-y-1">
                                                <span>Payment History</span>
                                                <div class="text-xs font-medium text-gray-500">Recent Transactions</div>
                                            </div>
                                        </th>
                                        <th class="py-4 px-4 font-bold text-gray-800 text-center min-w-[120px]">
                                            <div class="flex flex-col items-center space-y-1">
                                                <span>Status</span>
                                                <div class="text-xs font-medium text-gray-500">Payment</div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        @php
                                            // Get user payments data (you'll need to pass this from controller)
                                            $userPayments = $payments->where('user_id', $user->id) ?? collect();
                                            $totalPaid = $userPayments->sum('amount');
                                            $lastPayment = $userPayments->sortByDesc('date')->first();
                                            $recentPayments = $userPayments->sortByDesc('date')->take(3);
                                            $paymentStatus = $totalPaid > 0 ? 'Paid' : 'Pending';
                                            $statusColor = $totalPaid > 0 ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800';
                                        @endphp
                                        <tr
                                            class="bg-white hover:bg-teal-50/30 transition-all duration-300 border-b border-gray-200">
                                            <td class="border-r border-gray-300 py-4 px-4 font-semibold text-gray-800">
                                                <div class="flex items-center space-x-3">
                                                    <div
                                                        class="w-10 h-10 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg flex-shrink-0">
                                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                                    </div>
                                                    <div>
                                                        <span class="text-gray-900 font-semibold">{{ $user->name }}</span>
                                                        <div class="text-xs text-gray-500 mt-1">{{ $user->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-r border-gray-300 py-4 px-4 text-center">
                                                <div class="flex flex-col items-center justify-center space-y-1">
                                                    <div
                                                        class="text-2xl font-black bg-gradient-to-r from-teal-600 to-cyan-600 bg-clip-text text-transparent">
                                                        ৳{{ number_format($totalPaid, 2) }}
                                                    </div>
                                                    <div class="text-xs text-gray-500">total paid</div>
                                                </div>
                                            </td>
                                            <td class="border-r border-gray-300 py-4 px-4 text-center">
                                                @if($lastPayment)
                                                    <div class="flex flex-col items-center justify-center space-y-1">
                                                        <div class="text-lg font-bold text-gray-800">
                                                            {{ \Carbon\Carbon::parse($lastPayment->date)->format('M d, Y') }}
                                                        </div>
                                                        <div class="text-xs text-gray-500">
                                                            ৳{{ number_format($lastPayment->amount, 2) }}
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="text-gray-400 text-sm">No payments</div>
                                                @endif
                                            </td>
                                            <td class="border-r border-gray-300 py-4 px-4">
                                                <div class="flex flex-col space-y-2">
                                                    @if($recentPayments->count() > 0)
                                                        @foreach($recentPayments as $payment)
                                                            <div
                                                                class="flex items-center justify-between bg-gray-50/50 rounded-lg px-3 py-2">
                                                                <div class="text-xs font-medium text-gray-700">
                                                                    {{ \Carbon\Carbon::parse($payment->date)->format('M d') }}
                                                                </div>
                                                                <div class="text-sm font-bold text-teal-600">
                                                                    ৳{{ number_format($payment->amount, 2) }}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="text-center text-gray-400 text-sm py-2">
                                                            No payment history
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 text-center">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $statusColor }}">
                                                    @if($paymentStatus === 'Paid')
                                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                    {{ $paymentStatus }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Add Payment Button -->
                    <div class="flex justify-center mt-8">
                        <button type="button" onclick="openPaymentModal()" class="group relative overflow-hidden">
                            <div
                                class="absolute -inset-2 bg-gradient-to-r from-teal-600 to-cyan-600 rounded-3xl blur-xl opacity-50 group-hover:opacity-75 transition duration-500">
                            </div>
                            <div
                                class="relative bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white px-16 py-5 rounded-2xl font-black text-sm shadow-2xl transition-all duration-500 flex items-center space-x-4 transform hover:scale-105">
                                <svg class="w-7 h-7 group-hover:rotate-12 transition-transform duration-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <span>Add New Payment</span>
                                <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform duration-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Monthly Meal Tracking Section -->
            <div class="relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/5 to-purple-600/5 rounded-3xl"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/20">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8 gap-4">
                        <div>
                            <h3 class="text-xl font-black text-gray-900 flex items-center mb-2">
                                <div
                                    class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-3 mr-4 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                                    Monthly Meal Tracking
                                </span>
                            </h3>
                            <p class="text-gray-600 ml-20">{{ now()->format('F Y') }}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div
                                class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl px-6 py-3 border border-indigo-200">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-indigo-600">{{ now()->daysInMonth }}</div>
                                    <div class="text-xs text-gray-600">Days in Month</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Meal Table -->
                    <form action="{{ route('updatemeal') }}" method="POST">
                        @csrf

                        <div class="overflow-hidden rounded-2xl border-2 border-gray-200 shadow-xl">
                            <div class="overflow-x-auto">
                                <table class="w-full text-xs border-collapse">
                                    <thead>
                                        <tr class="bg-gradient-to-r from-gray-100 to-gray-200">
                                            <th
                                                class="sticky left-0 z-20 bg-gradient-to-r from-gray-100 to-gray-200 border-r border-gray-300 py-2 px-3 font-bold text-gray-800 text-left min-w-[120px]">
                                                <div class="flex items-center space-x-1">
                                                    <span>User Name</span>
                                                </div>
                                            </th>

                                            @php
                                                $daysInMonth = now()->daysInMonth;
                                                $currentMonth = now()->month;
                                                $currentYear = now()->year;
                                            @endphp

                                            @for($day = 1; $day <= $daysInMonth; $day++)
                                                @php
                                                    $date = \Carbon\Carbon::create($currentYear, $currentMonth, $day);
                                                    $isToday = $date->isToday();
                                                    $isPast = $date->isPast() && !$isToday;
                                                    $isFuture = $date->isFuture();
                                                @endphp

                                                <th
                                                    class="border-l border-gray-300 py-3 px-2 text-center min-w-[140px] {{ $isToday ? 'bg-gradient-to-br from-indigo-100 to-purple-100' : ($isPast ? 'bg-gray-50' : 'bg-white') }}">
                                                    <div class="flex flex-col items-center space-y-2">
                                                        <div class="flex items-center justify-center space-x-1">
                                                            <span
                                                                class="font-bold text-lg {{ $isToday ? 'text-indigo-600' : 'text-gray-700' }}">{{ $day }}</span>
                                                            @if($isToday)
                                                                <span
                                                                    class="bg-indigo-600 text-white text-xs px-2 py-0.5 rounded-full font-bold">Today</span>
                                                            @endif
                                                        </div>
                                                        <div
                                                            class="text-xs font-medium {{ $isToday ? 'text-indigo-600' : 'text-gray-500' }}">
                                                            {{ $date->format('D') }}
                                                        </div>

                                                        <!-- Meal Type Headers -->
                                                        <div class="grid grid-cols-3 gap-1 w-full mt-2">
                                                            <div class="bg-blue-50 rounded px-1 py-1">
                                                                <div class="text-[10px] font-semibold text-blue-700">B</div>
                                                            </div>
                                                            <div class="bg-green-50 rounded px-1 py-1">
                                                                <div class="text-[10px] font-semibold text-green-700">L
                                                                </div>
                                                            </div>
                                                            <div class="bg-purple-50 rounded px-1 py-1">
                                                                <div class="text-[10px] font-semibold text-purple-700">D
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                            @endfor

                                            <th
                                                class="border-l border-gray-300 py-2 px-2 font-bold text-gray-800 text-center min-w-[80px]">
                                                <div class="flex flex-col items-center space-y-1">
                                                    <span class="text-xs">Total</span>
                                                    <div class="text-[10px] font-medium text-gray-500">Meals</div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            @php
                                                $userTotalMeals = 0;
                                            @endphp
                                            <tr class="bg-gray-50 hover:bg-indigo-50/30 transition-all duration-300">
                                                <td
                                                    class="sticky left-0 z-10 bg-gray-50 hover:bg-indigo-50/30 border-r border-t border-gray-300 py-2 px-3 font-semibold text-gray-800">
                                                    <div class="flex items-center space-x-2">
                                                        <div
                                                            class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xs shadow-lg flex-shrink-0">
                                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                                        </div>
                                                        <span
                                                            class="text-gray-900 font-semibold text-xs">{{ $user->name }}</span>
                                                    </div>
                                                </td>

                                                @for($day = 1; $day <= $daysInMonth; $day++)
                                                    @php
                                                        $date = \Carbon\Carbon::create($currentYear, $currentMonth, $day);
                                                        $dateStr = $date->format('Y-m-d');
                                                        $isToday = $date->isToday();

                                                        // Get meal data for this user and date
                                                        $dayMeal = $meals->where('user_id', $user->id)
                                                            ->where('date', $date)
                                                            ->first();

                                                        $breakfast = $dayMeal ? ($dayMeal->breakfast ?? false) : false;
                                                        $lunch = $dayMeal ? ($dayMeal->lunch ?? false) : false;
                                                        $dinner = $dayMeal ? ($dayMeal->dinner ?? false) : false;

                                                        // Calculate daily meals for this user
                                                        $dailyMeals = 0;
                                                        if ($breakfast)
                                                            $dailyMeals += 0.5;
                                                        if ($lunch)
                                                            $dailyMeals++;
                                                        if ($dinner)
                                                            $dailyMeals++;

                                                        $userTotalMeals += $dailyMeals;
                                                    @endphp

                                                    <td
                                                        class="border-l border-t border-gray-300 py-3 px-2 text-center {{ $isToday ? 'bg-indigo-50/50' : '' }}">
                                                        <div class="grid grid-cols-3 gap-1">
                                                            <!-- Breakfast Toggle -->
                                                            <div class="flex justify-center">
                                                                <label class="relative inline-flex items-center cursor-pointer">
                                                                    <input type="checkbox"
                                                                        name="meals[{{ $user->id }}][{{ $dateStr }}][breakfast]"
                                                                        value="1" {{ $breakfast ? 'checked' : '' }}
                                                                        class="sr-only peer">
                                                                    <div
                                                                        class="w-10 h-5 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-500 shadow-sm">
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <!-- Lunch Toggle -->
                                                            <div class="flex justify-center">
                                                                <label class="relative inline-flex items-center cursor-pointer">
                                                                    <input type="checkbox"
                                                                        name="meals[{{ $user->id }}][{{ $dateStr }}][lunch]"
                                                                        value="1" {{ $lunch ? 'checked' : '' }}
                                                                        class="sr-only peer">
                                                                    <div
                                                                        class="w-10 h-5 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-500 shadow-sm">
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <!-- Dinner Toggle -->
                                                            <div class="flex justify-center">
                                                                <label class="relative inline-flex items-center cursor-pointer">
                                                                    <input type="checkbox"
                                                                        name="meals[{{ $user->id }}][{{ $dateStr }}][dinner]"
                                                                        value="1" {{ $dinner ? 'checked' : '' }}
                                                                        class="sr-only peer">
                                                                    <div
                                                                        class="w-10 h-5 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-500 shadow-sm">
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <!-- Daily meal count badge -->
                                                        @if($dailyMeals > 0)
                                                            <div class="mt-2">
                                                                <span
                                                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full">
                                                                    {{ $dailyMeals }}
                                                                </span>
                                                            </div>
                                                        @endif

                                                        <!-- Hidden input for user_id -->
                                                        <input type="hidden"
                                                            name="meals[{{ $user->id }}][{{ $dateStr }}][user_id]"
                                                            value="{{ $user->id }}">
                                                        <input type="hidden" name="meals[{{ $user->id }}][{{ $dateStr }}][date]"
                                                            value="{{ $dateStr }}">
                                                    </td>
                                                @endfor

                                                <!-- Total Meals Cell -->
                                                <td
                                                    class="border-l border-t border-gray-300 py-2 px-2 text-center font-bold text-gray-800 bg-gray-50 hover:bg-indigo-50/30">
                                                    <div class="flex flex-col items-center justify-center space-y-1">
                                                        <div
                                                            class="text-lg font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                                                            {{ $userTotalMeals }}
                                                        </div>
                                                        <div class="text-[10px] text-gray-500">meals</div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center mt-8">
                            <button type="submit" class="group relative overflow-hidden">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-3xl blur-xl opacity-50 group-hover:opacity-75 transition duration-500 animate-pulse">
                                </div>
                                <div
                                    class="relative bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 text-white px-16 py-5 rounded-2xl font-black text-sm shadow-2xl transition-all duration-500 flex items-center space-x-4 transform hover:scale-105">
                                    <svg class="w-7 h-7 group-hover:rotate-12 transition-transform duration-500"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Save All Meal Changes</span>
                                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform duration-500"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </form>

                    <!-- Legend -->
                    <div class="mt-8 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 border border-gray-200">
                        <div class="flex flex-wrap gap-8 justify-center items-center">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs font-bold text-blue-700 bg-blue-100 px-2 py-1 rounded">B</span>
                                <span class="text-sm font-semibold text-gray-700">Breakfast</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs font-bold text-green-700 bg-green-100 px-2 py-1 rounded">L</span>
                                <span class="text-sm font-semibold text-gray-700">Lunch</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs font-bold text-purple-700 bg-purple-100 px-2 py-1 rounded">D</span>
                                <span class="text-sm font-semibold text-gray-700">Dinner</span>
                            </div>
                            <div class="h-6 w-px bg-gray-300"></div>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-5 bg-green-500 rounded-full relative shadow-sm">
                                    <div class="absolute top-[2px] right-[2px] bg-white rounded-full h-4 w-4"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">ON</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-5 bg-gray-300 rounded-full relative shadow-sm">
                                    <div class="absolute top-[2px] left-[2px] bg-white rounded-full h-4 w-4"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">OFF</span>
                            </div>
                            <div class="h-6 w-px bg-gray-300"></div>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full">3</span>
                                <span class="text-sm font-semibold text-gray-700">Daily Meals</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Bazar Information Form -->
            <div class="relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-indigo-600/5 via-purple-600/5 to-pink-600/5 rounded-3xl">
                </div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-10 border border-white/20">
                    <div class="flex items-center justify-between mb-10">
                        <div>
                            <h3 class="text-xl font-black text-gray-900 flex items-center mb-2">
                                <div
                                    class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-3 mr-4 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <span
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                                    Add Bazar Entry
                                </span>
                            </h3>
                            <p class="text-gray-600 ml-20">Record your daily market purchases</p>
                        </div>
                    </div>

                    <form action="{{ route('addbazar') }}" method="POST" class="space-y-8">
                        @csrf

                        <!-- Description Section -->
                        <div class="relative group">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-3xl blur-lg opacity-20 group-hover:opacity-30 transition duration-500">
                            </div>
                            <div
                                class="relative bg-gradient-to-br from-blue-50 via-cyan-50 to-blue-50 rounded-3xl p-8 border border-blue-200 shadow-lg">
                                <div class="flex items-center space-x-3 mb-5">
                                    <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl p-3 shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                    </div>
                                    <h4 class="text-sm font-bold text-gray-800">Items Description</h4>
                                </div>
                                <textarea name="description" id="description" rows="5"
                                    placeholder="📝 List all items purchased today... "
                                    class="w-full px-6 py-5 bg-white/80 backdrop-blur-sm border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-300 focus:border-blue-400 transition-all duration-300 resize-none text-gray-700 placeholder-gray-400 shadow-inner hover:shadow-lg"
                                    required></textarea>
                                <div class="mt-4 flex items-center justify-between">
                                    <span
                                        class="text-xs text-gray-500 bg-white px-3 py-1 rounded-full shadow-sm">Required
                                        field</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Cost Section -->
                            <div class="relative group">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-3xl blur-lg opacity-20 group-hover:opacity-30 transition duration-500">
                                </div>
                                <div
                                    class="relative bg-gradient-to-br from-emerald-50 via-teal-50 to-emerald-50 rounded-3xl p-8 border border-emerald-200 shadow-lg">
                                    <div class="flex items-center space-x-3 mb-5">
                                        <h4 class="text-sm font-bold text-gray-800">Cost Details</h4>
                                    </div>
                                    <div class="space-y-6">
                                        <div>
                                            <label for="amount"
                                                class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                                                Total Amount
                                                <span class="ml-2 text-red-500 text-lg">*</span>
                                            </label>
                                            <div class="relative group/input">
                                                <div
                                                    class="absolute -inset-0.5 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-2xl blur opacity-0 group-hover/input:opacity-30 transition duration-300">
                                                </div>
                                                <div class="relative">
                                                    <span
                                                        class="absolute left-6 top-1/2 transform -translate-y-1/2 text-3xl font-black text-emerald-600">৳</span>
                                                    <input type="number" name="amount" id="total_cost"
                                                        placeholder="0.00"
                                                        class="w-full pl-16 pr-8 py-5 bg-white border-2 border-emerald-300 rounded-2xl focus:ring-4 focus:ring-emerald-300 focus:border-emerald-400 transition-all duration-300 text-2xl font-bold text-gray-800 shadow-inner hover:shadow-lg"
                                                        step="0.01" min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="date"
                                                class="block text-sm font-bold text-gray-700 mb-3">Purchase Date</label>
                                            <div class="relative">
                                                <input type="date" name="date" id="date"
                                                    class="w-full px-6 py-4 bg-white border-2 border-emerald-300 rounded-2xl focus:ring-4 focus:ring-emerald-300 focus:border-emerald-400 transition-all duration-300 text-gray-700 shadow-inner hover:shadow-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Responsible Person Section -->
                            <div class="relative group">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur-lg opacity-20 group-hover:opacity-30 transition duration-500">
                                </div>
                                <div
                                    class="relative bg-gradient-to-br from-purple-50 via-pink-50 to-purple-50 rounded-3xl p-8 border border-purple-200 shadow-lg">
                                    <div class="flex items-center space-x-3 mb-5">
                                        <div
                                            class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl p-3 shadow-lg">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <h4 class="text-sm font-bold text-gray-800">Responsible Person</h4>
                                    </div>
                                    <div class="space-y-6">
                                        <div>
                                            <label for="name"
                                                class="block text-sm font-bold text-gray-700 mb-3 flex items-center">
                                                Select Person
                                                <span class="ml-2 text-red-500 text-lg">*</span>
                                            </label>
                                            <div class="relative group/select">
                                                <select name="names" id="name"
                                                    class="w-full px-6 py-5 bg-white border-2 border-purple-300 rounded-2xl focus:ring-4 focus:ring-purple-300 focus:border-purple-400 transition-all duration-300 text-gray-700 shadow-inner hover:shadow-lg appearance-none cursor-pointer text-lg font-semibold"
                                                    required>
                                                    <option value="" class="text-gray-400">👤 Choose who went to market
                                                    </option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->name }}" class="text-gray-700 py-2">
                                                            {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <svg class="absolute right-5 top-1/2 transform -translate-y-1/2 w-6 h-6 text-purple-500 pointer-events-none"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center pt-8">
                            <button type="submit" class="group relative overflow-hidden">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-3xl blur-xl opacity-50 group-hover:opacity-75 transition duration-500 animate-pulse">
                                </div>
                                <div
                                    class="relative bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 text-white px-16 py-5 rounded-2xl font-black text-sm shadow-2xl transition-all duration-500 flex items-center space-x-4 transform hover:scale-105">
                                    <svg class="w-7 h-7 group-hover:rotate-12 transition-transform duration-500"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Save Bazar Entry</span>
                                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform duration-500"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Guest Meal Management -->
            <div class="py-4 bg-gradient-to-br from-gray-50 via-indigo-50/30 to-purple-50/30">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="relative overflow-hidden">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-amber-600 to-orange-600 rounded-3xl blur-lg opacity-20">
                        </div>
                        <div
                            class="relative bg-gradient-to-br from-amber-50 via-orange-50 to-amber-50 rounded-3xl p-8 border-2 border-amber-200 shadow-xl">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center">
                                    <div
                                        class="bg-gradient-to-br from-amber-600 to-orange-600 rounded-2xl p-3 mr-4 shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4
                                            class="text-sm font-black bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent">
                                            Guest Meal Management
                                        </h4>
                                        <p class="text-sm text-gray-600 mt-1">Add guest meals for members</p>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('guestmeal') }}" method="POST" class="space-y-6">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                                    <!-- User Selection -->
                                    <div class="space-y-3">
                                        <label for="user_id"
                                            class="block text-sm font-bold text-gray-700 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-amber-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Select Member
                                            <span class="ml-1 text-red-500">*</span>
                                        </label>
                                        <select name="user_id" id="user_id" required
                                            class="w-full px-4 py-3 bg-white border-2 border-amber-300 rounded-2xl focus:ring-4 focus:ring-amber-300 focus:border-amber-400 transition-all duration-300 text-gray-700 shadow-inner hover:shadow-lg appearance-none cursor-pointer">
                                            <option value="" class="text-gray-400">👤 Select the name who has guest meal
                                            </option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" class="text-gray-700 py-2">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Number of Guest Meals -->
                                    <div class="space-y-3">
                                        <label for="number_of_guest_meal"
                                            class="block text-sm font-bold text-gray-700 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-amber-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            Number of Guest Meals
                                            <span class="ml-1 text-red-500">*</span>
                                        </label>
                                        <input type="number" name="number_of_guest_meal" id="number_of_guest_meal"
                                            placeholder="Enter number of guest meals" min="1.0" max="10.0" step="0.5"
                                            required
                                            class="w-full px-4 py-3 bg-white border-2 border-amber-300 rounded-2xl focus:ring-4 focus:ring-amber-300 focus:border-amber-400 transition-all duration-300 text-gray-700 shadow-inner hover:shadow-lg placeholder-gray-400">
                                    </div>

                                    <div class="space-y-3">
                                        <label for="date" class="block text-sm font-bold text-gray-700">Date</label>
                                        <input type="date" name="date" id="date" value="{{ now()->format('Y-m-d') }}"
                                            class="w-full px-4 py-3 bg-white border-2 border-amber-300 rounded-2xl focus:ring-4 focus:ring-amber-300 focus:border-amber-400 transition-all duration-300 text-gray-700 shadow-inner hover:shadow-lg">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="flex justify-center pt-4">
                                    <button type="submit" class="group relative overflow-hidden">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-r from-amber-600 to-orange-600 rounded-3xl blur-lg opacity-50 group-hover:opacity-75 transition duration-500">
                                        </div>
                                        <div
                                            class="relative bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white px-12 py-4 rounded-2xl font-bold text-sm shadow-2xl transition-all duration-500 flex items-center space-x-3 transform hover:scale-105">
                                            <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-500"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            <span>Add Guest Meal</span>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Cost Card -->
                <div class="group relative overflow-hidden">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-indigo-600 to-indigo-400 rounded-2xl blur-lg opacity-25 group-hover:opacity-40 transition duration-500">
                    </div>
                    <div
                        class="relative bg-white/80 backdrop-blur-xl rounded-2xl shadow-xl p-6 border border-white/20 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-600 mb-2">Total Cost of Bazar</p>
                                <p
                                    class="text-4xl font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
                                    {{ $bazar_total_cost }}
                                </p>
                            </div>
                            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" viewBox="0 0 32 32">
                                    <text x="0" y="24" font-size="24" font-family="Arial, sans-serif"
                                        fill="currentColor">৳</text>
                                </svg>
                            </div>
                        </div>
                        <div class="h-1 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full w-3/4"></div>
                    </div>
                </div>

                <!-- Active Users Card -->
                <div class="group relative overflow-hidden">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-teal-400 rounded-2xl blur-lg opacity-25 group-hover:opacity-40 transition duration-500">
                    </div>
                    <div
                        class="relative bg-white/80 backdrop-blur-xl rounded-2xl shadow-xl p-6 border border-white/20 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-600 mb-2">Active Users</p>
                                <p
                                    class="text-4xl font-black bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">
                                    {{ $users->where('status', 'active')->count() }}
                                </p>
                                <p class="text-xs text-gray-500">Total registered members</p>
                            </div>
                            <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="h-1 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full w-2/3"></div>
                    </div>
                </div>

                <!-- Meals Today Card -->
                <div class="group relative overflow-hidden">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-amber-600 to-orange-400 rounded-2xl blur-lg opacity-25 group-hover:opacity-40 transition duration-500">
                    </div>
                    <div
                        class="relative bg-white/80 backdrop-blur-xl rounded-2xl shadow-xl p-6 border border-white/20 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-600 mb-2">Meals Today</p>
                                <p
                                    class="text-4xl font-black bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent mb-2">
                                    {{ $todayMealsCount }}
                                </p>
                                <p class="text-xs text-gray-500">Across all time slots</p>
                            </div>
                            <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl p-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="h-1 bg-gradient-to-r from-amber-600 to-orange-600 rounded-full w-4/5"></div>
                    </div>
                </div>

                <!-- Store Payment Card -->
                <div class="group relative overflow-hidden">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-rose-600 to-pink-400 rounded-2xl blur-lg opacity-25 group-hover:opacity-40 transition duration-500">
                    </div>
                    <div
                        class="relative bg-white/80 backdrop-blur-xl rounded-2xl shadow-xl p-6 border border-white/20 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-600 mb-2">Store Payment</p>
                                <p
                                    class="text-4xl font-black bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent mb-2">
                                     ৳{{ number_format($store_payment) }}</p> 
                                <p class="text-xs text-gray-500">Current month total</p>
                            </div>
                            <div class="bg-gradient-to-br from-rose-500 to-pink-600 rounded-2xl p-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                        </div>
                        <div class="h-1 bg-gradient-to-r from-rose-600 to-pink-600 rounded-full w-1/2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden transition-opacity duration-300">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md transform transition-all duration-500 scale-95 opacity-0"
                id="modalContent">
                <div class="bg-gradient-to-r from-teal-600 to-cyan-600 rounded-t-3xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-black">Add New Payment</h3>
                        <button onclick="closePaymentModal()" class="text-white/80 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <form action="{{ route('addpayment') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="payment_user_id" class="block text-sm font-bold text-gray-700 mb-2">
                                Select User
                            </label>
                            <select name="user_id" id="payment_user_id" required
                                class="w-full px-4 py-3 bg-white border-2 border-teal-300 rounded-2xl focus:ring-4 focus:ring-teal-300 focus:border-teal-400 transition-all duration-300 text-gray-700 shadow-inner">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="payment_amount" class="block text-sm font-bold text-gray-700 mb-2">
                                Amount
                            </label>
                            <div class="relative">
                                <span
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 text-xl font-black text-teal-600">৳</span>
                                <input type="number" name="amount" id="payment_amount" placeholder="0.00" step="0.01"
                                    min="0" required
                                    class="w-full pl-12 pr-4 py-3 bg-white border-2 border-teal-300 rounded-2xl focus:ring-4 focus:ring-teal-300 focus:border-teal-400 transition-all duration-300 text-gray-700 shadow-inner">
                            </div>
                        </div>
                        <div>
                            <label for="payment_date" class="block text-sm font-bold text-gray-700 mb-2">
                                Payment Date
                            </label>
                            <input type="date" name="date" id="payment_date" value="{{ now()->format('Y-m-d') }}"
                                class="w-full px-4 py-3 bg-white border-2 border-teal-300 rounded-2xl focus:ring-4 focus:ring-teal-300 focus:border-teal-400 transition-all duration-300 text-gray-700 shadow-inner">
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 pt-4">
                        <button type="button" onclick="closePaymentModal()"
                            class="px-6 py-3 text-gray-600 hover:text-gray-800 font-semibold transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-gradient-to-r from-teal-600 to-cyan-600 hover:from-teal-700 hover:to-cyan-700 text-white px-8 py-3 rounded-2xl font-bold shadow-lg transition-all duration-300 transform hover:scale-105">
                            Add Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Custom Animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Enhanced Toggle Switches */
        .peer:checked~div {
            background: linear-gradient(to right, #10B981, #059669);
        }

        .peer:not(:checked)~div {
            background: linear-gradient(to right, #D1D5DB, #9CA3AF);
        }

        input:checked+div:after {
            transform: translateX(100%);
        }

        /* Custom Scrollbar */
        .overflow-x-auto::-webkit-scrollbar {
            height: 12px;
        }

        .overflow-x-auto::-webkit-scrollbar-track {
            background: linear-gradient(to right, #F3F4F6, #E5E7EB);
            border-radius: 10px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: linear-gradient(to right, #6366F1, #8B5CF6);
            border-radius: 10px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to right, #4F46E5, #7C3AED);
        }

        /* Glassmorphism Effect */
        .backdrop-blur-xl {
            backdrop-filter: blur(20px);
        }

        /* Smooth transitions */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Form input focus effects */
        input:focus,
        textarea:focus,
        select:focus {
            transform: translateY(-1px);
        }

        /* Button hover glow */
        button:hover {
            filter: brightness(1.1);
        }

        /* Card hover lift effect */
        .hover\:-translate-y-2:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Modal animations */
        .modal-open {
            animation: modalOpen 0.3s ease-out forwards;
        }

        @keyframes modalOpen {
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Cost input formatting
            const costInput = document.getElementById('total_cost');
            if (costInput) {
                costInput.addEventListener('input', function () {
                    this.value = this.value.replace(/[^\d.]/g, '');
                });

                costInput.addEventListener('blur', function () {
                    if (this.value && !isNaN(this.value)) {
                        this.value = parseFloat(this.value).toFixed(2);
                    }
                });
            }

            // Form validation with visual feedback
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    const button = this.querySelector('button[type="submit"]');
                    if (button) {
                        button.disabled = true;
                        const originalHTML = button.innerHTML;
                        button.innerHTML = '<svg class="animate-spin w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg><span class="ml-2">Processing...</span>';

                        // Re-enable after 3 seconds if form submission fails
                        setTimeout(() => {
                            if (button.disabled) {
                                button.disabled = false;
                                button.innerHTML = originalHTML;
                            }
                        }, 3000);
                    }
                });
            });

            // Add toggle animation feedback
            const toggleSwitches = document.querySelectorAll('input[type="checkbox"]');
            toggleSwitches.forEach(switchElement => {
                switchElement.addEventListener('change', function (event) {
                    const parent = this.parentElement;
                    parent.classList.add('scale-110');
                    setTimeout(() => {
                        parent.classList.remove('scale-110');
                    }, 200);
                });
            });
        });

        // Payment Modal Functions
        function openPaymentModal() {
            const modal = document.getElementById('paymentModal');
            const modalContent = document.getElementById('modalContent');

            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.add('modal-open');
            }, 10);
        }

        function closePaymentModal() {
            const modal = document.getElementById('paymentModal');
            const modalContent = document.getElementById('modalContent');

            modalContent.classList.remove('modal-open');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Show notification function
        function showNotification(message, type = 'success') {
            const bgGradient = type === 'error'
                ? 'bg-gradient-to-r from-red-500 to-red-600'
                : 'bg-gradient-to-r from-green-500 to-emerald-600';

            const notification = document.createElement('div');
            notification.className = `fixed top-8 right-8 ${bgGradient} text-white px-8 py-4 rounded-2xl shadow-2xl transform translate-x-full transition-all duration-500 z-50 flex items-center space-x-3 border border-white/20 backdrop-blur-sm`;

            const icon = type === 'error'
                ? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>'
                : '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';

            notification.innerHTML = `
                <div class="bg-white/20 rounded-full p-2">${icon}</div>
                <span class="font-semibold text-lg">${message}</span>
            `;

            document.body.appendChild(notification);

            setTimeout(() => notification.classList.remove('translate-x-full'), 100);
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => document.body.contains(notification) && document.body.removeChild(notification), 500);
            }, 4000);
        }
    </script>
</x-app-layout>