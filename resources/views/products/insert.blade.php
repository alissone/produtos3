<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Novo Produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <section class="section">
        <div class="container">
            <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/products') }}">Produtos</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Cadastro</a></li>
                </ul>
            </nav>
            <br/>

            @can('create', App\Product::class)
                <h1 class="title"> Criar um Novo Produto </h1>
                <p class="subtitle"> Cadastro de produto </p>
                <br/>

                <div class="columns">
                    <div class="column is-half">
                        <form id="create_product_form" action="/products" method="POST">
                            <div class="card">
                                <header class="card-header">
                                    <p class="card-header-title"> Informações do Produto </p>
                                </header>

                                <div class="card-content">
                                    <div class="content">

                                        <!-- Forms -->
                                        <div class="field">
                                            <label class="label">Nome</label>
                                            <div class="control">
                                                <input class="input is-focused" name="name" type="text" placeholder="Ex. Creme de Leite">
                                            </div>
                                        </div>

                                        <div class="columns">
                                            <div class="column is-half">
                                                <div class="field">
                                                    <label class="label">Preço</label>
                                                    <div class="control">
                                                        <input class="input" type="text" name="price" placeholder="R$ 3.65" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                    </div>
                                                    <span class="help">(R$)</span>
                                                </div>
                                            </div>

                                            <div class="column is-half">
                                                <div class="field">
                                                    <label class="label">Quantidade</label>
                                                    <div class="control">
                                                        <input class="input" type="text" name="quantity" placeholder="2" oninput="this.value = this.value.replace(/[^\d]/, '')" />
                                                    </div>
                                                    <label class="help">(unidade)</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="dropdown is-hoverable">
                                            <div class="dropdown-trigger">
                                                <select id="category_id" name="category_id">
                                                    @foreach($categories as $key => $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <footer class="card-footer">
                                    <a href="{{ url('/products') }}" class="card-footer-item">Cancelar</a>
                                    <a type="send" href="javascript:{}" onclick="document.getElementById('create_product_form').submit(); return false;" class="card-footer-item is-dark">Salvar</a>
                                </footer>
                        </form>
                        </div>
                    </div>
                </div>
            @endcan

            @cannot('create', App\Product::class)
                @component('layouts.alertpage')
                Você precisa estar logado como admnistrador para acessar essa página.
                    @slot('link')
                        {{ route('home') }}
                    @endslot
                @endcomponent
            @endcannot
    </section>
</body>

    <script>
        function validateNumber(evt) {
            var theEvent = evt || window.event;

            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>

@extends('layouts.faicons')
</html>