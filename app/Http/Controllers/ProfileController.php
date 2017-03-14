<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
{
    public function profile($username){
    	$user = User::whereUsername($username)->first();
    	return view('user.profile',compact('user'));
    }
    public function edit($id){
    	$user = User::find($id);
    	//return $user;
        return view('user.edituser',compact('user'));
    }
    public function update(Request $request)
    {
    	$user=User::find($request->id);
    	$user->name=$request->name;
        $user->username=$request->username;
        $user->dob=$request->dob;
        $user->email=$request->email;
        $user->save();
        return redirect()->action('ProfileController@profile', ['username' => $user->username]);
        //$user = User::find($id);
        // $user->update($request->all());
        //return redirect('/home');
    }
}
