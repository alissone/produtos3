<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lista de Categorias</title>

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
                    <li><a href="{{ url('/home') }}">Início</a></li> @else
                    <li><a href="{{ route('login') }}">Login</a></li> @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Registro</a></li> @endif @endauth
                </div>
            </ul>
        </nav>
        @endif

        @can('isAdmin', App\Category::class)
            <div class="columns is-mobile is-centered">
                <div class="column is-half">

                    <div class="title is-vcentered">
                        <br/>
                        <br/>
                        <br/> Lista de Categorias cadastradas
                    </div>

                    <div class="content">

                        <form action="/foo/bar" method="POST">
                            @method('DELETE') @csrf
                        </form>

                        <div class="cat_listing">
                            <table style="width:100%">
                                <tr>
                                    <th><b>Nome</b></th>
                                    <th><b>Ações</b></th>
                                    <br>
                                </tr>
                                @foreach($categories as $key => $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <!-- <td> <a href="categories/{product}/edit"> <i class="fa3 fa-pencil has-text-grey"></i> </a> <i class="fa3 fa-trash has-text-danger modal-button" onClick="askDeleteItem({{$data->id}})" data-target="#deleteModal" aria-haspopup="true"></i> </td> -->
                                    <td>
                                        <form action="{{route('categories.destroy', $data->id)}}" method="POST">
                                            @method('DELETE') @csrf
                                            <button class="fa3 fa-trash has-text-danger is-small" data-target="#deleteModal" aria-haspopup="true"></button>
                                            <a href="{{route('categories.edit',['category' => $data->id])}}" class="fa3 fa-pencil modal-button" </a>
                                        </form>
                                    </td>
                                    <br>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <a href="{{ route('categories.create') }}" class="button is-success">
                            <i class="icon is-medium fa3 fa-plus" style="padding-top:5px;"></i>
                            <span>Criar nova categoria</span>
                        </a>
                    </div>
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


</body>
@extends('layouts.faicons')
</html>