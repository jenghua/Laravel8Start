<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserAuth extends Controller
{
    //
    function userLogin(Request $req){
        $data = $req->input();
        $req->session()->put('user',$data['user']);
        //echo session('user');
        return Redirect('profile');
    }
}
