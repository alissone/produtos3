<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create process
     *
     * @runInSeparateProcess
     * @return               void
     */
    public function testCategoryCreate()
    {
        $category = factory(Category::class)->create();
        $this->assertDatabaseHas(
            'categories',
            ['name' => $category->name,]
        );
    }

    /**
     * Read Test
     *
     * @runInSeparateProcess
     * @return               void
     */
    public function testCategoryRead()
    {
        $category = factory(Category::class, 10)->create();
        $this->assertTrue($category->count() == 10);
    }

    /**
     * Update Test
     *
     * @runInSeparateProcess
     * @return               void
     */
    public function testCategoryUpdate()
    {
        $category = factory(Category::class)->create();
        $category->update(
            [
            'name' => 'Nome do produto',
            ]
        );

        $this->assertDatabaseHas(
            'categories',
            ['name' => 'Nome do produto',]
        );
    }
}


