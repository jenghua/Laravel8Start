<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserAuth;
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
    return 'hello world';
});

//1號路由
Route::get('/users/{id?}',function($id=null){
    if(!is_null($id)){
        //如果有id就重導向至/student/profile
        return redirect()->route('profile');
    }else{
        return '無使用者資料';
    }
});

//2號路由
Route::get('/student/profile',function(){
    return '已查到使用者資料';
})->name('profile');

Route::get('/news', [NewsController::class, 'read']);

Route::get('/news/{id}',[NewsController::class, 'show_id']);

Route::get('/hello',[NewsController::class, 'hello']);


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


//Route::resource('news','App\Http\Controllers\NewsController');

