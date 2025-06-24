<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 rounded-2xl shadow-lg p-8 mb-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Selamat Datang, Admin!</h1>
                <p class="text-lg">Kelola data guru, siswa, dan kelas dengan mudah dan cepat.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-md p-6 flex items-center hover:shadow-xl transition">
                    <div class="p-4 bg-blue-100 rounded-full mr-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4V6a4 4 0 10-8 0v4m12 4v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2a2 2 0 012-2h12a2 2 0 012 2z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-blue-700">{{ $totalTeachers }}</div>
                        <div class="text-gray-700">Guru</div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-md p-6 flex items-center hover:shadow-xl transition">
                    <div class="p-4 bg-green-100 rounded-full mr-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4V6a4 4 0 10-8 0v4m12 4v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2a2 2 0 012-2h12a2 2 0 012 2z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-green-700">{{ $totalStudents }}</div>
                        <div class="text-gray-700">Siswa</div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-md p-6 flex items-center hover:shadow-xl transition">
                    <div class="p-4 bg-purple-100 rounded-full mr-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3v2a1 1 0 001 1h4a1 1 0 001-1v-2h3a1 1 0 001-1V7a1 1 0 00-1-1H4a1 1 0 00-1 1z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-purple-700">{{ $totalClassrooms }}</div>
                        <div class="text-gray-700">Kelas</div>
                    </div>
                </div>
                <a href="{{ route('admin.reviews.index') }}" class="bg-white rounded-2xl shadow-md p-6 flex items-center hover:shadow-xl transition cursor-pointer">
                    <div class="p-4 bg-yellow-100 rounded-full mr-4">
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.036 6.29a1 1 0 00.95.69h6.631c.969 0 1.371 1.24.588 1.81l-5.37 3.905a1 1 0 00-.364 1.118l2.036 6.29c.3.921-.755 1.688-1.538 1.118l-5.37-3.905a1 1 0 00-1.175 0l-5.37 3.905c-.783.57-1.838-.197-1.538-1.118l2.036-6.29a1 1 0 00-.364-1.118l-5.37-3.905c-.783-.57-.38-1.81.588-1.81h6.631a1 1 0 00.95-.69l2.036-6.29z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-yellow-600">{{ number_format($averageRating, 2) }}</div>
                        <div class="text-gray-700">Rating App</div>
                        <div class="text-xs text-gray-500">{{ $totalReviews }} review</div>
                    </div>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('admin.teachers.index') }}" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-2xl shadow-md p-6 flex items-center hover:scale-105 hover:shadow-xl transition">
                    <svg class="w-8 h-8 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4V6a4 4 0 10-8 0v4m12 4v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2a2 2 0 012-2h12a2 2 0 012 2z" />
                    </svg>
                    <span class="text-lg font-semibold">Kelola Guru</span>
                </a>
                <a href="{{ route('admin.teaching-classes.index') }}" class="bg-gradient-to-r from-purple-400 to-purple-600 text-white rounded-2xl shadow-md p-6 flex items-center hover:scale-105 hover:shadow-xl transition">
                    <svg class="w-8 h-8 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3v2a1 1 0 001 1h4a1 1 0 001-1v-2h3a1 1 0 001-1V7a1 1 0 00-1-1H4a1 1 0 00-1 1z" />
                    </svg>
                    <span class="text-lg font-semibold">Kelola Kelas</span>
                </a>
                <a href="{{ route('admin.student-payments.index') }}" class="bg-gradient-to-r from-green-400 to-green-600 text-white rounded-2xl shadow-md p-6 flex items-center hover:scale-105 hover:shadow-xl transition">
                    <svg class="w-8 h-8 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4V6a4 4 0 10-8 0v4m12 4v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2a2 2 0 012-2h12a2 2 0 012 2z" />
                    </svg>
                    <span class="text-lg font-semibold">Kelola Pembayaran Siswa</span>
                </a>
            </div>
        </div>
    </div>
</x-admin-layout> 