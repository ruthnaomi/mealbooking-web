<?php

namespace App\Http\Controllers;

use App\Booking;
use App\BookingDetail;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiBookingController extends Controller
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
        // load mpesa api...
        //$mpesaOauth=new MpesaOAuth();
        //$OAuth=json_decode($mpesaOauth->generateToken())->access_token;
        //$onlinePayment=new LipaNaMpesa();
        //$status=$onlinePayment->onlinePayment($OAuth,$request->mobile,$request->payment);

        //Log::debug('Mpesa Response: ',[json_decode($status)]);
        
        // check cart for specific user...
        $items=Cart::where('user_id',$request->user_id)->get();
        Log::debug("Is user id there ?" . $request->user_id);
        $booking = new Booking();
        $booking->booking_no = random_int(10000,99999);
        $booking->status = 0;
        $booking->user_id = $request->user_id;
        $booking->payment = $request->payment;
        $booking->customer_change = $request->get('change',0);

        Log::debug("Is saving booking correct? " . $booking->save());
        if ($booking->save())
        {
            foreach ($items as $meal)
            {
                $bookingDetails = new BookingDetail();
                $bookingDetails->booking_id = $booking->id;
                $bookingDetails->meal_id = $meal->id;
                $bookingDetails->name = $meal->meal->name; 
                $bookingDetails->qty = $meal->qty;
                $bookingDetails->net_price = $meal->net_price;
                $bookingDetails->gross_price = $meal->net_price * $meal->qty;
                Log::debug("Is saving booking details correct? " . $bookingDetails->save());
                if ($bookingDetails->save())
                {
                    // DB::transaction to reduce qty in db
                    $this->reduceQty($meal->id,$meal->qty);
                    // remove item from temp cart..
                    $this->removeItem($meal->id);
                }
            }
        }
        return response()->json(['success'=>true,'message'=>'Meals Booked Succesfully. Thank you for using our app!'], 200);
    }


    private function removeItem($id)
    {
        Cart::destroy($id);
    }

    private function reduceQty($meal_id,$qty)
    {
        DB::transaction(function () use ($qty, $meal_id) {
            Log::debug("Is transaction done? ");
            DB::table('meals')
                ->where('id',$meal_id)
                ->decrement('qty',$qty);
            Log::debug("..done commit");
        });
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
        //
    }
}
