<x-guest-layout>
    <x-auth-card>
        <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">Login Here!</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-sm text-green-600" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Username/Email Input -->
            <div>
                <div class="relative flex items-center">
                    <span class="absolute left-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <x-text-input id="email" class="block w-full pl-10 pr-4 py-3 rounded-full border border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 placeholder-gray-400 text-gray-700" type="email" name="email" :value="old('email')" required autofocus placeholder="username" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password Input -->
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
                                required autocomplete="current-password"
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

            <!-- Remember Password & Login Button -->
            <div class="flex items-center justify-between mt-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Remember Password</span>
                </label>

                <x-primary-button class="ml-4 bg-gray-800 hover:bg-gray-700 text-white text-sm py-1 px-4 rounded-full flex items-center space-x-1">
                    <span>LOG IN</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </x-primary-button>
            </div>
        </form>

        <div class="text-center mt-12 text-sm text-gray-600">
            <span>Don't have an account? </span>
            <a href="{{ route('register') }}" class="text-gray-800 font-semibold hover:underline">Create your account here!</a>
        </div>
    </x-auth-card>
</x-guest-layout>
