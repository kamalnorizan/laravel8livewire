<x-app-layout>
    <x-slot name='header'>
        <h2  class="text-xl font-semibold leading-tight text-gray-800">
            Posts
        </h2>
    </x-slot>
    <div class="mt-3 row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                      <label for="postTitle">Post Title</label>
                      <input type="text" class="form-control" name="postTitle" id="postTitle" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                      <label for="postDesc">Description</label>
                      <textarea class="form-control" name="postDesc" id="postDesc" rows="3"></textarea>
                    </div>
                    <button class="btn btn-warning btn-md" id="submitPost">
                        Submit Post
                    </button>
                </div>
            </div>
        </div>
    </div>
    <livewire:show-posts>
    @push('scripts')
        <script>



            $('#area').append('<button id="test-button4" class="btn btn-lg">Click here Button 4</button>');

            $(document).on('click','.btn',function(){

            });

            $('#submitPost').click(function (e) {
                e.preventDefault();
                console.log($('#postTitle').val()+' '+$('#postDesc').val());
                $.ajax({
                    type: "post",
                    url: "{{ route('posts.store') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: $('#postTitle').val(),
                        description: $('#postDesc').val(),
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('#postsTbl>tbody').prepend(
                            ' <tr class="w-full font-light text-gray-700 whitespace-no-wrap border border-b-0">'+
                                '<td class="px-4 py-4">'+response.title+'</td>'+
                                '<td class="px-4 py-4">'+response.user+'</td>'+
                                '<td class="px-4 py-4"> </td>'+
                            '</tr>'
                            );
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
