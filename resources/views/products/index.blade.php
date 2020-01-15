<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Produtos Cadastrados</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

 <body>
    <div class="flex-center position-ref full-height">

        @if (Route::has('login'))
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <div class="top-right is-pulled-right prod_listing">
            <ul>
                @auth
                <li><a href="{{ url('/home') }}">Home</a></li> @else
                <li><a href="{{ route('login') }}">Login</a></li> @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Registro</a></li> @endif @endauth
            </div>
            </ul>
        </nav>
        @endif

       @can('viewAny', App\Product::class)
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
                                    @can('edit', App\Product::class)
                                        @can('delete', App\Product::class)
                                            <td><b>Ações</b></td>
                                        @endcan
                                    @endcan
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
                                            @method('DELETE')
                                            @csrf
                                            @can('edit', App\Product::class)
                                                <button class="fa3 fa-trash has-text-danger is-small" data-target="#deleteModal" aria-haspopup="true"></button>
                                            @endcan
                                            @can('delete', App\Product::class)
                                                <a href="{{route('products.edit',['product' => $data->id])}}" class="fa3 fa-pencil modal-button" </a>
                                            @endcan
                                        </form>
                                    </td>
                                    <br>
                                </tr>
                                @endforeach
                        </div>
                        </table>
                        @can('create', App\Product::class)
                            @component('layouts.createbutton')
                            Criar novo produto
                                @slot('link')
                                    {{ route('products.create') }}
                                @endslot
                            @endcomponent
                        @endcan
                    </div>
                </div>
            </div>
        @endcan

        @cannot('viewAny', App\Product::class)
            @component('layouts.alertpage')
            Você precisa estar logado para acessar essa página.
                @slot('link')
                    {{ route('home') }}
                @endslot
            @endcomponent
        @endcannot
    </div>
</body>
@extends('layouts.faicons')
</html>
