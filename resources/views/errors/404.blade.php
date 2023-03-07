<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('/style.css') }}">
    <title>404</title>
</head>
<body>
    <div class="error">
        <h2>Page not Found!</h2>
        <h3><a href="{{route('main')}}">Go back to the homepage</a></h3>
    </div>
</body>
</html>