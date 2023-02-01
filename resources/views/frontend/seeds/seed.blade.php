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
                     @if($s->quantity !=0)
                           <a href="{{route('add_to_cart', $s->id)}}">
                               <button type="button" class="btn btn-success mt-3">Add to Cart</button>
                           </a>
                       @else
                         <div class="badge bg-white text-wrap text-danger">OUT Of Stock</div>
                     @endif
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
                                    <a class="text-white" data-bs-toggle="collapse" href="#ratings" role="button"
                                       aria-expanded="false" aria-controls="ratings">
                                        Add Rating
                                    </a>
                                </div>

                                <div class="mt-2 col-md-8 col-12 collapse" id="ratings">
                                    <form action="{{route('rate', $s->id)}}" method="POST" class="form">
                                        @csrf
                                        <div class="mb-3 col-6 mx-auto">
                                            <input type="number" min="1" max="5" name="review_score"
                                                   class="form-control bg-white">
                                        </div>
                                        <button type="submit" class="btn btn-white text-white">Rate</button>
                                    </form>
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
                <hr>
                <div class="row">
                    <div class="col-6 text-start">
                        <p>Comments</p>
                    </div>
                    <div class="col-6 text-end">
                        <p> <span><i class="fa-solid fa-comment"></i></span> {{$totalComments}}</p>
                    </div>
                    <div>
                        <a class="btn btn-dark" data-bs-toggle="collapse" href="#comments" role="button"
                           aria-expanded="false" aria-controls="comments">
                            Add Comment
                        </a>
                    </div>

                    <div class="mt-2 col-md-8 col-12 collapse" id="comments">
                        <form action="{{route('comment', $s->id)}}" method="POST" class="form">
                            @csrf
                            <div class="mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control" id="comment" rows="1" name="comment"></textarea>
                                @if ($errors->has('comment'))
                                    <span class="text-danger text-left">{{ $errors->first('comment') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row" >
                      @foreach($comments as $comment)
                        <div class="col-md-8 col-12 mx-auto my-2">
                           <div class="card">
                               <div class="card-header">
                                   <div class="row">
                                       <div class="col-6 text-start">
                                           {{$comment->users->name}} {{$comment->users->surname}}
                                       </div>
                                       <div class="col-6 text-end">
                                           {{Carbon\Carbon::parse($comment->created_at)->format('d/m/Y')}}
                                       </div>
                                   </div>
                               </div>
                               <div class="card-body">
                                   <p class="card-text">{{$comment->comment}}</p>
                               </div>
                           </div>
                        </div>
                      @endforeach
                        <div class="row">
                            <div class="col-6 mx-auto my-2">
                                {{ $comments->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

