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
            <a class="navbar-brand" href="index.html">
                {{ __("ADMIN") }}
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
                    <span class="profile-address">demo@gmail.com</span>
                    <img src="{{ asset('images/profile.jpg') }}" class="img-circle" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
