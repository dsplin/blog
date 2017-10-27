@section('content')
	<div class="welcome">
		<form method="post" action="{{URL::route('testadd')}}">
			<input name="route" type="text" value="{{$id}}" hidden="true"/>
			<textarea rows="10" cols="45" name="coment" required></textarea> <br> <br>
			<input class="text_top_input_submit" type="submit" name="submit" value="Додати" />
		</form>
	</div>
@stop
