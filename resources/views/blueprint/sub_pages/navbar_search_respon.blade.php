@foreach($blueprintResut as $blueprint)
	<li><a href="{{ route('getViewBlueprint', [$blueprint->id]) }}">{{ $blueprint->title }}</a></li>
@endforeach
