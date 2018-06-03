@extends('admin.layouts.my_app_admin')
@section('content')
<div class="container">
	<?php $title='Создание Тега';
		  $parent='Главная администратора';
		  $active='Теги';
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
	<form class="form-gorizontal" action="{{route('admin.admin.tag.store')}}" method="post">
		{{csrf_field()}}
		@include('admin.tags.partials.form')
	</form>
</div>

@endsection