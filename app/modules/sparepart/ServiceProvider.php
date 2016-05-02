<?php 
namespace App\Modules\Sparepart;
 
class ServiceProvider extends \App\Modules\ServiceProvider {
 
    public function register()
    {
        parent::register('sparepart');
    }
 
    public function boot()
    {
        parent::boot('sparepart');
    }
 
}