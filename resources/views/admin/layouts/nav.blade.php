<aside class="navigation">
    <nav>
        <ul class="nav luna-nav">
            <li @if (!isset($nav)) class="active" @endif>
                <a href="index.html">{{ __('Dashboard') }}</a>
            </li>
            <li>
                @if (!isset($nav['user']))
                    <a href="#uielements" data-toggle="collapse" aria-expanded="false">
                        {{ __('Tài khoản') }}
                        <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="uielements" class="nav nav-second collapse">
                @else
                    <a href="#uielements" data-toggle="collapse" aria-expanded="true" class="nav-category">
                    Tài khoản
                    <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="uielements" class="nav nav-second collapse in" aria-expanded="true">
                @endif
                    <li @if (isset($nav['user']['list'])) class="active" @endif><a href="{{ route('user-show') }}">{{ __('Danh sách tài khoản') }}</a></li>
                    <li><a href="#">{{ __('Tài khoản quản trị') }}</a></li>
                    <li><a href="#">{{ __('Thêm tài khoản') }}</a></li>
                    <li><a href="#">{{ __('Cập nhật tài khoản') }}</a></li>
                </ul>
            </li>
            <li>
                @if (!isset($nav['request']))
                    <a href="#forms" data-toggle="collapse" aria-expanded="false">
                    {{ __('Yêu cầu thiết kế') }}
                    <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="forms" class="nav nav-second collapse">
                @else
                    <a href="#forms" data-toggle="collapse" aria-expanded="true" class="nav-category">
                    {{ __('Yêu cầu thiết kế') }}
                    <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="forms" class="nav nav-second collapse in" aria-expanded="true">
                @endif
                    <li><a href="#">{{ __('Thống kê') }}</a></li>
                    <li @if (isset($nav['request']['list1'])) class="active" @endif><a href="{{ route('request-blueprint', ['type' => 1]) }}">{{ __('Yêu cầu mới') }}</a></li>
                    <li @if (isset($nav['request']['list3'])) class="active" @endif><a href="{{ route('request-blueprint', ['type' => 3]) }}">{{ __('Yêu cầu đã duyệt') }}</a></li>
                    <li @if (isset($nav['request']['list2'])) class="active" @endif><a href="{{ route('request-blueprint', ['type' => 2]) }}">{{ __('Yêu cầu chờ') }}</a></li>
                </ul>
            </li>
            <li>
                @if (!isset($nav['blueprint']))
                    <a href="#forms2" data-toggle="collapse" aria-expanded="false">
                    {{ __('Bản thiết kế') }}
                    <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="forms2" class="nav nav-second collapse">
                @else
                    <a href="#forms2" data-toggle="collapse" aria-expanded="true" class="nav-category">
                    {{ __('Bản thiết kế') }}
                    <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="forms2" class="nav nav-second collapse in" aria-expanded="true">
                @endif
                    <li><a href="#">{{ __('Thống kê') }}</a></li>
                    <li @if (isset($nav['blueprint']['list1'])) class="active" @endif><a href="{{ route('blueprint', ['type' => 1]) }}">{{ __('Thiết kế mới') }}</a></li>
                    <li @if (isset($nav['blueprint']['list3'])) class="active" @endif><a href="{{ route('blueprint', ['type' => 3]) }}">{{ __('Thiết kế đã duyệt') }}</a></li>
                    <li @if (isset($nav['blueprint']['list2'])) class="active" @endif><a href="{{ route('blueprint', ['type' => 2]) }}">{{ __('Thiết kế chờ') }}</a></li>
                </ul>
            </li>
            <li>
                @if (!isset($nav['product']))
                    <a href="#charts" data-toggle="collapse" aria-expanded="false">
                    {{ __('Sản phẩm') }}
                    <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="charts" class="nav nav-second collapse">
                @else
                    <a href="#charts" data-toggle="collapse" aria-expanded="true" class="nav-category">
                    {{ __('Sản phẩm') }}
                    <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="charts" class="nav nav-second collapse in" aria-expanded="true">
                @endif
                    <li @if (isset($nav['product']['list'])) class="active" @endif><a href="{{ route('product-show') }}">{{ __('Danh sách sản phẩm') }}</a></li>
                    <li @if (isset($nav['product']['create'])) class="active" @endif><a href="{{ route('product-create') }}">{{ __('Thêm sản phẩm') }}</a></li>
                </ul>
            </li>
            {{--  <li>
                <a href="#tables" data-toggle="collapse" aria-expanded="false">
                {{ __('Bài viết') }}
                <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                </a>
                <ul id="tables" class="nav nav-second collapse">
                    <li><a href="#">{{ __('Thống kê') }}</a></li>
                    <li><a href="#">{{ __('Bài viết đã duyệt') }}</a></li>
                    <li><a href="#">{{ __('Bài viết chờ duyệt') }}</a></li>
                    <li><a href="#">{{ __('Bài viết không duyệt') }}</a></li>
                    <li><a href="#">{{ __('Thêm bài viết') }}</a></li>
                </ul>
            </li>  --}}
            <li>
                @if (!isset($nav['cate']))
                    <a href="#cat" data-toggle="collapse" aria-expanded="false">
                    {{ __('Danh mục') }}
                    <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="cat" class="nav nav-second collapse">
                @else
                    <a href="#cat" data-toggle="collapse" aria-expanded="true" class="nav-category">
                    {{ __('Danh mục') }}
                    <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                    </a>
                    <ul id="cat" class="nav nav-second collapse in" aria-expanded="true">
                @endif
                    <li><a href="#">{{ __('Bản thiết kế') }}</a></li>
                    <li @if (isset($nav['cate']['category'])) class="active" @endif><a href="{{ route('category-show') }}">{{ __('Sản phẩm') }}</a></li>
                    <li><a href="#">{{ __('Bài viết') }}</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
