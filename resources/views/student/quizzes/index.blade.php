<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Quiz Kelas: {{ $class->title }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md shadow-sm" role="alert">
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Quiz</h3>
                @if($quizzes->isEmpty())
                    <div class="text-gray-500">Belum ada quiz untuk kelas ini.</div>
                @else
                    <div class="space-y-4">
                        @foreach($quizzes as $quiz)
                            <div class="border rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="text-lg font-semibold text-blue-700">{{ $quiz->title }}</h4>
                                        <p class="text-gray-600 mt-1">{{ $quiz->description }}</p>
                                        @php
                                            $attemptCount = $quiz->scores->count();
                                            $maxAttempts = 3;
                                            $passingScore = $quiz->passing_score ?? 0;
                                            // Debug output - Uncomment to see values
                                            echo "Passing Score: " . $passingScore . "%";
                                            echo " | Scores: ";
                                            if ($quiz->scores->isNotEmpty()) {
                                                echo $quiz->scores->pluck('score')->join(', ') . "%";
                                            } else {
                                                echo "No scores";
                                            }
                                            echo " | Attempts: " . $attemptCount . "/" . $maxAttempts;
                                            echo "<br>";

                                            $isPassed = $quiz->scores->contains(function($score) use ($passingScore) {
                                                return $score->score >= $passingScore;
                                            });
                                        @endphp
                                        @if($attemptCount < $maxAttempts)
                                            <a href="{{ route('student.myclass.quizzes.do', [$class, $quiz]) }}" class="mt-2 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Mulai Quiz (Percobaan ke-{{ $attemptCount+1 }}/{{ $maxAttempts }})</a>
                                        @else
                                            @if($isPassed)
                                                <div class="mt-2 text-green-600 font-semibold">Quiz telah diselesaikan.</div>
                                            @else
                                                <div class="mt-2 text-red-500 font-semibold">Anda belum mencapai target dan batas maksimum telah dicapai.</div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        @if($attemptCount > 0)
                                            @foreach($quiz->scores as $score)
                                                <div class="text-sm text-gray-600">
                                                    <span class="font-semibold">Nilai:</span> {{ number_format($score->score, 1) }}%
                                                </div>
                                                <div class="text-sm text-gray-600">
                                                    <span class="font-semibold">Jawaban Benar:</span> {{ $score->score * $score->total_questions / 100 }}/{{ $score->total_questions }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    Dikerjakan pada: {{ $score->created_at->format('d M Y H:i') }}
                                                </div>
                                                <hr>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-student-layout> 