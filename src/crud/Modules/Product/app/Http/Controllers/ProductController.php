<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;
use Modules\Product\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Modules\Product\Interfaces\Controllers\ProductControllerInterface;
use Modules\Product\Enums\StatusProduct;

class ProductController extends Controller implements ProductControllerInterface
{
    public function index()
    {
        $product = Product::select('id', 'name', 'description', 'price')->get();

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        $validated['status'] = StatusProduct::fromLabel($validated['status'])->value;

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'message' =>'Produto cadastrado com sucesso.',
            'data' => $product,
        ],200);
        
    }

    public function update(ProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);

        $validated = $request->validated();

        $validated['status'] = StatusProduct::fromLabel($validated['status'])->value;

        $product->update($validated);

        return response()->json([
            'success' => true,
            'message' =>'Produto alterado com sucesso.',
            'data' => $product,
        ],200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'success' => true,
            'message' =>'Produto deletado com sucesso.',
            'data' => null,
        ],200);
    }
}
