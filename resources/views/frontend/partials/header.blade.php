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
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="button button-sm button-primary-2"
                                    >
                                        Dashboard
                                    </a>

                                    <a
                                        id="navbarDropdown"
                                        class="dropdown-toggle count-info"
                                        data-toggle="dropdown"
                                        href="#"
                                        role="button"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        <u>
                                            {{ auth()->user()->name }}
                                            <span class="caret"></span>
                                        </u>
                                    </a>
                                    <ul class="dropdown-menu dropdown-messages" aria-labelledby="navbarDropdown">
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-key fa-fw"></i> Change Password
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a
                                                    class="dropdown-item"
                                                    href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                >
                                                    <i class="fa fa-sign-out"></i> Logout
                                                </a>
                                                <form
                                                    id="logout-form"
                                                    action="{{ route('logout') }}"
                                                    method="POST"
                                                    style="display: none;"
                                                >
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
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
                            <!--Brand-->
                            <a class="brand" href="{{ route('/') }}">
                                <img
                                    src="{{ asset("frontend-assets/images/logo-default-658x114.png") }}"
                                    alt=""
                                    width="329"
                                    height="57"
                                />
                            </a>
                        </div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="{{ route('/') }}">Home</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="about.html">About</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="sell.html">Sell</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="buy.html">Buy</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link">Pages</a>
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
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="contacts.html">Contacts</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
