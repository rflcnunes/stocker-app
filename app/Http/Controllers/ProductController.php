<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\Backend\ProductRepositoryInterface;
use Inertia\Inertia;

class ProductController extends Controller
{
    private $productService;

    public function __construct (ProductRepositoryInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProductsOrderByDesc();

        return Inertia::render('Products/Index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function edit($id)
    {
        $product = $this->productService->find($id);

        return Inertia::render('Products/Edit', [
            'product' => $product
        ]);
    }
}
