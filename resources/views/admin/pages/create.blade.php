@extends('admin.layouts.my_app_admin')
@section('content')
<div class="container">
	<?php $title='Создание статичной страницы';
		  $parent='Главная администратора';
		  $active='Страницы';
	?>
	@include('admin.components.my_breadcrumbs')
	
	<form class="form-gorizontal" action="{{route('admin.admin.page.store')}}" method="post">
		{{csrf_field()}}
		@include('admin.pages.partials.form')
	</form>
</div>

@endsection