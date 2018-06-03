<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use App\Page;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //dashboard

public function Dashboard(){
	return view('admin.dashboard',[
		'categories'=>Category::lastCategories(15),//метод Scope
		'tags'=>Tag::lastTags(15),
		'articles'=>Article::lastArticles(15),//метод Scope
		'count_categories'=>Category::count(),
		'count_articles'=>Article::count(),
		'count_tags'=>Tag::count(),
		'pages'=>Page::all(),

	]);
	}
}
