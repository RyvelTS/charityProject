<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foundation;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  public function index()
  { 
    $id = \Auth::id();
    $user = User::find($id);
    $foundations= Foundation::all();
    $temp = array();
    $owned_foundations = array();
    $joined_foundations = array();
    foreach ($user->members as $member) {
      if($member->role_id == 1){
        $owned_foundations[] = $member->foundation;
      }else{
        $joined_foundations[]= $member->foundation;
      }
    }
    foreach($foundations as $foundation){
      foreach($foundation->members as $member){
        if($member->user_id == $user->id){
          $temp[] = $member->foundation->id;
        }
      }
    }
    $available_foundations = $foundations->except($temp);
    // dd($owned_foundations);
    return view('home',['owned_foundations'=>$owned_foundations],['joined_foundations'=>$joined_foundations])->with('available_foundations',$available_foundations);
  }
}
