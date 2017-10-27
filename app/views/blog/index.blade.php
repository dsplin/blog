@section('content')
@include('partial.header')
<div class="welcome">
	<h1><center>Мій блог. </center></h1>
	<hr><br>
	@foreach (Blog::latest()->get() as $blog)
		<h3>{{$blog->title}}</h3>
		<p>{{$blog->content}}</p>
		<br>
		@include('partial.coment')
		<br>
		@include('partial.add_coment')
	@endforeach
</div>
@stop
