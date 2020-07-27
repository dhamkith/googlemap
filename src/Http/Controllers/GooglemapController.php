<?php

namespace Dhamkith\Googlemap\Http\Controllers;

use Dhamkith\Googlemap\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GooglemapController extends Controller
{    
    
    /**
    * Create a new controller instance.
    *
    * @return void
    */ 
   public function __construct()
   {
     $this->middleware(config('googlemap')['middleware_for_view'], ['except' => [ 'preview']]);
   }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('googlemap::all');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('googlemap::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'location_title' => 'required|max:190',
            'coords_lat' => 'required|numeric',
            'coords_lng' => 'required|numeric',
            'number' => 'required',
            'location_email' => 'required|email',
            'addressline1' => 'required|max:190',
            'addressline2' => 'required|max:190',
            'city' => 'required|max:190',
            'country' => 'required|max:190',
        ]);


        $location = new Location;
        $location->location_title = $request->input('location_title');
        $location->coords_lat = $request->input('coords_lat');
        $location->coords_lng = $request->input('coords_lng');
        $location->number = $request->input('number');
        $location->location_email = $request->input('location_email');
        $location->addressline1 = $request->input('addressline1');
        $location->addressline2 = $request->input('addressline2');
        $location->city = $request->input('city');
        $location->country = $request->input('country');

        $location->save();

        return redirect()->route('googlemap.all')->with('success', 'add new location succesfuly');

    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $location = Location::find($id);
        return view('googlemap::edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'location_title' => 'required|max:190',
            'coords_lat' => 'required|numeric',
            'coords_lng' => 'required|numeric',
            'number' => 'required',
            'location_email' => 'required|email',
            'addressline1' => 'required|max:190',
            'addressline2' => 'required|max:190',
            'city' => 'required|max:190',
            'country' => 'required|max:190',
        ]);

        $location = Location::find($id);
        $location->location_title = $request->input('location_title');
        $location->coords_lat = $request->input('coords_lat');
        $location->coords_lng = $request->input('coords_lng');
        $location->number = $request->input('number');
        $location->location_email = $request->input('location_email');
        $location->addressline1 = $request->input('addressline1');
        $location->addressline2 = $request->input('addressline2');
        $location->city = $request->input('city');
        $location->country = $request->input('country');

        $location->save();

        return redirect()->route('googlemap.all')->with('success', 'add new location succesfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location_title = $location->location_title;
        $location->delete();
        return redirect()->route('googlemap.all')->with('success', 'location : '.$location_title.' delete succesfuly');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function mapMarker()
    {
        $locations = Location::all();
        $map_markes = array ();
        foreach ($locations as $key => $location) {
            $map_markes[] = (object)array(
                'location_title' => $location->location_title,
                'coords_lat' => $location->coords_lat,
                'coords_lng' => $location->coords_lng,
                'number' => $location->number,
                'location_email' => $location->location_email,
                'addressline1' => $location->addressline1,
                'addressline2' => $location->addressline2,
                'city' => $location->city,
                'country' => $location->country,
            );
        }
        return response()->json($map_markes);
    }
    /**
     * Display the specified resource.
     *
     */
    public function preview()
    {
        return view('googlemap::view');
    }
}
