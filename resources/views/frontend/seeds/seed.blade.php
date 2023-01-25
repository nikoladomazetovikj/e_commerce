@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid my-5">
    <div class="container">
        <div class="row">
            @foreach($seed as $s)
            <div class="col-md-6">
                <img src="{{asset('images/' . $s->image)}}">
            </div>
            <div class="col-md-6">
                <h3>{{$s->name}}</h3>
                <p>{{$s->category->friendly_name}}</p>
                {!! $s->description !!}
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
