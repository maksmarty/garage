<?php 
namespace App\Modules\Carwash;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('carwash');
    }
 
    public function boot()
    {
        parent::boot('carwash');
    }
 
}