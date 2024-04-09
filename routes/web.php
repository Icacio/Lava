<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Models\Post;

Route::get('/', function () {//home
	if (request('search')) {
		$posts = Post::where('contenido','like','%' . request('search') . '%')->orWhere('titulo','like','%' . request('search') . '%')->get();
	} else {
	    $posts = Post::all();
    }
    return view('welcome',['posts' => $posts]);
});

Route::get('post/{id}', function($id) {//post por id
	$a = Post::find($id);
    if (is_null($a)) {
		abort(404);
		//return view('post',['postId'=>$id,'titulo'=>"Post no encontrado",'post'=>"La dirección no se encuentra en el servidor"]);
    }
	return view ('post',['titulo'=>$a->titulo,'post'=>$a->contenido]);
});

Route::get('/new',function() {
    return view('editor',['titulo'=>null,'post'=>null]);
})->middleware('auth');

Route::post('/edit/{id}',[PostsController::class,'editPost'])->middleware('auth');
Route::get('/edit/{id}',function ($id) {
	$a = Post::find($id);
	if (is_null($a)) {
		abort(404);
	}
	return view('editor',['titulo'=>$a->titulo,'post'=>$a->contenido]);
})->middleware('auth');

Route::post('/new',[PostsController::class,'newPost'])->middleware('auth');

Route::get('profile',[PostsController::class,'showPosts'])->middleware('auth');

Route::post('register',[UsersController::class,'createUser'])->middleware('guest');
Route::get('register',function () {return view('register');})->middleware('guest');

Route::post('login',[UsersController::class,'access'])->middleware('guest');
Route::get('login',function () {return view('login');})->middleware('guest')->name('login');

Route::get('logout',[UsersController::class,'logout']);
