<div class="alert alert-danger alert-dismissible fade in box-alert" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    <p class="mr-right-15">
        <strong>
        @if (session('error_msg'))
            {{ session('error_msg') }}
        @else
            {{ $errors->first('form_error') }}
        @endif
        </strong>
    </p>
</div>
