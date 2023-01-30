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
                       <a href="{{route('add_to_cart', $s->id)}}">
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
                   <div class="card text-bg-secondary my-3" style="max-width: 18rem;">
                       <div class="card-header">
                           <div class="row">
                               <div class="col-6 text-start">
                                   Ratings
                               </div>
                               <div class="col-6 text-end">
                                   Average: {{$avgRating}}
                               </div>
                           </div>
                       </div>
                       <div class="card-body">
                           <div class="row">
                               <div class="col-3">
                                   <p class="text-start">{{$ratings[5]}}</p>
                               </div>
                               <div class="col-9">
                                   <p class="text-end">
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                   </p>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-3">
                                   <p class="text-start">{{$ratings[4]}}</p>
                               </div>
                               <div class="col-9">
                                   <p class="text-end">
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star "></i>
                                   </p>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-3">
                                   <p class="text-start">{{$ratings[3]}}</p>
                               </div>
                               <div class="col-9">
                                   <p class="text-end">
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star "></i>
                                       <i class="fa-solid fa-star"></i>
                                   </p>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-3">
                                   <p class="text-start">{{$ratings[2]}}</p>
                               </div>
                               <div class="col-9">
                                   <p class="text-end">
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star "></i>
                                       <i class="fa-solid fa-star "></i>
                                       <i class="fa-solid fa-star "></i>
                                   </p>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-3">
                                   <p class="text-start">{{$ratings[1]}}</p>
                               </div>
                               <div class="col-9">
                                   <p class="text-end">
                                       <i class="fa-solid fa-star text-warning"></i>
                                       <i class="fa-solid fa-star"></i>
                                       <i class="fa-solid fa-star "></i>
                                       <i class="fa-solid fa-star "></i>
                                       <i class="fa-solid fa-star "></i>
                                   </p>
                               </div>
                           </div>
                       </div>
                       <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    Total: {{$totalUsersRatings}}
                                </div>
                                <div class="col-6">
                                    Add Rating
                                </div>
                            </div>
                       </div>
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
