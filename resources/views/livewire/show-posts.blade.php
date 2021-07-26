<div class="pt-8">
    <section class="flex justify-center h-screen bg-gray-300 ">
        <div class="m-20 bg-white shadow-lg">
            <div class="block overflow-x-auto">
                <button wire:click='create()'>Create</button>
                @if($isDialogOpen)
                @include('livewire.create-posts')
                @endif
                <table class="rounded-lg w-fulltext-left">
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
                            {{ $post->user_id }}
                        </td>
                        <td class="px-4 py-4">
                            {{ $text }}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
