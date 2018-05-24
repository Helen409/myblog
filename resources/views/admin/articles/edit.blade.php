@extends('admin.layouts.my_app_admin') 
 
@section('content') 
 
<div class="container"> 
 <?php $title='Редактирование категории';
      $parent='Главная администратора';
      $active='Категории';
  ?>
  @include('admin.components.my_breadcrumbs')
 
  <hr /> 
 
  <form class="form-horizontal" action="{{route('admin.admin.article.update', $article)}}" method="post"> 
    <input type="hidden" name="_method" value="put"> 
    {{ csrf_field() }} 
 
    {{-- Form include --}} 
    @include('admin.articles.partials.form') 
 
    <input type="hidden" name="modified_by" value="{{Auth::id()}}"> 
  </form> 
</div> 
 
@endsection 