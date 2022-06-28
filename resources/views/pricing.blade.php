<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/webfonts/inter/inter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
</head>

<body>
    <!-- Main Layout Start -->
    <div class="main-layout card-bg-1">
        <div class="container d-flex flex-column">
            <div class="row no-gutters text-center align-items-center justify-content-center min-vh-100">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="font-weight-bold">Pricing</h1>
                    <div class="row">
                        @if ($pricing->count() > 0)
                            @foreach ($pricing as $pricings)
                                <div class="col-4 py-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ $pricings->pacakge_name }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <h1>${{ $pricings->pacakge_price }} <br> <p>/ @if($pricings->pacakge_valid == "life_time") Life Time @else  {{$pricings->pacakge_valid}} @endif </p></h1>
                                            <p>{{ $pricings->pacakge_description }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{route('front.payforsubscribe',$pricings->id)}}" class="btn btn-primary">Subscribe Now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <br>
                        @endif
                    </div>
                </div>
            </div>

            
        </div>
    </div>
