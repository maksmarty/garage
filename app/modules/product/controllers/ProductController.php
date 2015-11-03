<?php

/*
 * Controller   : Product Controller
 * Descripttion : Handle login and Register functionallity.
 */

namespace App\Modules\Product\Controllers;

use App\Modules\Product\Models\Product;
use App,
    View,
    Helpers,
    Session,
    Config,
    Redirect,
    Input,
    DB,
    Request,
    Validator,
    Auth,
    Hash,
    Response;

class ProductController extends \BaseController {

    public $restful = true;



    # Show
    public function showAdd(){
        //$categories = Category::lists('name', 'category_id');
        //echo '<pre>';print_r($categories);die('======Debugging=======');

        return View::make('Product::add');
    }

    # handle change password post data
    public function postAdd(){

        // validate
        $rules = array(
            'name'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to(sprintf('%s/%s', 'Product','add'))
                ->withErrors($validator);
        } else {
            // store
            $nerd = new Product;
            $nerd->name       = Input::get('name');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully added Product!');
            return Redirect::to(sprintf('%s/%s', 'Product','add'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit($id)
    {
        // validate
        $rules = array(
            'name'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to(sprintf('%s/%d/%s', 'Product',$id, 'edit'))
                ->withErrors($validator);
        } else {
            // store
            $nerd = Product::find($id);
            $nerd->name       = Input::get('name');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated Product!');
            return Redirect::to('Product');
        }
    }

}
