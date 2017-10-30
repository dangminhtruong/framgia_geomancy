<div>
    {{ __('Dear mr') }}.{{ $blueprintInfo->user->name }}
    . {{ __('We send this email cause you just created and share your blueprint') }}.
    {{ __('To review click') }} <a href="{{ route('getViewBlueprint', [$blueprintInfo->id]) }}">{{ __('here') }}</a>
    {{ __('to review') }}.<br/>
    <b>{{ __('Many thanks') }}...!</b><br/>
    <b>{{ __('From') }}: </b><i>Framgia geomancy team</i>
</div>
