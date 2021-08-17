<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{

    use WithPagination;




    public $title;
    public $slug;
    public $body;
    public $image;

    public function showCreateModal(){

        $this->modalForVisible = true;

    }
    public function posts(){
        return Post::orderByDesc('id')->paginate(5);
    }

    public function render()
    {
        return view('livewire.posts',[
            'posts' => $this->posts(),
        ]);
    }
}
