@extends('frontend.layouts.master')

@section('content')
   <div class="container-fluid my-5">
       <div class="container">
          @foreach($content as $c)
               <div class="row">
                   <div class="col-md-4">
                       <h3>Get In Touch</h3>
                       <hr>
                       <p class="mt-2"><i class="fa-sharp fa-solid fa-location-dot fa-3px px-3"></i>{{$c->address}}</p>
                       <p class="mt-2"><i class="fa-solid fa-phone fa-3px px-3"></i>{{$c->phone_number}}</p>
                      <p>See More</p>
                       <a href="{{$c->facebook}}" class=""><i class="fa-brands fa-facebook-f fa-2x p-3"></i> </a>
                       <a href="{{$c->instagram}}"><i class="fa-brands fa-instagram fa-2x p-3"></i> </a>
                       <a href="{{$c->twitter}}"><i class="fa-brands fa-twitter fa-2x p-3"></i> </a>
                   </div>
                   <div class="col-md-8 border border-top-0 border-end-0 border-bottom-0">
                       {!! $c->description !!}
                   </div>
               </div>
           @endforeach
       </div>
   </div>
@endsection
