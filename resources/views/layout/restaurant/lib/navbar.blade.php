<section class="res-admin">
    <nav class="navbar navbar-expand navbar-fixed-top navTop">
        <a class="navbar-brand" href="{{ url('restaurant/dashboard') }}">
            Treat Lover
        </a>
        <button class="navbar-toggler" onclick="toggleHide()">
            <i class="fas fa-bars"></i>
        </button>
        <a class="brndHide" href="{{ url('restaurant/dashboard') }}">
            Treat Lover
        </a>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item navIcon dropdown">


                <a href="{{ url('/restaurant/logout') }}" class="nav-link" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/restaurant/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

                <div class="dropdown-menu profileDrop" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</section>
