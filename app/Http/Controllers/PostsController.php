<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller {
    function newPost() {
		$a = request()->validate([
			'titulo'=>'required|min:5|max:30',
			'contenido'=>'required|min:5|max:5000'
		]);
		$post['titulo'] = $a['titulo'];
		$post['contenido'] = $a['contenido'];
		$post['user_id'] = auth()->user()->id;
		$newPost = Post::create($post);
		session()->flash('success','El post ha sido publicado correctamente.');
		return redirect('/post/'.$newPost->id);
	}

	function showPosts() {
		$author = auth()->user()->id;
		$posts = Post::where('user_id',$author)->get();
		return view('welcome',['posts'=>$posts]);
	}

}
