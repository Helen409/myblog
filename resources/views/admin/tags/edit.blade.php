@extends('admin.layouts.my_app_admin')
@section('content')
<div class="container">
	<?php $title='Редактирование тега';
		  $parent='Главная администратора';
		  $active='Теги';
	?>
	@include('admin.components.my_breadcrumbs')
	
	<form class="form-gorizontal" action="{{route('admin.admin.tag.update',$tag)}}" method="post">
		<input type="hidden" name="_method" value="put">
		{{csrf_field()}}
		@include('admin.tags.partials.form')
	</form>
</div>

@endsection