<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">hungdz</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<!-- <div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class=""><a title="" href=""><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
        <li class="">
            <a class="dropdown-item" href=""
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="icon icon-share-alt"></i>
            </a>

            <form id="logout-form" action="" method="POST" style="display: none;">
                @csrf
            </form>

        </li>
    </ul>
</div> -->
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <div class="user-area dropdown float-right">
        @if(isset(Auth::user()->email))
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </i>Welcome {{ Auth::user()->email }}
                        </a>

                        <div class="user-menu dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(-89px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">


                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="{{ url('/logout') }}"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                        @else
                        <script>window.location = "/login";</script>
                        @endif
                    </div>
</div>

<!--close-top-serch-->