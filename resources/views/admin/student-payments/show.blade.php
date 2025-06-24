<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pembayaran
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <a href="{{ route('admin.student-payments.index') }}" class="text-indigo-600 hover:text-indigo-900">
                            &larr; Kembali ke Daftar Pembayaran
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Informasi Siswa -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4">Informasi Siswa</h3>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Nama</label>
                                    <p class="mt-1 text-gray-900">{{ $purchase->student->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Email</label>
                                    <p class="mt-1 text-gray-900">{{ $purchase->student->email }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Tanggal Pembelian</label>
                                    <p class="mt-1 text-gray-900">{{ $purchase->created_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Kelas -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4">Informasi Kelas</h3>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Judul Kelas</label>
                                    <p class="mt-1 text-gray-900">{{ $purchase->teachingClass->title }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Harga</label>
                                    <p class="mt-1 text-gray-900">Rp {{ number_format($purchase->teachingClass->price, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-600">Pengajar</label>
                                    <p class="mt-1 text-gray-900">{{ $purchase->teachingClass->teacher->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bukti Pembayaran -->
                    <div class="mt-6 bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Bukti Pembayaran</h3>
                        @if($purchase->proof_image)
                            <div class="max-w-md">
                                <img src="{{ asset('storage/'.$purchase->proof_image) }}" alt="Bukti Pembayaran" class="rounded-lg shadow-md">
                            </div>
                        @else
                            <p class="text-gray-500">Tidak ada bukti pembayaran</p>
                        @endif
                    </div>

                    <!-- Status dan Aksi -->
                    <div class="mt-6 bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Status Pembayaran</h3>
                        <div class="flex items-center space-x-4">
                            @if($purchase->status == 'pending')
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                    Menunggu Verifikasi
                                </span>
                                <div class="flex space-x-2">
                                    <form action="{{ route('admin.student-payments.approve', $purchase) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                            Setujui Pembayaran
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.student-payments.reject', $purchase) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                            Tolak Pembayaran
                                        </button>
                                    </form>
                                </div>
                            @elseif($purchase->status == 'approved')
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                    Pembayaran Disetujui
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                    Pembayaran Ditolak
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout> 