<li class="clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="review-header">
                <h6>{{ $newComment->user->name }}</h6>
                <a href="#" class="btn btn-primary">{{ ('Trả lời') }}</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9">
            <div class="review-content">
                <p>{{ $newComment->body }}</p>
            </div>
        </div>
    </div>
</li>
