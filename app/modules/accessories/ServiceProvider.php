<?php 
namespace App\Modules\Accessories;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('accessories');
    }
 
    public function boot()
    {
        parent::boot('accessories');
    }
 
}