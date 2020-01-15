<?php

namespace App\Observers;

use App\Jobs\NotifyNewProduct;
use App\Jobs\SendMailJob;
use App\Product;

class ProductObserver
{
    public function created(Product $product)
    {
//        dd($product);
        NotifyNewProduct::dispatch($product);
    }

    public function updated(Product $product)
    {
        SendMailJob::dispatch($product);
    }

}
