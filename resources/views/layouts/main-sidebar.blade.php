<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span
                                        class="right-nav-text">{{ trans('main_trans.dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components</li>
                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                        class="right-nav-text">{{ trans('main_trans.users') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            @can('user-list')
                                <li>
                                    <a href="{{ url('/'. ($page = 'users')) }}">{{ trans('main_trans.users_list') }} </a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li>
                                    <a href="{{ url('/'. ($page = 'roles')) }}">{{ trans('main_trans.users_roles') }}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#tickets-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                        class="right-nav-text">{{ trans('main_trans.tickets') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="tickets-menu" class="collapse" data-parent="#sidebarnav">
                            @can('user-list')
                                <li>
                                    <a href="{{ url('/'. ($page = 'tickets')) }}">{{ trans('main_trans.tickets_list') }} </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                    <!-- menu item todo-->

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
