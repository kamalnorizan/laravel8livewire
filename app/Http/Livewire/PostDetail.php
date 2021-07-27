<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class PostDetail extends Component
{
    public $post, $post_id;
    public function render()
    {
        $this->post = Post::find($this->post_id);
        return view('livewire.post-detail');
    }

    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }
}
