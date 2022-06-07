<!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="">Application</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">Dashboard</a>
    </div>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <form action="{{ route('dashboard.search') }}" method="GET">
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="submit" hidden />
            <input type="text" class="search__input form-control border-transparent placeholder-theme-13" placeholder="Search..." name="search">
            <i data-feather="search" class="search__icon dark:text-gray-300"></i>
        </div>
    </div>
    </form>

    <!-- BEGIN: Account Menu -->
    @php
        $user = Auth::user();
    @endphp
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false">
            <img alt="Rubick Tailwind HTML Admin Template" src="{{ asset($user->photo) }}">
        </div>
        <div class="dropdown-menu w-56">
            <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                    <div class="font-medium">{{ $user->name }}</div>
                </div>
                <div class="p-2">
                    <a href="{{ route('user.show',$user->id) }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile
                    </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i> Edit
                    </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help
                    </a>
                </div>
                <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                    <a href="{{ route('logout') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
