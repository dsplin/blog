<header>

    User:
    @if (Auth::check())
        {{Auth::user()->login}}

    <div class="menu-gol">
        <a href="/logout">Вихід</a>
        <a class="menu" href="/add_post">Новий пост</a>
        <a href="/testindex">Розгорнутий блог</a><br>
    </div>
    <div>
        @if ($count_coments_user >=0)
            Загальна кількість коментарів: {{$count_coments_user}}
        @endif
    </div>
    @else
        Гість
        <div class="menu-gol">
        <a href="login">Вхід</a>
        </div>
    @endif
</header>