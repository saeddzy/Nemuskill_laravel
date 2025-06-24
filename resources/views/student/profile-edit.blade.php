<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
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
                <!-- Header with Modern Gradient -->
                <div class="relative">
                    <div class="h-32 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700"></div>
                    <div class="px-8 py-6">
                        <h3 class="text-2xl font-bold text-gray-900">Edit Your Profile</h3>
                        <p class="text-gray-600 mt-1">Update your personal information and preferences</p>
                    </div>
                </div>

                <div class="px-8 pb-8">
                    <form method="POST" action="{{ route('student.profile.update') }}" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Profile Picture Section -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm">
                            <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8">
                                <div class="relative group">
                                    <div class="w-40 h-40 rounded-full overflow-hidden bg-white shadow-lg ring-4 ring-white transform transition duration-300 group-hover:scale-105">
                                        @if(Auth::user()->profile_picture)
                                            <img src="{{ asset('storage/profile-pictures/' . Auth::user()->profile_picture) }}" 
                                                 alt="Profile Picture" 
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                                                <svg class="w-24 h-24 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
                                    <div class="mt-1 flex items-center">
                                        <input type="file" name="profile_picture" accept="image/*" 
                                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 transition duration-150">
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" name="full_name" id="full_name" value="{{ old('full_name', Auth::user()->full_name) }}"
                                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150">
                                @error('full_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number', Auth::user()->phone_number) }}"
                                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150">
                                @error('phone_number')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                                <label for="last_education" class="block text-sm font-medium text-gray-700 mb-2">Last Education</label>
                                <input type="text" name="last_education" id="last_education" value="{{ old('last_education', Auth::user()->last_education) }}"
                                    class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150">
                                @error('last_education')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                            <label for="additional_info" class="block text-sm font-medium text-gray-700 mb-2">Additional Information</label>
                            <textarea name="additional_info" id="additional_info" rows="3"
                                class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150">{{ old('additional_info', Auth::user()->additional_info) }}</textarea>
                            @error('additional_info')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Interests -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                            <label for="interests" class="block text-sm font-medium text-gray-700 mb-2">Interests</label>
                            <input type="text" name="interests" id="interests" value="{{ old('interests', Auth::user()->interests) }}"
                                class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150"
                                placeholder="Separate interests with commas">
                            @error('interests')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bio -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition duration-300">
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                            <textarea name="bio" id="bio" rows="4"
                                class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150">{{ old('bio', Auth::user()->bio) }}</textarea>
                            @error('bio')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <a href="{{ route('student.profile') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gray-100 border border-transparent rounded-xl font-semibold text-sm text-gray-700 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white border border-transparent rounded-xl font-semibold text-base uppercase tracking-widest hover:from-blue-600 hover:to-blue-700 active:from-blue-700 active:to-blue-800 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Save Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-student-layout> 