<?php

/*
 * Controller   : Login Controller
 * Descripttion : Handle login and Register functionallity.
 */

namespace App\Modules\Forsale\Controllers;

use App\Modules\Forsale\Models\Forsale;
use App\Modules\Forsale\Models\Usermobile;
use App\Modules\Forsale\Models\Makeregion;
use App\Modules\Forsale\Models\Make;
use App\Modules\Showroom\Models\Photos;
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

class ForsaleController extends \BaseController {

    public $restful = true;

    public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * curl --user admin:admin localhost/project/api/v1/pages
     */

    public function index() {


        $durations = Forsale::all();

//
//        $items = array();
//        foreach($durations as $duration){
//
//            $items[] = array(
//                'level' => $duration->level,
//                'date' => $duration->date,
//                'time' => $duration->time,
//                'location' => $duration->location,
//            );
//
//        }

        $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($durations) );
        return $response + array( 'results' => $durations )  ;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     * curl --user admin:admin -d 'title=sample&slug=abc' localhost/project/api/v1/pages
     */

    public function store() {

        //trim all input data
        //Input::merge(array_map('trim', Input::all()));
        //echo '<pre>';print_r(Input::file('images'));die('======Debugging=======');

        // validate
        $rules = array(
            'device_phone'      => 'required',
            'make_region'       => 'required',
            'model'       => 'required',
            'make'       => 'required',
            'title'       => 'required',
            'phone'       => 'required',
            'price'       => 'required',
            'description'   => 'required',
            //'status'     => 'required',
        );
//echo '<pre>';print_r(Input::hasFile('images*'));die('======Debugging=======');
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            $response = array( 'status'=> 'fail', 'message'=> $validator->messages()->first() );
        } else {

            $mobileUser = Usermobile::where('phone','=',trim(Input::get('device_phone')))->first();

            //User already registered
            if( !empty($mobileUser->user_mobile_id) && $mobileUser->status == '1'){

                $maxNumberOfPostPerDay = \Config::get('constant.max_number_post_per_day',2);
                $today = date('Y-m-d');

                if( !empty($mobileUser->last_post_date) ){

                    $todayObj = new \DateTime($today);
                    $lastPostDateObj = new \DateTime($mobileUser->last_post_date);

                    $isEligibleToPost = false;

                    if( $mobileUser->number_post_today == $mobileUser->max_number_post){

                        if( $todayObj == $lastPostDateObj ){
                            //Last update today and current number is meets max number
                            $isEligibleToPost = false;

                        }elseif( $todayObj > $lastPostDateObj ){
                            //Last update yesterday, allowed for max quota
                            $isEligibleToPost = true;
                        }else{
                            //Last update tommorow ( Not possible )
                            $isEligibleToPost = false;
                        }

                    } elseif ( $mobileUser->number_post_today < $mobileUser->max_number_post){
                        //Number does not meet max number of post
                        $isEligibleToPost = true;
                    }


                    if( $isEligibleToPost ){

                        //User already exists
                        $makeRegion = Makeregion::where('slug','=',trim(Input::get('make_region')))->first();
                        //echo '<pre>';print_r($makeRegion);die('======Debugging=======');
                        //dd(DB::getQueryLog());die;

                        if( !empty($makeRegion->make_region_id) ){

                            $make = Make::where('slug','=',trim(Input::get('make')))
                                ->where('make_region_id', '=', $makeRegion->make_region_id)->first();

//                    DB::table('make')
//                        ->join('make_region', 'make.make_region_id', '=', 'make_region.make_region_id')
//                        ->where('make.slug', '=', Input::get('make'))
//                        ->where('make.slug', '=', Input::get('make'))
//                        ->select('users.id', 'contacts.phone', 'orders.price')
//                        ->get();

                            if( !empty($make->make_id) ){

                                // Add forsale data
                                $forsale = new Forsale();
                                $forsale->make_id        = $make->make_id;
                                $forsale->user_mobile_id        = $mobileUser->user_mobile_id;
                                $forsale->model        = trim(Input::get('model'));
                                $forsale->title        = trim(Input::get('title'));
                                $forsale->phone         = trim(Input::get('phone'));
                                $forsale->price         = trim(Input::get('price'));
                                $forsale->description     = trim(Input::get('description'));
                                $forsale->status       = '1';
                                //$forsale->save();

                                if( ! $forsale->save() ){
                                    $response = array( 'status'=> 'fail', 'message'=> 'Something went wrong.' );
                                }else{

                                    //Update quota for this user

                                    //Upload Images, new logic - Start here
                                    $image_sizes =  \Config::get('constant.image_sizes');

                                    $imagePath = public_path('uploads') .'/images/';

                                    $filnalDestinationPath = $imagePath . "foresale/";

                                    if( !file_exists($filnalDestinationPath) ){
                                        mkdir($filnalDestinationPath, 0755, true);
                                    }

                                    $imagenumber = \Config::get('constant.number_of_image',10);
                                    for($i=1; $i <= $imagenumber; $i++){

                                        if (Input::hasFile('image'.$i) ) {
                                            $file            = Input::file('image'.$i);
                                            $validrules = array('file' => 'required|mimes:png,gif,jpeg,jpg'); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
                                            $validator = Validator::make(array('file'=> $file), $validrules);

                                            if($validator->passes()) {


                                                //get File Name
                                                $fileExtension = $file->getClientOriginalExtension();

                                                if( empty($fileExtension) ){
                                                    continue;
                                                }

                                                $newFilename = uniqid(). "_" . time() . '.' . $fileExtension;

                                                //Upload original image
                                                $fileOriginalPath = $filnalDestinationPath . "original/" . $newFilename;
                                                \Image::make( $file->getRealPath() )
                                                    ->save($fileOriginalPath);



                                                if( !empty($image_sizes) && is_array($image_sizes) ){

                                                    foreach($image_sizes as $image_size){

                                                        $filePathImageSize = $filnalDestinationPath . "$image_size/" . $newFilename;

                                                        \Image::make( $file->getRealPath() )
                                                            ->resize($image_size,null, function ($constraint) { $constraint->aspectRatio(); })
                                                            ->save($filePathImageSize);

                                                        //Unset
                                                        unset($filePathImageSize);
                                                        unset($image_size);

                                                    }


                                                }

                                                //Save into db
                                                $photo = new Photos();
                                                $photo->forsale_id       = $forsale->forsale_id;
                                                $photo->photo_name       = $newFilename;
                                                $photo->save();

                                            }else{
                                                continue;
                                            }

                                            //Unset
                                            unset($fileExtension);
                                            unset($newFilename);
                                            unset($photo);

                                        }else{
                                            continue;
                                        }


                                    }
                                    //Upload Images, new logic - Ends here

//                                    //Upload Images - Start here
//                                    if (Input::hasFile('images') ) {
//
//                                        $image_sizes =  Config::get('constant.image_sizes');
//
//                                        $imagePath = public_path('uploads') .'/images/';
//
//                                        $filnalDestinationPath = $imagePath . "foresale/";
//
//                                        if( !file_exists($filnalDestinationPath) ){
//                                            mkdir($filnalDestinationPath, 0755, true);
//                                        }
//
//                                        $files            = Input::file('images');
//
//                                        foreach($files as $file){
//
//                                            $validrules = array('file' => 'required|mimes:png,gif,jpeg,jpg'); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
//                                            $validator = Validator::make(array('file'=> $file), $validrules);
//
//                                            if($validator->passes()) {
//
//
//                                                //get File Name
//                                                $fileExtension = $file->getClientOriginalExtension();
//
//                                                if( empty($fileExtension) ){
//                                                    continue;
//                                                }
//
//                                                $newFilename = uniqid(). "_" . time() . '.' . $fileExtension;
//
//
//                                                if( !empty($image_sizes) && is_array($image_sizes) ){
//
//                                                    foreach($image_sizes as $image_size){
//
//                                                        $filePathImageSize = $filnalDestinationPath . "$image_size/" . $newFilename;
//
//                                                        \Image::make( $file->getRealPath() )
//                                                            ->resize($image_size,null, function ($constraint) { $constraint->aspectRatio(); })
//                                                            ->save($filePathImageSize);
//
//                                                        //Unset
//                                                        unset($filePathImageSize);
//                                                        unset($image_size);
//
//                                                    }
//
//
//                                                }
//
//                                                //Save into db
//                                                $photo = new Photos();
//                                                $photo->forsale_id       = $forsale->forsale_id;
//                                                $photo->photo_name       = $newFilename;
//                                                $photo->save();
//
//                                            }else{
//                                                continue;
//                                            }
//
//                                            //Unset
//                                            unset($fileExtension);
//                                            unset($newFilename);
//                                            unset($photo);
//
//
//                                        }
//
//                                    }
//                                    //Upload Images - Ends here




                                    //$maxNumberOfPostPerDay = \Config::get('constant.max_number_post_per_day',2);

                                    //$usermobile = new Usermobile();
                                    //$usermobile->phone        = trim(Input::get('device_phone'));
                                    //$usermobile->max_number_post        = $maxNumberOfPostPerDay;

                                    if( $todayObj == $lastPostDateObj ){
                                        $mobileUser->number_post_today  = $mobileUser->number_post_today  + 1;
                                    }else{
                                        $mobileUser->number_post_today         = '1';
                                        $mobileUser->last_post_date         = date('Y-m-d');

                                    }

                                    if( ! $mobileUser->save() ){
                                        $response = array( 'status'=> 'fail', 'message'=> 'Something went wrong.' );
                                    }else{
                                        $response = array( 'status'=> 'success', 'message'=> 'Successfully added' );
                                    }

                                }
                            }else{
                                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Requested manufacturing or make not exist.' );
                            }


                        }else{
                            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Requested manufacturing or make region not exist.' );
                        }
                    }else{
                        $response = array( 'status'=> 'fail', 'message'=> 'Sorry, you exceeded you per day quota.' );
                    }

                }else{
                    $response = array( 'status'=> 'fail', 'message'=> 'Something went wrong.' );
                }

            }elseif( !empty($mobileUser->user_mobile_id) && empty($mobileUser->status) ){

                $response = array( 'status'=> 'fail', 'message'=> 'Unauthorize access.' );

            }else{
                //New User
                $makeRegion = Makeregion::where('slug','=',trim(Input::get('make_region')))->first();
                //echo '<pre>';print_r($makeRegion);die('======Debugging=======');
                //dd(DB::getQueryLog());die;

                if( !empty($makeRegion->make_region_id) ){

                    $make = Make::where('slug','=',trim(Input::get('make')))
                        ->where('make_region_id', '=', $makeRegion->make_region_id)->first();

//                    DB::table('make')
//                        ->join('make_region', 'make.make_region_id', '=', 'make_region.make_region_id')
//                        ->where('make.slug', '=', Input::get('make'))
//                        ->where('make.slug', '=', Input::get('make'))
//                        ->select('users.id', 'contacts.phone', 'orders.price')
//                        ->get();

                    if( !empty($make->make_id) ){

                        // Add forsale data
                        $forsale = new Forsale();
                        $forsale->make_id        = $make->make_id;
                        $forsale->model        = trim(Input::get('model'));
                        $forsale->title        = trim(Input::get('title'));
                        $forsale->phone         = trim(Input::get('phone'));
                        $forsale->price         = trim(Input::get('price'));
                        $forsale->description     = trim(Input::get('description'));
                        $forsale->status       = '1';
                        //$forsale->save();

                        if( ! $forsale->save() ){
                            $response = array( 'status'=> 'fail', 'message'=> 'Something went wrong.' );
                        }else{

                            //Add this user

                            //Upload Images, new logic - Start here
                            $image_sizes =  \Config::get('constant.image_sizes');

                            $imagePath = public_path('uploads') .'/images/';

                            $filnalDestinationPath = $imagePath . "foresale/";

                            if( !file_exists($filnalDestinationPath) ){
                                mkdir($filnalDestinationPath, 0755, true);
                            }

                            $imagenumber = \Config::get('constant.number_of_image');
                            for($i=1; $i <= $imagenumber; $i++){

                                if (Input::hasFile('image'.$i) ) {
                                    $file            = Input::file('image'.$i);
                                    $validrules = array('file' => 'required|mimes:png,gif,jpeg,jpg'); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
                                    $validator = Validator::make(array('file'=> $file), $validrules);

                                    if($validator->passes()) {


                                        //get File Name
                                        $fileExtension = $file->getClientOriginalExtension();

                                        if( empty($fileExtension) ){
                                            continue;
                                        }

                                        $newFilename = uniqid(). "_" . time() . '.' . $fileExtension;

                                        //Upload original image
                                        $fileOriginalPath = $filnalDestinationPath . "original/" . $newFilename;
                                        \Image::make( $file->getRealPath() )
                                            ->save($fileOriginalPath);


                                        if( !empty($image_sizes) && is_array($image_sizes) ){

                                            foreach($image_sizes as $image_size){

                                                $filePathImageSize = $filnalDestinationPath . "$image_size/" . $newFilename;

                                                \Image::make( $file->getRealPath() )
                                                    ->resize($image_size,null, function ($constraint) { $constraint->aspectRatio(); })
                                                    ->save($filePathImageSize);

                                                //Unset
                                                unset($filePathImageSize);
                                                unset($image_size);

                                            }


                                        }

                                        //Save into db
                                        $photo = new Photos();
                                        $photo->forsale_id       = $forsale->forsale_id;
                                        $photo->photo_name       = $newFilename;
                                        $photo->save();

                                    }else{
                                        continue;
                                    }

                                    //Unset
                                    unset($fileExtension);
                                    unset($newFilename);
                                    unset($photo);

                                }else{
                                    continue;
                                }


                            }
                            //Upload Images, new logic - Ends here


//                            //Upload Images - Start here
//                            if (Input::hasFile('images') ) {
//
//                                $files            = Input::file('images');
//
//                                $image_sizes =  Config::get('constant.image_sizes');
//
//                                $imagePath = public_path('uploads') .'/images/';
//
//                                $filnalDestinationPath = $imagePath . "foresale/";
//
//                                if( !file_exists($filnalDestinationPath) ){
//                                    mkdir($filnalDestinationPath, 0755, true);
//                                }
//
//
//                                foreach($files as $file){
//
//                                    $validrules = array('file' => 'required|mimes:png,gif,jpeg,jpg'); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
//                                    $validator = Validator::make(array('file'=> $file), $validrules);
//
//                                    if($validator->passes()) {
//
//
//                                        //get File Name
//                                        $fileExtension = $file->getClientOriginalExtension();
//
//                                        if( empty($fileExtension) ){
//                                            continue;
//                                        }
//
//                                        $newFilename = uniqid(). "_" . time() . '.' . $fileExtension;
//
//
//                                        if( !empty($image_sizes) && is_array($image_sizes) ){
//
//                                            foreach($image_sizes as $image_size){
//
//                                                $filePathImageSize = $filnalDestinationPath . "$image_size/" . $newFilename;
//
//                                                \Image::make( $file->getRealPath() )
//                                                    ->resize($image_size,null, function ($constraint) { $constraint->aspectRatio(); })
//                                                    ->save($filePathImageSize);
//
//                                                //Unset
//                                                unset($filePathImageSize);
//                                                unset($image_size);
//
//                                            }
//
//
//                                        }
//
//                                        //Save into db
//                                        $photo = new Photos();
//                                        $photo->forsale_id       = $forsale->forsale_id;
//                                        $photo->photo_name       = $newFilename;
//                                        $photo->save();
//
//                                    }else{
//                                        continue;
//                                    }
//
//                                    //Unset
//                                    unset($fileExtension);
//                                    unset($newFilename);
//                                    unset($photo);
//
//
//                                }
//
//                            }
//                            //Upload Images - Ends here


                            $maxNumberOfPostPerDay = \Config::get('constant.max_number_post_per_day',2);

                            $usermobile = new Usermobile();
                            $usermobile->phone        = trim(Input::get('device_phone'));
                            $usermobile->max_number_post        = $maxNumberOfPostPerDay;
                            $usermobile->number_post_today         = '1';
                            $usermobile->last_post_date         = date('Y-m-d');
                            $usermobile->status         = '1';

                            if( ! $usermobile->save() ){
                                $response = array( 'status'=> 'fail', 'message'=> 'Something went wrong.' );
                            }else{

                                $forsale->user_mobile_id       = $usermobile->user_mobile_id;
                                $forsale->save();
                                $response = array( 'status'=> 'success', 'message'=> 'Successfully added' );
                            }

                        }
                    }else{
                        $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Requested manufacturing or make not exist.' );
                    }


                }else{
                    $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Requested manufacturing or make region not exist.' );
                }


            }
        }

