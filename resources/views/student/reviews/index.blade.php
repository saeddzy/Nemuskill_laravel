<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ulasan & Rating Aplikasi NemuSkill
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-900">Daftar Ulasan</h3>
                <a href="{{ route('student.reviews.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">+ Tambah Ulasan</a>
            </div>
            @if(session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            <div class="space-y-6">
                @forelse($reviews as $review)
                    <div class="bg-white rounded-xl shadow p-6 flex flex-col md:flex-row md:items-center md:justify-between">
                        <div>
                            <div class="flex items-center mb-2">
                                @for($i=1; $i<=5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.386-2.46a1 1 0 00-1.175 0l-3.386 2.46c-.784.57-1.838-.196-1.539-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                                @endfor
                                <span class="ml-3 text-sm text-gray-600">{{ $review->user->name ?? 'Anonim' }}</span>
                            </div>
                            <div class="text-gray-800 mb-2">{{ $review->review }}</div>
                            <div class="text-xs text-gray-400">{{ $review->created_at->format('d M Y H:i') }}</div>
                        </div>
                        @if($review->user_id == auth()->id())
                        <div class="flex flex-col md:flex-row md:items-center gap-2 mt-4 md:mt-0">
                            <a href="{{ route('student.reviews.edit', $review) }}" class="px-4 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('student.reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Hapus ulasan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </div>
                        @endif
                    </div>
                @empty
                    <div class="text-gray-500">Belum ada ulasan.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-student-layout> 