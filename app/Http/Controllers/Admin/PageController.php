<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use App\User;
use App\Page;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //
    public function index($page)
    {
    	return view($page,[
        'articles'=>Article::all(),
        'categories'=>Category::all(),
        'tags'=>Tag::all(),
        'users'=>User::all(),
        'qquery'=>'',
        'pages'=>Page::all(),
        ]);
    }
    public function create()
    {
        //
        return view('admin.pages.create',[
            'page'=>[]
        ]);
    }
    public function edit(Page $page)
        {
        //
            return view('admin.pages.edit',[
             'page'=>$page
            ]);
        }

     public function store(Request $request)
    {
        //
        Page::create($request->all()); 
        return redirect()->route('admin.index');
    }

    public function update(Request $request, Page $page)
    {
        //
        $page->update($request->except('url'));
         return redirect()->route('admin.index');

    }
    public function destroy(Page $page)
    {
        //
        $page->delete();
         return redirect()->route('admin.index');
    }
}
