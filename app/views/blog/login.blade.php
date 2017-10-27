@section('content')
    <form method="post" action="{{URL::route('login')}}">
        <input type="hidden" value={{csrf_token()}} name="_token" />
        <label class="text_top_label">Ваш логін:</label>
        <input class="text_top_input" name="login" type="text" size="15" maxlength="15" required />
        <label class="text_top_label">Ваш пароль:</label>
        <input class="text_top_input" name="password" type="password" size="15" maxlength="15" required />
        <input class="text_top_input_submit" type="submit" name="submit" value="Вхід" />
    </form>
    <br>
    @if (Session::has('error'))
        {{Session::get('error')}}
    @endif
@stop

