<?php


namespace Dhamkith\Googlemap\View\Components;


use Dhamkith\Googlemap\Models\Location;
use Illuminate\View\Component;

class LocationAll extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('googlemap::components.location-all');
    }

    /**
     * Get the ContactUs massages / is read_at null.
     *
     */
    public function locations()
    {
        return Location::all();
    }
}
