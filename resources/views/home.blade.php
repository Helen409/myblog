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
        <div class="col-md-7">
            <h3 style ='color:green;'><?php if (isset($_GET['message']))  echo $_GET['message']; ?></h3>
            <h1 class="center">Все статьи</h1>
            @foreach ($articles as $article)
         <!--   <a class="list-group-item" href=" 
            {{route('admin.admin.article.show', $article)}}                 ">
            <h4 class="list-group-item-heading">{{$article->name}} </h4></a>-->

            <a class="list-group-item article-title" href="             
            {{route('articleSingle',[$article->categories->url,$article->url,$article])}}">
             <h2 class="list-group-item-heading">{{$article->name}} </h2></a>

            <p class="strong">Создано:<span>&nbsp{{$article->users->name}}</span></p>
            <p class="strong">Категория:<span>&nbsp{{$article->categories->name}}</span></p>
            <span class="list-group-item-text strong">Теги: </span>
            <span><?php 
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

            <p class="show-date">{{$article->created_at->format('d.m.Y')}}</p>
            
            <p>{!!str_limit($article->description,2000)!!}</p>
            

            <p>Комментариев к статье:&nbsp{{$article->comments->count()}}
            <hr/>
            @endforeach
             <ul class="pagination pull-right">
                        {{$articles->links()}}
            </ul>
        </div>
        <div class="col-md-4 sidebar">
            <h3>Фильтр</h3>
            <a href="{{ url('/home') }}">Все статьи</a>
            <h3>Категории</h3>
             @foreach ($categories as $category)
              @if ($category->published==1) 
              <a href="{{route('category_filter',$category->id)}}">
             <h4 class="list-group-item-heading">{{$category->name}} </h4></a>
             @endif
            @endforeach
            <h3>Теги</h3>
            @foreach ($tags as $tag)
             @if ($tag->published==1) 
             <a href="{{route('tag_filter',$tag->id)}}">
            <h4 class="list-group-item-heading">{{$tag->name}} </h4></a>
            @endif
            @endforeach

        </div>

    </div>
</div>
@endsection
