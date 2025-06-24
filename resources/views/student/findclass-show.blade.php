<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $class->title }}
        </h2>
    </x-slot>
    @php
        $purchase = Auth::check() ? \App\Models\ClassPurchase::where('user_id', Auth::id())->where('teaching_class_id', $class->id)->first() : null;
    @endphp
    <div class="py-12 bg-gradient-to-b from-blue-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">
            <!-- Main Content -->
            <div class="flex-1">
                <div class="mb-6">
                    <nav class="flex space-x-4 border-b">
                        <button class="tab-btn px-4 py-2 text-blue-700 border-b-2 border-blue-600 font-semibold focus:outline-none" onclick="showTab('info')">Informasi</button>
                        <button class="tab-btn px-4 py-2 text-gray-600 hover:text-blue-700 focus:outline-none" onclick="showTab('silabus')">Silabus</button>
                        <button class="tab-btn px-4 py-2 text-gray-600 hover:text-blue-700 focus:outline-none" onclick="showTab('review')">Review</button>
                    </nav>
                </div>
                <div id="tab-info" class="tab-content">
                    <h3 class="text-xl font-bold mb-2">Tentang Kelas Bootcamp</h3>
                    <p class="mb-4"><span class="bg-yellow-200 px-2 py-1 rounded font-semibold">Mulai Perjalanan Codingmu dengan Kelas {{ $class->title }}!</span></p>
                    <p class="mb-4 text-gray-800">{{ $class->description }}</p>
                    @if($class->benefit)
                        <div class="mb-4">
                            <span class="font-semibold text-gray-700">Benefit:</span>
                            <p class="text-gray-800">{{ $class->benefit }}</p>
                        </div>
                    @endif
                </div>
                <div id="tab-silabus" class="tab-content hidden">
                    <h3 class="text-xl font-bold mb-2">Silabus</h3>
                    <p class="text-gray-600">Silabus kelas akan tampil di sini. (Bisa diisi oleh teacher nanti)</p>
                </div>
                <div id="tab-review" class="tab-content hidden">
                    <h3 class="text-xl font-bold mb-2">Review Alumni Kelas {{ $class->title }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-blue-50 rounded-xl p-4">
                            <div class="font-bold text-blue-700 mb-1">Recommended Untuk Pemula</div>
                            <div class="text-gray-700 text-sm">Sangat bermanfaat, dan recommended untuk diikuti bagi yang sama sekali belum memahami materi ini.</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4">
                            <div class="font-bold text-blue-700 mb-1">Ikutan Kelas Bantu Dapat Job</div>
                            <div class="text-gray-700 text-sm">Saya ikut course laravel dasar, dan alhamdulillah dapat job sebagai fullstack junior.</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4">
                            <div class="font-bold text-blue-700 mb-1">Materi Komprehensif</div>
                            <div class="text-gray-700 text-sm">Materi yang disampaikan komprehensif dan efektif.</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="w-full md:w-96">
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                    @if($class->thumbnail)
                        <img src="{{ asset('storage/'.$class->thumbnail) }}" alt="Thumbnail" class="rounded-xl mb-4 h-40 w-full object-cover">
                    @else
                        <div class="rounded-xl mb-4 h-40 w-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                    <div class="mb-2 text-gray-700 font-semibold">Bersama <span class="text-blue-700">{{ $class->teacher->name }}</span></div>
                    <div class="mb-2 text-gray-700"><span class="line-through">Rp {{ number_format($class->price*1.1,0,',','.') }}</span> <span class="text-blue-700 font-bold text-lg">Rp {{ number_format($class->price,0,',','.') }}</span></div>
                    <ul class="mb-4 text-gray-600 text-sm space-y-1">
                        <li><span class="font-bold">4.20</span> / 5.0 rating</li>
                        <li>4156 peserta telah mengikuti</li>
                        <li>4 Pekan</li>
                        <li>Web Dev</li>
                        <li>Basic</li>
                        <li>Akses Materi Unlimited</li>
                    </ul>
                    @if(Auth::check() && Auth::user()->role_id == 1)
                        @if(!$purchase)
                            <form method="POST" action="{{ route('student.findclass.purchase', $class) }}" enctype="multipart/form-data" class="space-y-3">
                                @csrf
                                <label class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran</label>
                                <input type="file" name="proof_image" accept="image/*" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                @error('proof_image')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <button type="submit" class="w-full px-6 py-3 bg-blue-700 text-white rounded-xl font-semibold text-lg hover:bg-blue-800 transition">Beli Sekarang</button>
                            </form>
                        @else
                            <div class="p-4 rounded-xl bg-blue-50 border border-blue-200 mb-2">
                                <div class="font-semibold text-blue-700 mb-1">Status Pembelian: {{ ucfirst($purchase->status) }}</div>
                                @if($purchase->proof_image)
                                    <div class="mb-2">
                                        <span class="text-gray-700">Bukti Bayar:</span><br>
                                        <img src="{{ asset('storage/'.$purchase->proof_image) }}" alt="Bukti Bayar" class="h-32 rounded-lg mt-2">
                                    </div>
                                @endif
                                @if($purchase->status == 'pending')
                                    <span class="text-sm text-gray-500">Menunggu verifikasi admin...</span>
                                @elseif($purchase->status == 'approved')
                                    <a href="#" class="block mt-2 px-6 py-3 bg-green-600 text-white rounded-xl font-semibold text-lg text-center hover:bg-green-700 transition">Akses Materi</a>
                                @else
                                    <span class="text-sm text-red-600 font-semibold">Pembelian ditolak. Silakan hubungi admin.</span>
                                @endif
                            </div>
                        @endif
                    @elseif(Auth::check() && Auth::user()->role_id == 2 && Auth::id() == $class->teacher_id)
                        <a href="#" class="block w-full px-6 py-3 bg-indigo-600 text-white rounded-xl font-semibold text-lg text-center hover:bg-indigo-700 transition">Input/Edit Materi</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function showTab(tab) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.getElementById('tab-' + tab).classList.remove('hidden');
            document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('text-blue-700', 'border-b-2', 'border-blue-600', 'font-semibold'));
            event.target.classList.add('text-blue-700', 'border-b-2', 'border-blue-600', 'font-semibold');
        }
        // Default tab
        document.addEventListener('DOMContentLoaded', function() {
            showTab('info');
        });
    </script>
</x-student-layout> 