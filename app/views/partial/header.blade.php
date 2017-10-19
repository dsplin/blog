<header>
   User:
    @if (Auth::check())
        {{Auth::user()->login}}
        <a href="logout">Вихід</a>
        <a href="add_post">Новий пост</a><br>
        Загальна кількість коментарів: {{$count_coments_user}}
    @else
        Гість
        <a href="login">Вхід</a>
    @endif
</header>