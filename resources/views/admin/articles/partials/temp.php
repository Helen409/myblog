<label for=""> Родительская категория</label><select class="form-control" name="categories[]" >
@include ('admin.articles.partials.categories',['categories'=>$categories])
<label for=""> Родительские теги</label><select class="form-control" name="tags[]" multiple="">
@include ('admin.articles.partials.tags',['tags'=>$tags])

  

 @isset($article->id) 
      @foreach ($article->categories as $category_article) 
        @if ($category->id == $category_article->id) 
          selected="selected" 
        @endif 
      @endforeach 
    @endisset 



  @if (count($category->children) > 0) 
 
    @include('admin.articles.partials.categories', [ 
      'categories' => $category->children, 
      'delimiter'  => ' - ' . $delimiter 
    ]) 
 
  @endif 




  from form
   @include('admin.articles.partials.categories', ['categories' => $categories]) 

   value="{{$article->category_id or ""}}"





  @foreach ($article->tags as $tag_article) 
  @endforeach 