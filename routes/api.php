<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello',function(){
    return ['message' => 'Hello, World!'];

});
Route::get('/info',function(){
    return response()->json([
        'app' => 'Task API',
        'version' => '1.0.0',
        'author' => 'Your Name',
    ]);
});
Route::get('/profile',function(){
    return response()->json([
        'name' => 'Favian Aditya ',
        'nim' => 'A11.2026.16675',
    ]);
});

Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index']);
Route::post('/tasks', [\App\Http\Controllers\TaskController::class, 'store']);
Route::get('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'show']);
Route::put('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'update']);
Route::delete('/tasks/{id}', [\App\Http\Controllers\TaskController::class, 'destroy']);
Route::patch('/tasks/{id}/complete', [\App\Http\Controllers\TaskController::class, 'markAsCompleted']);