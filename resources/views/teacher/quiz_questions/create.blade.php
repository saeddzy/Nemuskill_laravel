<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Soal untuk Quiz: {{ $quiz->title }} ({{ $myteaching->title }})
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-md p-8">
                <form method="POST" action="{{ route('teacher.myteaching.quizzes.questions.store', [$myteaching, $quiz]) }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Pertanyaan</label>
                        <textarea name="question" class="w-full border rounded-lg px-3 py-2" rows="3" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Opsi Jawaban</label>
                        <div id="options-list">
                            @for($i=0; $i<4; $i++)
                                <div class="flex items-center mb-2">
                                    <input type="text" name="options[{{ $i }}][option_text]" class="w-full border rounded-lg px-3 py-2 mr-2" placeholder="Opsi {{ chr(65+$i) }}" required>
                                    <label class="flex items-center ml-2">
                                        <input type="radio" name="correct_option" value="{{ $i }}" class="mr-1" {{ $i==0 ? 'checked' : '' }}>
                                        <span class="text-xs text-green-700">Benar</span>
                                    </label>
                                </div>
                            @endfor
                        </div>
                        <button type="button" onclick="addOption()" class="mt-2 px-3 py-1 bg-blue-200 text-blue-800 rounded">+ Tambah Opsi</button>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Bobot Nilai</label>
                        <input type="number" name="weight" class="w-full border rounded-lg px-3 py-2" value="1" min="1" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Urutan Soal</label>
                        <input type="number" name="order" class="w-full border rounded-lg px-3 py-2" value="0">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
                        <a href="{{ route('teacher.myteaching.quizzes.questions.index', [$myteaching, $quiz]) }}" class="ml-3 px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let optionCount = 4;
        function addOption() {
            optionCount++;
            const optionsList = document.getElementById('options-list');
            const div = document.createElement('div');
            div.className = 'flex items-center mb-2';
            div.innerHTML = `<input type="text" name="options[${optionCount-1}][option_text]" class="w-full border rounded-lg px-3 py-2 mr-2" placeholder="Opsi ${String.fromCharCode(65+optionCount-1)}" required>
                <label class="flex items-center ml-2">
                    <input type="radio" name="correct_option" value="${optionCount-1}" class="mr-1">
                    <span class="text-xs text-green-700">Benar</span>
                </label>`;
            optionsList.appendChild(div);
        }
    </script>
</x-teacher-layout> 