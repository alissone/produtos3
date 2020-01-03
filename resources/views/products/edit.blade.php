<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
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

            <h1 class="title"> Editar produto </h1>
            <p class="subtitle"> Modificar produto #{{$product->id}} </p>
            <br/>

            <div class="columns">
                <div class="column is-half">
                    <form id="create_product_form" action="{{route('products.update',['product' => $product->id])}}" method="POST">
                        @method('PUT') @csrf
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
                                            <input class="input is-focused" name="name" type="text" value="{{$product->name}}">
                                        </div>
                                        <!-- <p class="help">Nome do Produto</p> -->
                                    </div>

                                    <div class="columns">
                                        <div class="column is-half">
                                            <div class="field">
                                                <label class="label">Preço</label>
                                                <div class="control">
                                                    <input class="input" type="text" name="price" value="{{$product->price}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                </div>
                                                <span class="help">(R$)</span>
                                            </div>
                                        </div>

                                        <div class="column is-half">
                                            <div class="field">
                                                <label class="label">Quantidade</label>
                                                <div class="control">
                                                    <input class="input" type="text" name="quantity" value="{{$product->quantity}}" oninput="this.value = this.value.replace(/[^\d]/, '')" />
                                                </div>
                                                <label class="help">(unidade)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <select id=cCategoria name="category_id">
                                        @foreach($categories as $key => $data)
                                            @if ($data->id != old('cCategoria', $product->category->id))
                                                <option selected="selected" value="{{$data->id}}">
                                                    <a href="#" class="dropdown-item">{{$data->name}}</a>
                                                </option>
                                            @else
                                                <option value="{{$data->id}}">
                                                    <a href="#" class="dropdown-item">{{$data->name}}</a>
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
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
</html>