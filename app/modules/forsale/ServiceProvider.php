<?php 
namespace App\Modules\Forsale;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('forsale');
    }
 
    public function boot()
    {
        parent::boot('forsale');
    }
 
}