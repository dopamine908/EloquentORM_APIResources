<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Post;
use App\MyUser AS User;
use App\Http\Resources\FlightResource;
use App\Http\Resources\FlightCollection;
use App\Http\Resources\FlightCollectionWithDataWrapping;
use App\Http\Resources\FlightCollectionWithPaginate;
use App\Http\Resources\FlightResourceWhen;
use App\Http\Resources\FlightResourceMergeWhen;
use App\Http\Resources\PostResourceWhenLoaded;
use App\Http\Resources\RoleResourceWhenPivotLoaded;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceNoWith;
use App\Http\Resources\UserResourceWithResponse;
use App\Http\Resources\UserCollectionWithResponse;

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

    /**
     * 有條件的屬性
     *
     * @return FlightResourceWhen
     */
    public function when() {
        //Active = 0
        $flight = Flight::find(5);
        //Active = 1
        $flight = Flight::find(9);
        return new FlightResourceWhen($flight);
    }

    /**
     * 合併有條件的屬性
     *
     * @return FlightResourceMergeWhen
     */
    public function mergeWhen() {
        //Active = 0
        $flight = Flight::find(5);
        //Active = 1
        $flight = Flight::find(9);
        return new FlightResourceMergeWhen($flight);
    }

    /**
     * 有條件的關聯
     *
     * @return PostResourceWhenLoaded
     */
    public function relation_load() {
        /**
         * 因為有載入了OneToManyComment
         * 所以出來的資料會有Comment鍵
         */
        $post = Post::with('OneToManyComment')->find(1);

        /**
         * 因為沒有載入了OneToManyComment
         * 所以出來的資料會沒有Comment鍵
         */
        $post = Post::find(1);

        return new PostResourceWhenLoaded($post);
    }

    /**
     * 有條件的中介資訊
     *
     * @return RoleResourceWhenPivotLoaded
     */
    public function whenPivotLoaded() {
        $user = User::with('ManyToManyRole')->find(1);
        /**
         * Model 裡面的 relation 有實例化 pivot
         * 則觸發 whenPivotLoaded
         */
        $Role = $user->ManyToManyRole[0];
        return new RoleResourceWhenPivotLoaded($Role);
    }

    /**
     * 新增最上層的MetaData - Resource
     *
     * @return UserResource
     */
    public function withResource() {
        $user = User::find(1);
        return new UserResource($user);
    }

    /**
     * 新增最上層的MetaData - Collection
     *
     * @return UserResource
     */
    public function withCollection() {
        $users = User::all();
        return new UserCollection($users);
    }

    /**
     * 在建構資源時新增 Meta Data 的資料
     *
     * @return $this
     */
    public function additional() {
        $user = User::find(1);
        /**
         * 可以用additional在包裝resource的時候新增別的資料
         */
        return (new UserResourceNoWith($user))
            ->additional(
                [
                    'meta' => [
                        'key' => 'value',
                    ],
                ]
            );
    }

    /**
     * 新增Resource資源回應設定
     *
     * @return UserResourceWithResponse
     */
    public function withResponseResource() {
        $user = User::find(1);
        return new UserResourceWithResponse($user);
    }

    /**
     * 新增Collection資源回應設定
     *
     * @return UserCollectionWithResponse
     */
    public function withResponseCollection() {
        $users = User::all();
        return new UserCollectionWithResponse($users);
    }

    /**
     * 在建構資源時新增資源回應設定
     * 
     * @return $this
     */
    public function response() {
        $user = User::find(1);

        /**
         * 你可以鏈結 response 方法到資源上
         * 這個方法會回傳 Illuminate\Http\Response 實例
         * 可以自訂response的資訊
         */
        return (new UserResourceNoWith($user))
                ->response()
                ->header('X-Value', 'True');
    }
}
