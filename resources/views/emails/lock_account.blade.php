<div style="width: 598px; padding: 20px 20px;">
    <h1>
        <a style="display: block; width: 30%" href="{{ $siteUrl }}">
        <img style="width: 100%;height: auto;" src="http://bulma.io/images/bulma-logo.png"/>
        </a>
    </h1>
    <h3 style="text-align:center;font-size:30px;font-family:sans-serif;color:#424242">{{ __("Quên Mật Khẩu") }}</h3>
    <hr>
    <div style="font-family:sans-serif;color:#616161;font-weight:500;padding-left: 5px;">
        <p><strong>{{ __("Kính gửi quý khách,") }}</strong></p>
        <p>{{ __("Tài khoản của quý khách đã tạm thời bị khóa trên trang web:") }}</p>
        <p style="padding-left: 30px;">
            <a style="font-size: 17px;color:#00bfa5;text-decoration:none" href="{{ $siteUrl }}">
            {{ $siteUrl }}
            </a>
        </p>
        <p>{{ __("Tên tài khoản: ") }}<strong>{{ $email }}</strong></p>
        <p>{{ __("Lý do khóa:") }}<strong>{{ $reason }}</p>
        <br>
        <p>{{ __("Nếu có vấn đề sai sót quý khách vui lòng liên hệ với quản trị viên.") }}</p>
        <br>
        <p>{{ __("Cám ơn quý khách đã sử dụng dịch vụ, ") }}<strong>Framgia</strong></p>
    </div>
</div>
