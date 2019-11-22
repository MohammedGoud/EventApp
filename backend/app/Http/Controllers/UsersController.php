<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return  User::findOrFail($id);
    }

    public function store(Request $request)
    {
        if($request->email==null){
            return response(['status'=>'fail','message'=>'email is Required']);
        }
        if($request->password==null){
            return response(['status'=>'fail','message'=>'password is Required']);
        }

        $request['password']=md5($request->password);
       
        $User = User::create($request->all());

        return response(['status'=>'success','message'=>'User addedd successfully','Data'=>$User]);

                
    }

   

}
