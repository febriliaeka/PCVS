<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="" style="color:#D8201C!important;">
                        Healthcare Centre 
                        {{-- <img src="assets/images/logo/logo.png" alt="Logo" srcset=""> --}}
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i style="color:#eb7974!important;" class="fa fa-fw fa-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu px-0    ">
                <li class="sidebar-title">Master Data</li>
                <li class="sidebar-item  ">
                    <a href="{{ route('admin.admin.index') }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-user-cog"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{ route('admin.vaccine.index') }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-prescription-bottle-alt"></i>
                        <span>Vaccine</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{ route('admin.healthcare_centre.index') }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-clinic-medical"></i>
                        <span>Healthcare Centre</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item  ">
                    <a href="{{ route('admin.admin.profile', auth()->guard('admin')->user()->id) }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-id-card-alt"></i>
                        <span>Profile</span>
                    </a>
                </li> --}}
                <li class="sidebar-item  ">
                    <a href="{{ route('auth.logout') }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-sign-out-alt  "></i>
                        <span>Log Out</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-stack"></i>
                        <span>Components</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="component-alert.html">Alert</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-badge.html">Badge</a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
