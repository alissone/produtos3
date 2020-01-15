<?php

namespace App\Http\Controllers;

use App\Category;
use App\Jobs\NotifyNewProduct;
use App\Jobs\SendMailJob;
use App\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
//        $products = Product::all();
        $products = Cache::remember('products', 5, function () {
            return Product::all();
        });
        info('listando produtos!');
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        return view('products.insert', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);
        Product::create($request->all());
        info('Criando produto!');
        return (redirect()->route('products.index')->with('message', 'Produto criado!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        Cache::forget($product->id);
        Cache::put($product->id, $product, 5);
        return view('products.edit', ['categories' => Category::all(), 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return (redirect()->route('products.index')->with('message', 'Produto editado!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $apagado = Cache::pull($product->id);
        $product->delete();
        return redirect()->route('products.index')->with('alert-success', 'Produto excluído!');
    }

}
