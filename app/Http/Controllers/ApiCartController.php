<?php

namespace App\Http\Controllers;

use App\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::insert([
            'meal_id'     => $request->meal_id,
            'user_id'     => $request->user_id,
            'qty'         => $request->qty,
            'net_price'   => $request->price,
            'gross_price' => ($request->qty * $request->price),
            'created_at'  => Carbon::now()
        ]);
        return response()->json(['success'=>true],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart=DB::table('carts')
        ->join('meals','carts.meal_id','=','meals.id')
        ->select('meals.name','meals.image','carts.*')
        ->where('carts.user_id',$id)
        ->get();
        return response()->json($cart,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);
		return response()->json(['success'=>true,'message'=>'Item Removed!']);
    }
}
