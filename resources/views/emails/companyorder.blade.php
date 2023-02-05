<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order</title>
    <style>
        .center {
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
        }
    </style>
</head>

<body>
<h1>{{$title}}</h1>

<p>Dear {{$companyName}}, thank you for your order. We appreciate your interest in our products and our work.</p>

<br>

<div style="text-align: center; color: white; background: #2d3748" class="center">
    <h3 style="text-align: center">Order Details:</h3>

    @foreach($seeds as $s)
        <p>{{$s->name}}</p>
        <p>{{$s->category->friendly_name}}</p>
        <img src="{{asset(asset('images/' . $s->image))}}" width="150" height="50">
    @endforeach
    <hr>
    <p>Price: {{$order->total_price}} $</p>

</div>


<hr>
<h3>Estimated Delivery: {{$estimateDelivery}}</h3>

<footer>
    <h3 style="color: darkgreen; text-align: center">Super Seeds &copy; {{\Carbon\Carbon::now()->year}}</h3>
</footer>

</body>

</html>
