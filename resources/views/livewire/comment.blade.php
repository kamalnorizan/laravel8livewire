<div>

    <div class="mt-3 row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Write a comment</h4>
                    <div class="form-group">
                      <textarea class="form-control" wire:model='description' name="comment" id="comment" rows="3"></textarea>
                    </div>
                    <button type="button" wire:click='store' class="float-right btn btn-primary">Send Comment</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 row">
        <div class="col-md-8 offset-md-2">
            @foreach ($comments as $comment)
                <div class="mt-2 card">
                    <div class="card-body">
                        <p class="card-text">
                            {{ $comment->user->name }} <br>
                            <small><i>{{\Carbon\Carbon::parse($comment->created_at)->format('d-m-Y')}}</i></small>
                        </p>
                        <p class="card-text">{{ $comment->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
