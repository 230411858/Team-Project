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

        $discount_items = Product::where('discount', '>', 0)->limit(6)->get();

        return view('products.index', ['products' => $products, 'images' => $images, 'discount_items' => $discount_items]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $images = ProductImage::where('product', $id)->get();

        $reviews = Review::where('product', $id)->get();

        return view('products.show', ['product' => $product, 'images' => $images, 'reviews' => $reviews]);
    }

    public function category($category, $sub_category = null)
    {
        if (in_array($category, ['mice', 'keyboards', 'monitors', 'audio'])) {
            $products = Product::where('category', $category)->get();

            $images = ProductImage::all();

            $sub_categories = ['wired', 'wireless', 'gaming', 'ergonomic', 'stylus', 'mechanical', 'membrane', '144hz', '240hz'];

            if (!in_array($sub_category, $sub_categories))
            {
                $sub_category = null;
            }

            return view('products.category', ['products' => $products, 'images' => $images, 'category' => $category, 'sub_category' => $sub_category]);
        } else {
            abort(404);
        }
    }

    public function deals()
    {
        $discount_items = Product::where('discount', '>', 0)->get();

        return view('deals', ['discount_items' => $discount_items]);
    }

    public function addBasketItem($product, $quantity = 1)
    {
        $old_basket_item = BasketItem::firstWhere([ ['user', '=', Auth::id()], ['product', '=', $product] ]);

        if ($old_basket_item == null) {
            $basket_item = new BasketItem();

            $basket_item->user = Auth::id();

            $basket_item->product = $product;

            $basket_item->quantity += $quantity;

            if ($basket_item->quantity < 1) {
                $basket_item->quantity = 1;
            } elseif ($basket_item->quantity > 99) {
                $basket_item->quantity = 99;
            }

            $basket_item->save();
        }
        else
        {
            $old_basket_item->quantity = $old_basket_item->quantity + $quantity;

            if ($old_basket_item->quantity < 1) {
                $old_basket_item->quantity = 1;
            } elseif ($old_basket_item->quantity > 99) {
                $old_basket_item->quantity = 99;
            }

            $old_basket_item->save();
        }

        return back();
    }

    public function reduceBasketItem($product, $quantity = -1)
    {
        $this->addBasketItem($product, $quantity);

        return back();
    }

    public function removeBasketItem($id)
    {
        $basket_item = BasketItem::firstWhere('id', $id);
        if ($basket_item != null && Auth::id() === $basket_item->user) {
            BasketItem::destroy($id);
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

    public function saveOrder(Request $request)
    {
        $basket_items = BasketItem::where('user', Auth::id())->get();

        if ($basket_items->first() == null)
        {
            abort(403); 
        }

        $order = new Order();

        $order->user = Auth::id();

        $order->email = $request->email;

        $order->first_name = $request->first_name;

        $order->last_name = $request->last_name;

        $order->address_line_1 = $request->address_line_1;

        $order->address_line_2 = $request->address_line_2;

        $order->city = $request->city;

        $order->country = $request->country;

        $order->postcode = $request->postcode;

        $order->phone_number = $request->phone_number;

        $order->shipping_method = $request->shipping_method;

        if ($order->shipping_method == null)
        {
            $order->shipping_method = 'standard';
        }

        $order->save();

        foreach ($basket_items as $basket_item) {
            $order_item = new OrderItem();

            $order_item->oid = $order->id;

            $order_item->product = $basket_item->product;

            $order_item->quantity = $basket_item->quantity;

            $product = Product::firstWhere('id', $order_item->product);

            $order_item->discount = $product->discount;

            $order_item->save();

            $product->stock = $product->stock - $order_item->quantity;

            $product->save();

            BasketItem::destroy($basket_item->id);
        }

        return response()->json([]);
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

        // Search products with name or description and retrieve the main image
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

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

    public function edit($id)
    {
        if (!Auth::user()->account_type == 'admin')
        {
            abort(403);
        }  

        return view('edit', ['id' => $id]);

    }
}
