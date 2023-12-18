<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <title>Document</title>
</head>
<body>
<div class="lang">
    <p class="choose">Choose a language</p>
    <a href="{{ route('locale', 'eu') }}" class="btn btn-primary btn-sm mb-3">Switch to EU</a>
    <a href="{{ route('locale', 'ua') }}" class="btn btn-primary btn-sm mb-3">Switch to UA</a>
    
</div>
    @yield('content')

<style>
    .container{
        margin-top: 150px;
        max-width: 1000px;
    }
    .lang{
        margin: 40px 0 0 20px;
    }
</style>

<script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>