@extends('layouts.app')

@section('content')
<div class="container main">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">   
            <div class="panel-heading"><h3>Добро пожаловать в блог Chammy!</h3></div>
            @if (Auth::guest())
            @else
            @include('layouts.panelka')
            @endif
            </div>
        </div>
      </div>
    <div class="row articles-row">
        <div class="col-md-10 col-md-offset-1">
           <h1>Контакты</h1>
           <p>Мой телефон: 097 929 0876, Сакович Елена</p>
           <p>Отправьте мне сообщение</p>
           @if (count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
           <?php echo Form::open(['route' => 'mailSend'],['class'=>'form-horizontal']); 
            echo Form::label('name', 'Ваше имя');echo Form::text('name','',['class'=>'form-control']);
            echo Form::label('email', 'Ваш email');echo Form::text('email', '',['class'=>'form-control']);
            echo Form::label('phone', 'Ваш телефон в формате +38(xxx)-xxx-xx-xx');echo Form::text('phone', '',['class'=>'form-control']);
             echo Form::label('message', 'Ваше сообщение');echo Form::textarea('message', '',['class'=>'form-control']);?>
            <div class="g-recaptcha" data-sitekey="6LfX91wUAAAAAOd3Z_Yey8wMaU-qtc7CyLoDhFf_"></div>
             <?php echo Form::submit('Отправить сообщение',['class'=>'btn']);
             echo Form::close(); 
            ?>
              
              
              
        </div>
    </div>
</div>
@endsection
