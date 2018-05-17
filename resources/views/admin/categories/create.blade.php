@extends('admin.layout.my_app_admin')
@section('content')
<div class="container">
	<form class="form-gorizontal" action="{{route('admin.category.store')}}" method="post">
	{{csrf field()}}	
	</form>
</div>

@endsection