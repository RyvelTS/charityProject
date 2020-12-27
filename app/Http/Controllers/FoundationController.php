<?php

namespace App\Http\Controllers;

use App\Models\Foundation;
use Illuminate\Http\Request;

class FoundationController extends Controller
{
  public function index()
  {
    $foundations = Foundation::all();

  }
  public function show(Foundation $foundation)
  {
    return view('foundation.foundation');
  }
  public function create(Request $request)
  {
    $foundation = new Foundation;
    $foundation_id = ($foundation->create($request->all()))->id;
    return redirect('foundations/'.$foundation_id);
  }
}
