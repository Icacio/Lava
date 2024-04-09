<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    
	public function createUser() {
		$a = request()->validate([
			'name' => 'required|min:5|max:25',
			'email' => 'required|unique:users|email',
			'password' => 'required|min:5|max:25',
		]);
		User::create($a);
		session()->flash('success','El usuario ha sido creado.');
		return redirect('/login');
	}

	public function access() {
		if (auth()->attempt(request()->validate(['email' => 'required|exists:users,email','password' => 'required']))) {
			return redirect('/')->with('succes',"Bienvenido!");
		}
		return back()->withErrors(['email'=>"Los datos introducidos son incorrectos"]);
	}

	public function logout() {
		auth()->logout();
		session()->flash('success','Hasta pronto');
		return redirect('/');
	}
}
