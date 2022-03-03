<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_home()
    {
        $post_data = Post::all();
        return view('home', compact('post_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $user = $request->user();
     $post = new Post;
     $post->title = $request->title;
     $post->body = $request->body;
     $user->post()->save($post);
        return redirect('post')->with('status','Post Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost(Request $request)
    {
        $useremail = $request->user()->email; // tells which user is active by email
        if($useremail==='admin@gmail.com'){
            $post_data = Post::all();
            return view('dashboard', compact('post_data'));
        }else{
            $userid = $request->user()->id;
            $post_data = Post::where('user_id', $userid)->get();    //get data from active user
            return view('dashboard', compact('post_data'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_post($id)
    {
        $post_data = Post::find($id);
        return view('edit_post', compact('post_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_update(Request $request, $id)
    {
        $post_data = Post::find($id);
        $post_data->title = $request->title;
        $post_data->body = $request->body;
        $post_data->save();
        return redirect('dashboard')->with('status', 'Record Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_post($id)
    {
        $post_data = Post::find($id);
        $post_data->delete();
        return redirect('dashboard')->with('status', 'Record Deleted!!');
    }
    public function uploadpage(){
        return view('product');
    }
    public function uploadproduct(Request $request){
            $data = new Product;
            $file = $request->file;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/', $filename);  // store in assets folder
            $data->file=$filename;  // store in data base

        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }
    public function showproduct()
    {
        $data = Product::all();
        return view('showproduct', compact('data'));
    }
    public function viewFile($id){
        $data = Product::find($id);
        return view('viewproduct', compact('data'));
    }
    public function downloadFile(Request $request, $file){
        return response()->download(public_path('assets/'.$file));
    }
}

