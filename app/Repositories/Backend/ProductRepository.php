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

    public function find($id): array
    {
        return $this->model->find($id)->toArray();
    }

    public function create(array $data): array
    {
        $product = $this->model->create($data);

        return $product->toArray();
    }

    public function edit($id, array $data): array
    {
        $product = $this->model->find($id);
        $product->update($data);

        return $product->toArray();
    }

    public function delete($id)
    {
        $product = $this->model->find($id);
        $product->delete();

        return true;
    }

    public function getAllProductsOrderByDesc(): array
    {
        return $this->model->orderBy('id', 'desc')->get()->toArray();
    }
}
