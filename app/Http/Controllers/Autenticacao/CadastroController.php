<?php

namespace App\Http\Controllers\Autenticacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function index() 
    {
        return view('autenticacao.cadastro');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if(auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('urls');
        }
    }
}
