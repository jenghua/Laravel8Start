<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //顯示所有資料
    public function index()
    {
        $results = DB::select('select * from news where id = ?',[1]);

        return $results;
        return view('news');
        //return '這是最新消息的首頁';
    }
    //新增一筆資料
    public function create()
    {
        return '新增一筆資料';
    }

    //儲存資料
    public function store(Request $request)
    {
        //
    }

    //顯示一筆資料
    public function show($id)
    {
        return '最新消息'.$id;
    }

    //編輯一筆資料
    public function edit($id)
    {
        //
    }

    //更新一筆資料
    public function update(Request $request, $id)
    {
        $deleted = DB::delete('delete from news where id = ?',[1]);
        return $deleted;
    }

    //刪除一筆資料
    public function destroy($id)
    {
        $deleted = DB::delete('delete from news where id = ?',$id);
        return $deleted;
    }

    public function hello(){
        return view('hello');
    }

    public function read (){
        $results = DB::select('select * from news where id = ?',[2]);
        foreach($results as $new){
            return $new->title;
        }
    }

    public function show_id($id){
        //第一種傳變數進view的方法
        return view('hello')->with('id',$id);
    }
}
