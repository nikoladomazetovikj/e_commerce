@extends('frontend.layouts.master')

@section('content')
   <div class="container-fluid my-5">
       <div class="container">
           <div class="row">
               <div class="jumbotron">
                   <h1 class="display-4">Oops!</h1>
                   <p class="lead">Seed not found!</p>
                   <hr class="my-4">
                   <p>The seed with that name does not exist</p>
                   <p class="lead">
                       <a class="btn btn-success btn" href="/" role="button">Return to home page</a>
                   </p>
               </div>
           </div>
       </div>
   </div>
@endsection
