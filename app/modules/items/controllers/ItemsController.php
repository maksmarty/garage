<?php

/*
 * Controller   : Login Controller
 * Descripttion : Handle login and Register functionallity.
 */

namespace App\Modules\Items\Controllers;

use App\Modules\Items\Models\Items;
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

class ItemsController extends \BaseController {

    public $restful = true;
    
    public function __construct() {

//         if(!(Auth::check())){
//
//             # call login view
//             return View::make('user::login');
//         }
    }

    public function index()
    {
        // get all the nerds
        //$items = Items::all();

        // load the view and pass the nerds
        return View::make('items::index');
    }
    
    # Show
    public function showAdd(){
//        $categories = Category::lists('name', 'category_id');
//

        $list = ['' => 'Select Category'] + DB::table('category')->lists('name', 'category_id');
        //echo '<pre>';print_r($list);die('======Debugging=======');
        return View::make('items::add', array('categories'=> $list ));
    }

    # handle change password post data
    public function postAdd(){

        // validate
        $rules = array(
            'category_id'       => 'required',
            'phone'       => 'required',
            'description'       => 'required'
        );

        if (Input::hasFile('image')) {
            $rules['image'] = 'required|mimes:png,gif,jpeg';//|max:20000
        }


        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            //echo '<pre>';print_r($validator->messages());die('======Debugging=======');
            return Redirect::to(sprintf('%s/%s', 'item','add'))
                ->withErrors($validator);
        } else {


            // store
            $item = new Items;
            $item->category_id       = Input::get('category_id');
            $item->phone       = Input::get('phone');
            $item->description       = Input::get('description');
            //$item->save()

            if (Input::hasFile('image')) {
                $file            = Input::file('image');

                //get File Name
                $fileExtension = $file->getClientOriginalExtension();
                $newFilename = uniqid(). "_" . time() . '.' . $fileExtension;


                //destination path
                $destinationPath = public_path('uploads') .'/images/';//'uploads/jav_'.str_random(8);

                $uploadSuccess  = \Image::make( $file->getRealPath() )
                    ->resize(50,null, function ($constraint) { $constraint->aspectRatio(); })
                    ->save($destinationPath.'50/'.$newFilename);

                \Image::make( $file->getRealPath() )
                    ->resize(100,null, function ($constraint) { $constraint->aspectRatio(); })
                    ->save($destinationPath.'100/'.$newFilename);

                \Image::make( $file->getRealPath() )
                    ->resize(200,null, function ($constraint) { $constraint->aspectRatio(); })
                    ->save($destinationPath.'200/'.$newFilename);

                \Image::make( $file->getRealPath() )
                    ->resize(400,null, function ($constraint) { $constraint->aspectRatio(); })
                    ->save($destinationPath.'400/'.$newFilename);

                if( $uploadSuccess )
                {
                    //$item = Item::find( $item_id );
                    $item->image = $newFilename;
                    //$item->save();
                }

            }

            //Save data
            $item->save();

            // redirect
            Session::flash('message', 'Successfully added Item!');
            return Redirect::to(sprintf('%s/%s', 'item','add'));
        }
    }

