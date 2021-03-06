<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
    <section class="section">
        <div class="container">
            <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/categories') }}">Categorias</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Cadastro</a></li>
                </ul>
            </nav>
            <br/>

            <h1 class="title"> Editar categoria </h1>
            <p class="subtitle"> Modificar categoria #{{$category->id}} </p>
            <br/>

            <div class="columns">
                <div class="column is-half">
                    <form id="create_product_form" action="{{route('categories.update',['category' => $category->id])}}" method="POST">
                        @method('PUT') @csrf
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Informações da Categoria
                                </p>

                                </a>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <!-- Forms -->
                                    <div class="field">
                                        <label class="label">Nome</label>
                                        <div class="control">
                                            <input class="input is-focused" name="name" type="text" value="{{$category->name}}">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <footer class="card-footer">
                                <a href="{{ url('/categories') }}" class="card-footer-item">Cancelar</a>

                                <a type="send" href="javascript:{}" onclick="document.getElementById('create_product_form').submit(); return false;" class="card-footer-item is-dark">Salvar</a>
                            </footer>
                    </form>
                    </div>
                </div>
            </div>
    </section>
</body>

<script>
    function validateNumber(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
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



</html>