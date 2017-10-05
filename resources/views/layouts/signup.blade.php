@if ($errors->first('r_name') != null
	|| $errors->first('r_email') != null
	|| $errors->first('r_password') != null
	|| $errors->first('r_password_confirmation') != null
	|| old('r_name') != null
	|| old('r_email') != null)
	<script>
	$(document).ready(function() {
		$('#registerModal').modal('show');
	});
	</script>
@endif
<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">{{ __('Form.SignupText') }}</h4>
	</div>
	<form method="POST" action="{{ route('signup') }}">
		{{ csrf_field() }}
		<div class="modal-body">
			<div class="row gap-20">
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>{{ __('Form.Username') }}</label>
						<input name="r_name" class="form-control" placeholder="{{ __('Form.Username') }}..." type="text" value="{{ old('r_name') }}">
						<p class="text-danger help-block error-text">{{ $errors->first('r_name') }}</p>
					</div>
				</div>

				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Email</label>
						<input name="r_email" class="form-control" placeholder="Email..." type="email" value="{{ old('r_email') }}">
						<p class="text-danger help-block error-text">{{ $errors->first('r_email') }}</p>
					</div>
				</div>

				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>{{ __('Form.Password') }}</label>
						<input name="r_password" class="form-control" placeholder="{{ __('Form.Password') }}..." type="password">
						<p class="text-danger help-block error-text">{{ $errors->first('r_password') }}</p>
					</div>
				</div>

				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>{{ __('Form.RePassword') }}</label>
						<input name="r_password_confirmation" class="form-control" placeholder="{{ __('Form.RePassword') }}..." type="password">
						<p class="text-danger help-block error-text">{{ $errors->first('r_password_confirmation') }}</p>
					</div>
				</div>

				<div class="col-sm-12 col-md-12">
					<div class="login-box-box-action">
						{{ __('Form.LoginText') }} <a data-toggle="modal" href="#loginModal">{{ __('Form.Login') }}</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal-footer text-center">
			<button type="submit" class="btn btn-primary">{{ __('Form.Signup') }}</button>
			<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">{{ __('Form.Close') }}</button>
		</div>
	</form>
</div>
