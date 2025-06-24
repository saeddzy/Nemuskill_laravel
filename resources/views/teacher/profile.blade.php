<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile Teacher') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-8">
                <div class="mb-4">
                    <span class="block text-gray-700 font-semibold">Nama:</span>
                    <span class="block text-lg text-gray-900">{{ Auth::user()->name }}</span>
                </div>
                <div class="mb-4">
                    <span class="block text-gray-700 font-semibold">Email:</span>
                    <span class="block text-lg text-gray-900">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
    </div>
</x-teacher-layout> 