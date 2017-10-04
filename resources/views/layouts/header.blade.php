<header id="header">
    <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
        <div class="container">
            <div class="logo-wrapper">
                <div class="logo">
                    <a href="index-2.html"><img src="images/logo-white.png" alt="Logo" /></a>
                </div>
            </div>

            <div id="navbar" class="navbar-nav-wrapper">
                <ul class="nav navbar-nav" id="responsive-menu">
                    <li>
                        <a href="#">{{ __('Nav.Home') }}</a>
                    </li>

                    <li>
                        <a href="#">{{ __('Nav.Product') }}</a>
                        <ul>
                            <li>
                                <a href="#">{{ __('Nav.Fishes') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.NewArrival') }}</a></li>
                                    <li><a href="#">{{ __('Nav.TrendingItems') }}</a></li>
                                    <li><a href="#">{{ __('Nav.AllItems') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.FishsFood') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.NewArrival') }}</a></li>
                                    <li><a href="#">{{ __('Nav.TrendingItems') }}</a></li>
                                    <li><a href="#">{{ __('Nav.AllItems') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.FishTanks') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.NewArrival') }}</a></li>
                                    <li><a href="#">{{ __('Nav.TrendingItems') }}</a></li>
                                    <li><a href="#">{{ __('Nav.AllItems') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.SandGravel') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.NewArrival') }}</a></li>
                                    <li><a href="#">{{ __('Nav.TrendingItems') }}</a></li>
                                    <li><a href="#">{{ __('Nav.AllItems') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.3DLanscape') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.NewArrival') }}</a></li>
                                    <li><a href="#">{{ __('Nav.TrendingItems') }}</a></li>
                                    <li><a href="#">{{ __('Nav.AllItems') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.Plants') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.NewArrival') }}</a></li>
                                    <li><a href="#">{{ __('Nav.TrendingItems') }}</a></li>
                                    <li><a href="#">{{ __('Nav.AllItems') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.Filters') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.NewArrival') }}</a></li>
                                    <li><a href="#">{{ __('Nav.TrendingItems') }}</a></li>
                                    <li><a href="#">{{ __('Nav.AllItems') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.AquariumLight') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.NewArrival') }}</a></li>
                                    <li><a href="#">{{ __('Nav.TrendingItems') }}</a></li>
                                    <li><a href="#">{{ __('Nav.AllItems') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">{{ __('Nav.Blueprints') }}</a>
                        <ul>
                            <li>
                                <a href="#">{{ __('Nav.NewBlueprints') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.FishTanks') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.TrendingBlueprints') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.FishTanks') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.AllBlueprint') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.FishTanks') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">{{ __('Nav.Posts') }}</a>
                        <ul>
                            <li>
                                <a href="#">{{ __('Nav.NewPosts') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.FishTanks') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.TrendingPosts') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.FishTanks') }}</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{ __('Nav.AllPosts') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.FishTanks') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">{{ __('Nav.MyBlueprints') }}</a>
                        <ul>
                            <li>
                                <a href="#">{{ __('Nav.AllBlueprints') }}</a>
                                <ul>
                                    <li><a href="#">{{ __('Nav.FishTanks') }}</a></li>
                                </ul>
                            </li>
                            <li><a href="#">{{ __('Nav.CloneBlueprints') }}</a></li>
                            <li><a href="#">{{ __('Nav.CreateBlueprints') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="nav-mini-wrapper">
                @if(Auth::user())
                    <li class="dropdown avatar-box">
                        <a style="display: flex;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img class="avatar" src="https://thebenclark.files.wordpress.com/2014/03/facebook-default-no-profile-pic.jpg" class="thumb"/>
                            <i style="color: white;margin-top: 10px;" class="fa fa-chevron-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="normal" href="#">
                                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                                    Something
                                </a>
                            </li>
                            <li>
                                <a href="{{route('logout') }}" class="normal">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    {{ __('Form.Logout') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <ul class="nav-mini">
                        <li><a data-toggle="modal" href="#registerModal"><i class="icon-user-follow" data-toggle="tooltip" data-placement="bottom" title="sign up"></i></a></li>
                        <li><a data-toggle="modal" href="#loginModal"><i class="icon-login" data-toggle="tooltip" data-placement="bottom" title="login"></i> </a></li>
                    </ul>
                @endif
            </div>
        </div>

        <div id="slicknav-mobile"></div>
    </nav>
</header>
