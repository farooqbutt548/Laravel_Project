<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <div class="bg-gray text-black border border-dark col-md-6">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        @if(session()->has('status'))
            <h3>{{session('status')}}</h3>
        @endif
        <form method="POST" action="{{route('edit_update',$post_data->id)}}">
            @csrf
            <br>
            <h1 class="text-center">Edit a Blog</h1>
            <div class="form-group mb-4 m-4 ">
                <label for="">Blog Title</label>
                <input type="text" name="title" class="form-control" value="{{$post_data->title}}"  placeholder="Enter title">
            </div>
            <div class="form-group mb-4 m-4">
                <label for="">Blog Body</label>
                <textarea type="text" name="body" class="form-control"  placeholder="Body...">{{$post_data->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary m-4">Update</button>
        </form>

    </div>
</x-app-layout>
