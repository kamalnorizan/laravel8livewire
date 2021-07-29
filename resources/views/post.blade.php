<x-app-layout>
    <x-slot name='header'>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Post Details
        </h2>
    </x-slot>
    @livewire('post-detail', ['post_id'=>$id])

    <div class="mt-3 row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Write a comment</h4>
                    <div class="form-group">
                      <textarea class="form-control" name="comment" id="commentJq" rows="3"></textarea>
                      @error('description')<span class='text-danger'>{{ $message }}</span>@enderror
                    </div>
                    <button type="button" id="submitBtnJq" class="float-right btn btn-primary">Send Comment</button>
                </div>
            </div>
        </div>
    </div>

    @livewire('comment', ['post_id'=>$id])

    @push('scripts')
        <script>
            $('#submitBtnJq').click(function (e) {
               $.ajax({
                   type: "post",
                   url: "{{ route('comment.store') }}",
                   data: {
                       _token: '{{ csrf_token() }}',
                       description: $('#commentJq').val(),
                       post_id: '{{ $id }}'
                   },
                   dataType: "json",
                   success: function (response) {
                        console.log(response);
                        $('#commentJq').val('');
                        $('#comments').prepend(
                            '<div class="mt-2 card">'+
                                '<div class="card-body">'+
                                    '<p class="card-text">'+
                                        '{{ Auth::user()->name }} <button type="button" class="btn btn-danger btn-sm deleteBtn" data-id="'+response.id+'"><i class="fa fa-trash"></i></button><br>'+
                                        '<small><i>'+response.created_at+'</i></small>'+
                                        '<p class="card-text">'+response.description+'</p>'+
                                    '</p>'+
                                '</div>'+
                            '</div>'
                        );
                   }
               });
            });

            $(document).on('click','.deleteBtn', function () {
                var deleteBtn = $(this);
                var commentId = $(deleteBtn).attr('data-id');

                Swal.fire({
                    title: 'Are you sure',
                    text: 'You are about to remove your own comment',
                    showCancelButton: true,
                    icon: 'warning',
                    confirmButtonColor: '#ff0000',
                    confirmButtonText: 'Delete!'
                }).then((result)=>{
                    if(result.value){
                        $.ajax({
                            type: "post",
                            url: "{{ route('comment.delete') }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                commentId:commentId
                            },
                            dataType: "json",
                            success: function (response) {
                                if(response.status =='success'){
                                    $(deleteBtn).parent().parent().parent().remove();
                                    Swal.fire({title: 'Your comment deleted successfully', icon: 'success'});
                                }else{
                                    Swal.fire({title: 'There is an error when trying to remove your comment.', icon: 'error'});
                                    console.log(response);
                                }
                            }
                        });

                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
<div class="mt-2 card">
    <div class="card-body">
        <p class="card-text">
            Kamal Norizan
            <button wire:click="$emit('deleteComment',506)" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <br>
            <small><i>29-07-2021</i></small>
        </p>
        <p class="card-text">From livewire</p>
    </div>
</div>
