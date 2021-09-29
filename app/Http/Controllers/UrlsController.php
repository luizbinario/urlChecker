<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Url;

class UrlsController extends Controller
{
    public function index() {
        $urls = "";
        
        if(auth()->check()) {
            $urls = Url::where('user_id', '=', auth()->user()->id)->get();
            return view('urls.index', ['user' => auth()->user(), 'urls' => $urls]);
        } else {
            $urls = Url::get();
            return view('urls.index', ['urls' => $urls]);
        }
    }

    public function store(Request $request) {

        $this->validate($request, [
            'url' => 'required|url'
        ]);

        $request->user()->urls()->create([
            'url' => $request->url
        ]);

        return back();
    }

    public function getStatus(Request $request) {
        return view('urls.teste');
    }
}
