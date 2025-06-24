<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homepage Teacher') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-indigo-500 via-blue-500 to-blue-700 rounded-2xl shadow-lg p-8 mb-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Selamat Datang, Teacher!</h1>
                <p class="text-lg">Kelola kelas, materi, dan pantau aktivitas mengajar Anda di sini.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('teacher.myteaching.index') }}" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-2xl shadow-md p-6 flex items-center hover:scale-105 hover:shadow-xl transition">
                    <svg class="w-8 h-8 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3v2a1 1 0 001 1h4a1 1 0 001-1v-2h3a1 1 0 001-1V7a1 1 0 00-1-1H4a1 1 0 00-1 1z" />
                    </svg>
                    <span class="text-lg font-semibold">My Teaching</span>
                </a>
                <a href="{{ route('teacher.my-student.index') }}" class="bg-gradient-to-r from-green-400 to-green-600 text-white rounded-2xl shadow-md p-6 flex items-center hover:scale-105 hover:shadow-xl transition">
                    <svg class="w-8 h-8 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4V6a4 4 0 10-8 0v4m12 4v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2a2 2 0 012-2h12a2 2 0 012 2z" />
                    </svg>
                    <span class="text-lg font-semibold">Kelola My Student</span>
                </a>
            </div>
        </div>
    </div>
</x-teacher-layout> 