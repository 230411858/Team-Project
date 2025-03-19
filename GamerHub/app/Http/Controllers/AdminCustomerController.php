<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class  AdminCustomerController extends Controller
{
    // Show all customers
    public function index()
    {
        $customers = User::where('account_type', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

    // Show the edit form
    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    // Update customer details
    public function update(Request $request, $id)
    {
        $customer = User::findOrFail($id);
        $customer->update($request->only(['name', 'email']));
        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    // Delete a customer
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }



}
