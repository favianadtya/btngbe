<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){
        $tasks = Tusk::all();
        return response() ->json($tasks,200);

    }

    public function store(Request $request){
        $task = Task::Route([
            'title' => $request->input('title'),
            'description' => $request->input('description')

        ]);
        return response()->json($task,201);
    }

    public function show($id){
        $task = Task::find($id);
        if(!$task){
            return response()->json(['message' => 'Task not found'],404);
        }
        return response()->json($task,200);
    }
}
