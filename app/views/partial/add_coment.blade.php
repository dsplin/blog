@if (Session::get('key')==$blog->id)
    <center>
        <form method="post" action="{{URL::route('add_coments_2')}}">
            <input name="route" type="text" value="{{$blog->id}}" hidden="true"/>
            <textarea rows="10" cols="45" name="coment" required></textarea> <br> <br>
            <input class="text_top_input_submit" type="submit" name="submit" value="Додати" />
        </form>
    </center>
    {{Session::forget('key');}}
@else
    <center>
        <form method="post" action="{{URL::route('add_coments')}}">
            <input name="route" type="text" value="{{$blog->id}}" hidden="true"/>
            <input class="text_top_input_submit" type="submit" name="submit" value="Додати коментар" />
        </form>
    </center>
@endif
<h4><p class="avtor">Автор: - {{$blog->login}}</p></h4>
@if($blog->id==$id_coment)
    <p>Загальна кількість коментарів: {{$count_coments}}</p>
@endif
<br>