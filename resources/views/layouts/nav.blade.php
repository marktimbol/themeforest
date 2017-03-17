<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/items">Items</a></li>
                <li><a href="/cart">Cart</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<?php /*
<nav class="nav has-shadow">
	<div class="container">
		<div class="nav-left">
			<a class="nav-item" href="/">
				<img src="http://bulma.io/images/bulma-logo.png" alt="{{ config('app.name', 'Laravel') }}" title="{{ config('app.name', 'Laravel') }}" />
			</a>
			<a class="nav-item is-active">Home</a>
			<a class="nav-item">Cart</a>
		</div>
		<span class="nav-toggle">
			<span></span>
			<span></span>
			<span></span>
		</span>
		<div class="nav-right nav-menu">
			<a class="nav-item" href="/cart">Cart</a>
			@if (Auth::guest())
				<a href="{{ route('login') }}" class="nav-item">Login</a>
				<a href="{{ route('register') }}" class="nav-item">Register</a>
			@else
				<a class="nav-item">Profile</a>
				<a class="nav-item">Log out</a>
			@endif
		</div>
	</div>
</nav>
*/ ?>