<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Student di Kelas: {{ $class->title }}</h2>
    </x-slot>
    <div class="py-8 max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold mb-2">Daftar Student</h3>
            <ul>
                @forelse($class->purchases as $purchase)
                    <li class="mb-4">
                        <div class="font-semibold">{{ $purchase->student->name }} <span class="text-xs text-gray-500">({{ $purchase->student->email }})</span></div>
                        <div class="ml-4 text-sm text-gray-700">
                            <b>Nilai Quiz:</b>
                            <ul>
                                @forelse($class->quizzes as $quiz)
                                    <li>
                                        {{ $quiz->title }}:
                                        @php
                                            $score = $quiz->quizScores->firstWhere('user_id', $purchase->student->id);
                                        @endphp
                                        <span class="font-bold">{{ $score ? $score->score : '-' }}</span>
                                    </li>
                                @empty
                                    <li><i>Belum ada quiz</i></li>
                                @endforelse
                            </ul>
                        </div>
                    </li>
                @empty
                    <li><i>Belum ada student</i></li>
                @endforelse
            </ul>
        </div>
        <a href="{{ route('teacher.my-student.index') }}" class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Kembali</a>
    </div>
</x-teacher-layout> 