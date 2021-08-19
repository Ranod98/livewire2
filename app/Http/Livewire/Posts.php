<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use function Livewire\str;

class Posts extends Component
{

    use WithPagination , WithFileUploads;




    public $title;
    public $slug;
    public $body;
    public $image;
    public $post_image;
    public $post_image_name;
    public $post_id;

    public function posts(){
        return Post::orderByDesc('id')->paginate(5);
    }

    public function render()
    {
        return view('livewire.posts',[
            'posts' => $this->posts(),
        ]);
    }



    public function store(){

        $this->validate();

        if ($this->post_image != '') {
             $this->post_image_name = md5($this->post_image . microtime()) .'.'.$this->post_image->extension();
            $this->post_image->storeAs('/',$this->post_image_name,'images');

        }

        auth()->user()->posts()->create($this->modelData());

        $this->modelFormReset();

        $this->alert('success', 'Hello World!', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);

    }

    public function updatedTitle($value){
        $this->slug = Str::slug($value);
    }



    public function showUpdate($id){
        $this->post_id = $id;
        $this->loadData($id);

    }

    public function loadData($id){
        $data = Post::findOrFail($id);

        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->body = $data->body;
        $this->image = $data->image;

    }







    public function rules(){
        return [
            'title' => ['required'],
            'slug' => ['required',Rule::unique('posts','slug')],
            'post_image' => ['required','max:1024'],
        ];
    }//emd

    public function modelData(){
        return [
            'title' => $this->title,
            'body' => $this->body,
            'slug' => $this->slug,
            'image' => $this->post_image_name,
        ];
    }

    public function modelFormReset(){
        $this->title = null;
        $this->body = null;
        $this->slug =null;
        $this->image = null;
        $this->post_image = null;
        $this->post_image_name = null;

    }//end of model form reset





}
