<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materi: '.$currentClass->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Daftar Materi</h3>
                    @if($materials->isEmpty())
                        <p>Belum ada materi untuk kelas ini.</p>
                    @else
                        <ul class="space-y-4 max-w-lg mx-auto">
                            @foreach($materials as $material)
                                <li class="bg-gray-100 p-4 rounded-lg flex justify-between items-start">
                                    <div class="flex-1">
                                        <h4 class="font-bold mb-2">{{ $material->title }}</h4>
                                        @if($material->description)
                                            <p class="text-sm text-gray-600 mb-2">{{ $material->description }}</p>
                                        @endif

                                        @if($material->type == 'text')
                                            @if($material->content)
                                                <div class="text-gray-800 break-words whitespace-pre-line" style="word-break: break-word; overflow-wrap: anywhere;">{!! nl2br(e($material->content)) !!}</div>
                                            @else
                                                <span class="text-sm text-gray-500">No text content available</span>
                                            @endif
                                        @elseif($material->type == 'video')
                                            @if($material->video_url)
                                                <div class="aspect-w-16 aspect-h-9 w-full rounded-lg overflow-hidden">
                                                    <iframe src="{{ $material->video_url }}?autoplay=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                                                </div>
                                            @else
                                                <span class="text-sm text-gray-500">No video URL available</span>
                                            @endif
                                        @elseif($material->type == 'file')
                                            <span class="text-sm text-gray-500">File material.</span>
                                        @endif
                                    </div>
                                    @if($material->type == 'file' && $material->file_path)
                                        <div class="flex-shrink-0 ml-4">
                                            <a href="{{ route('student.myclass.materials.download', ['class' => $currentClass->id, 'material' => $material->id]) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                                Download
                                            </a>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-student-layout> 