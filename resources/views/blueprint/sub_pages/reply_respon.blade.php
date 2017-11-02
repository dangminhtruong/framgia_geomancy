<div class="review-replied">
    <div class="review-replied-header">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-9">
                <h6>{{ $reply->user->name }}
                    @if($blueprintInfo->user_id == $reply->user->id)
                        <small>
                            {{ __('Sở hữu bản thiết kế này') }}
                        </small>
                    @endif
                </h6>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 text-right text-left-xs">
                <button class="btn btn-primary" data-toggle="collapse"
                        data-target="#demo{{ $commentId }}">
                    {{ __('Trả lời') }}
                </button>
            </div>
        </div>
    </div>
    <div class="review-replied-content">
        <p>{{ $reply->body }}</p>
    </div>
</div>
