<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FlightCollectionWithDataWrapping extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /**
         * 可以自己決定你的資源關聯該如何被包裝
         * 如果你想要所有資源集合被包裝在 data 鍵
         * Laravel 不會讓你發生資源資源被包裝在兩個 data 鍵中
         * 就算它呼叫了 withoutWrapping 方法也一樣
         */
        return [
            'data' => $this->collection,
        ];
    }
}
