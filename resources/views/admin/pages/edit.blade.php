@extends('admin.layouts.my_app_admin')
@section('content')
<div class="container">
	<?php $title='Редактирование страницы';
		  $parent='Главная администратора';
		  $active='Страницы';
	?>
	@include('admin.components.my_breadcrumbs')
	
	<form class="form-gorizontal" action="{{route('admin.admin.page.update',$page)}}" method="post">
		<input type="hidden" name="_method" value="put">
		{{csrf_field()}}
		@include('admin.pages.partials.form')
	</form>
</div>

@endsection