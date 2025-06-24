<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Kelas: {{ $class->title }}</h2>
    </x-slot>
    <div class="py-8 max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold mb-2">Info Kelas</h3>
            <p><b>Deskripsi:</b> {{ $class->description }}</p>
            <p><b>Benefit:</b> {{ $class->benefit }}</p>
            <p><b>Harga:</b> Rp {{ number_format($class->price,0,',','.') }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h3 class="text-lg font-bold mb-2">Teacher</h3>
            <p><b>Nama:</b> {{ $class->teacher->full_name ?? $class->teacher->name }}</p>
            <p><b>Email:</b> {{ $class->teacher->email }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-bold mb-2">Student</h3>
            <ul>
                @forelse($class->purchases as $purchase)
                    <li>{{ $purchase->student->full_name ?? $purchase->student->name }} ({{ $purchase->student->email }})</li>
                @empty
                    <li><i>Belum ada student</i></li>
                @endforelse
            </ul>
        </div>
    </div>
</x-admin-layout> 