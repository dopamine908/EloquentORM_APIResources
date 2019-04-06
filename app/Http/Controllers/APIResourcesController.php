<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Http\Resources\FlightResource;
use App\Http\Resources\FlightCollection;
use App\Http\Resources\FlightCollectionWithDataWrapping;
use App\Http\Resources\FlightCollectionWithPaginate;

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

    /**
     * 包裝巢狀的資源
     *
     * @return FlightCollectionWithDataWrapping
     */
    public function collectionＷithDataWrapping() {
        $flights = Flight::all();
        return new FlightCollectionWithDataWrapping($flights);
    }

    /**
     * 分頁資料包裝
     *
     * @return FlightCollectionWithPaginate
     */
    public function collectionＷithPaginate() {
        /**
         * 可以直接傳入paginate出來的collection
         */
        $flights = Flight::paginate(3);
        return new FlightCollectionWithPaginate($flights);
    }
}
