<div class="panel panel-filled col-md-12">
    <div class="panel-heading">
        {{ __('Tìm kiếm theo email')}}
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-11">
                <form id="_search_form" class="form-inline" method="GET" action="{{ route('user-search') }}">
                    <div class="form-group col-md-10 zero-left-padding">
                        <input id="search" type="text" name="email" class="form-control full-width" placeholder="{{ __('Nhập nội dung...') }}">
                    </div>
                        <input id="_search_type" type="hidden" name="type">
                        <input type="hidden" name="page" value="1">
                    <button type="submit" id="_search_user" class="btn btn-default">{{ __('Tìm') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
