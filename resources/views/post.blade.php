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
                   }
               });
            });
        </script>
    @endpush
</x-app-layout>
