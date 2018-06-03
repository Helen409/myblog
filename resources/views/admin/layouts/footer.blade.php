<footer>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Панель администратора!</h3></div>
        <div class="panel-body">
            <p>Вы вошли как  {{ Auth::user()->name }}({{ Auth::user()->role }})
        </div>
    </div>
</div>
</footer>