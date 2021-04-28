<?php

namespace Dealmap\Tracking;

use Illuminate\Support\ServiceProvider;

class DealmapTrackingServiceProvider extends ServiceProvider
{
    protected $defer = true; // 延迟加载服务

    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['tracking'];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('tracking', function ($app) {
            return new Tracking($app['session'], $app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/tracking.php' => config_path('tracking.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }

}
