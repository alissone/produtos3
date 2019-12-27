<?php
//
//use Illuminate\Database\Eloquent\Factory;
////use Illuminate\Foundation\Testing\RefreshDatabase;
//
///** @var Factory $factory */
//
////namespace Tests\Feature;
////namespace Tests\Feature\Http\Controllers;
//
//use \App\Product;
//use \Faker\Generator as Faker;
//
////use Tests\TestCase;
//use \PHPUnit\Framework\TestCase;
//
//class ProductTest extends TestCase
//{
////    use RefreshDatabase;
//    /**
//     * A basic feature test example.
//     * @return void
//     */
//
////    protected function loadFactoriesFrom($path)
////    {
////        app(Factory::class)->load($path);
////    }
//
//    public function testProd()
//    {
//        parent::setUp();
//        $factory = factory(\App\Product::class)->make();
////        $factory->save();
//        $factory->define(\App\Product::class, function (Faker $faker) {
//            return [
//                'name' => $faker->name,
//            ];
//        });
//    }
//}

namespace Tests\Unit;

use App\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $this->assertTrue(true);
        $factory = factory(\App\Product::class)->make();
    }
}

