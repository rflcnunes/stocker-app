<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function indexToFrontEnd()
    {
        $products = $this->productService->all();

        return Inertia::render('Products/Index', [
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