//    /*
//    * Clean the file name
//    */
//    private function cleanFileName()
//    {
//        //remove blanks
//        //$fileName = preg_replace('/\s+/', '', $fileName);
//        //remove charactes
//        //$fileName = preg_replace("/[^A-Za-z0-9_-\s.]/", "", $fileName);
//
//        $fileName = uniqid(). "_" . time();
//
//        return $fileName;
//    }

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
        $html = View::make('items::lists', $data)->render();
        $response   = Response::make($html);
        return $response;
    }

    public function getData() {

        $data  = array();
        $items = new Items();
        $list  = $items->getList();

        $arr   = array('ITEMS' => $list );
        $data['results'] = $arr;
        $data['param']   = $list['param'];
        return $data;
    }

    public function getImport($categoryName) {

        ini_set('memory_limit', '1G');
        ini_set('max_execution_time', -1);

        $destinationPath = public_path('uploads') ."/import/";
        //destination path
        $imagePath = public_path('uploads') .'/images/';//'uploads/jav_'.str_random(8);

        global $phone_prefix;
        $phone_prefix = '+965';


        if( !empty($categoryName) ){

            $category = Category::where('name','=',$categoryName)->first();

            if( !empty($category->category_id) ){
                //$destinationPath = $destinationPath . "$categoryName/new/";

                $filnalDestinationPath = $imagePath . "$categoryName/";

                /*if( !file_exists($filnalDestinationPath) ){
                    mkdir($filnalDestinationPath, 0755, true);
                }*/

                $image_sizes =  Config::get('constant.image_sizes');

                if( !empty($image_sizes) && is_array($image_sizes) ){

                    foreach($image_sizes as $image_size){

                        $fileImageSize = $filnalDestinationPath . "$image_size/";
                        if( !file_exists($fileImageSize) ){
                            mkdir($fileImageSize, 0755, true);
                        }

                        //unset fields
                        unset($fileImageSize);

                    }


                }else{
                    return false;
                }

                $categorydestinationPath = $destinationPath . "$categoryName/";

                $newDestinationPath = $categorydestinationPath . 'new/';
                $duplicateDestinationPath = $categorydestinationPath . 'duplicate/';
                $processedDestinationPath = $categorydestinationPath . 'processed/';

                if( file_exists($newDestinationPath) ){


                    $files = scandir($newDestinationPath, 0); // 0 for ascending order, in PHP from 5.4 use SCANDIR_SORT_ASCENDING


                    foreach ($files as $file) {

                        if ($file == '.' || $file == '..' || $file == '.DS_Store' || $file == 'Thumbs.db')
                            continue;


                        $currentFile = $newDestinationPath . $file;

                        //If file exists
                        if(file_exists($currentFile)){
                            $file_name = pathinfo($currentFile, PATHINFO_FILENAME); // file anme
                            $extension = pathinfo($currentFile, PATHINFO_EXTENSION); // extension

                            if(in_array(strtolower($extension),array('jpg','jpeg','png','gif'))){


                                //Phone with space
                                $phoneStr = trim(preg_replace('/[-]+/', ' ', preg_replace('/[\s]+/', '-', trim(preg_replace('/[^\d-\s]+/', '', $file_name)))));


                                $phone = '';
                                $phone1 = '';
                                $phone2 = '';

                                if( !empty($phoneStr) ){
                                    $phoneArray = explode(' ', $phoneStr);


                                    if( empty($phoneArray) || empty($phoneArray[0]) ){
                                        continue;
                                    }

                                    if( count($phoneArray) == 2 &&  ( strlen($phoneArray[1]) < 3 ) ){
                                        unset($phoneArray[1]);
                                    }


                                    //PHP regexp - remove all leading, trailing and standalone hyphens
                                    //echo preg_replace('~(?<!\S)-|-(?!\S)~', '', '-on-line - auction- website');


                                    foreach($phoneArray as $phonez){
                                        //Remove phone number from decription
                                        //Then after remove leading and trailing spaces and hyphens
                                        $file_name =  trim(preg_replace('/^[-]+|[-]+$/', '', trim(str_replace($phonez,'',$file_name))));
                                    }

                                    $description = $file_name;

                                    array_walk($phoneArray, function (&$value, $key) {
                                        global $phone_prefix;
                                        $value = sprintf('%s%s',$phone_prefix,trim($value));
                                    });


                                    if( !empty($phoneArray[0]) ){
                                        $phone = $phoneArray[0];
                                    }

                                    if( !empty($phoneArray[1]) ){
                                        $phone1 = $phoneArray[1];
                                    }

                                    if( !empty($phoneArray[2]) ){
                                        $phone2 = $phoneArray[2];
                                    }



                                    /*if( count($phoneArray) > 1 ){

                                        $phone = $phone_prefix . $phoneArray[0] ;

                                        foreach($phoneArray as $phoneVal){
                                            $file_name = str_replace($phoneVal,$phone_prefix .$phoneVal,$file_name);
                                        }

                                        $description = trim($file_name);

                                    }else{
                                        if( count($phoneArray) == 1 && ( strlen($phoneArray[0]) > 2 ) ){

                                            $description = trim(str_replace($phoneArray[0],'',$file_name));
                                            $phone = $phone_prefix . $phoneArray[0] ;
                                        }else{
                                            //For array count zero
                                            $description = $file_name;
                                            $phone = '';
                                        }
                                    }*/

                                }else{
                                    $description = $file_name;
                                }
//                                echo '<br><br>=======phone=========' . $phone;
//                                echo '<br>=======phone1=========' . $phone1;
//                                echo '<br>=======phone2=========' . $phone2;
//                                echo '<br>=======Description=========' . $description;
//                                continue;




                                //Upload Image:: Start Here
                                $itemQuery = ' SELECT COUNT(items.item_id) as numRows ' .
                                    ' FROM items WHERE items.category_id = "'.$category->category_id.'" ' .
                                    ' AND `items`.`phone` = "'.$phone.'" AND `items`.`phone` != "" ';

                                $response = DB::select($itemQuery);
                                $numRows = $response[0]->numRows;

                                //Duplicate value
                                if(  $numRows > 0 ){
                                    //Send Image to duplcate folder
                                    rename($currentFile, $duplicateDestinationPath . $file);
                                }else{

                                    //Upload Image
                                    // store
                                    $item = new Items;
                                    $item->category_id       = $category->category_id;
                                    $item->phone       = $phone;
                                    $item->phone1       = $phone1;
                                    $item->phone2       = $phone2;
                                    $item->description       = $description;


                                    /*=======================Hide if do'nt want to upload image ( START )===============================*/
                                    //get File Name
                                    $newFilename = uniqid(). "_" . time() . '.' . $extension;


                                    if( !empty($image_sizes) && is_array($image_sizes) ){

                                        foreach($image_sizes as $image_size){

                                            $filePathImageSize = $filnalDestinationPath . "$image_size/" . $newFilename;

                                            \Image::make( $currentFile )
                                                ->resize($image_size,null, function ($constraint) { $constraint->aspectRatio(); })
                                                ->save($filePathImageSize);

                                            //Unset
                                            unset($filePathImageSize);
                                            unset($image_size);

                                        }


                                    }

                                    $item->image = $newFilename;

                                    /*=======================Hide if do'nt want to upload image ( END )===============================*/

                                    //Save data
                                    $item->save();


                                    //Move image to processed
                                    rename($currentFile, $processedDestinationPath . $file);


                                }

                                //Clear data
                                $description = null;
                                $phone = null;
                                $phoneStr = null;
                                $phoneArray = null;

                            }



                        }



                        //echo '<br><pre>';print_r($file_name);

//echo '<pre>';print_r($arr);
                        $currentFile = null;
                        $file_name = null;
                        $extension = null;

                    }








                }

            }



        }




    }


    /*
 * List oll the files in directory
 * return array
 */

    public function scanDirectory($folder) {

        if (is_dir($folder)) {

            $dir_array = array();

            $dir = scandir($folder, 0); // 0 for ascending order, in PHP from 5.4 use SCANDIR_SORT_ASCENDING

            foreach ($dir as $files) {

                if ($files == '.' || $files == '..')
                    continue;

                if (is_dir($folder . '/' . $files)) {

                    $inner_dir = scandir($folder . '/' . $files, 0);

                    foreach ($inner_dir as $inner_files) {

                        if ($inner_files == '.' || $inner_files == '..')
                            continue;

                        $dir_array[$inner_files] = $folder . '/' . $inner_files;
                    }
                }else {

                    $dir_array[$files] = $folder . '/' . $files;
                }
            }

            return $dir_array;
        }
    }





}
