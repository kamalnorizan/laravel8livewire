<div>
    <div class="mt-3 row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Write a comment</h4>
                    <div class="form-group">
                      <textarea class="form-control" wire:model='description' name="comment" id="comment" rows="3"></textarea>
                      @error('description')<span class='text-danger'>{{ $message }}</span>@enderror
                    </div>
                    <button type="button" wire:click='store' class="float-right btn btn-primary">Send Comment</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if (session()->has('message'))
                <div class="mt-2 alert alert-danger" role="alert">
                    <strong>Error </strong> {{ session('message') }}
                </div>
            @endif
            @foreach ($comments as $comment)
                <div class="mt-2 card">
                    <div class="card-body">
                        <p class="card-text">
                            {{ $comment->user->name }}
                            @if ($comment->user_id == Auth::user()->id)
                                <button wire:click="$emit('deleteComment',{{ $comment->id }})" type="button" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                            @endif
                            <br>
                            <small><i>{{\Carbon\Carbon::parse($comment->created_at)->format('d-m-Y')}}</i></small>
                        </p>
                        <p class="card-text">{{ $comment->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(){
            @this.on('deleteComment', comment_id => {
                Swal.fire({
                    title: 'Are you sure',
                    text: 'You are about to remove your own comment',
                    showCancelButton: true,
                    icon: 'warning',
                    confirmButtonColor: '#ff0000',
                    confirmButtonText: 'Delete!'
                }).then((result)=>{
                    if(result.value){
                        @this.call('deleteComment', comment_id);
                        Swal.fire({title: 'Your comment deleted successfully', icon: 'success'});
                    }
                });
            });
        });
    </script>
    @endpush
</div>
