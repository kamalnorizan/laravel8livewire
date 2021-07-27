<x-app-layout>
    <x-slot name='header'>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Posts
        </h2>
    </x-slot>
    <div class="mt-3 row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
              <div class="card-body">
                  <div class="form-group">
                    <label for="search">Search Post</label>
                    <input type="text" class="form-control" name="search" id="search" aria-describedby="helpId" placeholder="Seacrh">
                  </div>
              </div>
            </div>
        </div>
    </div>
    @php
        $search = 'Alias';
    @endphp
    <livewire:show-posts :search="$search">
</x-app-layout>
