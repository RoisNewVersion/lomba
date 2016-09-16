<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Validator;
use Alert;

/*untuk auth*/
class AuthCtrl extends Controller
{
    function __construct()
    {
    	// $this->foo = $foo;
    }

    // halaman login
    public function getLogin()
    {
    	return view('auth.login');
    }

    // post login
    public function postLogin(Request $request)
    {
        // dd($request->all());
    	// validasi input
    	$this->validate($request, ['name'=>'required', 'password'=>'required']);
    	// inputan
    	$inputan = ['name'=>$request->input('name'), 'password'=>$request->input('password')];
    	// print_r($request->all());
    	if (Auth::attempt($inputan)) {
    		Alert::success('Berhasil Login', 'Selamat ya!');
    		return redirect()->intended('home');
    	} else {
    		Alert::error('Username atau Password salah', 'Gagal Login');
    		return redirect()->back();
    	}
    	
    }

    // halaman register
    public function getRegister()
    {
    	return view('auth.register');
    }

    // post register
    public function postRegister(Request $request)
    {
    	
    }

    // logout
    public function logout()
    {
        Auth::logout();
        Alert::info('Berhasil Logout', 'Good bye!');
        return redirect()->route('login');   
    }
}
