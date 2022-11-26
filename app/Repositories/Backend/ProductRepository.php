<?php

namespace App\Repositories\Backend;

use App\Models\Product;
use App\Repositories\Interfaces\Backend\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }
}
