@extends('admin.layouts.my_app_admin')
@section('content')

<div class="container main">
	<div class="row">
		@include('admin.layouts.panelka')
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
		<div class="col-sm-8">
			<h3>Статичные страницы</h3>
			<a href="{{route('admin.admin.page.create')}}" class="btn btn-primary pull-дуае">
				<i class="fa fa-plus-square-o"></i>&nbspСоздать новую страницу</a>
			<table class="table table-striped">
			<thead>
				<th>Наименование</th>
				<th>Содержание поста</th>
				<th>Публикация</th>
				<th class="text-right">Действие</th>
			</thead>
			<tbody>
				@forelse ($pages as $page)
				<tr>
					<td>{{$page->name}}</td>
					<td>{{$page->description}}</td>
					<td>{{$page->published}}</td>
					<td>
						<form onsubmit="if(confirm('Удалить?')){return true } else{return false}" action ="{{route('admin.admin.page.destroy',$page)}}" method="post">
							<input type="hidden" name="_method" value="delete">
							{{csrf_field()}}
							<a class="btn btn-default" href="{{route('admin.admin.page.edit',$page)}}">
								<i class="fa fa-edit"></i>
							</a>
							<button type="submit" class="btn"><i class="fa fa-trash-o"></i> </button>
						</form>
						
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
				</tr>
			@endforelse
		</tbody>
</table>
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
			<a class="btn btn-block btn-default" href="{{route('admin.admin.article.create')}}">Добавить новый пост</a>
			@foreach ($articles as $article)
			<a class="list-group-item" href="{{route('admin.admin.article.edit',$article)}}">
				<h4 class="list-group-item-heading">{{$article->name}} </h4>
				<p>Дата создания:&nbsp{{$article->created_at->format('d.m.Y')}}</p>
				<p class="list-group-item-text">
					{{$article->categories->name}} </p>
				<span class="list-group-item-text">Теги: &nbsp 
				@foreach ($article->tags as $article_tag)
				{{$article_tag->name}},&nbsp </span>
				@endforeach
			</a>
			@endforeach
		</div>
	</div>

@endsection