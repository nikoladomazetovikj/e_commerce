<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Sale</title>
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
<h1>New Sale Recommendation</h1>

<p>There is a new sale starting from {{$data['start']}}</p>

<br>

<div style="text-align: center; color: white; background: #2d3748" class="center">
    <h3 style="text-align: center">Seed Details:</h3>
        <p>{{$data['seed']}}</p>
        <p>{{$data['category']}}</p>
        <img src="{{$message->embed('public/images/' . $data['image'])}}" width="150" height="50">
        <p><span style="color: orangered; text-decoration: line-through">{{$data['old_price']}}</span> <span style="color:
        lawngreen">
                -{{$data['sale']}}%</span></p>
    <hr>
    <p>Price: {{$data['total_price']}} $</p>

</div>


<hr>
<h3>Sale ends at: {{$data['end']}}</h3>

<footer>
    <h3 style="color: darkgreen; text-align: center">Super Seeds &copy; {{\Carbon\Carbon::now()->year}}</h3>
</footer>

</body>

</html>
