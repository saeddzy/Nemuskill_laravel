<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Review Aplikasi</h2>
    </x-slot>
    <div class="py-8 max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">User</th>
                        <th class="px-4 py-2 text-left">Rating</th>
                        <th class="px-4 py-2 text-left">Review</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $review)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $review->user->name ?? '-' }}</td>
                            <td class="px-4 py-2">
                                @for($i=1; $i<=5; $i++)
                                    @if($i <= $review->rating)
                                        <span class="text-yellow-400">&#9733;</span>
                                    @else
                                        <span class="text-gray-300">&#9733;</span>
                                    @endif
                                @endfor
                                <span class="ml-1 text-sm text-gray-500">({{ $review->rating }})</span>
                            </td>
                            <td class="px-4 py-2">{{ $review->review }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500">{{ $review->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center py-4 text-gray-500">Belum ada review.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $reviews->links() }}</div>
        </div>
    </div>
</x-admin-layout> 