<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    function index()
    {

        return view('dashboards.users.index');
    }
    function profile(Request $res)
    {
        if(isset($res->update))
        {
             $id = auth()->user()->id;
            $name = $res->name;
            $email = $res->email;
            echo $name;
            echo $email;
            $arry = array('name' =>$name,'email'=>$email);
            
            DB::table('users')->where('id',$id)->update($arry);
            return redirect('user/profile');
        }
       
        return view('dashboards.users.profile');
    }
    function settings()
    {
        return view('dashboards.users.settings');
    }
    function logout()
     {
        session()->flush();
        return redirect('login');
     }
    
}
