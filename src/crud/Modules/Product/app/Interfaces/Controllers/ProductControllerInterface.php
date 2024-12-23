<?php

namespace Modules\Product\Interfaces\Controllers;

use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;

interface ProductControllerInterface {

    public function index();

    public function store(ProductRequest $request);

    public function update(ProductRequest $request, $id);

    public function destroy($id);
}