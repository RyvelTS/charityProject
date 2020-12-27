<?php

namespace App\Http\Controllers;

use App\Models\Foundation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoundationController extends Controller
{
  public function show(Foundation $foundation)
  {
    return view('foundation.foundation');
  }
  public function create(Request $request)
  {
    $foundation = new Foundation;
    $foundation_id = ($foundation->create($request->all()))->id;
    dd($foundation_id);
  }
}
