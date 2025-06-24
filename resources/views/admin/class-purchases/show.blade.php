<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pembelian Kelas') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            <div class="bg-white shadow rounded-lg p-8">
                <div class="mb-4">
                    <span class="block text-gray-700 font-semibold">Student:</span>
                    <span class="block text-lg text-gray-900">{{ $class_purchase->student->name }} ({{ $class_purchase->student->email }})</span>
                </div>
                <div class="mb-4">
                    <span class="block text-gray-700 font-semibold">Kelas:</span>
                    <span class="block text-lg text-gray-900">{{ $class_purchase->teachingClass->title }}</span>
                </div>
                <div class="mb-4">
                    <span class="block text-gray-700 font-semibold">Status:</span>
                    <span class="px-2 py-1 rounded-full text-xs font-semibold
                        @if($class_purchase->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($class_purchase->status == 'approved') bg-green-100 text-green-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($class_purchase->status) }}
                    </span>
                </div>
                <div class="mb-4">
                    <span class="block text-gray-700 font-semibold">Bukti Pembayaran:</span>
                    @if($class_purchase->proof_image)
                        <img src="{{ asset('storage/'.$class_purchase->proof_image) }}" alt="Bukti Bayar" class="h-48 rounded-lg mt-2">
                    @else
                        <span class="text-gray-500">Belum ada bukti bayar.</span>
                    @endif
                </div>
                @if($class_purchase->status == 'pending')
                <form method="POST" action="{{ route('admin.class-purchases.update', $class_purchase) }}" class="flex space-x-3">
                    @csrf
                    @method('PUT')
                    <button name="status" value="approved" type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Approve</button>
                    <button name="status" value="rejected" type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Reject</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout> 