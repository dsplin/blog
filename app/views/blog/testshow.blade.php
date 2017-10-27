@section('content')
@include('partial.header')
<div class="welcome">
	<h1><center>Мій блог. </center></h1>
	<hr><br>
	<h2>{{$artical->title}}</h2><br><br>
	{{$artical->content}}<br>
	<br>

	@foreach (Coment::all() as $coment)
		@if ($id==$coment->post_id)
			<div class="coment">
				<p>{{$coment->coment}}</p>
			</div>
		@endif
	@endforeach
	<br>


		<center>
			<form method="post" action="{{URL::route('testform')}}">
				<input name="route" type="text" value="{{$id}}" hidden="true"/>
				<input class="text_top_input_submit" type="submit" name="submit" value="Додати коментар" />
			</form>
		</center>

	<h4><p class="avtor">Автор: - {{$avtor}}</p></h4>
	@if($id==$id_coment)
		<p>Загальна кількість коментарів: {{$count_coments}}</p>
	@endif
	<br>

	@foreach (Blog::all() as $blog)

	@endforeach
</div>
@stop
