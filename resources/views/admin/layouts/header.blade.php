<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <div id="mobile-menu">
                <div class="left-nav-toggle">
                    <a href="#">
                    <i class="stroke-hamburgermenu"></i>
                    </a>
                </div>
            </div>
            <a class="navbar-brand" href="/">
                {{ __("HOME") }}
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="left-nav-toggle">
                <a href="">
                <i class="stroke-hamburgermenu"></i>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class=" profil-link">
                    <a href="login.html">
                    <span class="profile-address">{{ Auth::user()->name }}</span>
                    <img src="{{ asset('images/profile.jpg') }}" class="img-circle" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
