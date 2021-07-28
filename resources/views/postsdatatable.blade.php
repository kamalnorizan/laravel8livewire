<x-app-layout>
    <x-slot name='header'>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Posts Datatable
        </h2>
    </x-slot>
    <div class="mt-3 row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <livewire:datatable model="App\Models\Post" searchable='title, description' exclude='updated_at' hide='user_id' hideable='select' exportable :dates="['created_at|d-m-Y H:i:s']" per-page="20"  sort="created_at|asc"/>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <livewire:datatable model="App\Models\User" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
