<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::post('users', function (Request $request){
//     return $request->all();
// }); 




Route::get('users', function () {
    $users = [
        [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'is_verified' => true,
        ],
        [
            'id' => 2,
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'is_verified' => false,
        ],
    ];
    return response()-> json($users);
});

Route::post('users', function (Request $request){
    request()->validate([
        'name' => 'required | min:3 | max:50',
        'email' => 'required_if:name,John Doe | email',
    ]);

    return $request->all();
}); 

Route::put('users/{id}', function (Request $request, $id){
    return $id;
});