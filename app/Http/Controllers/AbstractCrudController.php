<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Symfony\Component\Console\Input\Input;

class AbstractCrudController extends Controller
{
    protected $model;

    public function index()
    {
        return $this->model::orderBy('created_at','desc')->paginate();
    }

    public function store()
    {
        $reflection = new \ReflectionClass($this->model);
        $this_fillable = $reflection->newInstanceWithoutConstructor()->getFillable();
        return $this->model->create($this_fillable);
    }

    public function show($id)
    {
        $model = $this->model;
        return $model::findOrFail($id);
    }

    public function edit($id)
    {
        $model = $this->model;
        return $model::findOrFail($id);
    }


    public function update($id)
    {
        $model = $this->model;
        $object = $model::findOrFail($id);
        return $object->update(array_except(Input::all(), static::MODEL_KEY));
    }

    public function destroy($id)
    {
        $model = $this->model;
        return $model::remove($id);
    }
}
