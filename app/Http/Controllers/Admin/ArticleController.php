<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.articles.index',[
        'articles'=>Article::orderBy('created_at','desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.articles.create',[
            'article' =>[],
            'categories'=>Category::all(),
            'tags'=>Tag::all() 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $article=Article::create($request->all());

      /*  if ($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));

        endif;*/

        if ($request->input('tags')):
            $tag->tags()->attach($request->input('tags'));
        endif;
        return redirect()->route('admin.admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        return view('admin.articles.edit',[
            'article'=>$article,
            'categories'=>Category::all(),
            'tags'=>Tag::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
         $article->update($request->except('url'));
        
        /* $article->categories()->detach();

        if ($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));

        endif;*/

        $article->tags()->detach();
        if ($request->input('tags')) :
            $article->tags()->attach($request->input('tags'));
        endif;

        return redirect()->route('admin.admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $article->tags()->detach();
        $article->delete();
        return redirect()->route('admin.admin.article.index');

    }
}
