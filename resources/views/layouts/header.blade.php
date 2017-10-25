<header id="header">
    <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
        <div class="container">
            <div class="logo-wrapper">
                <div class="logo">
                    <a href="index-2.html"><img src="{{ asset('images/logo-white.png') }}" alt="Logo" /></a>
                </div>
            </div>
            <div id="navbar" class="navbar-nav-wrapper">
                <ul class="nav navbar-nav" id="responsive-menu">
                    <li>
                        <a href="{{ route('home') }}">{{ __('Nav.Home') }}</a>
                    </li>
                    <li>
                        <a href="#">{{ __('Nav.Product') }}</a>
                        <ul>
                            @foreach($productTypes as $type)
                                <li>
                                    <a href="{{ route('listProductByCategory', [$type->id]) }}">{{ $type->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="#">{{ __('Nav.Blueprints') }}</a>
                        <ul>
                            <li>
                                <a href="{{ route('listNewBlueprint') }}">{{ __('Nav.NewBlueprints') }}</a>
                            </li>
                            <li>
                                <a href="{{route('listBlueprint')}}">{{ __('Nav.AllBlueprint') }}</a>
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
                            </li>
                            <li><a href="{!! route('getRequestFishTanksBlueprint') !!}">{{ __('User.Request.Blueprint') }}</a></li>
                            <li><a href="{{ route('getCreateBlueprint') }}">{{ __('Nav.CreateBlueprints') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="nav-mini-wrapper">
                @if(Auth::user())
                    <li class="dropdown avatar-box">
                        <a href="#" class="dropdown-toggle flex-tag" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <img class="avatar" src="{!! url('images/user.jpg') !!}"/>
                            <i class="fa fa-chevron-down arrow-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="normal" href="javascript:void(0)">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            @if (Auth::user()->role == 1)
                                <li>
                                    <a class="normal" href="{{ route('admin') }}">
                                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                                        {{ __('Trang quản trị') }}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('profile') }}" class="normal">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ __('Thông tin cá nhân') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="normal">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    {{ __('Form.Logout') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <ul class="nav-mini">
                        <li><a data-toggle="modal" href="#registerModal"><i class="icon-user-follow"
                                                                            data-toggle="tooltip"
                                                                            data-placement="bottom" title="sign up"></i></a>
                        </li>
                        <li><a data-toggle="modal" href="#loginModal"><i class="icon-login" data-toggle="tooltip"
                                                                         data-placement="bottom" title="login"></i> </a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
        <div id="slicknav-mobile"></div>
    </nav>
</header>
