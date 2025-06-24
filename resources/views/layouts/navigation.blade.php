<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    @if(auth()->user()->role_id == 1)
        <x-nav-link :href="route('student.homepage')" :active="request()->routeIs('student.homepage')">
            {{ __('Homepage') }}
        </x-nav-link>
        <x-nav-link :href="route('student.findclass')" :active="request()->routeIs('student.findclass')">
            {{ __('Find Class') }}
        </x-nav-link>
        <x-nav-link :href="route('student.planning')" :active="request()->routeIs('student.planning')">
            {{ __('Planning') }}
        </x-nav-link>
    @elseif(auth()->user()->role_id == 2)
        <x-nav-link :href="route('teacher.homepage')" :active="request()->routeIs('teacher.homepage')">
            {{ __('Homepage') }}
        </x-nav-link>
        <x-nav-link :href="route('teacher.myteaching.index')" :active="request()->routeIs('teacher.myteaching.*')">
            {{ __('My Teaching') }}
        </x-nav-link>
    @elseif(auth()->user()->role_id == 3)
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('admin.teachers.index')" :active="request()->routeIs('admin.teachers.*')">
            {{ __('Kelola Guru') }}
        </x-nav-link>
        <x-nav-link :href="route('admin.teaching-classes.index')" :active="request()->routeIs('admin.teaching-classes.*')">
            {{ __('Kelola Kelas') }}
        </x-nav-link>
        <x-nav-link :href="route('admin.student-payments.index')" :active="request()->routeIs('admin.student-payments.*')">
            {{ __('Kelola Pembayaran') }}
        </x-nav-link>
    @endif
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    @if(auth()->user()->role_id == 1)
        <x-responsive-nav-link :href="route('student.homepage')" :active="request()->routeIs('student.homepage')">
            {{ __('Homepage') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('student.findclass')" :active="request()->routeIs('student.findclass')">
            {{ __('Find Class') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('student.planning')" :active="request()->routeIs('student.planning')">
            {{ __('Planning') }}
        </x-responsive-nav-link>
    @elseif(auth()->user()->role_id == 2)
        <x-responsive-nav-link :href="route('teacher.homepage')" :active="request()->routeIs('teacher.homepage')">
            {{ __('Homepage') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('teacher.myteaching.index')" :active="request()->routeIs('teacher.myteaching.*')">
            {{ __('My Teaching') }}
        </x-responsive-nav-link>
    @elseif(auth()->user()->role_id == 3)
        <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('admin.teachers.index')" :active="request()->routeIs('admin.teachers.*')">
            {{ __('Kelola Guru') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('admin.teaching-classes.index')" :active="request()->routeIs('admin.teaching-classes.*')">
            {{ __('Kelola Kelas') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('admin.student-payments.index')" :active="request()->routeIs('admin.student-payments.*')">
            {{ __('Kelola Pembayaran') }}
        </x-responsive-nav-link>
    @endif
</div> 