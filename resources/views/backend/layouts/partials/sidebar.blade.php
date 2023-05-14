 <!-- sidebar menu area start -->
 @php
     $usr = Auth::user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h3 class="text-white">لوحة الادمن</h3>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                        </ul>
                    </li>



                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            الجوازات
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.pass.create') || Route::is('admin.pass') || Route::is('admin.pass.edit') || Route::is('admin.pass.show') ? 'in' : '' }}">

                                <li class="{{ Route::is('admin.pass')  || Route::is('admin.pass.edit') ? 'active' : '' }}"><a href="{{ route('admin.pass') }}">جميع الجوازات</a></li>

                                <li class="{{ Route::is('admin.pass.create')  ? 'active' : '' }}"><a href="{{ route('admin.pass.create') }}">اضافة جواز جديد</a></li>
                        </ul>
                    </li>
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">

                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
