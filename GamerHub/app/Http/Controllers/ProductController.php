<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $images = ProductImage::all();

        return view('products.index', ['products' => $products, 'images' => $images]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $images = ProductImage::where('product', $id)->get();

        return view('products.show', ['product' => $product, 'images' => $images]);
    }

    public function category($category)
    {
        if (in_array($category, ['mice','keyboards','monitors','audio']))
        {
            $products = Product::where('category', $category)->get();

            $images = ProductImage::all();

        return view('products.category', ['products' => $products, 'images' => $images, 'category' => $category]);
        }
        else
        {
            abort(404);
        }
    }

}
