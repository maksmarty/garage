<?php 
namespace App\Modules\Showroom;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('showroom');
    }
 
    public function boot()
    {
        parent::boot('showroom');
    }
 
}