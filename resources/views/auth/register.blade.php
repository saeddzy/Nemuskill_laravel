<x-guest-layout>
    <x-auth-card>
        <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Register Here!</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <div class="relative flex items-center">
                    <span class="absolute left-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <x-text-input id="name" class="block w-full pl-10 pr-4 py-3 rounded-full border border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 placeholder-gray-400 text-gray-700" type="text" name="name" :value="old('name')" required autofocus placeholder="full name" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <div class="relative flex items-center">
                    <span class="absolute left-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9h1.5a2.5 2.5 0 000-5H16z" />
                        </svg>
                    </span>
                    <x-text-input id="email" class="block w-full pl-10 pr-4 py-3 rounded-full border border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 placeholder-gray-400 text-gray-700" type="email" name="email" :value="old('email')" required placeholder="email address" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <div class="relative flex items-center">
                    <span class="absolute left-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v3h8z" />
                        </svg>
                    </span>
                    <x-text-input id="password" class="block w-full pl-10 pr-4 py-3 rounded-full border border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 placeholder-gray-400 text-gray-700"
                                type="password"
                                name="password"
                                required autocomplete="new-password"
                                placeholder="password" />
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <div class="relative flex items-center">
                    <span class="absolute left-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v3h8z" />
                        </svg>
                    </span>
                    <x-text-input id="password_confirmation" class="block w-full pl-10 pr-4 py-3 rounded-full border border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 placeholder-gray-400 text-gray-700"
                                type="password"
                                name="password_confirmation" required
                                placeholder="confirm password" />
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Role -->
            <div>
                <div class="relative flex items-center">
                    <span class="absolute left-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </span>
                    <select name="role_id" id="role_id" class="block w-full pl-10 pr-4 py-3 rounded-full border border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 placeholder-gray-400 text-gray-700" required>
                        <option value="" disabled selected>Select Role</option>
                        <option value="1" {{ old('role_id') == '1' ? 'selected' : '' }}>Student</option>
                        
                    </select>
                </div>
                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button class="bg-gray-800 hover:bg-gray-700 text-white text-sm py-1 px-4 rounded-full flex items-center space-x-1">
                    <span>REGISTER</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </x-primary-button>
            </div>
        </form>

        <div class="text-center mt-12 text-sm text-gray-600">
            <span>Already have an account? </span>
            <a href="{{ route('login') }}" class="text-gray-800 font-semibold hover:underline">Login here!</a>
        </div>
    </x-auth-card>
</x-guest-layout>
