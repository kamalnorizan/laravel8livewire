<div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
    <div class="form-group">
      <label for="test">Test</label>
      <input type="text"
        class="form-control" wire:model="test" name="test" id="test" aria-describedby="helpId" placeholder="">
    </div>
    <table class="min-w-full">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                    Title
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                    Author
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($posts as $post)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                {{ $post->title }}
            </td>
            <td  class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                {{ $post->user_id }}
            </td>
            <td  class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                {{ $text }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
