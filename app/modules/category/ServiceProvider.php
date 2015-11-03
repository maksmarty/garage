<?php 
namespace App\Modules\Category;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('category');
    }
 
    public function boot()
    {
        parent::boot('category');
    }
 
}