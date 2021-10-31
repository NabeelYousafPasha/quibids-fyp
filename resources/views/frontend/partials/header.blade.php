<header class="section page-header">
    <!--RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-classic"
             data-layout="rd-navbar-fixed"
             data-sm-layout="rd-navbar-fixed"
             data-md-layout="rd-navbar-fixed"
             data-md-device-layout="rd-navbar-fixed"
             data-lg-layout="rd-navbar-static"
             data-lg-device-layout="rd-navbar-static"
             data-xl-layout="rd-navbar-static"
             data-xl-device-layout="rd-navbar-static"
             data-lg-stick-up-offset="46px"
             data-xl-stick-up-offset="46px"
             data-xxl-stick-up-offset="46px"
             data-lg-stick-up="true"
             data-xl-stick-up="true"
             data-xxl-stick-up="true"
        >
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer rd-navbar-collapse bg-gray-900">
                <div class="rd-navbar-aside">
                    <div class="rd-navbar-aside-left">
                        <ul class="list-inline list-inline-lg">
                            <li>
                                <div class="unit unit-spacing-sm align-items-center">
                                    <div class="unit-left"><span class="icon icon-md text-middle fa-phone text-primary"></span></div>
                                    <div class="unit-body header-phone-wrap">Phone:&nbsp;<a class="header-phone" href="tel:#">(+92) 321 5031089</a></div>
                                </div>
                            </li>
                            <li class="header-hours">Opening Hours: 8am-8pm PST M-Th; 6am-3pm PST Fri</li>
                        </ul>
                    </div>
                    <div class="rd-navbar-aside-right">
                        <div class="group-sm">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="button button-sm button-primary-2">Dashboard</a>
                                    <!-- Settings Dropdown -->
                                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                    <div>{{ Auth::user()->name }}</div>

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
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="button button-sm button-secondary"
                                    >
                                        Sign In
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="button button-sm button-primary-2"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <!--RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!--RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!--RD Navbar Brand-->
                        <div class="rd-navbar-brand">
                            <!--Brand--><a class="brand" href="index.html"><img src="images/logo-default-658x114.png" alt="" width="329" height="57"/></a>
                        </div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Home</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="about.html">About</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="sell.html">Sell</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="buy.html">Buy</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link">Pages</a>
                                    <ul class="rd-menu rd-navbar-dropdown">
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="404.html">404</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="typography.html">Typography</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="buttons.html">Buttons</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="forms.html">Forms</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tabs-and-accordions.html">Tabs and accordions</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="progress-bars.html">Progress bars</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tables.html">Tables</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="grid-system.html">Grid system</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="privacy-policy.html">Privacy policy</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="search-results.html">Search results</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.html">Contacts</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
