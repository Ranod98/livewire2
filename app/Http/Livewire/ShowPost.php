<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public $title;
    public $slug;
    public $body;
    public $image;

    public function mount($slug){
        $post   = Post::where('slug' ,$slug)->first();

        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->body = $post->body;
        $this->image = $post->image;

    }
    public function render()
    {
        return view('livewire.show-post')->layout('layouts.app');
    }
}
