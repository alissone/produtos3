<?php

namespace Tests\Unit;

use App\Category;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

// https://stackoverflow.com/questions/55000360/phpunit-test-cant-find-factory
class CrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @runInSeparateProcess
     *
     * @return void
     */


    public function testProduct()
    {
        parent::setUp();

        $this->product = factory(Product::class)->create();
        $this->assertDatabaseHas('products', [
            'name' => $this->product->name,
            'price' => $this->product->price,
            'quantity' => $this->product->quantity,
            'category_id' => $this->product->category_id,
        ]);
    }

    public function testCategory()
    {
        parent::setUp();

        $this->category = factory(Category::class)->create();
        $this->assertDatabaseHas('categories', [
            'name' => $this->category->name,
        ]);
    }
}


