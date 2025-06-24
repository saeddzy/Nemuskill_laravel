<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Kelas</h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($classes as $class)
                <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition cursor-pointer" onclick="window.location='{{ route('admin.teaching-classes.show', $class) }}'">
                    <h3 class="text-lg font-bold text-blue-700 mb-2">{{ $class->title }}</h3>
                    <p class="text-gray-600 mb-2">Teacher: {{ $class->teacher->full_name ?? $class->teacher->name }}</p>
                    <p class="text-gray-500 text-sm mb-4">{{ Str::limit($class->description, 60) }}</p>
                    <form action="{{ route('admin.teaching-classes.destroy', $class) }}" method="POST" onsubmit="return confirm('Hapus kelas ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-admin-layout> 