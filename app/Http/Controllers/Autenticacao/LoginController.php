<?php

namespace App\Http\Controllers\Autenticacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('autenticacao.login');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('urls');
        } 
        else {
            return back()->with('status-login', 'Usuário ou senha inválidos.');
        }
    }    
}
