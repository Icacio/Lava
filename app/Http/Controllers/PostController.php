<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
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

	function editPost ($id) {
		$post = Post::find($id);

		if ($post->user_id==auth()->user()->id) {
			$a = request()->validate([
				'titulo'=>'required|min:5|max:30',
				'contenido'=>'required|min:5|max:5000'
			]);
			$post->titulo=$a['titulo'];
			$post->contenido=$a['contenido'];
			$post->save();
			session()->flash('success','El post ha sido modificado correctamente.');
			return redirect("/post/$id");
		} else {
			return redirect('/profile');
		}
	}

	function deletePost() {
		$a = request()->validate(['postId'=>'required']);
		Post::where('id',$a['postId'])->delete();
		session()->flash('success','El post ha sido eliminado correctamente.');
		return redirect("/profile");
	}
}