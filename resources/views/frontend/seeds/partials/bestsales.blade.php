<div class="container-fluid my-5">
    <div class="container">
        @if($hasSale > 0)
            @include("frontend.seeds.partials.sales")
        @endif

        <h3>Top Picks This Month</h3>
        <hr>
        <div class="row row-cols-1 row-cols-md-3 row-cols-sm-1 g-4">
           @foreach($mostSailedSeedThisMonth as $msm)
                <div class="col">
                    <div class="card">
                        <img id="best-sales-img" src="{{asset('images/'. $msm->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                           <div class="row">
                               <div class="col">
                                   <h5 class="card-title">{{$msm->name}}</h5>
                                   <p class="card-text">{{$msm->friendly_name}}</p>
                                   <a href="#" class="btn btn-success">Buy Now</a>
                               </div>
                               <div class="col">
                                   <h4 class="text-end text-success">{{$msm->price}} $</h4>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
