<label for=''>Статус</label>
<select class="form-control" name='published'>
	@if (isset($article->id))
		<option value="0" @if ($article->published==0) selected="" @endif>Не опубликовано</option>
		<option value="1" @if ($article->published==1) selected="" @endif>Опубликовано</option>
	@else
		<option value="0">Не опубликовано</option>
		<option value="1">Опубликовано</option>
	@endif
</select>
<label for="">Заголовок поста</label>
<input type="text" class="form-control" name="name" placeholder="Заголовок поста" value ="{{$article->name or ""}}" required>
<label for="">Полное описание</label>
<textarea class="form-control" name="description">{{$article->description or ""}}</textarea>
<label for="">Краткое описание</label> 
<textarea class="form-control" name="description_short">{{$article->description_short or ""}}</textarea>
<hr/>
<label for="">Категория</label> 
<select class="form-control" name="category_id" > 
  @include('admin.articles.partials.categories', ['categories' => $categories])  
</select> 
<label for="">Теги</label> 
<select class="form-control" name="tags[]" multiple=""> 
  @include('admin.articles.partials.tags', ['tags' => $tags])  
</select> 

<hr/>
<label for=""> Slug (уникальное значение)</label><input type="text" class="form-control" name="url" placeholder="Автоматическая генерация" value ="{{$article->url or ""}}" readonly="">


<hr/>


<hr/>
<input class="btn btn-primary" type="submit" value="Сохранить пост">