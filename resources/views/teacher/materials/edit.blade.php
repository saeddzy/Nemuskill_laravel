<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Materi: {{ $material->title }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-md p-8">
                <form method="POST" action="{{ route('teacher.myteaching.materials.update', [$myteaching, $material]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Judul Materi</label>
                        <input type="text" name="title" value="{{ old('title', $material->title) }}" class="w-full border rounded-lg px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Tipe Materi</label>
                        <select name="type" class="w-full border rounded-lg px-3 py-2" required onchange="toggleFields(this.value)">
                            <option value="text" {{ $material->type === 'text' ? 'selected' : '' }}>Text</option>
                            <option value="video" {{ $material->type === 'video' ? 'selected' : '' }}>Video</option>
                            <option value="file" {{ $material->type === 'file' ? 'selected' : '' }}>File</option>
                        </select>
                    </div>
                    <div class="mb-4" id="content-field" style="{{ $material->type === 'text' ? '' : 'display: none;' }}">
                        <label class="block text-gray-700 font-semibold mb-2">Konten Materi (Text)</label>
                        <textarea name="content" class="w-full border rounded-lg px-3 py-2" rows="5">{{ old('content', $material->content) }}</textarea>
                    </div>
                    <div class="mb-4" id="video-field" style="{{ $material->type === 'video' ? '' : 'display: none;' }}">
                        <label class="block text-gray-700 font-semibold mb-2">Video URL (YouTube, Vimeo, dll)</label>
                        <input type="text" name="video_url" value="{{ old('video_url', $material->video_url) }}" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div class="mb-4" id="file-field" style="{{ $material->type === 'file' ? '' : 'display: none;' }}">
                        <label class="block text-gray-700 font-semibold mb-2">File Materi (PDF, DOC, PPT, dll)</label>
                        @if($material->file_path)
                            <div class="mb-2">
                                <p class="text-sm text-gray-600">File saat ini: {{ $material->file_name }}</p>
                                <a href="{{ route('teacher.myteaching.materials.download', [$myteaching, $material]) }}" class="text-blue-600 hover:text-blue-800 text-sm">Download</a>
                            </div>
                        @endif
                        <input type="file" name="file" class="w-full border rounded-lg px-3 py-2" accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx">
                        <p class="text-sm text-gray-500 mt-1">Maksimal ukuran file: 10MB</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Urutan Materi</label>
                        <input type="number" name="order" value="{{ old('order', $material->order) }}" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Update</button>
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

            contentField.style.display = 'none';
            videoField.style.display = 'none';
            fileField.style.display = 'none';

            if (type === 'text') {
                contentField.style.display = 'block';
            } else if (type === 'video') {
                videoField.style.display = 'block';
            } else if (type === 'file') {
                fileField.style.display = 'block';
            }
        }
    </script>
</x-teacher-layout> 