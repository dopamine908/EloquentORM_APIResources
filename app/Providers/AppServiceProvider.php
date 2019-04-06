<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * 當資源回應要轉換成 JSON 時
         * 預設的最外層資源將會被包裝在 data 鍵中
         * 如果你想要禁止包裝最外層的資源
         * 你可以在基本 Resource 類別上使用 withoutWrapping
         *
         * withoutWrapping方法只影響最外層的回應
         * 並不會移除你手動新增到自己的資源集合的 data 鍵。
         */
        Resource::withoutWrapping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
