@extends('admin.layouts.my_app_admin')
@section('content')
	
<h1>Admin</h1>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="jumbotron">
				<p><span class="label label-primary">Категории 0</span></p>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="jumbotron">
				<p><span class="label label-primary">Постов 0</span></p>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="jumbotron">
				<p><span class="label label-primary">Теги 0</span></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<a class="btn btn-block btn-default" href="#">Добавить новую категорию</a>
			<a class="list-group-item" href="#">
				<h4 class="list-group-item-heading">Категория первая</h4>
				<p class="list-group-item-text">Количество категорий:</p>
			</a>
		</div>
		<div class="col-sm-4">
			<a class="btn btn-block btn-default" href="#">Добавить новый тег</a>
			<a class="list-group-item" href="#">
				<h4 class="list-group-item-heading">Тег первый</h4>
				<p class="list-group-item-text">Количество тегов:</p>
			</a>
		</div>
		<div class="col-sm-4">
			<a class="btn btn-block btn-default" href="#">Добавить новый пост</a>
			<a class="list-group-item" href="#">
				<h4 class="list-group-item-heading">Пост первый</h4>
				<p class="list-group-item-text">Количество постов:</p>
			</a>
		</div>
	</div>

@endsection