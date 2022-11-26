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

    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    public function create(array $data): array
    {
        $product = $this->model->create($data);

        return $product->toArray();
    }
}
