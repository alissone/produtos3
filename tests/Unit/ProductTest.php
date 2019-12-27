<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


/**
 * https://stackoverflow.com/questions/55000360/phpunit-test-cant-find-factory
 */

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create process
     *
     * @runInSeparateProcess
     * @return               void
     */
    public function testProductCreate()
    {
        $product = factory(Product::class)->create();
        $this->assertDatabaseHas(
            'products',
            [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'category_id' => $product->category_id,
            ]
        );
    }

    /**
     * Read Test
     *
     * @runInSeparateProcess
     * @return               void
     */
    public function testProductRead()
    {
        $product = factory(Product::class, 10)->create();
        $this->assertTrue($product->count() == 10);
    }

    /**
     * Update Test
     *
     * @runInSeparateProcess
     * @return               void
     */
    public function testProductUpdate()
    {
        $product = factory(Product::class)->create();
        $product->update(
            [
            'name' => 'Nome do produto',
            'price' => 1492.99,
            'quantity' => 116,
            'category_id' => 9,
            ]
        );

        $this->assertDatabaseHas(
            'products',
            [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'category_id' => $product->category_id,
            ]
        );
    }
}


