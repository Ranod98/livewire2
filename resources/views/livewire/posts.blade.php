<div>
    <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       Create
    </button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="px-6 py-3 border-2 border-gray-200 text-left text-blue-500 tracking-wider">id</th>
            <th class="px-6 py-3 border-2 border-gray-200 text-left text-blue-500 tracking-wider">image</th>
            <th class="px-6 py-3 border-2 border-gray-200 text-left text-blue-500 tracking-wider">title</th>
            <th class="px-6 py-3 border-2 border-gray-200 text-left text-blue-500 tracking-wider">Action</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-blue-200">

        @forelse($posts as $post)
            <tr>
            <td class="px-6 py-3 border-2 border-gray-200 text-left text-blue-500 tracking-wider">{{$post->id}}</td>
            <td class="px-6 py-3 border-2 border-gray-200 text-left text-blue-500 tracking-wider"><img src="{{asset('images/'.$post->image)}}" class="img-thumbnail" width="80" alt="{{$post->title}}"></td>
            <td class="px-6 py-3 border-2 border-gray-200 text-left text-blue-500 tracking-wider">{{$post->title}}</td>
            <td class="px-6 py-3 border-2 border-gray-200 text-left text-blue-500 tracking-wider">Action</td>
            </tr>
        @empty
        <h1>no data found</h1>
        @endforelse
        </tbody>
    </table>

    <div class="p-4">
        {{$posts->links()}}
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                <div class="modal-body" >

                    <input type="text" wire:model="title" name="title" class="form-control" placeholder="title">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <br>
                    <span class="text-success">{{config('app.url') . '/' }}</span>
                    <input type="text" wire:model="slug" name="slug" class="form-control" placeholder="slug">
                    @error('slug')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <br>
                    <input type="text" wire:model="body" name="body" class="form-control" placeholder="body">
                    @error('body')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
