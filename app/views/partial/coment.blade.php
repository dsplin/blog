@foreach (Coment::all() as $coment)
    @if ($blog->id==$coment->post_id)
        <div class="coment">
            <p>{{$coment->coment}}</p>
        </div>
    @endif
@endforeach



