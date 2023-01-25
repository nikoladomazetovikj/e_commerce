@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid my-5">
    <div class="container">
        <div class="row">
            @foreach($seed as $s)
            <div class="col-md-3">
                <img src="{{asset('images/' . $s->image)}}" class="img-fluid">
               <div class="row">
                   <div class="col-6">
                       <a href="#">
                           <button type="button" class="btn btn-success mt-3">Add to Cart</button>
                       </a>
                   </div>
                   <div class="col-6 mt-3 border border-top-0 border-start-0 border-bottom-0">
                      @if($s->sale != null)
                           <p class="text-success text-end"> {{ $s->price - ($s->price *
                            ($s->sale->sale / 100)
                            )}} $</p>
                           <p class="text-end text-danger text-decoration-line-through">{{$s->price}} $</p>
                       @else
                           <p class="text-end">{{$s->price}} $</p>
                       @endif
                   </div>
               </div>
            </div>
            <div class="col-md-9">
                <h3>{{$s->name}}</h3>
                <p>{{$s->category->friendly_name}}</p>
                <hr>
                {!! $s->description !!}
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
