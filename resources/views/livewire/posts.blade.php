<div>


    @if ($post_id)
        <form method="post"  enctype="multipart/form-data"  wire:submit.prevent="update">
            @csrf
            @method('patch')
            <div class="modal-body" >
                {{$post_id}}
                <input type="text"  wire:model.debounce.500ms="title" name="title" class="form-control" placeholder="title">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <br>
                <span class="text-success">{{config('app.url') . '/' }}</span>
                <input type="text"  wire:model.defer="slug" name="slug" class="form-control" placeholder="slug">
                @error('slug')
                <span class="text-danger" >{{$message}}</span>
                @enderror
                <br>

                <input type="text" name="body"  wire:model.defer="body" class="form-control" placeholder="body">
                @error('body')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <br>
                @if($image)
                    <div class="m-2 rounded">
                    <span class="text-center">
                        <img src="{{asset('images/'.$image)}}" width="200">
                    </span>
                    </div>
                @endif
                @if($post_image)
                    <div class="m-2 rounded">
                    <span class="text-center">
                        <img src="{{$post_image->temporaryUrl()}}" width="200">
                    </span>
                    </div>
                @endif
                <input type="file" name="image"  wire:model="post_image" class="form-control" placeholder="image">
                @error('post_image')
                <span class="text-danger">{{$message}}</span>
                @enderror


            </div>
            <div class="modal-footer">
                <button type="submit">update</button>

            </div>
        </form>
    @else
    <form method="post"  enctype="multipart/form-data"  wire:submit.prevent="store">
        @csrf
        <div class="modal-body" >
                {{$post_id}}
            <input type="text"  wire:model.debounce.500ms="title" name="title" class="form-control" placeholder="title">
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror

            <br>
            <span class="text-success">{{config('app.url') . '/' }}</span>
            <input type="text"  wire:model.defer="slug" name="slug" class="form-control" placeholder="slug">
            @error('slug')
            <span class="text-danger" >{{$message}}</span>
            @enderror
            <br>

            <input type="text" name="body"  wire:model.defer="body" class="form-control" placeholder="body">
            @error('body')
            <span class="text-danger">{{$message}}</span>
            @enderror

            <br>
            @if($image)
                <div class="m-2 rounded">
                    <span class="text-center">
                        <img src="{{asset('images/'.$image)}}" width="200">
                    </span>
                </div>
            @endif
            @if($post_image)
                <div class="m-2 rounded">
                    <span class="text-center">
                        <img src="{{$post_image->temporaryUrl()}}" width="200">
                    </span>
                </div>
            @endif
            <input type="file" name="image"  wire:model="post_image" class="form-control" placeholder="image">
            @error('post_image')
            <span class="text-danger">{{$message}}</span>
            @enderror


        </div>
        <div class="modal-footer">
            <input type="submit" >

        </div>
    </form>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="">id</th>
            <th class="">image</th>
            <th class="">title</th>
            <th class="">Action</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-blue-200">

        @forelse($posts as $post)
            <tr>
            <td class="">{{$post->id}}</td>
            <td class=""><img src="{{asset('images/'.$post->image)}}" class="img-thumbnail" width="80" alt="{{$post->title}}"></td>
            <td class="">{{$post->title}}</td>
            <td class="">
                <a class="btn btn-primary" wire:click="showUpdate({{$post->id}})">edit</a>
                <form method="post" wire:submit.prevent="destroy({{$post->id}})">
                    <button type="submit" > Delete</button>
                </form>
            </td>
            </tr>
        @empty
        <h1>no data found</h1>
        @endforelse
        </tbody>
    </table>

    <div class="p-4">
        {{$posts->links()}}
    </div>




</div>
