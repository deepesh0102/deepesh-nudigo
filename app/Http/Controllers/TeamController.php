<?php

namespace App\Http\Controllers;

use App\Itinerary;
use App\ItineraryItem;
use App\User;
use App\Passenger;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Image;

class TeamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:team');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $Itineraries = Itinerary::where(['is_delete'=>0,'status'=>0])->with([
            'itineraryItem'=> function($q){
//                $q->select('id','product_name','category_id');
                $q->where(['is_delete'=>0]);
            }
        ])->orderBy('id','DESC')->paginate(2);

//        print_r($Itineraries);

        return view('team.team-main')->with(compact('Itineraries'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $itineraryId)
    {

//        print_r($request->all()); exit;

        $dataItinearyItems = [

            'passenger' => $request->passenger,
            'notes' =>$request->notes,
            'cost' =>$request->cost,
            'journey_date' => $request->journey_date,
//            'reference_image' => date('Y-m-d', strtotime($request->journey_date)),


        ];

        //print_r($dataItinearyItems); exit;


        // Upload Image
//        if ($request->file('reference_image') && $request->file('reference_image')->isValid()) {
//            $image_tmp = $request->reference_image;
//            if ($image_tmp->isValid()) {
//                $extension = $image_tmp->getClientOriginalExtension();
//                $filename = time() . '.' . $extension;
//                $large_image_path = public_path() . '/itinerary_image/' . $filename;
//
//                // Resize Images
//                Image::make($image_tmp)->save($large_image_path);
//
//                // Store image name in category table
//                $dataItinearyItems['reference_image']  = $filename;
//            }
//        }
////        else{
////
////            $dataItinearyItems['reference_image']  = '800x600.png';
////
////        }
//
//        if(!empty($request->reference_image_delete)){
//
//            $dataItinearyItems['reference_image']  = '800x600.png';
//
//        }
//
//
////        $Itinerary = Itinerary::find($itineraryId);
//
//
//
//
//
//        $Itinerary = Itinerary::find($itineraryId);
//
//        if($Itinerary){
//
//            $dataItineary = [
//
//                'journey_date' => $request->journey_date,
//
//
//            ];
//
//            $Itinerary->update($dataItineary);
//
//            $itineraryItem = ItineraryItem::find($ItineraryItemID);
////
//            $itineraryItem->update($dataItinearyItems);
////
//            $data = $Itinerary->itineraryItem;
//
//        }
//
//
//
//
//        return response()->json(
//            [
//
//                'status ' => "success",
//                'data'=> $data,
//                'code'=>200
//            ]
//            , 200
//        );
    }


}
