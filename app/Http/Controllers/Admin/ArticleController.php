<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use App\Page;
use App\User;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\support\Str;

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
        //проверка ввода
        $this->validate($request, [
            'name' => 'required|unique:articles|max:255',
            'description' => 'required',
        ]);

        $article=Article::create($request->all());


        if ($request->input('tags')):
            $article->tags()->attach($request->input('tags'));
        endif;

        return redirect()->route('admin.admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        return view('articleSingle',[
            'article'=> $article,
            'category'=>Category::all(),
            'tags'=>Tag::all(),
            'comments'=>Comment::all(),
            'pages'=>Page::all(),
        ]);

    }
     public function show_my($category_url, $article_url, Article $article)
    {
        //
        return view('articleSingle',[
            'article'=> $article,
            'category'=>Category::all(),
            'tags'=>Tag::all(),
            'comments'=>Comment::all(),
            'pages'=>Page::all(),
        ]);

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
            'tags'=>Tag::all(),
            'comments'=>Comment::all(),

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
        $article->comments() ->delete();
        $article->delete();
        return redirect()->route('admin.admin.article.index');
    }
    public function category_filter($category_id){
        return view('home',[
            'articles'=>Article::where('category_id',$category_id)->get(),
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'users'=>User::all(),

            'pages'=>Page::all(),
            'message'=>'',
        ]);
    }
    public function tag_filter($tag_id){
        $arraytagsid=array_column(db::table('article_tag')->where('tag_id','=',$tag_id)->get(), 'article_id');
        return view('home',[
            'articles'=>Article::whereIn('id',$arraytagsid)->get(),
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
            'users'=>User::all(),
            
            'pages'=>Page::all(),
            'message'=>'',
        ]);
    }
}
