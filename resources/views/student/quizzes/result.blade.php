<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hasil Quiz: {{ $quiz->title }} ({{ $class->title }})
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-md p-8 text-center">
                <div class="text-3xl font-bold mb-4">Skor: {{ $score }}</div>
                <div class="mb-4">
                    @if($passed)
                        <span class="px-4 py-2 bg-green-200 text-green-800 rounded-full font-semibold">Lulus</span>
                    @else
                        <span class="px-4 py-2 bg-red-200 text-red-800 rounded-full font-semibold">Tidak Lulus</span>
                    @endif
                </div>
                <div class="mb-2 text-lg">Benar: <span class="font-bold">{{ $correct }}</span> dari <span class="font-bold">{{ $total }}</span> soal</div>
                <a href="{{ route('student.myclass.quizzes', $class) }}" class="mt-6 inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Kembali ke Daftar Quiz</a>
            </div>
        </div>
    </div>
</x-student-layout> 