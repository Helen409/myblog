

                <div class="panel-body">
                    <p>Вы вошли как  {{ Auth::user()->name }}({{ Auth::user()->role }})
                    @if (Auth::user()->role=="admin")</p>
                <a class="btn btn-primary" href="{{route('admin.index')}}">
                <p>В административную панель</p></a>
                @endif   
                </div>
