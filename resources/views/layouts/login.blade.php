@if ($errors->first('email') != null || $errors->first('password') != null ||old('email') != null)
	<script>
	$(document).ready(function() {
		$('#loginModal').modal('show');
	});
	</script>
@endif
<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">{{ __('Form.Login')}}</h4>
	</div>

	<form method="POST" action="{{route('login')}}">
	{{ csrf_field() }}
	<div class="modal-body">
		<div class="row gap-20">
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-facebook btn-block mb-5-xs">{{ __('Form.Login')}} Facebook</button>
			</div>
			<div class="col-sm-6 col-md-6">
				<button class="btn btn-google-plus btn-block">{{ __('Form.Login')}} Google+</button>
			</div>

			<div class="col-md-12">
				<div class="login-modal-or">
					<div><span>or</span></div>
				</div>
			</div>

			<div class="col-sm-12 col-md-12">

				<div class="form-group">
					<label>Email</label>
					<input name="email" class="form-control" placeholder="Email..." type="text" value="{{ old('email') }}">
					<p class="text-danger help-block error-text">{{$errors->first('email')}}</p>
				</div>

			</div>

			<div class="col-sm-12 col-md-12">

				<div class="form-group">
					<label>{{ __('Form.Password')}}</label>
					<input name="password" class="form-control" placeholder="{{ __('Password')}}..." type="password">
					<p class="text-danger help-block error-text">{{$errors->first('password')}}</p>
				</div>

			</div>

			<div class="col-sm-6 col-md-6">
				<div class="checkbox-block">
					<input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="1" type="checkbox">
					<label class="" for="remember_me_checkbox">{{ __('Form.RememberMe')}}</label>
				</div>
			</div>

			<div class="col-sm-6 col-md-6">
				<div class="login-box-link-action">
					<a data-toggle="modal" href="#forgotPasswordModal" class="block line18 mt-1">{{ __('Form.Forget')}}</a>
				</div>
			</div>

			<div class="col-sm-12 col-md-12">
				<div class="login-box-box-action">
					{{ __('Form.ForgetText')}}? <a data-toggle="modal" href="#registerModal">{{ __('Form.Registration')}}</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal-footer text-center">
		<button type="submit" class="btn btn-primary">{{ __('Form.Login')}}</button>
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">{{ __('Form.Close')}}</button>
	</div>
	</form>

</div>
