<div>
    <div class="mt-3 row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $post->title }} <small>~{{ $post->user->name }}</small>
                        <button type="button" class="float-right mb-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModel" wire:click='loadModal()'>
                        Update Post
                        </button>
                    </h4>
                    <p class="card-text">{{ $post->description }}</p>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.create-posts')
</div>
