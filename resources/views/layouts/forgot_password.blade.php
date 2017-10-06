@if ($errors->first('f_email') != null)
<script>
    $(document).ready(function() {
    	$('#forgotPasswordModal').modal('show');
    });
</script>
@endif
<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center">{{ __('Khôi phục mật khẩu') }}</h4>
    </div>
    <form method="POST" action="{{ route('forget-password')}}">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row gap-20">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="f_email" class="form-control" placeholder="Enter..." type="email" value="{{ old('f_email') }}">
                        <p class="text-danger help-block error-text">{{ $errors->first('f_email') }}</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="login-box-box-action">
                        {{ __('Quay lại') }} <a data-toggle="modal" href="#loginModal">{{ __('Form.Login') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer text-center">
            <button type="submit" class="btn btn-primary">{{ __('Khôi phục') }}</button>
            <button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
        </div>
    </form>
</div>
