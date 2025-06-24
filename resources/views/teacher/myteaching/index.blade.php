<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Teaching') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-900">Daftar Kelas Saya</h3>
                <a href="{{ route('teacher.myteaching.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Tambah Kelas</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($classes as $class)
                    <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col">
                        @if($class->thumbnail)
                            <img src="{{ asset('storage/'.$class->thumbnail) }}" alt="Thumbnail" class="rounded-xl mb-4 h-40 w-full object-cover">
                        @else
                            <div class="rounded-xl mb-4 h-40 w-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                        <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $class->title }}</h4>
                        <div class="text-blue-600 font-semibold mb-2">Rp {{ number_format($class->price,0,',','.') }}</div>
                        <div class="text-gray-700 mb-4 line-clamp-2">{{ $class->description }}</div>
                        <div class="flex space-x-2 mt-auto">
                            <a href="{{ route('teacher.myteaching.edit', $class) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('teacher.myteaching.destroy', $class) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </div>
                        <div class="flex space-x-2 mt-2">
                            <a href="{{ route('teacher.myteaching.materials.index', $class) }}" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">Input/Edit Materi</a>
                            <a href="{{ route('teacher.myteaching.quizzes.index', $class) }}" class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Input/Edit Quiz</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500 py-12">Belum ada kelas. Klik "Tambah Kelas" untuk membuat kelas baru.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-teacher-layout> 