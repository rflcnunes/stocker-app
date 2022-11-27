<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return response()->json([
            'products' => $products
        ]);
    }

    public function show($id)
    {
        $product = $this->productService->find($id);

        return response()->json([
            'product' => $product
        ]);
    }

    public function store(Request $request)
    {
        $product = $this->productService->create($request->all());

        return response()->json([
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->edit($id, $request->all());

        return response()->json([
            'product' => $product
        ]);
    }

    public function destroy($id)
    {
        $this->productService->delete($id);

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
