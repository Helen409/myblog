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
           <h1>{{$article->name}} </h1>
    		<p>Создано:&nbsp{{$article->users->name}}</p>
            <p>Категория:&nbsp{{$article->categories->name}}</p>
            <span class="list-group-item-text">Теги: 
                <?php 
                    $total=count($article->tags);
                    $i=0;?>
                @foreach ($article->tags as $article_tag)
                    {{$article_tag->name}}
                    <?php 
                        $i++;?>
                        @if ($i!=$total)
                            ,                        
                        @endif 

                    
                &nbsp </span>
                @endforeach
            <p>{{$article->created_at->format('d.m.Y')}}</p>
            <p>{!!$article->description!!}</p>
            
             <p class="list-group-item-text">Комментарии к посту: </p>
                @foreach ($article->comments as $article_comment)
                <h3>{{$article_comment->name}}</h3>
                <p>Создан:&nbsp{{Auth::user($article_comment->created_by)->name}}</p>
                <p>{{$article_comment->text}}</p>

    @if (Auth::guest()) @else
				@if (Auth::user()->role=="admin")
                	<form onsubmit="if(confirm('Удалить комментарий?')){return true } else{return false}" action ="{{route('admin.admin.comment.destroy',$article_comment)}}" method="post">
						<input type="hidden" name="_method" value="delete">
						{{csrf_field()}}
						<button type="submit" class="btn"><i class="fa fa-trash-o"></i>Удалить комментарий</button>
					</form>
				@endif
   @endif      
                <hr/>
                @endforeach 
@if (Auth::guest()) 
@else 
             <form class="form-horizontal" action="{{route('admin.admin.comment.store')}}" method="post"> 
				{{ csrf_field() }} 

    			<textarea class="form-control" id="text" name="text"></textarea> 
    		    <input type="hidden" name="created_by" value="{{Auth::id()}}"> 
    		    <input type="hidden" name="article_id" value="{{$article->id}}"> 
  				<input class="btn btn-primary" type="submit" value="Добавить комментарий">
          </form> 
@endif  

            <hr/>
        </div>
    </div>
</div>
@endsection
