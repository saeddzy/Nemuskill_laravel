<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Materi untuk Kelas: {{ $myteaching->title }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-md p-8">
                <form method="POST" action="{{ route('teacher.myteaching.materials.store', $myteaching) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Judul Materi</label>
                        <input type="text" name="title" class="w-full border rounded-lg px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Tipe Materi</label>
                        <select name="type" class="w-full border rounded-lg px-3 py-2" required onchange="toggleFields(this.value)">
                            <option value="text">Text</option>
                            <option value="video">Video</option>
                            <option value="file">File</option>
                        </select>
                    </div>
                    <div class="mb-4" id="content-field">
                        <label class="block text-gray-700 font-semibold mb-2">Konten Materi (Text)</label>
                        <textarea name="content" class="w-full border rounded-lg px-3 py-2" rows="5"></textarea>
                    </div>
                    <div class="mb-4 hidden" id="video-field">
                        <label class="block text-gray-700 font-semibold mb-2">Video URL (YouTube, Vimeo, dll)</label>
                        <input type="text" name="video_url" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div class="mb-4 hidden" id="file-field">
                        <label class="block text-gray-700 font-semibold mb-2">File Materi (PDF, DOC, PPT, dll)</label>
                        <input type="file" name="file" class="w-full border rounded-lg px-3 py-2" accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx">
                        <p class="text-sm text-gray-500 mt-1">Maksimal ukuran file: 10MB</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Urutan Materi</label>
                        <input type="number" name="order" class="w-full border rounded-lg px-3 py-2" value="0">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Simpan</button>
                        <a href="{{ route('teacher.myteaching.materials.index', $myteaching) }}" class="ml-3 px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleFields(type) {
            const contentField = document.getElementById('content-field');
            const videoField = document.getElementById('video-field');
            const fileField = document.getElementById('file-field');

            contentField.classList.add('hidden');
            videoField.classList.add('hidden');
            fileField.classList.add('hidden');

            if (type === 'text') {
                contentField.classList.remove('hidden');
            } else if (type === 'video') {
                videoField.classList.remove('hidden');
            } else if (type === 'file') {
                fileField.classList.remove('hidden');
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            toggleFields(document.querySelector('select[name=type]').value);
        });
    </script>
</x-teacher-layout> 