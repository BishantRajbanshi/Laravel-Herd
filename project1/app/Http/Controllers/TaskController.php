<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request){
        $tasks = Task::when($request->name, function($query, $name){
                return $query->where('name', $name);
            })
            ->when($request->completed, function($query, $completed){
                return $query->where('completed', $completed);
            })
            ->get();
        return response()->json($tasks, 200);
    }

}