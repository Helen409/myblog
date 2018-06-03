@extends('layouts.app')

@section('content')
<div class="container main">
    <div class="row ">
    	@include('layouts.panelka')
    </div>
    <div class="row articles-row">
        <div class="col-md-10 col-md-offset-1">
           <h1>Контакты</h1>
           <p>Мой телефон: 097 929 0876, Сакович Елена</p>
           <p>Отправьте мне сообщение</p>
            <form class="form-horizontal" action="{{route('mailSend')}} " method="post"> 
              <!--<input type="hidden" name="_method" value="put"> -->
              
              {{ csrf_field() }} 
              <label for="">Ваше имя</label>
              <input class="form-control" type="text" class="name" name="name" placeholder="Ваше имя" value ="" required>
              <label for="">Ваш телефон</label>
              <input class="form-control" type="text" class="phone" name="phone" placeholder="Ваш телефон" value ="" required>
              <label for="">Ваш email</label>
              <input class="form-control" type="text" class="email" name="email" placeholder="Ваш email имя" value ="" required>
              <label for="">Ваше сообщение</label> 
              <textarea class="form-control" name="message"></textarea> 
              <button type="submit" class="btn">Отправить сообщение</button>
              <a class="btn" href="{{route('mailSend')}}">Отправить 2</a>
        </div>
    </div>
</div>
@endsection
