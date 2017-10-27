@section('content')
    <form method="post" action="{{URL::route('add_post')}}">
        <input type="hidden" value={{csrf_token()}} name="_token" />
        <label class="text_top_label">Заголовок:</label><br>
        <input class="text_top_input" name="title" type="text" size="15" maxlength="15" required />
        <br><br>
        <label class="text_top_label" >Ваша стаття:</label><br>
        <textarea rows="10" cols="45" name="content" required></textarea> <br> <br>
        <input class="text_top_input_submit" type="submit" name="submit" value="Додати" />
    </form>
    <br>
    @if (Session::has('error'))
        {{Session::get('error')}}
    @endif
@stop