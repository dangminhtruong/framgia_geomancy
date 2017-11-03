<div class="col-md-12 col-sm-12">
	<div class="bubble you">
	   <h6>
	      {{ __('Tôi') }}
	      <p class="create_at">{{ $requestBlueprint->requestNotifies->first()->created_at }}</p>
	   </h6>
	   {{ $requestBlueprint->requestNotifies->first()->message }}
	</div>
</div>
