<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


class InventoryController extends Controller
{
// Show Inventory List
public function index()
{
if (auth()->user()->account_type !== 'admin') {
return redirect('/')->with('error', 'Unauthorized access');
}

$products = Product::all();
return view('admin.inventory.index', compact('products'));
}

// Show Edit Form
public function edit($id)
{
$product = Product::findOrFail($id);
return view('admin.inventory.edit', compact('product'));
}

// Update Product
public function update(Request $request, $id)
{
$request->validate([
'name' => 'required|string|max:255',
'price' => 'required|numeric|min:0',
'stock' => 'required|integer|min:0',
]);

$product = Product::findOrFail($id);
$product->update([
'name' => $request->input('name'),
'price' => $request->input('price'),
'stock' => $request->input('stock'),
]);

return redirect()->route('admin.inventory.index')->with('success', 'Product updated successfully!');
}

// Delete Product
public function destroy($id)
{
$product = Product::findOrFail($id);
$product->delete();

return redirect()->route('admin.inventory.index')->with('success', 'Product deleted successfully!');
}
}
