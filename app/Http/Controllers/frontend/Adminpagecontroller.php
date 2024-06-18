<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\login;

class Adminpagecontroller extends Controller
{
    public function index()
    {
        return view('frontend.admin_page');
    }

    public function adminlogin(Request $data)
    {
        $login=Login::where('email',$data->input('email'))->where('password', $data->input('password'))->first();
        if($login)
        {
            return redirect('/admin_page');
            /*session()->put('login_id',$login->login_id);
            session()->put('user_type',$login->user_type);
            if($login->user_type=='admin')
            {
                return redirect('/admin_page');
            }*/
        }
        else
        {
            return redirect('login')->with('error','Email or Password incorrect...');
        }
    }
}
