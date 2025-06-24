<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homepage') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-white">
        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:w-full lg:pb-28 xl:pb-32">
                    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                <span class="block">Welcome back,</span>
                                <span class="block text-blue-600">{{ Auth::user()->name }}!</span>
                            </h1>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Continue your learning journey and explore new opportunities to grow your skills.
                            </p>
                        </div>
                    </main>
                </div>
            </div>
        </div>

        <!-- Learning Tips Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 mb-12">
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl shadow-xl overflow-hidden">
                <div class="px-6 py-8">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-white mb-4">Learning Tips</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm">
                                <div class="text-white">
                                    <h4 class="text-lg font-semibold mb-2">Set Clear Goals</h4>
                                    <p class="text-sm">Define what you want to achieve and break it down into manageable steps.</p>
                                </div>
                            </div>
                            <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm">
                                <div class="text-white">
                                    <h4 class="text-lg font-semibold mb-2">Stay Consistent</h4>
                                    <p class="text-sm">Regular practice is key to mastering new skills and concepts.</p>
                                </div>
                            </div>
                            <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-blur-sm">
                                <div class="text-white">
                                    <h4 class="text-lg font-semibold mb-2">Take Breaks</h4>
                                    <p class="text-sm">Remember to rest and recharge to maintain optimal learning performance.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Active Classes Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg transform hover:scale-105 transition duration-300">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Active Plans</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{ $plans->count() }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Learning Progress Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg transform hover:scale-105 transition duration-300">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Learning Progress</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">75%</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Available Classes Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg transform hover:scale-105 transition duration-300">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Available Classes</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{ $recommendedClasses->count() }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Current Learning Plans -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600">
                        <h3 class="text-xl font-bold text-white">Current Learning Plans</h3>
                    </div>
                    <div class="p-6">
                        @if($plans->isEmpty())
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No active plans</h3>
                                <p class="mt-1 text-sm text-gray-500">Start planning your learning journey!</p>
                                <div class="mt-6">
                                    <a href="{{ route('student.planning') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Create Plan
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach($plans as $plan)
                                    <div class="bg-gray-50 rounded-xl p-4 hover:shadow-md transition duration-300">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="text-lg font-semibold text-gray-900">{{ $plan->class_name }}</h4>
                                                <p class="text-sm text-gray-600">Target: {{ $plan->target_date->format('M d, Y') }}</p>
                                                <div class="mt-2">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                        @if($plan->status === 'completed') bg-green-100 text-green-800
                                                        @elseif($plan->status === 'in_progress') bg-yellow-100 text-yellow-800
                                                        @else bg-gray-100 text-gray-800 @endif">
                                                        {{ ucfirst(str_replace('_', ' ', $plan->status)) }}
                                                    </span>
                                                </div>
                                                @if($plan->notes)
                                                    <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $plan->notes }}</p>
                                                @endif
                                            </div>
                                            <a href="{{ route('student.planning') }}" class="text-blue-600 hover:text-blue-800">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Recommended Classes -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="p-6 bg-gradient-to-r from-purple-500 to-purple-600">
                        <h3 class="text-xl font-bold text-white">Recommended Classes</h3>
                    </div>
                    <div class="p-6">
                        @if($recommendedClasses->isEmpty())
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No recommended classes</h3>
                                <p class="mt-1 text-sm text-gray-500">You've enrolled in all available classes!</p>
                            </div>
                        @else
                            <div class="grid grid-cols-1 gap-4">
                                @foreach($recommendedClasses as $class)
                                    <div class="bg-gray-50 rounded-xl p-4 hover:shadow-md transition duration-300">
                                        <div class="flex items-start space-x-4">
                                            @if($class->thumbnail)
                                                <img src="{{ asset('storage/'.$class->thumbnail) }}" alt="{{ $class->title }}" class="w-24 h-24 object-cover rounded-lg">
                                            @else
                                                <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <h4 class="text-lg font-semibold text-gray-900">{{ $class->title }}</h4>
                                                <p class="text-sm text-gray-600 line-clamp-2">{{ $class->description }}</p>
                                                <div class="mt-2 flex items-center justify-between">
                                                    <span class="text-blue-600 font-semibold">Rp {{ number_format($class->price,0,',','.') }}</span>
                                                    <a href="{{ route('student.findclass.show', $class) }}" class="text-purple-600 hover:text-purple-800 font-medium">View Details →</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout> 