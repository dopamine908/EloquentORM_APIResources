<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Resource / Resource Collection
|--------------------------------------------------------------------------
你可以使用 Artisan 的 make:resource 指令來產生一個資源類別
若要建立一個資源集合，你應該在建立資源時使用 --collection 選項
預設的資源會放置於你的 app/Http/Resources 應用程式目錄中。

資源會繼承 Illuminate\Http\Resources\Json\Resource
資源集合會繼承 Illuminate\Http\Resources\Json\ResourceCollection

取得的東西是->first() 用 Resource
取得的東西是->get() 則用 Collection
*/
Route::get('Resource', 'APIResourcesController@resource');
Route::get('ResourceCollection', 'APIResourcesController@resource_collection');

/*
|--------------------------------------------------------------------------
| 移除最外層資料包裝
|--------------------------------------------------------------------------
*/
Route::get('移除最外層資料包裝', 'APIResourcesController@resourceＷithoutWrapping');

/*
|--------------------------------------------------------------------------
| 包裝巢狀的資源
|--------------------------------------------------------------------------
*/
Route::get('包裝巢狀的資源', 'APIResourcesController@collectionＷithDataWrapping');

/*
|--------------------------------------------------------------------------
| 分頁資料包裝
|--------------------------------------------------------------------------
*/
Route::get('分頁資料包裝', 'APIResourcesController@collectionＷithPaginate');
