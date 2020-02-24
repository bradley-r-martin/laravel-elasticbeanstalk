<?php

namespace BRM\ElasticBeanstalk;

use Illuminate\Support\ServiceProvider;

class FrameworkServiceProvider extends ServiceProvider
{


    public function register(){
        $this->app->register(\FoxxMD\LaravelElasticBeanstalkQueueWorker\ElasticBeanstalkQueueWorkerProvider::class);
   
        config([
          'cache.default' => 'database'
        ]);
   
    }
    public function boot(\Illuminate\Routing\Router $router, \Illuminate\Contracts\Http\Kernel $kernel){
        $kernel->prependMiddleware(\BRM\ElasticBeanstalk\app\Middleware\ElasticBeanstalk::class);

        $this->loadMigrationsFrom(__DIR__.'/app/Database/Migrations');
      
        $this->publishes([
          __DIR__.'/app/ebextensions/' => base_path('.ebextensions'),
        ], 'laravel-eb');
    }

}
