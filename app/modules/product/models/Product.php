<?php 
/*
 * Model        : Product
 * Descripttion : Product model for handle login,registration,logout and user's setting.
 */

namespace App\Modules\Product\Models;

use App,
    View,
    Helpers;
use Input,
    Session,
    Config,
    Auth,
    DB;


class Product extends \Eloquent {

  
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = "product";
	protected $guarded = ["product_id"];
	//protected $softDelete = true;

}