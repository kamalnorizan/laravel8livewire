<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Auth;
class ShowPosts extends Component
{
    public $posts, $text, $title, $description, $post_id, $search, $pages, $totalrow;
    public $limit=10;
    public $currpage=1;
    public $isDialogOpen=0;
    public function render()
    {
        if($this->search !=''){
            $this->posts = Post::with('user')->where('title','like','%'.$this->search.'%')->get();
        }else{
            $offset = $this->limit * ($this->currpage-1);
            $this->posts = Post::with('user')->latest()->offset($offset)->limit($this->limit)->get();
        }

        $this->totalrow = Post::count();
        $this->pages = ceil($this->totalrow / $this->limit);
        return view('livewire.show-posts');
    }

    public function changePage($currentpage)
    {
        $this->currpage = $currentpage;
    }

    public function create()
    {
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isDialogOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isDialogOpen = false;
    }

    public function clearForm()
    {
        $this->title = '';
        $this->description = '';
        $this->post_id = '';
    }

    public function store()
    {
        $this->isDialogOpen = false;
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::updateOrCreate(['id'=>$this->post_id],[
            'title'=>$this->title,
            'description'=>$this->description,
            'user_id'=> Auth::user()->id,
        ]);

        $this->clearForm();

        session()->flash('message',$this->post_id ? 'Post Updated':'Post created');

    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->title = $post->title;
        $this->description = $post->description;
        $this->post_id = $post->id;
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    public function clearSearch()
    {
        $this->search='';
    }

}
