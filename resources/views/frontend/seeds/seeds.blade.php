@extends('frontend.layouts.master')

@section('content')
 <div class="container-fluid mb-5">
     <div class="container">
         <div class="row">
             <div class="col-3">
                 <div class="row">
                     <div class="col-12">
                             <h5 class="">Categories</h5>
                             <form action="" id="category">
                                 <div class="col-lg-4" id="menu">
                                     <input type="radio" class="btn-check" id="all" autocomplete="off" name="category" value="all">
                                     <label class="font-size-skills btn-block m-1 btn btn-outline-success rounded text-wrap filter-width p-1" for="all">All</label>
                                     @foreach($categories as $category)
                                         <input type="radio" class="btn-check category" id="#{{$category->id}}"
                                                autocomplete="off" name="category" value="{{$category->id}}">
                                         <label class=" btn-block m-1 btn btn-outline-success text-wrap rounded p-1
                                    text-white"
                                                for="#{{$category->id}}">{{$category->friendly_name}}</label>
                                     @endforeach
                                 </div>
                             </form>
                     </div>
                 </div>
             </div>
             <div class="col-9 border border-top-0 border-end-0 border-bottom-0">
                <div class="row" id="products">

                </div>
                 <div class="row">
                     <div class="container-fluid">
                         <div class="container mt-5">
                             <div class="row">
                                 <div class="col-lg-6 offset-lg-6 col-md-8 offset-md-3 col-12">
                                     <div class="col-12 " id="pagination">

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"> </script>
    <script src="{{asset('js/filters.js')}}"></script>
@endsection
