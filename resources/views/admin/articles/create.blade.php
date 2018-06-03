@extends('admin.layouts.my_app_admin')
@section('content')
<div class="container">
	<?php $title='Создание поста';
		  $parent='Главная администратора';
		  $active='Посты';
	?>
	@include('admin.components.my_breadcrumbs')
	@if (count($errors) > 0)
		  <div class="alert alert-danger">
		    <ul>
		      @foreach ($errors->all() as $error)
		        <li>{{ $error }}</li>
		      @endforeach
		    </ul>
		  </div>
		@endif
	<form class="form-gorizontal" action="{{route('admin.admin.article.store')}}" method="post">
		{{csrf_field()}}
		@include('admin.articles.partials.form')
		<input type="hidden" name="created_by" value="{{Auth::id()}}">
	</form>
</div>

@endsection