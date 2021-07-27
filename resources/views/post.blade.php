<x-app-layout>
    <x-slot name='header'>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Post Details
        </h2>
    </x-slot>
    @livewire('post-detail', ['post_id'=>$id])
</x-app-layout>
