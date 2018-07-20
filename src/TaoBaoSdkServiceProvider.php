<?php

namespace Flofire\TaobaoSDK;
use Illuminate\Support\ServiceProvider;


class TaoBaoSdkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
     {
        $this->publishes([
             __DIR__ . '/../config/taobao_sdk_proxy.php' => config_path('taobao_sdk_proxy.php'),
        ]);
     }

     public function register()
     {
;
     }
}
