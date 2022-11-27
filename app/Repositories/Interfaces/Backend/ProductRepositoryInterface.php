<?php

namespace App\Repositories\Interfaces\Backend;

interface ProductRepositoryInterface
{
    public function all(): array;
    public function find($id): array;
    public function create(array $data): array;
    public function edit($id, array $data): array;
    public function delete($id);
}
