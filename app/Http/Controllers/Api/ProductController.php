<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $Products =  ProductResource::collection(Product::all());
        return $this->apiresponse($Products, "ok", 200);
    }
    public function show($id)
    {
        $Products = Product::find($id);
        if ($Products) {
            return $this->apiresponse(new ProductResource($Products), "ok", 200);
        } else {
            return $this->apiresponse("product not found", "error", 404);
        }
    }
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiresponse(null, $validator->errors(), 400);
        }

        $Products = Product::create($req->all());
        if ($Products) {
            return $this->apiresponse(new ProductResource($Products), "ok", 201);
        } else {
            return $this->apiresponse('null', "product not created", 400);
        }
    }

    public function update(Request $req, $id)
    {

        $validator = Validator::make($req->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiresponse(null, $validator->errors(), 400);
        }

        $Products = Product::find($id); if (! $Products) {
            return $this->apiresponse('null', "product not updated", 400);
        }
        $Products->update($req->all());

        if ($Products) {
            return $this->apiresponse(new ProductResource($Products), "product was updated", 201);
        }
    }
}
