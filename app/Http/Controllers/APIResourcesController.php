<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Http\Resources\FlightResource;
use App\Http\Resources\FlightCollection;

class APIResourcesController extends Controller
{
    /**
     * 回傳 resource
     *
     * @return FlightResource
     */
    public function resource() {
        $flight = Flight::find(5);
        return new FlightResource($flight);
    }

    /**
     * 回傳 resource collection
     *
     * @return FlightCollection
     */
    public function resource_collection() {
        $flights = Flight::all();
        return new FlightCollection($flights);
    }

    /**
     * 回傳 移除最外層資料包裝的 resource
     *
     * @return FlightResource
     */
    public function resourceＷithoutWrapping() {
        $flight = Flight::find(5);
        return new FlightResource($flight);
    }
}
