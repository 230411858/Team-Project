<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\BasketItem;
use Illuminate\Support\Facades\Auth;

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

    public function addBasketItem()
    {
        if (Auth::check())
        {
            $basket_item = new BasketItem();

            $basket_item->user = Auth::id();

            $basket_item->product = request('product');

            $basket_item->quantity = request('quantity');

            $old_basket_item = BasketItem::where([[ 'user', '=', $basket_item->user ], ['product', '=', $basket_item->product]])->first();

            if ($old_basket_item == null)
            {
                $basket_item->save();
            }
            else
            {
                $old_basket_item->quantity = $old_basket_item->quantity + $basket_item->quantity;

                $old_basket_item->save();
            }

            return back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function removeBasketItem()
    {
        if(Auth::id() == request('user'))
        {
            BasketItem::destroy(request('id'));

            return back();
        }
        else
        {
            abort(403);
        }
    }

    public function checkout()
    {
        if (Auth::check())
        {
            $basket = BasketItem::where('user', Auth::id())->get();

            $products = Product::all();

            return view('checkout', ['basket' => $basket, 'products' => $products]);
        }
        else
        {
            return redirect('login');
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        //search with name or desc
        $products = Product::where('name','like','%'.$query.'%')
                            ->orWhere('description','like','%'.$query.'%')
            ->get();

        //return the results to the search
        return view('products.search-results',compact('products','query'));
    }
}
