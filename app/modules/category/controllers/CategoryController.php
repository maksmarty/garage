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

//        $categoryObj = new Category();
//        echo '<pre>';print_r($categoryObj->getGroupedCategoriesForDropDown());die('======Debugging=======');
//         // load the view and pass the nerds
        return View::make('category::index');
    }
    
    # Show
    public function showAdd(){

        $category = new Category();
        $list = ['0' => 'No Parent Category'] + $category->getCategoriesForDropDown();
        return View::make('category::add', array('categories_dropdown'=> $list , 'category' => new Category()));
    }

    # handle change password post data
    public function postAdd(){

        // validate
        $rules = array(
            'name'       => 'required|unique:category',
            'parent_category_id'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::route('category.add')
                ->withErrors($validator);
        } else {
            // store
            $nerd = new Category;
            $nerd->name       = Input::get('name');
            $nerd->parent       = Input::get('parent_category_id');
            $nerd->save();

            // redirect
            Session::flash('message', 'Category added successfully!');
            return Redirect::route('category');
        }
    }

    # Show
    public function update($id){
//        $categories = Category::lists('name', 'category_id');
//
        //$item = Items::find($id);
        //$item = Items::find($id);
        $category = Category::find($id);
        if(!empty($category->category_id)){

            $category = new Category();
            $list = ['0' => 'No Parent Category'] + $category->getCategoriesForDropDown();
            return View::make('category::add', array('categories_dropdown'=> $list , 'category' => $category));
        }else{
            // redirect
            Session::flash('message', 'Something went wrong.');
            return Redirect::route('category');
        }


    }




    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postUpdate($id)
    {

        $category = Category::find($id);
        if(!empty($category->category_id)){
            $rules = array(
                'name'       => 'required',
                'parent_category_id'       => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::route('category.update',$id)
                    ->withErrors($validator);
            } else {

                $category->name       = Input::get('name');
                $category->parent       = Input::get('parent_category_id');
                $category->save();

                // redirect
                Session::flash('message', 'Category updated successfully!');
                return Redirect::route('category');
            }
        }else{
            // redirect
            Session::flash('message', 'Something went wrong.');
            return Redirect::route('category');
        }


    }



    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
//    public function postEdit($id)
//    {
//        // validate
//        $rules = array(
//            'name'       => 'required',
//        );
//        $validator = Validator::make(Input::all(), $rules);
//
//        // process the login
//        if ($validator->fails()) {
//            return Redirect::to(sprintf('%s/%d/%s', 'category',$id, 'edit'))
//                ->withErrors($validator);
//        } else {
//            // store
//            $nerd = Category::find($id);
//            $nerd->name       = Input::get('name');
//            $nerd->save();
//
//            // redirect
//            Session::flash('message', 'Successfully updated Category!');
//            return Redirect::to('category');
//        }
//    }

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

    public function setParentToCategory() {

        $data  = array();
        $categories  = new Category();
        echo '<pre>';print_r($categories->getGroupedCategoriesForDropDown());die('======Debugging=======');



        foreach($categories as $category){

            $itemCont->getImport($category);
        }
//
//        $arr   = array('CATEGORIES' => $list );
//        $data['results'] = $arr;
//        $data['param']   = $list['param'];
        return $data;
    }



}
