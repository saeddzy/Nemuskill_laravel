<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Find Class') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Available Classes</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($classes as $class)
                            <a href="{{ route('student.findclass.show', $class) }}" class="block bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl shadow-md p-6 hover:shadow-xl transition">
                                @if($class->thumbnail)
                                    <img src="{{ asset('storage/'.$class->thumbnail) }}" alt="Thumbnail" class="rounded-xl mb-4 h-40 w-full object-cover">
                                @else
                                    <div class="rounded-xl mb-4 h-40 w-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                                @endif
                                <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $class->title }}</h4>
                                <div class="text-blue-600 font-semibold mb-2">Rp {{ number_format($class->price,0,',','.') }}</div>
                                <div class="text-gray-700 mb-2 line-clamp-2">{{ $class->description }}</div>
                                <div class="text-xs text-gray-500">By: {{ $class->teacher->name }}</div>
                            </a>
                        @empty
                            <div class="col-span-3 text-center text-gray-500 py-12">Belum ada kelas tersedia.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout> 