@extends ('admin.layouts.my_app_admin')
@section('content')
<div class="container">
	<h2>Список категорий</h2>
	<ol class="breadcrumb">
		<li><a href="{{route('admin.index')}}">Главная</a></li>
		<li class="active">Категории</li>
	</ol>
	<hr>
	<a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">
		<i class="fa fa-plus-square-o"></i>Создать категорию</a>
		<table class="table table-striped">
			<thead>
				<th>Наименование</th>
				<th>Публикация</th>
				<th class="text-right">Действие</th>
			</thead>
			<tbody>
				@forelse ($categories as $category)
				<tr>
					<td>{{$category->title}}</td>
					<td>{{$category->published}}</td>
					<td>
						<a href="{{route('admin.category.edit',['id'=>$category->id])}}">
							<i class="fa fa-edit"></i></a>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
				</tr>
			@endforelse
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3">
					<ul class="pagination pull-right">
						{{$categories->links()}}
</div>	
@endsection