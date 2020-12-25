<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
  public function index()
  {
    $id = \Auth::id();
    $user_data= DB::table('users')->where('id', $id)->first();

    return view('client.profile',['user_data'=>$user_data]);
  }
  public function show(User $user)
  {
    $id = \Auth::id();
    $user_data= DB::table('users')->where('id', $user->id)->first();
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
    DB::table('users')->where('id',$id)->update($request->except(['_token']));
    return redirect('/');
  }
}
