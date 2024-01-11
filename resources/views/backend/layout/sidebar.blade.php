<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            @if (request()->user()->role == 1)
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Admin</li>
                    <li>
                        <a href="dashboard" class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="badge rounded-pill bg-primary float-end">2</span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-buffer"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="admin">Admin</a></li>
                            {{-- <li><a href="users">Pengguna</a></li> --}}
                            <li><a href="kriteria">Kriteria</a></li>
                            <li><a href="students">Students</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="/laporan" class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="badge rounded-pill bg-primary float-end"></span>
                            <span>Laporan</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ion ion-md-settings"></i>
                            <span>Setting</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="aplikasi">Aplikasi</a></li>

                        </ul>
                    </li>
                </ul>
            @elseif (request()->user()->role == 2)
            <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Users</li>

                    {{-- <li>
                        <a href="dashboard" class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="badge rounded-pill bg-primary float-end">2</span>
                            <span>Dashboard</span>
                        </a>
                    </li>



                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-buffer"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="admin">Admin</a></li>
                            <li><a href="users">Pengguna</a></li>


                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ion ion-md-settings"></i>
                            <span>Setting</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="aplikasi">Aplikasi</a></li>

                        </ul>
                    </li> --}}
                </ul>
                @else
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Super Admin</li>

                    <li>
                        <a href="dashboard" class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="badge rounded-pill bg-primary float-end">2</span>
                            <span>Dashboard</span>
                        </a>
                    </li>



                    {{-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-buffer"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="admin">Admin</a></li>
                            <li><a href="users">Pengguna</a></li>


                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ion ion-md-settings"></i>
                            <span>Setting</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="aplikasi">Aplikasi</a></li>

                        </ul>
                    </li> --}}
                </ul>
            @endif
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
