@section('content')
@include('partial.header')
<div class="welcome">
	<h1><center>My blog.</center></h1>
	@foreach (Blog::all() as $blog)
		<h3>{{$blog->title}}</h3>
		<p>{{$blog->content}}</p>
		<h4><p class="avtor">Autor - {{$blog->login}}</p></h4>
		<br>
	@endforeach

</div>
@stop
