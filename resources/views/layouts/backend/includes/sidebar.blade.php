<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="{{ url('/') }}" style="text-align: center">
            <span class="align-middle" s>Customer Management System</span>
        </a>

		<ul class="sidebar-nav">


                <li class="sidebar-item @if($activePage == 'dashboard') active @endif start-loading">
                    <a class="nav-link sidebar-link" href="{{url('/')}}">
                        <i class="bi bi-speedometer2"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>



                <li class="nav-item sidebar-item  @if($activePage == 'customers') active @endif start-loading">
                    <a class="nav-link sidebar-link" href="{{route('customers.index')}}">
                        <i class="bi bi-people"></i> <span class="align-middle">Customers</span>
                    </a>
                </li>



		</ul>

	</div>
</nav>


