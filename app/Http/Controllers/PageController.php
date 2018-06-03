<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Http\Requests;

class PageController extends Controller
{
    //
    public function index($page)
    {
    	return view($page);
    }


     public function store(Request $request)
    {
        //
        Page::create($request->all()); 
        //return redirect()->route('admin.index');
    }

    public function update(Request $request, Page $page)
    {
        //
        $Page->update($request->All());

         //return redirect()->route('admin.index');

    }
}
