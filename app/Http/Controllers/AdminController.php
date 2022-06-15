<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
     function index(Request $res)
    {
        $email = $res->email;
        //echo $email; die();

        return view('dashboards.admins.index');
    }
    function profile(Request $res)
    {
        if(isset($res->change))
        {
            $id = auth()->user()->id;
            //dd($id);
            $name = $res->name;
            $email = $res->email;
            $arry = array('name' =>$name,'email'=>$email);
            DB::table('users')->where('id',$id)->update($arry);
            return redirect('admin/profile');
        }
        return view('dashboards.admins.profile');
    }
     function chnagepass()
     {
        return view('dashboards.admins.changepassword');
     }
     function logout()
     {

        session()->flush();
        return redirect('login');
     }

}
