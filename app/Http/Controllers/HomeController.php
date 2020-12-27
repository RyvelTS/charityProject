<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foundation;

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
    $foundations = $this->foundationIndex();
    return view('home',['foundation_list'=>$foundations]);
  }
  public function foundationIndex()
  {
    return Foundation::all();
  }
}
