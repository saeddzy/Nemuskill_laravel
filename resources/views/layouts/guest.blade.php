<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen bg-white font-sans text-gray-900 antialiased">
        <div class="flex min-h-screen w-full">
            <!-- Left Panel - Background Image -->
            <div class="hidden md:flex w-1/2 bg-cover bg-center relative" style="background-image: url('{{ asset('images/nature2.jpg') }}');">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center p-8 text-white">
                    <img src="{{ asset('images/nemuskill-logo.png') }}" alt="Nemuskill Logo" class="h-20 w-auto mb-4">
                    <div class="mt-auto text-center pt-12">
                        <p class="text-sm font-semibold mb-2">Your Gateway to Skillful Learning</p>
                    </div>
                </div>
            </div>

            <!-- Right Panel - Auth Card Container -->
            <div class="w-full md:w-1/2 flex items-center justify-center p-4">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
