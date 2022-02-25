<?php

namespace App\Http\Controllers;

use App\Models\device;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function firstApi(){
        return ['name'=>'Farooq', 'company'=>'Invictus Solution', 'status'=>'Internee'];
//    return view('post');
    }

    function secondApi(){
        return Post::all();
    }
    function thirdApi($id){
        return $id? Post::find($id):Post::all();
    }
    function fourthApi(Request $request){
        $device = new device;
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $status = $device->save();
        if ($status){
            echo "Data saved successfully";
        }
        else{
            echo "Operation Failed";
        }
    }
    function update(Request $request){
        $device =  device::find($request->id);
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $status = $device->save();
        if ($status){
            return "Data is updated Successfully!!";
        }
        else{
        return "Operation failed";
    }
    }
    function delete ($id){
        $device = device::find($id);
        $device->delete();
    }
    function search($name){
        return device::where("name", "like", "%".$name."%")->get();
    }
}
