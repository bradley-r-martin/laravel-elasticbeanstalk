<?php

namespace BRM\ElasticBeanstalk;

use Illuminate\Support\ServiceProvider;

class FrameworkServiceProvider extends ServiceProvider
{


    public function register(){
        $this->app->register(\FoxxMD\LaravelElasticBeanstalkQueueWorker\ElasticBeanstalkQueueWorkerProvider::class);
    }
    public function boot(\Illuminate\Routing\Router $router, \Illuminate\Contracts\Http\Kernel $kernel){
        $kernel->prependMiddleware(\BRM\ElasticBeanstalk\app\Middleware\ElasticBeanstalk::class);
    }


    

}
