<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                <!-- Profile Header with Modern Gradient -->
                <div class="relative">
                    <!-- Cover Image -->
                    <div class="h-48 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700"></div>
                    
                    <!-- Profile Section -->
                    <div class="px-8 pb-8">
                        <div class="relative -mt-16">
                            <!-- Profile Picture with Glow Effect -->
                            <div class="relative inline-block">
                                <div class="w-32 h-32 rounded-full overflow-hidden bg-white shadow-2xl ring-4 ring-white transform hover:scale-105 transition duration-300">
                                    @if(Auth::user()->profile_picture)
                                        <img src="{{ asset('storage/profile-pictures/' . Auth::user()->profile_picture) }}" 
                                             alt="Profile Picture" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                                            <svg class="w-20 h-20 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Profile Info -->
                            <div class="mt-4">
                                <h3 class="text-3xl font-bold text-gray-900">{{ Auth::user()->full_name ?? Auth::user()->name }}</h3>
                                <p class="text-lg text-blue-600 font-medium">{{ Auth::user()->last_education ?? 'Student' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="px-8 pb-8">
                    <!-- Contact Information Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Email Card -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 transform hover:scale-105 transition duration-300 shadow-sm hover:shadow-md">
                            <div class="flex items-center space-x-4">
                                <div class="bg-white p-3 rounded-xl shadow-sm">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-600">Email</h4>
                                    <p class="text-lg font-semibold text-gray-900">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Phone Card -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 transform hover:scale-105 transition duration-300 shadow-sm hover:shadow-md">
                            <div class="flex items-center space-x-4">
                                <div class="bg-white p-3 rounded-xl shadow-sm">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-600">Phone Number</h4>
                                    <p class="text-lg font-semibold text-gray-900">{{ Auth::user()->phone_number ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="space-y-6">
                        <!-- Interests -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                                Interests
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @if(Auth::user()->interests)
                                    @foreach(explode(',', Auth::user()->interests) as $interest)
                                        <span class="px-4 py-2 bg-white text-blue-700 rounded-full text-sm font-medium shadow-sm hover:shadow-md transition duration-200">
                                            {{ trim($interest) }}
                                        </span>
                                    @endforeach
                                @else
                                    <p class="text-gray-500">No interests specified</p>
                                @endif
                            </div>
                        </div>

                        <!-- Bio -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                About Me
                            </h4>
                            <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ Auth::user()->bio ?? 'No bio available' }}</p>
                        </div>

                        <!-- Additional Info -->
                        @if(Auth::user()->additional_info)
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Additional Information
                                </h4>
                                <p class="text-gray-700 leading-relaxed">{{ Auth::user()->additional_info }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Edit Profile Button -->
                    <div class="flex justify-end mt-8">
                        <a href="{{ route('student.profile.edit') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white border border-transparent rounded-xl font-semibold text-base uppercase tracking-widest hover:from-blue-600 hover:to-blue-700 active:from-blue-700 active:to-blue-800 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout> 