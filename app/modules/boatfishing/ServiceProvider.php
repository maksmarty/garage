<?php 
namespace App\Modules\Boatfishing;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('boatfishing');
    }
 
    public function boot()
    {
        parent::boot('boatfishing');
    }
 
}