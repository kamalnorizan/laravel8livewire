<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class PostDetail extends Component
{
    public $post;
    public $title;
    public $description;
    public $post_id;
    public function render()
    {
        $this->post = Post::find($this->post_id);
        return view('livewire.post-detail');
    }

    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }

    public function loadModal()
    {
        $this->title = $this->post->title;
        $this->description = $this->post->description;
    }

    public function store()
    {
        $post = Post::find($this->post->id);
        $post->title = $this->title;
        $post->description = $this->description;
        $post->save();
    }

    public function clearForm()
    {
        # code...
    }

    public function delete($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();

        return redirect('/posts');
    }
}
