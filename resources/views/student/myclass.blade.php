<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Class') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">My Classes</h3>
                    @if($purchases->isEmpty())
                        <p class="text-gray-600">Belum ada kelas yang bisa diakses.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($purchases as $purchase)
                                <div class="bg-blue-50 rounded-xl shadow p-5 flex flex-col">
                                    <div class="font-bold text-lg text-blue-800 mb-2">{{ $purchase->teachingClass->title ?? '-' }}</div>
                                    <div class="text-gray-700 mb-2">Dibeli pada: {{ $purchase->created_at->format('d M Y H:i') }}</div>
                                    <div class="flex-1 text-gray-600 mb-4">{{ Str::limit($purchase->teachingClass->description ?? '-', 80) }}</div>
                                    <div class="flex flex-col gap-2 mt-auto">
                                        <a href="{{ route('student.myclass.materials', $purchase->teachingClass) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg text-center font-semibold hover:bg-green-700 transition">Akses Materi</a>
                                        <a href="{{ route('student.myclass.quizzes', $purchase->teachingClass) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-center font-semibold hover:bg-indigo-700 transition">Akses Quiz</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-student-layout> 