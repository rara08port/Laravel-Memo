<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class UsersController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function userslist()
    {
        
        $users = User::orderBy('created_at', 'desc')->get();

        return view('users.userslist', ['users' => $users]);
    }

    
    public function mypage($user_id){
        
       
        $posts = Post::where('user_id',$user_id)->orderBy('created_at', 'desc')->get();
        $user = User::where('id',$user_id)->get();
       

        return view('users.mypage', ['posts' => $posts , 'user'=>$user]);
        
    }
    

    //
}
