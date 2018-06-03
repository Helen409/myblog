@extends ('admin.layouts.my_app_admin')
@section('content')
<div class="container main">
	@include('admin.layouts.panelka')
	<?php $title='Список новостей';
		  $parent='Главная администратора';
		  $active='Новости';
	?>
	@include('admin.components.my_breadcrumbs')
	
	<hr>
	<a href="{{route('admin.admin.article.create')}}" class="btn btn-primary pull-right">
		<i class="fa fa-plus-square-o"></i>&nbspСоздать пост</a>
		<table class="table table-striped">
			<thead>
				<th>Наименование</th>
				<th>Содержание поста</th>
				<th>Публикация</th>
				<th class="text-right">Действие</th>
			</thead>
			<tbody>
				@forelse ($articles as $article)
				<tr>
					<td>{{$article->name}}</td>
					<td>{{$article->description_short}}</td>
					<td>{{$article->published}}</td>
					<td>
						<form onsubmit="if(confirm('Удалить?')){return true } else{return false}" action ="{{route('admin.admin.article.destroy',$article)}}" method="post">
							<input type="hidden" name="_method" value="delete">
							{{csrf_field()}}
							<a class="btn btn-default" href="{{route('admin.admin.article.edit',$article)}}">
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
						{{$articles->links()}}
</div>	
@endsection