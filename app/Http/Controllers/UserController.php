<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('client.profile',['user_data'=>$users]);
  }
  public function show(User $user)
  {
    $id = \Auth::id();
    $user_data = User::find($user->id);
    return view('client.profile',['user_data'=>$user_data],['current_user'=> $id] );
  }
  public function edit(User $user)
  {
    $id = \Auth::id();
    if($user->id == $id){
      return view('client.edit',['user_data'=>$user]);
    }else{
      return redirect('404');
    }
  }
  public function update(Request $request, $id)
  {
    User::where('id',$id)->update($request->except(['_token']));
    return redirect('/');
  }
}
