<?php 
namespace App\Modules\Layout;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('layout');
    }
 
    public function boot()
    {
        parent::boot('layout');
    }
 
}
