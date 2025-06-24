<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Quiz Kelas: {{ $myteaching->title }}
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
                <h3 class="text-lg font-bold text-gray-900">Daftar Quiz</h3>
                <a href="{{ route('teacher.myteaching.quizzes.create', $myteaching) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Tambah Quiz</a>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6">
                @php
                    $quizzes = $quizzes ?? collect();
                @endphp
                @if($quizzes->isEmpty())
                    <div class="text-gray-500">Belum ada quiz. Klik "Tambah Quiz" untuk membuat quiz baru.</div>
                @else
                    <div class="space-y-6">
                        @foreach($quizzes as $quiz)
                            <div class="border-b pb-6 last:border-b-0">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-blue-700">{{ $quiz->title }}</h4>
                                        <p class="text-gray-600 mt-1">{{ $quiz->description }}</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('teacher.myteaching.quizzes.questions.index', [$myteaching, $quiz]) }}" class="px-3 py-1 bg-blue-400 text-white rounded hover:bg-blue-500">Kelola Soal</a>
                                        <a href="{{ route('teacher.myteaching.quizzes.edit', [$myteaching, $quiz]) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                                        <form action="{{ route('teacher.myteaching.quizzes.destroy', [$myteaching, $quiz]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus quiz ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-teacher-layout> 