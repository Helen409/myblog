<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use App\Tag;
use App\User;
use App\Page;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',[
        'articles'=>Article::all(),
        'categories'=>Category::all(),
        'tags'=>Tag::all(),
        'users'=>User::all(),
        'pages'=>Page::all(),
        'message'=>'',
        ]);
    }
}
