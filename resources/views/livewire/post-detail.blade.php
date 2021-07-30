<div>
    <div class="mt-3 row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $post->title }} <small>~{{ $post->user->name }}</small>
                        @if(Auth::user()->hasTeamPermission(Auth::user()->currentTeam,'update'))
                        <button type="button" class="float-right mb-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModel" wire:click='loadModal()'>
                        <i class='fa fa-edit'></i>
                        </button>
                        @endif
                        @if(Auth::user()->hasTeamPermission(Auth::user()->currentTeam,'delete'))
                        <button type="button" class="float-right mb-2 mr-1 btn btn-danger btn-sm"   wire:click="$emit('deletePost',{{ $post->id }})">
                        <i class='fa fa-remove'></i>
                        </button>
                        @endif
                    </h4>
                    <p class="card-text">{{ $post->description }}</p>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.create-posts')
    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function(){
                @this.on('deletePost', post_id => {
                    Swal.fire({
                        title: 'Are you sure',
                        text: 'You are about to remove this post',
                        showCancelButton: true,
                        icon: "warning",
                        confirmButtonColor: "#dc3545",
                        confirmButtonText: 'Delete!'
                    }).then((result) => {
                        if(result.value){
                            @this.call('delete', post_id);
                            Swal.fire({title: 'Post deleted successfully', icon:'success'});
                        }else{
                            Swal.fire({title: 'Nothing will happen', icon:'success'});
                        }
                    });
                })
            })
        </script>
    @endpush
</div>
