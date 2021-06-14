<div id="layoutSidenav">

            <div id="layoutSidenav_nav">

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                    <div class="sb-sidenav-menu">

                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Core</div>

                            <a class="nav-link" href="{{url('/admin')}}">

                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Interface</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>

                                Company

                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">

                                <nav class="sb-sidenav-menu-nested nav">

                                    @if(isset(Auth()->user()->role->permission['name']['department']['can-add']))

                                    <a class="nav-link" href="{{route('department.create')}}">Create Company</a>

                                    @endif

                                    @if(isset(Auth()->user()->role->permission['name']['department']['can-list']))

                                    <a class="nav-link" href="{{route('department.index')}}">View Company</a>

                                    @endif

                                </nav>

                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>

                                Leave

                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                            </a>

                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">

                                <nav class="sb-sidenav-menu-nested nav">

                                    @if(isset(Auth()->user()->role->permission['name']['leave']['can-add']))
                                    <a class="nav-link" href="{{route('leave.create')}}">Create Leave</a>
                                    @endif
                                    @if(isset(Auth()->user()->role->permission['name']['leave']['can-view']))
                                    <a class="nav-link" href="{{route('leave.index')}}">View Leave</a>
                                    @endif
                                    @if(isset(Auth()->user()->role->permission['name']['leave']['can-list']))
                                    <a class="nav-link" href="{{route('userleavelist.list')}}">User Leave List</a>
                                    @endif

                                </nav>

                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">

                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>

                                Users

                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                            </a>

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">

                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">

                                        User Role

                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                                    </a>

                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">

                                        <nav class="sb-sidenav-menu-nested nav">

                                            @if(isset(Auth()->user()->role->permission['name']['role']['can-add']))

                                            <a class="nav-link" href="{{route('role.create')}}">Create Role</a>

                                            @endif

                                            @if(isset(Auth()->user()->role->permission['name']['role']['can-list']))

                                            <a class="nav-link" href="{{route('role.index')}}">View Role</a>

                                            @endif

                                        </nav>

                                    </div>

                                    

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError1" aria-expanded="false" aria-controls="pagesCollapseError">

                                        User

                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                                    </a>

                                    <div class="collapse" id="pagesCollapseError1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">

                                        <nav class="sb-sidenav-menu-nested nav">

                                            @if(isset(Auth()->user()->role->permission['name']['user']['can-add']))

                                            <a class="nav-link" href="{{route('user.create')}}">Create User</a>

                                            @endif

                                            @if(isset(Auth()->user()->role->permission['name']['user']['can-list']))

                                            <a class="nav-link" href="{{route('user.index')}}">View User</a>

                                            @endif

                                        </nav>

                                    </div>

                                </nav>

                            </div>

                            @if(Auth::user()->role_id==6)
                                   
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>Permission
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                            </a>

                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">

                                <nav class="sb-sidenav-menu-nested nav">

                                    @if(isset(Auth()->user()->role->permission['name']['permission']['can-add']))

                                    <a class="nav-link" href="{{route('permission.create')}}">Create Permission</a>

                                    @endif

                                    @if(isset(Auth()->user()->role->permission['name']['permission']['can-list']))

                                    <a class="nav-link" href="{{route('permission.index')}}">View Permission</a>

                                    @endif

                                </nav>

                            </div>
                             @endif

                            <div class="sb-sidenav-menu-heading">Addons</div>

                            <a class="nav-link" href="charts.html">

                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>

                                Charts

                            </a>

                            <a class="nav-link" href="tables.html">

                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>

                                Tables

                            </a>

                        </div>

                    </div>

                    <div class="sb-sidenav-footer">

                        <img src="images/logo.png" width="70%" class="image">

                    </div>

                </nav>

            </div>