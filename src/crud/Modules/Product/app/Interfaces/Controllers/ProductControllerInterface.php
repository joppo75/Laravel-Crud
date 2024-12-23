<?php

namespace Modules\Product\Interfaces\Controllers;

use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;
use Illuminate\Http\JsonResponse;

interface ProductControllerInterface {

    public function index(): JsonResponse;

    public function store(ProductRequest $request): JsonResponse;

    public function update(ProductRequest $request, $id): JsonResponse;

    public function destroy($id): JsonResponse;
}