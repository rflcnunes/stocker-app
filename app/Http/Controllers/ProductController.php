<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\Backend\ProductRepositoryInterface;

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

        return response()->json([
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $product = $this->productService->create($request->all());

        return response()->json([
            'product' => $product
        ]);
    }
}
