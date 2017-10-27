@section('content')
@include('partial.header')
<div class="welcome">
	<h1><center>Мій блог. </center></h1>
	<hr>
	<br>
	@foreach (Blog::latest()->get() as $blog)
			<h2>
				<a href="testindex/{{$blog->id}}">{{$blog->title}}</a>
			</h2>
		<br>
	@endforeach
</div>
@stop
