<?php 
namespace App\Modules\Items;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('items');
    }
 
    public function boot()
    {
        parent::boot('items');
    }
 
}