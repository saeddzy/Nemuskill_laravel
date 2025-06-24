<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Soal Quiz: {{ $quiz->title }} ({{ $myteaching->title }})
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
                <h3 class="text-lg font-bold text-gray-900">Daftar Soal</h3>
                <a href="{{ route('teacher.myteaching.quizzes.questions.create', [$myteaching, $quiz]) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Tambah Soal</a>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6">
                @if($questions->isEmpty())
                    <div class="text-gray-500">Belum ada soal. Klik "Tambah Soal" untuk membuat soal baru.</div>
                @else
                    <ol class="list-decimal pl-6 space-y-6">
                        @foreach($questions as $question)
                            <li>
                                <div class="font-semibold text-blue-700 mb-1">{{ $question->question }}</div>
                                <ul class="pl-4">
                                    @foreach($question->options as $option)
                                        <li class="mb-1 flex items-center">
                                            <span class="mr-2">{{ $option->option_text }}</span>
                                            @if($option->is_correct)
                                                <span class="ml-2 px-2 py-0.5 bg-green-200 text-green-800 text-xs rounded">Benar</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="flex space-x-2 mt-2">
                                    <a href="{{ route('teacher.myteaching.quizzes.questions.edit', [$myteaching, $quiz, $question]) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                                    <form action="{{ route('teacher.myteaching.quizzes.questions.destroy', [$myteaching, $quiz, $question]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus soal ini?')">Hapus</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                @endif
            </div>
        </div>
    </div>
</x-teacher-layout> 