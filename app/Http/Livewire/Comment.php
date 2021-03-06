<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment as CommentModal;
use Auth;
class Comment extends Component
{
    public $comments;
    public $post_id;
    public $description;
    public function render()
    {
        $this->comments = CommentModal::where('post_id',$this->post_id)->latest()->get();
        return view('livewire.comment');
    }

    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }

    public function store()
    {
        $this->validate([
            'description' => 'required'
        ]);

        $comment = new CommentModal;
        $comment->description = $this->description;
        $comment->post_id = $this->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        $this->description='';
    }

    public function deleteComment($id)
    {
        $comment = CommentModal::where('user_id',Auth::user()->id)->where('id',$id)->first();
        if($comment){
            $comment->delete();
        }else{
            session()->flash('message', 'You are not allowed to do this action');
        }
    }
}
