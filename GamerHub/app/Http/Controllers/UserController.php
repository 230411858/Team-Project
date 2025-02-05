<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit($id)
    {
        if (Auth::User()->account_type == 'admin')
        {
            return view('edit', ['id' => $id]);
        }   
        else
        {
            abort(403);
        }
    }

    public function save()
    {
        
    }
}
