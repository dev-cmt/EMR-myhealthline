<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('/')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('public/backend')}}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('public/backend')}}/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('/')}}" class="logo logo-light">
            <span class="logo-sm">
                <h4 class="text-black py-4">my<span class="text-success">HEALTH</span>Line</h4>
                {{-- <img src="{{asset('public/backend')}}/images/logo-sm.png" alt="" height="22"> --}}
            </span>
            <span class="logo-lg">
                <h4 class="text-white py-4">my<span class="text-success">HEALTH</span>Line</h4>
                {{-- <img src="{{asset('public/backend')}}/images/logo-light.png" alt="" height="17"> --}}
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}">
                        <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="bx bx-layer"></i> <span data-key="t-apps">Patients</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('info-general')}}" class="nav-link {{ Request::routeIs('info-general') ? 'active' : '' }}" data-key="t-calendar"> General Profile </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('info-cases')}}" class="nav-link {{ Request::routeIs('info-cases') ? 'active' : '' }}" data-key="t-chat">Case(s)</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('info-profiling-tool')}}" class="nav-link {{ Request::routeIs('info-profiling-tool') ? 'active' : '' }}" data-key="t-chat">Profiling Tool</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('info-vaccination-record')}}" class="nav-link {{ Request::routeIs('info-vaccination-record') ? 'active' : '' }}" data-key="t-chat">Vaccination Record</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('info-random-uploader')}}" class="nav-link {{ Request::routeIs('info-random-uploader') ? 'active' : '' }}" data-key="t-chat">Random Uploader Tool</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="bx bx-layout"></i> <span data-key="t-layouts">Layouts</span> <span class="badge badge-pill bg-danger" data-key="t-hot">Hot</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a href="layouts-vertical.html" target="_blank" class="nav-link" data-key="t-vertical">Vertical</a></li>
                            <li class="nav-item"><a href="layouts-detached.html" target="_blank" class="nav-link" data-key="t-detached">Detached</a></li>
                            <li class="nav-item"><a href="layouts-two-column.html" target="_blank" class="nav-link" data-key="t-two-column">Two Column</a></li>
                            <li class="nav-item"><a href="layouts-vertical-hovered.html" target="_blank" class="nav-link" data-key="t-hovered">Hovered</a></li>
                        </ul>
                    </div>
                </li> 
                <!-- end Dashboard Menu -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Web Portal</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="bx bx-user-circle"></i> <span data-key="t-authentication">Authentication</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Sign In
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a href="auth-signin-basic.html" class="nav-link" data-key="t-basic"> Basic </a></li>
                                        <li class="nav-item"><a href="auth-signin-cover.html" class="nav-link" data-key="t-cover"> Cover </a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarErrors" data-key="t-errors"> Errors
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarErrors">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-404-basic.html" class="nav-link" data-key="t-404-basic"> 404 Basic </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-cover.html" class="nav-link" data-key="t-404-cover"> 404 Cover </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-alt.html" class="nav-link" data-key="t-404-alt"> 404 Alt </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-500.html" class="nav-link" data-key="t-500"> 500 </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-offline.html" class="nav-link" data-key="t-offline-page"> Offline Page </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="landing.html" class="nav-link" data-key="t-one-page"> One Page </a>
                            </li>
                            <li class="nav-item">
                                <a href="nft-landing.html" class="nav-link" data-key="t-nft-landing"> NFT Landing </a>
                            </li>
                            <li class="nav-item">
                                <a href="job-landing.html" class="nav-link" data-key="t-job">Job</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- end Web Portal Menu -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->