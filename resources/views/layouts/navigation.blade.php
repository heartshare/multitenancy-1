
<div class="side-menu">
    <div class='side-menu-body'>
        <ul>
            <li class="side-menu-divider m-t-0"></li>
            <li class="open">
                <a href="{{ url('/dashboard') }}">
                    <i class="icon fa fa-globe"></i>
                    <span>Dashboard</span>
                </a>
            </li>


            <li>
                <a href="#">
                    <i class="icon fa fa-users"></i>
                    <span>Users</span>
                </a>
                <ul>
                    <li>
                        <a  href="{{ url('users') }}">Users</a>
                    </li>
                    @can('role-list')
                        <li>
                            <a  href="{{ url('roles') }}">Roles</a>
                        </li>
                    @endcan
                </ul>
            </li>
            <li>
                <a href="{{ url('/customer') }}">
                    <i class="icon fa fa-rocket"></i>
                    <span>Customer</span>
                </a>
            </li>
            <li class="side-menu-divider m-t-10">Vehicles</li>

        </ul>
        <div class="side-menu-status-bars">
            <h6 class="text-uppercase font-size-11 m-b-10">Users</h6>
        </div>
    </div>
</div>
