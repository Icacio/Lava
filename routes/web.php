<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Post;

Route::get('/', function () {
	App::setLocale('es');
	$posts = Post::all();
	if (request('search')) {
		$posts->where('contenido','like','%' . request('search') . '%')-orWhere('titulo','like','%' . request('search') . '%');
	}
    return view('welcome',['posts' => $posts]);
});

Route::get('/trendpost', function () {
	$post = Post::all()->first();
	return view('post',['titulo'=>$post->titulo, 'post'=>$post->contenido]);
});

Route::get('post/{id}', function($id) {
	$a = Post::find($id);
	return view ('post',['titulo'=>$a->titulo,'post'=>$a->contenido]);
});

Route::get('register',[UserController::class,'view'])->middleware('guest');

Route::get('login',function () {
	return view('login');
})->middleware('guest');

Route::get('logout',[UserController::class,'logout']);

Route::post('register',[UserController::class,'createUser'])->middleware('guest');
Route::post('login',[UserController::class,'access'])->middleware('guest');
