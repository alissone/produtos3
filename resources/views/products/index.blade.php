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
                        <br/>
                        <br/>
                        <br/>
                        Lista de Produtos Cadastrados Atualmente
                    </div>

                    <form action="/foo/bar" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>

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
                                    <form action="{{route('products.destroy', $data->id)}}?{{time()}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="fa3 fa-trash has-text-danger is-small" data-target="#deleteModal" aria-haspopup="true"></button>
                                        <a href="{{url('/products/edit', $data->id)}}?{{time()}}" class="fa3 fa-pencil modal-button"</a>
                                    </form>
                                </td>
                                <br>
                            </tr>
                            @endforeach
                    </div>
                    </table>
                    <!-- <a href="{{url('/products/edit', $data->id)}}?{{time()}}" class="is-success"><i class="fa3 fa-pencil modal-button" onClick="askDeleteItem({{$data->id}})"</i></a> -->
                    <a href="{{ url('/products/create') }}" class="button is-success">
                        <span class="icon is-medium"> </span>
                        <span>Criar novo produto</span>
                    </a>
                </div>

            </div>

            <!-- <button class="button is-medium modal-button" data-target="#deleteModal" aria-haspopup="true">Excluir Produto</button> -->

<!-- <div class="modal" id="deleteModal">
  <div class="modal-background"></div>
  <div class="modal-content" style="padding: -20px;">
    <div class="box">
        Tem certeza de que deseja excluir o produto?
        <br/>
        <br/>
        <button class="button is-primary modal-button" data-target="#deleteProduct" aria-haspopup="true" onClick="confirmDeleteItem()">Excluir</button>
        <button class="button is-outline modal-cancel" data-target="#deleteModal" aria-haspopup="true">Cancelar</button>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div> -->

<!-- <script>
    document.querySelectorAll('.modal-button').forEach(function(el) {
        el.addEventListener('click', function() {
        var target = document.querySelector(el.getAttribute('data-target'));

        target.classList.add('is-active');

        target.querySelector('.modal-close').addEventListener('click',   function() {
            target.classList.remove('is-active');
            });
            target.querySelector('.modal-cancel').addEventListener('click',   function() {
            target.classList.remove('is-active');
            });
        });
});
</script> -->

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


<script>
    function askDeleteItem(id){
        // var target = document.querySelector(el.getAttribute('data-target'));
        // target.classList.add('is-active');

        if (confirm('Tem certeza que deseja deletar o item '+id+'?')) {
            confirmDeleteItem(id);
        } else {

        }
    }

    function confirmDeleteItem(id){
        alert(id);
    }

//     $('#edit-modal').on('show.bs.modal', function(e) {

// var $modal = $(this),
//     esseyId = e.relatedTarget.id;

// $.ajax({
//     cache: false,
//     type: 'POST',
//     url: 'backend.php',
//     data: 'EID=' + essayId,
//     success: function(data) {
//         $modal.find('.edit-content').html(data);
//     }
// });
// })

</script>
</body>

</html>