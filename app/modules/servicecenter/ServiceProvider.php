<?php 
namespace App\Modules\Servicecenter;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('servicecenter');
    }
 
    public function boot()
    {
        parent::boot('servicecenter');
    }
 
}