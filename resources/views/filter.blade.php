<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/filter.css') }}" rel="stylesheet">
</head>
<body>
    <section>
        <ul>
            <li class="list active" data-filter="all">All</li>
            <li class="list" data-filter="house">House</li>
            <li class="list" data-filter="car">Car</li>
            <li class="list" data-filter="game">Game</li>
        </ul>
        <div class="product">
            <div class="itemBox" data-item="car">
                <h1>CAR SATU</h1>
            </div>
            <div class="itemBox" data-item="car">
                <h1>CAR DUA</h1>
            </div>
            <div class="itemBox" data-item="car">
                <h1>CAR TIGA</h1>
            </div>
            <div class="itemBox" data-item="car">
                <h1>CAR EMPAT</h1>
            </div>
            <div class="itemBox" data-item="car">
                <h1>CAR LIMA</h1>
            </div>
            <div class="itemBox" data-item="game">
                <h1>GAME SATU</h1>
            </div>
            <div class="itemBox" data-item="game">
                <h1>GAME DUA</h1>
            </div>
            <div class="itemBox" data-item="game">
                <h1>HOUSE SATU</h1>
            </div>
            <div class="itemBox" data-item="house">
                <h1>HOUSE DUA</h1>
            </div>
            <div class="itemBox" data-item="house">
                <h1>HOUSE TIGA</h1>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/filter.js')}}"></script>
</body>
</html>