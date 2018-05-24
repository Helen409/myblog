@extends('admin.layouts.my_app_admin')
@section('content')
<div class="container">
	<?php $title='Редактирование категории';
		  $parent='Главная администратора';
		  $active='Категории';
	?>
	@include('admin.components.my_breadcrumbs')
	
	<form class="form-gorizontal" action="{{route('admin.admin.category.update',$category)}}" method="post">
		<input type="hidden" name="_method" value="put">
		{{csrf_field()}}
		@include('admin.categories.partials.form')
	</form>
</div>

@endsection