<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Novo Produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
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

            <h1 class="title">
                Criar um Novo Produto
            </h1>
            <p class="subtitle">
                Cadastro de produto
            </p>

            <br/>

            <div class="columns">
                <div class="column is-half">
                <form id="create_product_form" action="/products" method="POST">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Informações do Produto
                            </p>

                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">



                                <!-- Forms -->

                                <div class="field">
                                    <label class="label">Nome</label>
                                    <div class="control">
                                        <input class="input is-focused" name="name"  type="text" placeholder="Ex. Creme de Leite Piracanjuba">
                                    </div>
                                    <!-- <p class="help">Nome do Produto</p> -->
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
                                        <!-- <button class="button is-fullwidth is-outlined" aria-haspopup="true" aria-controls="dropdown-menu4"> -->
                                        <select id=cCategoria name="category_id">


                                            <!-- <span>Sem Categoria</span> -->
                                            <!-- <span class = "icon is-small">
                                                <i class = "fas fa-angle-down" aria-hidden = "true"></i>
                                            </span> -->
                                        <!-- </button> -->
                                    <!-- </div> -->
                                    <!-- <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                        <div class="dropdown-content"> -->
                                            @foreach($categories as $key => $data)
                                                <option value="{{$data->id}}"><a href="#" class="dropdown-item">{{$data->name}}</a></option>
                                            @endforeach
                                            <!-- <hr class="dropdown-divider"> -->
                                            <!-- <a href="#" class="dropdown-item">Nova Categoria</a> -->
                                            </select>
                                        <!-- </div> -->
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var dropdown = document.querySelector('.dropdown');
                                        dropdown.addEventListener('click', function(event) {
                                            event.stopPropagation();
                                            dropdown.classList.toggle('is-active');
                                        });
                                    });

                                    // var dropdown = document.querySelector('.dropdown');
                                    // for (var i = 0; i < dropdown.options.length; i++) {
                                    //     console.log(dropdown.options[i].text);
                                    //     }

                                </script>


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