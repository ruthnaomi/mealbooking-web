<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;

class ApiMealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=\App\Meal::all();
        return response()->json($data, 200);
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
        // Chef uses this hook...
        $meal = new Meal();
        $meal->image = 'dish.png';
        $meal->name = $request->name;
        $meal->price = $request->price;
        $meal->qty = $request->qty;
        if ($meal->save()){
            return response()->json([
                'success'=>true,
                'messages'=>'Meal Created Successfully!'
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'messages'=>'Meal Cannot be created!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $meal=Meal::where('id',$id);
        $meal->update([
            'image'=>'dish.png',
            'name'=>$request->name,
            'price'=>$request->price,
            'qty'=>$request->qty,
        ]);
        return response()->json([
            'success'=>true,
            'messages'=>'Meal Updated Successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Chef Kills the data...
        Meal::destroy($id);
        return response()->json([
            'message'=>'Meal Removed Successfully!',
            'success'=>true
        ]);
    }
}
