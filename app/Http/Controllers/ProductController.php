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
        $products = $this->productService->all();

        return Inertia::render('Products/Index', [
            'products' => $products
        ]);
    }
}
