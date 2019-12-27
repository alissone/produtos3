<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

// https://stackoverflow.com/questions/55000360/phpunit-test-cant-find-factory
class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @runInSeparateProcess
     *
     * @return void
     */

    public function testCategory()
    {
        parent::setUp();

        $this->category = factory(Category::class)->create();
        $this->assertDatabaseHas('categories', [
            'name' => $this->category->name,
        ]);
    }
}


