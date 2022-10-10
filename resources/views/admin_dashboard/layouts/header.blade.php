<!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item dropdown dropdown-large">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">

                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                    </div>
                                    <a href="javascript:;">

                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">

                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">

                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image->path) : asset('storage/placeholders/user_placeholder.webp') }}" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">{{auth()->user()->name}}</p>
                                <p class="designattion mb-0">{{auth()->user()->email}}</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('nav-logout-form').submit()"
                                   href="">Logout</a>
                                <form id="nav-logout-form" action="{{route('logout')}}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
