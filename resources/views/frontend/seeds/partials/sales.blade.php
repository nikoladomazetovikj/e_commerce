<div class="row mb-5">
    <h4>Sales</h4>
    @foreach($sales as $sale)
        <div class="col-md-4 col-sm-2 my-2">
            <div class="card mb-3 h-100" style="max-width: 540px;">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('images/' . $sale->seed->image)}}" class="img-fluid rounded-start"
                             id="sale-card-img" alt=".
                        ..">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$sale->seed->name}}</h5>
                            <h5 class="card-text text-success"> - {{$sale->sale}} %</h5>
                            <p class="card-text"><small class="text-muted">End on {{\Carbon\Carbon::parse($sale->end)
                            ->format('d-M-Y')}}</small></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer h-50">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-danger text-decoration-line-through"> {{ $sale->seed->price}} $</p>
                        </div>
                        <div class="col-6">
                            <p class="text-success text-end"> {{ $sale->seed->price - ($sale->seed->price *
                            ($sale->sale / 100)
                            )}} $</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
