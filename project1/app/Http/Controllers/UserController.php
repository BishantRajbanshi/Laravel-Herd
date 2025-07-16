<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function index(Request $request){
        //$users=User::all();
        //$users=User::where('name','John')->get();
        $users=User::when($request->name, function($query,$name){
            return $query->where('name',$name);
        })
        ->when($request->email,function($query,$email){
            return $query->orwhere ('email',$email);
        })
        ->get();
        //$users=User::where('name',$request->name) ->get();
        return response()->json($users,200);
        // $users=[
            // [
            //     'id'=>1,
            //     'name'=>'John Doe',
            //     'email'=>'john@gmail.com',
            //     'is_verified'=> true,
            // ],
            // [
            //     'id'=>2,
            //     'name'=>'Jane Doe',
            //     'email'=>'jane@gmail.com',
            //     'is_verified'=> false,
            // ]
        // ];
        // return response()->json($users,200);
    }

    public function store(UserStoreRequest $request)
    {
        //$user= $request->all();
        $user=User::create($request->all());
        return response()->json($user,201);
    }

    public function show($id){
        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user,200);
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null,204);
    }
}