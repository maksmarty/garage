<?php 
namespace App\Modules\Product;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('product');
    }
 
    public function boot()
    {
        parent::boot('product');
    }
 
}