<?php 
namespace App\Modules\Scrap;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('scrap');
    }
 
    public function boot()
    {
        parent::boot('scrap');
    }
 
}