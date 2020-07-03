<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>404</title>
</head>
<body class="bg-light">

    <div class="container mx-auto text-center mt-5 pt-5">
        <div class="col-10 mx-auto ">
            <h1>404 page not found </h1>
            <p class="lead">are you lost !</p>
            <button class="btn btn-primary"><a href=" {{route('home')}}" class="text-white">Home</a></button>
        </div>
    </div>
    
</body>
</html>