<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vehicles.create') }}">
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                        <a class="nav-link" href="./">
                            <span class="nav-link-title">
                                Create
                            </span>
                        </a>
                        <a class="nav-link" href="{{ route('vehicles.login') }}">
                            <span class="nav-link-title">
                                login
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <form action="./" method="get" autocomplete="off" novalidate>
                        <div class="input-icon">
                            <input type="text" value="" class="form-control" placeholder="Search…"
                                aria-label="Search in website">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
