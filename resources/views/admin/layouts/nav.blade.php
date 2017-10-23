<aside class="navigation">
    <nav>
        <ul class="nav luna-nav">
            <li class="active">
                <a href="index.html">{{ __('Dashboard') }}</a>
            </li>
            <li class="nav-category">
                {{ __('Quản trị') }}
            </li>
            <li>
                <a href="#uielements" data-toggle="collapse" aria-expanded="false">
                {{ __('Tài khoản') }}
                <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                </a>
                <ul id="uielements" class="nav nav-second collapse">
                    <li><a href="{{ route('user-show') }}">{{ __('Danh sách tài khoản') }}</a></li>
                    <li><a href="#">{{ __('Tài khoản quản trị') }}</a></li>
                    <li><a href="#">{{ __('Thêm tài khoản') }}</a></li>
                    <li><a href="#">{{ __('Cập nhật tài khoản') }}</a></li>
                </ul>
            </li>
            <li>
                <a href="#forms" data-toggle="collapse" aria-expanded="false">
                {{ __('Bản thiết kế') }}
                <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                </a>
                <ul id="forms" class="nav nav-second collapse">
                    <li><a href="#">{{ __('Thống kê') }}</a></li>
                    <li><a href="#">{{ __('Thiết kế đã duyệt') }}</a></li>
                    <li><a href="#">{{ __('Thiết kế chờ duyệt') }}</a></li>
                    <li><a href="#">{{ __('Thiết kế không duyệt') }}</a></li>
                    <li><a href="#">{{ __('Thêm thiết kế') }}</a></li>
                </ul>
            </li>
            <li>
                <a href="#charts" data-toggle="collapse" aria-expanded="false">
                {{ __('Sản phẩm') }}
                <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                </a>
                <ul id="charts" class="nav nav-second collapse">
                    <li><a href="{{ route('product-show') }}">{{ __('Danh sách sản phẩm') }}</a></li>
                    <li><a href="{{ route('product-create') }}">{{ __('Thêm sản phẩm') }}</a></li>
                </ul>
            </li>
            <li>
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
            </li>
            <li>
                <a href="#cat" data-toggle="collapse" aria-expanded="false">
                {{ __('Danh mục') }}
                <span class="sub-nav-icon"><i class="stroke-arrow"></i></span>
                </a>
                <ul id="cat" class="nav nav-second collapse">
                    <li><a href="#">{{ __('Bản thiết kế') }}</a></li>
                    <li><a href="{{ route('category-show') }}">{{ __('Sản phẩm') }}</a></li>
                    <li><a href="#">{{ __('Bài viết') }}</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
