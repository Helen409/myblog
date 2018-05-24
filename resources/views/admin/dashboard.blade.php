@extends('admin.layouts.my_app_admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="jumbotron">
				<p><span class="label label-primary">Категорий {{$count_categories}} </span></p>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="jumbotron">
				<p><span class="label label-primary">Постов {{$count_articles}}</span></p>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="jumbotron">
				<p><span class="label label-primary">Теги {{$count_tags}}</span></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<a class="btn btn-block btn-default" href="{{route('admin.admin.category.create')}}">Добавить новую категорию</a>
			@foreach ($categories as $category)
			<a class="list-group-item" href="{{route('admin.admin.category.edit',$category)}}">
				<h4 class="list-group-item-heading">{{$category->name}} </h4>
				<!--<p class="list-group-item-text">{{$category->articles()->count()}} </p>-->
			</a>
			@endforeach
		</div>
		<div class="col-sm-4">
			<a class="btn btn-block btn-default" href="{{route('admin.admin.tag.create')}}">Добавить новый тег</a>
			@foreach ($tags as $tag)
			<a class="list-group-item" href="{{route('admin.admin.tag.edit',$category)}}">
				<h4 class="list-group-item-heading">{{$tag->name}} </h4>
				<!--<p class="list-group-item-text">{{$category->articles()->count()}} </p>-->
			</a>
			@endforeach
		</div>
		<div class="col-sm-4">
			<a class="btn btn-block btn-default" href=""{{route('admin.admin.article.create')}}"">Добавить новый пост</a>
			@foreach ($articles as $article)
			<a class="list-group-item" href="{{route('admin.admin.article.edit',$article)}}">
				<h4 class="list-group-item-heading">{{$article->name}} </h4>
				<p>Дата создания:&nbsp{{$article->created_at->format('d.m.Y')}}</p>
				<p class="list-group-item-text">
					{{$article->categories->name}} </p>
			</a>
			@endforeach
		</div>
	</div>

@endsection