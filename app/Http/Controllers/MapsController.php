<?php
namespace App\Http\Controllers;

use Cornford\Googlmapper\Mapper as CornfordMapper;
use Mapper;
class MapsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        Mapper::map(11.933071, 108.448675);//,['zoom' => 15]
        //Mapper::streetview(11.933071, 108.448675, 1, 1);
        Mapper::polyline([['latitude' => 10.818383, 'longitude' => 106.618118], ['latitude' => 11.933071, 'longitude' => 108.448675]], ['editable' => 'true']);
        Mapper::marker(10.818383,106.618118, ['symbol' => 'circle', 'scale' => 1000]);
        Mapper::informationWindow(11.933071, 108.448675, 'Content', ['open' => true, 'maxWidth'=> 300, 'markers' => ['title' => 'Title']]);
        // Mapper::polygon([['latitude' => 10.818383, 'longitude' => 106.618118], ['latitude' => 11.933071, 'longitude' => 108.448675]], ['editable' => 'true']);
        Mapper::rectangle([['latitude' => 10.818383, 'longitude' => 106.618118], ['latitude' => 11.933071, 'longitude' => 108.448675]], ['editable' => 'true']);
        Mapper::circle([['latitude' => 10.818383, 'longitude' => 106.618118]], ['editable' => 'true','strokeColor' => '#FF0000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2, 'fillColor' => '#0000FF', 'radius' => 100000/2]);
        Mapper::circle([['latitude' => 11.933071, 'longitude' => 108.448675]], ['editable' => 'true','strokeColor' => '#FF0000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2, 'fillColor' => '#0000FF', 'radius' => 100000/2]);
        return view('maps.index');
    }
}
