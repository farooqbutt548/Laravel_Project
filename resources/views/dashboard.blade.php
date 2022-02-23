<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg table">
                <div class="text-white bg-success">
                @if(session()->has('status'))
                    <h3>{{session('status')}}</h3>
                @endif
                </div>
                <table class="table">
                    <tr class="bg-primary text-white">
                        <th>Auth User Name</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($post_data as $post)
                    <tr>
                        <td>{{$post->User->name}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td><a href="{{route('edit_post',$post->id)}}">Edit</a></td>
                        <td><a href="{{route('delete_post',$post->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                </table><hr>


            </div>
        </div>
    </div>
</x-app-layout>
