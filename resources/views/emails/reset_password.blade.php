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
        <p>{{ __("Gần đây quý khách hoặc ai đó đã gửi yêu cầu reset mật khẩu trên trang web:") }}</p>
        <p style="padding-left: 30px;">
            <a style="font-size: 17px;color:#00bfa5;text-decoration:none" href="{{ $siteUrl }}">
            {{ $siteUrl }}
            </a>
        </p>
        <p>{{ __("Cho tài khoản: ") }}<strong>{{ $email }}</strong></p>
        <p>{{ __("Nếu đúng quý khách gửi yêu cầu reset mật khẩu hãy ấn vào đây:") }}</p>
        <a style="display: inline-block;line-height: 50px;width: 130px;text-align: center;
            color: white;background-color: #00bfa5;text-decoration: none;border-radius: 7px;
            font-size: 15px;margin-left: 30px;" href="{{route('confirm-token', ['token' => $token])}}">
        {{ __("Reset mật khẩu") }}
        </a>
        <p>{{ __("Nếu đây không phải yêu cầu của quý khác, hãy bỏ qua nó") }}</p>
        <br>
        <p>{{ __("Cám ơn quý khách đã sử dụng dịch vụ, ") }}<strong>Framgia</strong></p>
    </div>
</div>
