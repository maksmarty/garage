<?php

/*
 * Controller   : Login Controller
 * Descripttion : Handle login and Register functionallity.
 */

namespace App\Modules\Category\Controllers;

use App\Modules\Category\Models\Category;
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

class CategoryController extends \BaseController {

    public $restful = true;
    
    public function __construct() {
/*
         if(!(Auth::check())){

             # call login view
             return View::make('user::login');
         }*/
    }

    public function index()
    {
         // load the view and pass the nerds
        return View::make('category::index');
    }
    
    # Show
    public function showAdd(){
        return View::make('category::add');
    }

    # handle change password post data
    public function postAdd(){

        // validate
        $rules = array(
            'name'       => 'required|unique:category',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to(sprintf('%s/%s', 'category','add'))
                ->withErrors($validator);
        } else {
            // store
            $nerd = new Category;
            $nerd->name       = Input::get('name');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully added Category!');
            return Redirect::to(sprintf('%s/%s', 'category','add'));
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
            return Redirect::to(sprintf('%s/%d/%s', 'category',$id, 'edit'))
                ->withErrors($validator);
        } else {
            // store
            $nerd = Category::find($id);
            $nerd->name       = Input::get('name');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated Category!');
            return Redirect::to('category');
        }
    }

    public function postBuild() {
        // die('anand');
        $formType   = Input::get('type');
        $record_id  = Input::get('record_id');
        $section    = Input::get('section');

        $data = array();

        $data = $this->getData();

        $html = $uri = $pagination = '';
        //echo '<pre>';print_r($formType);die('======Debugging=======');
        if (!empty($data)) {
            $html               = $this->getLoadView($formType, $data['results'], $section);
            $pagination      = \Helpers::buildPagination($data['param'], $uri);
        }

        if ($html == '') {
            $html = 'No added content';
        }

        $array = array(
            'html' => $html,
            'param' => (!empty($data) ? $data['param'] : '' ),
            'pagination' => $pagination
        );

        echo json_encode($array);
    }


    public function getLoadView($formType, $data, $section = NULL) {
        $html = View::make('category::lists', $data)->render();
        $response   = Response::make($html);
        return $response;
    }

    public function getData() {

        $data  = array();
        $categories = new Category();
        $list  = $categories->getList();

        $arr   = array('CATEGORIES' => $list );
        $data['results'] = $arr;
        $data['param']   = $list['param'];
        return $data;
    }


}
