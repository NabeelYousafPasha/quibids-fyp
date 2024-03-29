<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('/') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ml-6 sm:flex">
                    <x-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(auth()->user()->can('view_package'))
                        <x-nav-link :href="route('dashboard.packages.index')" :active="request()->routeIs('dashboard.packages.index')">
                            {{ __('Packages') }}
                        </x-nav-link>
                    @endif

                    @if(auth()->user()->can('view_category'))
                        <x-nav-link :href="route('dashboard.categories.index')" :active="request()->routeIs('dashboard.categories.index')">
                            {{ __('Categories') }}
                        </x-nav-link>
                    @endif

                    @if(auth()->user()->can('view_user'))
                        <x-nav-link :href="route('dashboard.vendors')" :active="request()->routeIs('dashboard.vendors')">
                            {{ __('Vendors') }}
                            @if (($navbarStatistics['unapprovedVendorCount'] ?? 0) > 0)
                                <span class="unapproved-vendor-count inline-flex items-center justify-center px-2 py-1 m-1 text-xs font-bold leading-none text-red-100 bg-red-700 rounded">
                                    {{ $navbarStatistics['unapprovedVendorCount'] }}
                                </span>
                            @endif
                        </x-nav-link>
                    @endif

                    @if(auth()->user()->can('view_user'))
                        <x-nav-link :href="route('dashboard.users')" :active="request()->routeIs('dashboard.users')">
                            {{ __('Users') }}
                            @if (($navbarStatistics['unapprovedUserCount'] ?? 0) > 0)
                                <span class="unapproved-user-count inline-flex items-center justify-center px-2 py-1 m-1 text-xs font-bold leading-none text-red-100 bg-red-700 rounded">
                                    {{ $navbarStatistics['unapprovedUserCount'] }}
                                </span>
                            @endif
                        </x-nav-link>
                    @endif

                    @if(auth()->user()->can('view_auction'))
                        <x-nav-link :href="route('dashboard.auctions.index')" :active="request()->routeIs('dashboard.auctions.index')">
                            {{ __('Auctions') }}
                            @if (($navbarStatistics['draftAuctionCount'] ?? 0) > 0)
                                <span class="draft-auction-count inline-flex items-center justify-center px-2 py-1 m-1 text-xs font-bold leading-none text-red-100 bg-red-700 rounded">
                                    {{ $navbarStatistics['draftAuctionCount'] }}
                                </span>
                            @endif
                        </x-nav-link>
                    @endif

                    @if(auth()->user()->can('view_permission_role'))
                        <x-nav-link :href="route('dashboard.setup.permission_role.create')" :active="request()->routeIs('dashboard.setup.permission_role.create')">
                            {{ __('Settings') }}
                        </x-nav-link>
                    @endif

                    @if(auth()->user()->can('view_bidding'))
                        <x-nav-link :href="route('dashboard.bidding.index')" :active="request()->routeIs('dashboard.bidding.index')">
                            {{ __('Bidding') }}
                        </x-nav-link>
                    @endif

                    @if(auth()->user()->can('message'))
                        <x-nav-link :href="route('dashboard.messenger')" :active="request()->routeIs('dashboard.messenger')">
                            {{ __('Messenger') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>
                                {{ Auth::user()->name }}
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">
                                    {{ ucfirst(auth()->user()->roles->first()->name) }}
                                </span>
                            </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(auth()->user()->can('view_package'))
                <x-responsive-nav-link :href="route('dashboard.packages.index')" :active="request()->routeIs('dashboard.packages.index')">
                    {{ __('Packages') }}
                </x-responsive-nav-link>
            @endif

            @if(auth()->user()->can('view_category'))
                <x-responsive-nav-link :href="route('dashboard.categories.index')" :active="request()->routeIs('dashboard.categories.index')">
                    {{ __('Categories') }}
                </x-responsive-nav-link>
            @endif

            @if(auth()->user()->can('view_user'))
                <x-responsive-nav-link :href="route('dashboard.vendors')" :active="request()->routeIs('dashboard.vendors')">
                    {{ __('Vendors') }}
                    @if (($navbarStatistics['unapprovedVendorCount'] ?? 0) > 0)
                        <span class="unapproved-vendor-count inline-flex items-center justify-center px-2 py-1 m-1 text-xs font-bold leading-none text-red-100 bg-red-700 rounded">
                            {{ $navbarStatistics['unapprovedVendorCount'] }}
                        </span>
                    @endif
                </x-responsive-nav-link>
            @endif

            @if(auth()->user()->can('view_user'))
                <x-responsive-nav-link :href="route('dashboard.users')" :active="request()->routeIs('dashboard.users')">
                    {{ __('Users') }}
                    @if (($navbarStatistics['unapprovedUserCount'] ?? 0) > 0)
                        <span class="unapproved-user-count inline-flex items-center justify-center px-2 py-1 m-1 text-xs font-bold leading-none text-red-100 bg-red-700 rounded">
                            {{ $navbarStatistics['unapprovedUserCount'] }}
                        </span>
                    @endif
                </x-responsive-nav-link>
            @endif

            @if(auth()->user()->can('view_auction'))
                <x-responsive-nav-link :href="route('dashboard.auctions.index')" :active="request()->routeIs('dashboard.auctions.index')">
                    {{ __('Auctions') }}
                    @if (($navbarStatistics['draftAuctionCount'] ?? 0) > 0)
                        <span class="draft-auction-count inline-flex items-center justify-center px-2 py-1 m-1 text-xs font-bold leading-none text-red-100 bg-red-700 rounded">
                            {{ $navbarStatistics['draftAuctionCount'] }}
                        </span>
                    @endif
                </x-responsive-nav-link>
            @endif

            @if(auth()->user()->can('view_permission_role'))
                <x-responsive-nav-link :href="route('dashboard.setup.permission_role.create')" :active="request()->routeIs('dashboard.setup.permission_role.create')">
                    {{ __('Settings') }}
                </x-responsive-nav-link>
            @endif

            @if(auth()->user()->can('view_bidding'))
                <x-responsive-nav-link :href="route('dashboard.bidding.index')" :active="request()->routeIs('dashboard.bidding.index')">
                    {{ __('Bidding') }}
                </x-responsive-nav-link>
            @endif

            @if(auth()->user()->can('message'))
                <x-responsive-nav-link :href="route('dashboard.messenger')" :active="request()->routeIs('dashboard.messenger')">
                    {{ __('Messenger') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

@if ((config('constants.notification.realtime') ?? false) == true)
    <script type="text/javascript">
        let getNavbarStatistics = function (){
            $.ajax({
                type: "GET",
                url: "{{ route('dashboard.navbar-stats') }}",
                dataType: "json",
                success: function(res){
                    let response = res.data;
                    let stats = response.navbarStatistics;

                    let vendorSpan = $('.unapproved-vendor-count');
                    let userSpan = $('.unapproved-user-count');
                    let auctionSpan = $('.draft-auction-count');

                    vendorSpan.text(stats.unapprovedVendorCount);
                    (stats.unapprovedVendorCount <= 0) ? vendorSpan.addClass('hidden') : vendorSpan.removeClass('hidden');

                    userSpan.text(stats.unapprovedUserCount);
                    (stats.unapprovedUserCount <= 0) ? userSpan.addClass('hidden') : userSpan.removeClass('hidden');

                    auctionSpan.text(stats.draftAuctionCount);
                    (stats.draftAuctionCount <= 0) ? auctionSpan.addClass('hidden') : auctionSpan.removeClass('hidden');
                }
            })
        }

        setInterval(getNavbarStatistics, 5000);
    </script>
@endif
