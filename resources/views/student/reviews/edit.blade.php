<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Ulasan & Rating
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-md p-8">
                <form method="POST" action="{{ route('student.reviews.update', $review) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Rating</label>
                        <div class="flex items-center space-x-2" id="star-rating">
                            @for($i=1; $i<=5; $i++)
                                <svg data-value="{{ $i }}" class="w-8 h-8 cursor-pointer star {{ old('rating', $review->rating) >= $i ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.386-2.46a1 1 0 00-1.175 0l-3.386 2.46c-.784.57-1.838-.196-1.539-1.118l1.287-3.966a1 1 0 00-.364-1.118l-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/>
                                </svg>
                            @endfor
                            <input type="hidden" name="rating" id="rating-input" value="{{ old('rating', $review->rating) }}">
                        </div>
                        @error('rating')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Ulasan</label>
                        <textarea name="review" class="w-full border rounded-lg px-3 py-2" rows="4" required>{{ old('review', $review->review) }}</textarea>
                        @error('review')<div class="text-red-500 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
                        <a href="{{ route('student.reviews.index') }}" class="ml-3 px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('#star-rating .star');
            const ratingInput = document.getElementById('rating-input');
            stars.forEach(star => {
                star.addEventListener('click', function () {
                    const rating = this.getAttribute('data-value');
                    ratingInput.value = rating;
                    stars.forEach(s => s.classList.remove('text-yellow-400'));
                    for (let i = 0; i < rating; i++) {
                        stars[i].classList.add('text-yellow-400');
                    }
                });
            });
        });
    </script>
</x-student-layout> 