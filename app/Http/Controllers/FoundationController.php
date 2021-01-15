<?php

namespace App\Http\Controllers;

use App\Models\Foundation;
use App\Models\User;
use Illuminate\Http\Request;

class FoundationController extends Controller
{
  public function index()
  {
    $foundations = Foundation::all();

  }
  public function show(Foundation $foundation)
  {
    $role_status = $this->checkOwner($foundation);
    $foundation_data = Foundation::find($foundation->id);
    return view('foundation.foundation',['foundation_data'=>$foundation_data],['role_status'=>$role_status]);
  }
  public function create(Request $request)
  {
    $id = \Auth::id();
    $foundation = new Foundation;
    $foundation_id = ($foundation_data = $foundation->create($request->all()))->id;
    $foundation_data->members()->create([
      'user_id' => $id,
      'role_id' => 1
    ]);
    return redirect('foundations/'.$foundation_id);
  }
  public function checkOwner(Foundation $foundation){
    $id = \Auth::id();
    $current_foundation = Foundation::find($foundation->id);
    foreach($current_foundation->members as $member){
      if($member->role_id ==1){
        if($id== $member->user_id){
          return 1;
        }
      }else{
        return 2;
      }
    }
  }
  public function update(Request $request, $id){
    Foundation::where('id',$id)->update($request->except(['_token']));
    return redirect('foundations/'.$id);
  }
  public function delete(Foundation $foundation){
    $id = \Auth::id();
    $foundation_data = Foundation::find($foundation->id);
    $owner = $foundation_data->members()->where('role_id',1)->first();
    
    if($id==$owner->user_id){
      $foundation_data->members()->delete();
      $foundation_data->delete();
    }
    return redirect('/');
  }
}
