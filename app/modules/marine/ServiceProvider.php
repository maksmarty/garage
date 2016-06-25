<?php 
namespace App\Modules\Marine;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('marine');
    }
 
    public function boot()
    {
        parent::boot('marine');
    }
 
}