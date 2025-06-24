<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Quiz untuk Kelas: {{ $myteaching->title }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-md p-8">
                <form method="POST" action="{{ route('teacher.myteaching.quizzes.store', $myteaching) }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Judul Quiz</label>
                        <input type="text" name="title" class="w-full border rounded-lg px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Deskripsi Quiz</label>
                        <textarea name="description" class="w-full border rounded-lg px-3 py-2" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Passing Score</label>
                        <input type="number" name="passing_score" class="w-full border rounded-lg px-3 py-2" value="0" min="0" max="100">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Urutan Quiz</label>
                        <input type="number" name="order" class="w-full border rounded-lg px-3 py-2" value="0">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Simpan</button>
                        <a href="{{ route('teacher.myteaching.quizzes.index', $myteaching) }}" class="ml-3 px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-teacher-layout> 