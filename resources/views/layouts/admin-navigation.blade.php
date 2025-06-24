<x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('admin.student-payments.index')" :active="request()->routeIs('admin.student-payments.*')">
    {{ __('Kelola Pembayaran') }}
</x-nav-link> 