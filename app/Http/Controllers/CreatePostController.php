<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CreatePostController extends Controller
{
    //
    public function create() {
    	return view('posts.create');
    }

    public function store(Request $request) {

    	//$data = request()->all();
        //$post = Post::create([
        //    'title' => $request['title'],
        //    'content'=> $request['content'],
        //]);
    	
    	$post = Post::create($request->all());
    	//dd($post);

    	return $post->title;
    }    
}
