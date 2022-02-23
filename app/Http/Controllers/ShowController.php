<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function show_auth_user (){
        return Auth::user()->name;
    }

    public function check_auth_user (){

       return (Auth::check()?'You are Authenticated!! ': 'You are not Authenticated. ');

}
}