        return $response ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     * curl --user admin:admin localhost/project/api/v1/pages/2
     */


    public function update() {


        $response = array();
        // validate
        $rules = array(
            'id'      => 'required',
            'device_phone'      => 'required',
            //'model'       => 'required',
            //'title'       => 'required',
            //'phone'       => 'required',
            //'price'       => 'required',
            //'description'   => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            $response = array( 'status'=> 'fail', 'message'=> $validator->messages()->first() );
        } else {

            $mobileUser = Usermobile::where('phone','=',trim(Input::get('device_phone')))->first();

            //User already registered
            if( !empty($mobileUser->user_mobile_id) && $mobileUser->status == '1'){

                $id = trim(Input::get('id'));
                $forsale = Forsale::find($id);

                if( !empty($forsale->forsale_id) && $forsale->user_mobile_id == $mobileUser->user_mobile_id ){

                    //$forsale->make_id        = $make->make_id;
                    //$forsale->user_mobile_id        = $mobileUser->user_mobile_id;
                    $model = trim(Input::get('model'));
                    if( !empty($model) ){
                        $forsale->model        = $model;
                    }

                    $title = trim(Input::get('title'));
                    if( !empty($title) ){
                        $forsale->title        = $title;
                    }

                    $phone = trim(Input::get('phone'));
                    if( !empty($phone) ){
                        $forsale->phone        = $phone;
                    }

                    $price = trim(Input::get('price'));
                    if( !empty($price) ){
                        $forsale->price        = $price;
                    }

                    $description = trim(Input::get('description'));
                    if( !empty($description) ){
                        $forsale->description        = $description;
                    }


                    //$forsale->save();

                    if( ! $forsale->save() ){
                        $response = array( 'status'=> 'fail', 'message'=> 'Something went wrong.' );
                    }else{

                        //Update quota for this user

                        //Upload Images, new logic - Start here
                        $image_sizes =  \Config::get('constant.image_sizes');

                        $imagePath = public_path('uploads') .'/images/';

                        $filnalDestinationPath = $imagePath . "foresale/";

                        if( !file_exists($filnalDestinationPath) ){
                            mkdir($filnalDestinationPath, 0755, true);
                        }


                        //Start - Delete old images
                        $photos = Photos::where('forsale_id', '=', $forsale->forsale_id)->get();
                        foreach($photos as $photo){

                            $photo_name = $photo->photo_name;

                            //Upload original image
                            $fileOriginalPath = $filnalDestinationPath . "original/" . $photo_name;

                            if( !empty($image_sizes) && is_array($image_sizes) ){

                                foreach($image_sizes as $image_size){

                                    $filePathImageSize = $filnalDestinationPath . "$image_size/" . $photo_name;

                                    //Delete file
                                    unlink($filePathImageSize);

                                    //Unset
                                    unset($filePathImageSize);


                                }


                            }


                            //delete original image
                            unlink($fileOriginalPath);

                            //Delete photo
                            $photo->delete();

                            unset($photo_name);



                        }

                        unset($photos,$photo,$fileOriginalPath);
                        //End - old image deleted




                        //Upload latest comming images
                        $imagenumber = \Config::get('constant.number_of_image',10);
                        for($i=1; $i <= $imagenumber; $i++){

                            if (Input::hasFile('image'.$i) ) {
                                $file            = Input::file('image'.$i);
                                $validrules = array('file' => 'required|mimes:png,gif,jpeg,jpg'); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
                                $validator = Validator::make(array('file'=> $file), $validrules);

                                if($validator->passes()) {


                                    //get File Name
                                    $fileExtension = $file->getClientOriginalExtension();

                                    if( empty($fileExtension) ){
                                        continue;
                                    }

                                    $newFilename = uniqid(). "_" . time() . '.' . $fileExtension;

                                    //Upload original image
                                    $fileOriginalPath = $filnalDestinationPath . "original/" . $newFilename;
                                    \Image::make( $file->getRealPath() )
                                        ->save($fileOriginalPath);



                                    if( !empty($image_sizes) && is_array($image_sizes) ){

                                        foreach($image_sizes as $image_size){

                                            $filePathImageSize = $filnalDestinationPath . "$image_size/" . $newFilename;

                                            \Image::make( $file->getRealPath() )
                                                ->resize($image_size,null, function ($constraint) { $constraint->aspectRatio(); })
                                                ->save($filePathImageSize);

                                            //Unset
                                            unset($filePathImageSize);
                                            unset($image_size);

                                        }


                                    }

                                    //Save into db
                                    $photo = new Photos();
                                    $photo->forsale_id       = $forsale->forsale_id;
                                    $photo->photo_name       = $newFilename;
                                    $photo->save();

                                }else{
                                    continue;
                                }

                                //Unset
                                unset($fileExtension);
                                unset($newFilename);
                                unset($photo);

                            }else{
                                continue;
                            }


                        }

                        $response = array( 'status'=> 'success', 'message'=> 'Successfully Updated.' );

                    }

                }else{
                    $response = array( 'status'=> 'fail', 'message'=> 'Unauthorize access.' );
                }


            }elseif( !empty($mobileUser->user_mobile_id) && empty($mobileUser->status) ){

                $response = array( 'status'=> 'fail', 'message'=> 'Unauthorize access.' );

            }else{
                //New User
                $response = array( 'status'=> 'fail', 'message'=> 'Something went wrong.' );
            }
        }

        return $response ;

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     * curl -i -X PUT --user admin:admin -d 'title=Updated Title' localhost/project/api/v1/pages/2
     */

//    public function update($id) {
//
//        $input = Input::all();
//
//        $page = Duration::find($id);
//
//        if ( !empty($input['level']) ) {
//            $page->level =$input['level'];
//        }
//
//        if ( !empty($input['date']) ) {
//            $page->date =$input['date'];
//        }
//
//        if ( !empty($input['time']) ) {
//            $page->time =$input['time'];
//        }
//
//        if ( !empty($input['location']) ) {
//            $page->location =$input['location'];
//        }
//
//        if ( !empty($input['status']) ) {
//            $page->status =$input['status'];
//        }
//
//        $page->save();
//
//        return Response::json(array(
//            'error' => false,
//            'message' => 'Page Updated'),
//            200
//        );
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     * curl -i -X DELETE --user admin:admin localhost/project/api/v1/pages/1
     */

    public function destroy() {

        $rules = array(
            'device_phone'      => 'required',
            'delete_id'       => 'required'
        );
//echo '<pre>';print_r(Input::hasFile('images*'));die('======Debugging=======');
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            $response = array( 'status'=> 'fail', 'message'=> $validator->messages()->first() );
        } else {

            $mobileUser = Usermobile::where('phone', '=', trim(Input::get('device_phone')))->first();

            //User already registered
            if (!empty($mobileUser->user_mobile_id) && $mobileUser->status == '1') {

                $delete_id = trim(Input::get('delete_id'));
                $page = Forsale::find($delete_id);

                if( !empty($page->forsale_id) &&  $page->user_mobile_id == $mobileUser->user_mobile_id ){


                    //Upload Images, new logic - Start here
                    $image_sizes =  \Config::get('constant.image_sizes');

                    $imagePath = public_path('uploads') .'/images/';

                    $filnalDestinationPath = $imagePath . "foresale/";


                    //Delete Photos
                    $photos = Photos::where('forsale_id', '=', $page->forsale_id)->get();
                    foreach($photos as $photo){

                        $photo_name = $photo->photo_name;

                        //Upload original image
                        $fileOriginalPath = $filnalDestinationPath . "original/" . $photo_name;




                        if( !empty($image_sizes) && is_array($image_sizes) ){

                            foreach($image_sizes as $image_size){

                                $filePathImageSize = $filnalDestinationPath . "$image_size/" . $photo_name;

                                //Delete file
                                unlink($filePathImageSize);

                                //Unset
                                unset($filePathImageSize);


                            }


                        }

                        //delete original image
                        unlink($fileOriginalPath);

                        //Delete photo
                        $photo->delete();

                        unset($photo_name);



                    }

                    //Delete foresale
                    $page->delete();

                    $response = array( 'status'=> 'success', 'message'=> 'successfully deleted.' );

                }else{
                    $response = array( 'status'=> 'fail', 'message'=> 'Unauthorized request.' );
                }



            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Unauthorized request.' );
            }

        }

        return $response ;
    }



}
