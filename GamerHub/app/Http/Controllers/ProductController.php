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

use function PHPUnit\Framework\isEmpty;

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
        if (in_array($category, ['mice', 'keyboards', 'monitors', 'speakers', 'microphones'])) {
            $products = Product::where('category', $category)->get();

            $images = ProductImage::all();

            if (!in_array($sub_category, ['wired', 'wireless', 'gaming', 'ergonomic', 'stylus', 'mechanical', 'membrane', '144hz', '240hz', 'condenser', 'dynamic', 'bookshelf', 'soundbar']))
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

        $images = ProductImage::all();

        return view('deals', ['discount_items' => $discount_items, 'images' => $images]);
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
                BasketItem::destroy($basket_item->id);
            } elseif ($basket_item->quantity > 99) {
                $basket_item->quantity = 99;
            }

            $basket_item->save();
        }
        else
        {
            $old_basket_item->quantity = $old_basket_item->quantity + $quantity;

            if ($old_basket_item->quantity < 1) {
                BasketItem::destroy($old_basket_item->id);
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
        $basket_items = BasketItem::where('user', Auth::id())->get();

        $products = Product::all();

        $images = \App\Models\ProductImage::all();

        return view('checkout', ['basket_items' => $basket_items, 'products' => $products, 'images' => $images]);

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

    public function review($id, Request $request)
    {
        $old_review = Review::firstWhere([['user', '=', Auth::id()], ['product', '=', $id]]);

        $rating = $request->rating;

        if ($rating < 0) {$rating = 1;}
        else if ($rating > 5) {$rating = 5;}

        $text = $request->text;

        if (strlen($text) > 1000) {$text = substr($text, 0, 1000);}

        if ($old_review == null) {
            $review = new Review();

            $review->user = Auth::id();

            $review->product = $id;

            $review->rating = $rating;

            $review->text = $text;

            $review->save();
        } else {
            $old_review->rating = $rating;

            $old_review->text = $text;

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

        if ($image == null) {
            $image = 'cover.png';
        }
        return $image->file;
    }

    public function create()
    {
        return view('admin.products.create'); // Show the create product form
    }

    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|in:mice,keyboards,monitors,audio',
            'description' => 'required|string|max:1000',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Create new product
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category, // Save category
            'description' => $request->description

        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('product_images', 'public'); // Store the file in storage/app/public/product_images

                ProductImage::create([
                    'product' => $product->id, // Match column name in DB
                    'file' => $imagePath // Use 'file' instead of 'image_path'
                ]);
            }
        }


        // Redirect back with success message
        return redirect()->route('admin.products.create')->with('success', 'Product added successfully!');
    }


    public function lowStock()
    {
        $lowStockProducts = Product::where('stock', '<', 5)->get();
        return view('admin.low-stock', compact('lowStockProducts'));
    }
}


