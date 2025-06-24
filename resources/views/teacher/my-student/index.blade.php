<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola My Student</h2>
    </x-slot>
    <div class="py-8 max-w-5xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($classes as $class)
                <a href="{{ route('teacher.my-student.show', $class) }}" class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition block">
                    <h3 class="text-lg font-bold text-blue-700 mb-2">{{ $class->title }}</h3>
                    <p class="text-gray-600 mb-2">{{ $class->description }}</p>
                    <div class="text-sm text-gray-500 mb-2">{{ $class->purchases_count }} student</div>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-12">Belum ada kelas.</div>
            @endforelse
        </div>
    </div>
</x-teacher-layout> 