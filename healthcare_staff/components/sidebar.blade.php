<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="" style="color:#D8201C!important;">
                        Healthcare Centre 
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i style="color:#eb7974!important;" class="fa fa-fw fa-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu px-0    ">
                <li class="sidebar-item  ">
                    <a href="{{ route('healthcare_staff.healthcare_staff.show', auth()->guard('healthcare_staff')->user()->id) }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{ route('healthcare_staff.vaccine_batch.index') }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-calendar-week"></i>
                        <span>Vaccine Batch</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{ route('healthcare_staff.patient.index') }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-user-injured"></i>
                        <span>Patient</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item  ">
                    <a href="{{ route('healthcare_staff.healthcare_staff.profile', auth()->guard('admin')->user()->id) }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-id-card-alt"></i>
                        <span>Profile</span>
                    </a>
                </li> --}}
                <li class="sidebar-item  ">
                    <a href="{{ route('healthcare_staff.vaccine_patient.index') }}" class='sidebar-link'>
                        <i style="color:#eb7974!important;" class="fa fa-fw fa-notes-medical"></i>
                        <span>Vaccine Patient</span>
                    </a>
                </li>
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
