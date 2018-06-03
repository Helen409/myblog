@extends ('admin.layouts.my_app_admin')
@section('content')
<div class="container main">
	@include('admin.layouts.panelka')
	<?php $title='Список категорий';
		  $parent='Главная администратора';
		  $active='Категории';
	?>
	@include('admin.components.my_breadcrumbs')
	
	<hr>
	<a href="{{route('admin.admin.category.create')}}" class="btn btn-primary pull-right">
		<i class="fa fa-plus-square-o"></i>&nbspСоздать категорию</a>
		<table class="table table-striped">
			<thead>
				<th>Наименование</th>
				<th>Публикация</th>
				<th class="text-right">Действие</th>
			</thead>
			<tbody>
				@forelse ($categories as $category)
				<tr>
					<td>{{$category->name}}</td>
					<td>{{$category->published}}</td>
					<td>
						<form onsubmit="if(confirm('Удалить?')){return true } else{return false}" action ="{{route('admin.admin.category.destroy',$category)}}" method="post">
							<input type="hidden" name="_method" value="delete">
							{{csrf_field()}}
							<a class="btn btn-default" href="{{route('admin.admin.category.edit',$category)}}">
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
		<tfoot>
			<tr>
				<td colspan="3">
					<ul class="pagination pull-right">
						{{$categories->links()}}
					</ul>
				</td>
			</tr>
		</tfoot>
</div>	
@endsection