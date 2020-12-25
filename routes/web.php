<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectTasksController;
use App\Http\Controllers\CompletedTasksController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/news', [NewsController::class, 'read']);

Route::get('/news/{id}',[NewsController::class, 'show_id']);

use App\Models\News;

Route::get('/read',function(){
    $posts = News::all();
    return $posts;
});
Route::get('/find',function(){
    $post = News::find(2);
    return $post;
});

Route::get('/findwhere', function(){
    $post = News::orderBy('title','desc')->take(2)->get();
    return $post;
});

Route::get('/inserdata',function(){
    $post = new News;
    $post->title = 'goodjob';
    $post->description = '這是一則描述';
    $post->save();
});

Route::get('/create', function(){
    News::create(['title'=>'利用create新增的','description'=>'create的描述']);
});

Route::post("user", [UserAuth::class,'userLogin']);
Route::view("login", "login");
Route::view("profile", "profile");

Route::get('/login', function(){
    if(session()->has('user')){
        session()->pull('profile');
    }
    return view('login');
});

Route::get('/logout', function(){
    if(session()->has('user')){
        session()->pull('user');
    }
    return redirect('login');
});

//Route::get('/projects', [ProjectsController::class, 'index']);
//Route::post('/projects', [ProjectsController::class, 'store']);
//Route::get('/projects/create', [ProjectsController::class, 'create']);

Route::resource('projects','App\Http\Controllers\ProjectsController');

Route::post('/projects/{project}/tasks', [ProjectTasksController::class, 'store']);

Route::post('/completed-tasks/{task}', [CompletedTasksController::class, 'store']);
Route::delete('/completed-tasks/{task}', [CompletedTasksController::class, 'destory']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
