<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

$post = Posts::orderby('created_at','desc')->get();

        return view('home',compact('post'));
    }

    public function dashboard(){
       return redirect()->route('posts.index');
    }
}
