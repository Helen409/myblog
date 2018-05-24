@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Добро пожаловать в блог Chammy!</div>
                
                <a class="btn btn-primary" href="{{route('admin.index')}}">В административную панель</a>

                <div class="panel-body">
                    Вы вошли как  {{ Auth::user()->name }}
                    Роль -  {{ Auth::user()->role }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
