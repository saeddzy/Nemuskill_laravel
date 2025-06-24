<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kerjakan Quiz: {{ $quiz->title }} ({{ $class->title }})
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-md p-6">
                <form method="POST" action="{{ route('student.myclass.quizzes.submit', [$class, $quiz]) }}">
                    @csrf
                    @foreach($quiz->questions as $qIdx => $question)
                        <div class="mb-6">
                            <div class="font-semibold text-blue-700 mb-2">{{ ($qIdx+1) }}. {{ $question->question }}</div>
                            <div class="space-y-2">
                                @foreach($question->options as $oIdx => $option)
                                    <label class="flex items-center">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" class="mr-2" required>
                                        <span>{{ $option->option_text }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Kumpulkan Jawaban</button>
                        <a href="{{ route('student.myclass.quizzes', $class) }}" class="ml-3 px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-student-layout> 