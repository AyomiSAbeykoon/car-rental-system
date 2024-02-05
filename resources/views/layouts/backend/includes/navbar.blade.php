<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">

		    @auth
                <li class="nav-item">
                    <a class="nav-icon  pe-0" href="{{ route('logout') }}" id="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="position-relative">
                            <i class="bi bi-box-arrow-in-right"></i>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            @endauth

		</ul>
	</div>
</nav>
