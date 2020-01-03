<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>products.index</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right prod_listing">
                @auth
                <a href="{{ url('/home') }}">Home</a> @else
                <a href="{{ route('login') }}">Login</a> @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a> @endif @endauth
            </div>
        @endif

        <div class="columns is-mobile is-centered">
            <div class="column is-half">
                <div class="content">
                    <div class="title is-vcentered">
                        <br/> <br/>
                        <br/> Lista de Produtos Cadastrados Atualmente </div>

                    <div class="prod_listing">
                        <table style="width:100%">
                            <tr>
                                <th><b>Nome</b></th>
                                <td><b>ID</b></td>
                                <td><b>Preço</b></td>
                                <td><b>Quantidade</b></td>
                                <td><b>Ações</b></td>
                                <br>
                            </tr>
                            @foreach($products as $key => $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <!-- <td> <a href="products/{product}/edit"> <i class="fa3 fa-pencil has-text-grey"></i> </a> <i class="fa3 fa-trash has-text-danger modal-button" onClick="askDeleteItem({{$data->id}})" data-target="#deleteModal" aria-haspopup="true"></i> </td> -->
                                    <td>
                                        <form action="{{route('products.destroy', $data->id)}}" method="POST">
                                            @method('DELETE') @csrf
                                            <button class="fa3 fa-trash has-text-danger is-small" data-target="#deleteModal" aria-haspopup="true"></button>
                                            <a href="{{route('products.edit',['product' => $data->id])}}" class="fa3 fa-pencil modal-button" </a>
                                        </form>
                                    </td>
                                    <br>
                                </tr>
                            @endforeach
                    </div>
                    </table>
                    <a href="{{ route('products.create') }}" class="button is-success">
                        <span class="icon is-medium"> </span>
                        <span>Criar novo produto</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        @font-face {
            font-family: 'fontawesome3';
            src: url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        .fa3 {
            display: inline-block;
            font: normal normal normal 18px/1 fontawesome3;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            padding-left: 6px;
            padding-right: 6px;
            cursor: pointer
        }
    </style>
</body>
</html>