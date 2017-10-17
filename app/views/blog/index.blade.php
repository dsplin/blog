@section('content')
@include('partial.header')
<div class="welcome">
	<h1><center>My blog.</center></h1>
	@foreach (Blog::all() as $blog)
		<h3>{{$blog->title}}</h3>
		<p>{{$blog->content}}</p>
		<br>
		@if (Session::get('key')==$blog->id)
			<center>
				<form method="post" action="{{URL::route('add_coments_2')}}">
					<textarea rows="10" cols="45" name="content" required></textarea> <br> <br>
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

		<h4><p class="avtor">Autor - {{$blog->login}}</p></h4>
	@endforeach

</div>
@stop
