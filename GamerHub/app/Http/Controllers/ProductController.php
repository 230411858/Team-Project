<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\BasketItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
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

        $reviews = Review::where('product', $id)->get();

        return view('products.show', ['product' => $product, 'images' => $images, 'reviews' => $reviews]);
    }

    public function category($category)
    {
        if (in_array($category, ['mice', 'keyboards', 'monitors', 'audio'])) {
            $products = Product::where('category', $category)->get();

            $images = ProductImage::all();

            return view('products.category', ['products' => $products, 'images' => $images, 'category' => $category]);
        } else {
            abort(404);
        }
    }

    public function deals()
    {
        $discount_items = Product::where('discount', '>', 0)->get();

        return view('deals', ['discount_items' => $discount_items]);
    }

    public function addBasketItem()
    {
        $old_basket_item = BasketItem::firstWhere([['user', '=', Auth::id()], ['product', '=', request('product')]]);

        if ($old_basket_item == null) {
            $basket_item = new BasketItem();

            $basket_item->user = Auth::id();

            $basket_item->product = request('product');

            $basket_item->quantity = request('quantity');

            if ($basket_item->quantity < 1) {
                $basket_item->quantity = 1;
            } elseif ($basket_item->quantity > 99) {
                $basket_item->quantity = 99;
            }

            $basket_item->save();
        }
        else
        {
            $old_basket_item->quantity = $old_basket_item->quantity + request('quantity');

            if ($old_basket_item->quantity < 1) {
                $old_basket_item->quantity = 1;
            } elseif ($old_basket_item->quantity > 99) {
                $old_basket_item->quantity = 99;
            }

            $old_basket_item->save();
        }

        return back();
    }

    public function removeBasketItem()
    {
        $basket_item = BasketItem::firstWhere('id', request('id'));
        if ($basket_item != null && Auth::id() == $basket_item->user) {
            BasketItem::destroy(request('id'));
            return back();
        } else {
            abort(403);
        }
    }

    public function checkout()
    {
        $basket = BasketItem::where('user', Auth::id())->get();

        $products = Product::all();

        return view('checkout', ['basket' => $basket, 'products' => $products]);

        return redirect('login');
    }

    public function saveOrder()
    {
        $order = new Order();

        $order->user = Auth::id();

        $order->save();

        $basket_items = BasketItem::where('user', Auth::id())->get();

        foreach ($basket_items as $basket_item) {
            $order_item = new OrderItem();

            $order_item->oid = $order->id;

            $order_item->product = $basket_item->product;

            $order_item->quantity = $basket_item->quantity;

            $order_item->save();

            $basket_item->delete();
        }

        return back();
    }

    public function review($id)
    {
        $old_review = Review::where([['user', '=', Auth::id()], ['product', '=', $id]])->first();

        if ($old_review == null) {
            $review = new Review();

            $review->user = Auth::id();

            $review->product = $id;

            $review->text = request('review-text');

            $review->save();
        } else {
            $old_review->text = request('review-text');

            $old_review->save();
        }

        return back();
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        //search with name or desc
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        //return the results to the search
        return view('products.search-results', compact('products', 'query'));
    }

    public function getImages($id)
    {
        $images = ProductImage::where('product', $id)->get();

        return $images;
    }

    public static function getCoverImage($id)
    {
        $image = ProductImage::firstWhere('product', $id);

        if ($image == null)
        {
            $image = 'cover.png';
        }

        return $image->file;
    }
}
