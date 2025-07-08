<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | min:3 | max:50 | unique: users,name',
            'email' => 'required_if:name,John Doe | email',
        ]);
        return $request -> all();
    }
}