<header class="main-header">
	<!--==========================
	=            logo            =
	===========================-->
	<a href="/" class="logo">
		
		<!-- mini logo -->

		<span class="logo-mini">

			<img class="img-responsive" src="/img/template/icono-blanco.png" style="padding: 10px" >

		</span>

		<!-- logo -->

		<span class="logo-lg">

			<img class="img-responsive" src="/img/template/logo-blanco-lineal.png" style="padding: 10px 0" >

		</span>

	</a>
	
	<!--=====================================
	=            navigation         =
	======================================-->
	
	<nav class="navbar-static-top" style="height:50px;background-color:#3c8dbc" role="navigation">
		
		<!-- Navigation button -->

		<a class="sidebar-toggle" style="color:#fff" data-toggle="push-menu" role="button" href="#">

			<span class="sr-only">Toggle Navigation</span>

		</a>

		

		<div class="navbar-custom-menu">
			

			<ul class="nav navbar-nav">

				<li class="dropdown user user-menu">

					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<img class="user-image" src="{{asset('img/users/default/anonymous.png')}}">
						<span class="hidden-xs"></span>

					</a>

					<!-- dropdown toggle -->

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>

				</li>

			</ul>
			
		</div>
		
	</nav>
	
</header>
