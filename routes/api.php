<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tasks\TaskController;



Route::namespace('Tasks')->group(function(){
    Route::prefix('tasks')->group(function() {
        Route::post('create-new-task',[TaskController::class, 'store']);
        Route::get('',[TaskController::class, 'index']);
        Route::get('{task:id}',[TaskController::class, 'show'])->name('tasks.show');
        Route::patch('{task:id}/edit',[TaskController::class, 'update']);
        Route::delete('{task:id}/delete',[TaskController::class, 'destroy']);

    });
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::prefix('posts')->namespace('Posts')->group(function() {

//     Route::post('create-new-post', 'PostController@store');
// });
