<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Posts
        </h2>
    </x-slot>
    @if(session()->has('message'))
    <div class="mt-5 row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success" role="alert">
                <strong>Success</strong> {{ session('message') }}
            </div>
        </div>
    </div>
    @endif
    <div class="mt-5 row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h1>Posts List</h1>
                    <button type="button" class="float-right mb-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModel">
                        Create Post
                    </button>
                    <div class="form-group col-md-3">
                      <label for="">Show :</label>
                      <select class="form-control" wire:model='limit' name="show" id="show">
                        <option value='5'>5</option>
                        <option value='10'>10</option>
                        <option value='20'>20</option>
                        <option value='50'>50</option>
                      </select>
                    </div>
                    <div class="mb-2 input-group col-md-12">
                          <input type="text" wire:model='search' class="form-control" name="search" id="search" aria-describedby="helpId" placeholder="Search">
                          <div class="input-group-prepend">
                              <button class="btn btn-info" wire:click="clearSearch()">
                                Clear!
                              </button>
                          </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr class="text-gray-800 border border-b-0">
                                    <th class="px-4 py-3">
                                        Title
                                    </th>
                                    <th class="px-4 py-3">
                                        Author
                                    </th>
                                    <th class="px-4 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                            <tr class="w-full font-light text-gray-700 whitespace-no-wrap border border-b-0">
                                <td class="px-4 py-4">
                                    {{ $post->title }}
                                </td>
                                <td class="px-4 py-4">
                                    {{ $post->user->name }}
                                </td>
                                <td class="px-4 py-4">
                                    <button type="button" wire:click="edit({{ $post->id }})"  data-toggle="modal" data-target="#detailModel" class="btn btn-warning btn-sm">Edit</button>

                                    <a class="btn btn-info btn-sm" href='{{ route('post-detail',['id'=>$post->id]) }}'>Show</a>

                                    <button type="button" wire:click="$emit('deletePost',{{ $post->id }})"  class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <center>
                            <div class="btn-group" role="group">
                                @for ($i = 1; $i <= $pages; $i++)
                                    <button class="btn @if($currpage==$i) btn-warning @else btn-default @endif" wire:click="changePage({{ $i }})" role="button">{{ $i }}</button>
                                @endfor
                            </div>
                        </center>
                    </div>
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
