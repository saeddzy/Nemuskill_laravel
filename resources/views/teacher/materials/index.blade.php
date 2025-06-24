<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Materi Kelas: {{ $myteaching->title }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-900">Daftar Materi</h3>
                <a href="{{ route('teacher.myteaching.materials.create', $myteaching) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Tambah Materi</a>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6">
                @if($materials->isEmpty())
                    <div class="text-gray-500">Belum ada materi. Klik "Tambah Materi" untuk membuat materi baru.</div>
                @else
                    <div class="space-y-6">
                        @foreach($materials as $material)
                            <div class="border-b pb-6 last:border-b-0">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h4 class="text-lg font-semibold text-blue-700">{{ $material->title }}</h4>
                                        <span class="text-sm text-gray-500 capitalize">Tipe: {{ $material->type }}</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('teacher.myteaching.materials.edit', [$myteaching, $material]) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                                        <form action="{{ route('teacher.myteaching.materials.destroy', [$myteaching, $material]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    @if($material->type === 'text')
                                        <div class="text-gray-800 break-words whitespace-pre-line" style="word-break: break-word; overflow-wrap: anywhere;">{!! nl2br(e($material->content)) !!}</div>
                                    @elseif($material->type === 'video' && $material->video_url)
                                        <div class="aspect-w-16 aspect-h-9">
                                            <iframe src="{{ $material->video_url }}" frameborder="0" allowfullscreen class="w-full h-64 rounded-lg"></iframe>
                                        </div>
                                    @elseif($material->type === 'file' && $material->file_path)
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-gray-700">{{ $material->file_name }}</span>
                                            <a href="{{ route('teacher.myteaching.materials.download', [$myteaching, $material]) }}" class="text-blue-600 hover:text-blue-800">Download</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-teacher-layout> 