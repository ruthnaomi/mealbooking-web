<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealsController extends Controller
{
   
    public function index()
    {
        $meals=Meal::all();
        return view('meal',['meals'=>$meals,'orders'=>Cart::where('user_id',Auth::user()->id)->get()]);
    }

   
    public function create()
    {
      //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $meal=Meal::find($id)->first();
        return view('mealEdit',['meal'=>$meal]);
    }

    
    public function update(Request $request, $id)
    {
       
    }

   
    public function destroy($id)
    {
        Meal::destroy($id);
        return redirect()->back()->with("error","Meal Removed Successfully!");
    }
}
