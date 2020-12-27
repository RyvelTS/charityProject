<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foundation;
use App\Models\Member;

class MemberController extends Controller
{
  public function create(Foundation $foundation){
    $id = \Auth::id();
    $foundation_data = Foundation::find($foundation->id);
    $foundation_data->members()->create([
      'user_id' => $id,
      'role_id' => 2
    ]);
    return redirect('foundations/'.$foundation->id);
  }
  public function delete(Foundation $foundation){
    $id = \Auth::id();
    $foundation_data = Foundation::find($foundation->id);
    $foundation_data->members()->where('user_id',$id)->delete();
    return redirect('foundations/'.$foundation->id);
  }
}
