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
                                     <input type="radio" class="btn-check" id="all" autocomplete="off" name="academies" value="all">
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
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <img id="best-sales-img" src="" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text"> </p>
                                        <a href="" class="btn btn-success">Buy
                                            Now</a>
                                    </div>
                                    <div class="col">
                                        <h4 class="text-end text-success"> $</h4>
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
