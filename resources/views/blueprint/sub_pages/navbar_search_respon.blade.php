@if(count($blueprintResut) > 0)
	@foreach($blueprintResut as $blueprint)
		<li><a href="{{ route('getViewBlueprint', [$blueprint->id]) }}">{{ $blueprint->title }}</a></li>
	@endforeach
@else 
	<li><a href="#">{{ __('Không tìm thấy') }}</a></li>
@endif
