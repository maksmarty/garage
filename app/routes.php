<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

# login page
Route::get('/', array('uses' => '\App\Modules\User\Controllers\UserController@showLogin'));



# user controller
Route::controller('user', '\App\Modules\User\Controllers\UserController');


Route::api ( ['version' => 'v1' , 'prefix' => 'api' , 'protected' => false ] , function() //'before' => 'checktoken' ,
{
    //echo '<pre>';print_r(\App\Modules\Forsale\Models\Makeregion::where('slug','=','american')->first()->name);die('======Debugging=======');
    /*Route::get ( 'scrape/american' , function() {

        $response = array( );


        $query = ' SELECT items.*, category.name FROM items,category ' .
            ' WHERE items.category_id = category.category_id AND category.name = "american" limit 0,12 ';

        $news = DB::select ( $query ) ;
        //echo '<pre>';print_r();die('======Debugging=======');

        $cnews = array () ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {
                //Number of vis by users
                $viewCount = ! empty ( $news_->number_of_views ) ? $news_->number_of_views : "0" ;
                $nwsRow = [
                    'item_id'      => $news_->item_id ,
                    'phone'        => $news_->phone ,
                    'description'      => $news_->description ,
                    'image'        => Helpers::build_image ( $news_->image ) ,
                ] ;

                $cnews[] = ( object ) $nwsRow ;
            }

            $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant  data.', );
        }



        return $response + array( 'results' => $cnews )  ;

    } ) ;*/


    Route::get ( 'scrape/american/{category}' , function($category) {


        $response = array( );
        $catArray = array('cadillac','dodgenchrysler','chevrolet','gmc','fordnlincoln','hummer','jeep');

        $cnews = array () ;

        if( !empty($category) && in_array($category,$catArray)){

            //Limit Query
            $limitArr = Helpers::apiLimitQuery();

            $query = ' SELECT items.*, category.name FROM items,category ' .
                ' WHERE items.category_id = category.category_id AND category.name = "'.$category.'" '.$limitArr['query'].' ';

            $news = DB::select ( $query ) ;
            //echo '<pre>';print_r();die('======Debugging=======');

            if( count($news) > 0 ){

                foreach ( $news as $news_ ) {

                    $nwsRow = [
                        'item_id'      => $news_->item_id ,
                        'phone'        => $news_->phone ,
                        'phone1'        => $news_->phone1 ,
                        'phone2'        => $news_->phone2 ,
                        'description'      => $news_->description ,
                        'image'        => Helpers::build_image ( $news_->image, $category ) ,
                    ] ;

                    $cnews[] = ( object ) $nwsRow ;
                }

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'scrape/european/{category}' , function($category) {


        $response = array( );
        $catArray = array('mercedes','bmw','rangerover','volvowagon','jaguar','porsche','audi','peugeot','skoda','mini','renault','volvo');
        //$catArray = array('cadillac','dodgenchrysler','chevrolet','gmc','fordnlincoln','hummer','jeep');

        $cnews = array () ;

        if( !empty($category) && in_array($category,$catArray)){
            //Limit Query
            $limitArr = Helpers::apiLimitQuery();

            $query = ' SELECT items.*, category.name FROM items,category ' .
                ' WHERE items.category_id = category.category_id AND category.name = "'.$category.'" '.$limitArr['query'].' ';

            $news = DB::select ( $query ) ;

            if( count($news) > 0 ){

                foreach ( $news as $news_ ) {

                    $nwsRow = [
                        'item_id'      => $news_->item_id ,
                        'phone'        => $news_->phone ,
                        'phone1'        => $news_->phone1 ,
                        'phone2'        => $news_->phone2 ,
                        'description'      => $news_->description ,
                        'image'        => Helpers::build_image ( $news_->image, $category ) ,
                    ] ;

                    $cnews[] = ( object ) $nwsRow ;
                }

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'scrape/asian/{category}' , function($category) {


        $response = array( );
        $catArray = array('toyota','nissan','lexus','infiniti','honda','hyundai','kia','mitsubishi','suzuki','mazda','isuza','subaru','sheri');
        //$catArray = array('cadillac','dodgenchrysler','chevrolet','gmc','fordnlincoln','hummer','jeep');

        $cnews = array () ;

        if( !empty($category) && in_array($category,$catArray)){

            //Limit Query
            $limitArr = Helpers::apiLimitQuery();

            $query = ' SELECT items.*, category.name FROM items,category ' .
                ' WHERE items.category_id = category.category_id AND category.name = "'.$category.'" '.$limitArr['query'].' ';

            $news = DB::select ( $query ) ;
            //echo '<pre>';print_r();die('======Debugging=======');

            if( count($news) > 0 ){

                foreach ( $news as $news_ ) {

                    $nwsRow = [
                        'item_id'      => $news_->item_id ,
                        'phone'        => $news_->phone ,
                        'phone1'        => $news_->phone1 ,
                        'phone2'        => $news_->phone2 ,
                        'description'      => $news_->description ,
                        'image'        => Helpers::build_image ( $news_->image, $category ) ,
                    ] ;

                    $cnews[] = ( object ) $nwsRow ;
                }

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;



    Route::get ( 'scrape/delivery' , function() {


        $response = array( );

        $cnews = array () ;

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT items.*, category.name FROM items,category ' .
            ' WHERE items.category_id = category.category_id AND category.name = "delivery" '.$limitArr['query'].' ';

        $news = DB::select ( $query ) ;
        //echo '<pre>';print_r();die('======Debugging=======');

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {

                $nwsRow = [
                    'item_id'      => $news_->item_id ,
                    'phone'        => $news_->phone ,
                    'phone1'        => $news_->phone1 ,
                    'phone2'        => $news_->phone2 ,
                    'description'      => $news_->description ,
                    'image'        => Helpers::build_delivery_image() ,
                ] ;

                $cnews[] = ( object ) $nwsRow ;
            }

            $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
        }



        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'taxi' , function() {


        $response = array( );

        $cnews = array () ;

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT items.*, category.name FROM items,category ' .
            ' WHERE items.category_id = category.category_id AND category.name = "taxi" '.$limitArr['query'].' ';

        $news = DB::select ( $query ) ;
        //echo '<pre>';print_r();die('======Debugging=======');

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {

                $nwsRow = [
                    'item_id'      => $news_->item_id ,
                    'phone'        => $news_->phone ,
                    'phone1'        => $news_->phone1 ,
                    'phone2'        => $news_->phone2 ,
                    'description'      => $news_->description ,
                    'image'        => Helpers::build_taxi_image() ,
                ] ;

                $cnews[] = ( object ) $nwsRow ;
            }

            $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
        }



        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'movablewash' , function() {


        $response = array( );

        $cnews = array () ;

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT items.*, category.name FROM items,category ' .
            ' WHERE items.category_id = category.category_id AND category.name = "movablewash" '.$limitArr['query'].' ';

        $news = DB::select ( $query ) ;
        //echo '<pre>';print_r();die('======Debugging=======');

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {

                $nwsRow = [
                    'item_id'      => $news_->item_id ,
                    'phone'        => $news_->phone ,
                    'phone1'        => $news_->phone1 ,
                    'phone2'        => $news_->phone2 ,
                    'description'      => $news_->description ,
                    'image'        => Helpers::build_movablewash_image() ,
                ] ;

                $cnews[] = ( object ) $nwsRow ;
            }

            $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
        }



        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'technicalinspection' , function() {


        $response = array( );

        $cnews = array () ;

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT items.*, category.name FROM items,category ' .
            ' WHERE items.category_id = category.category_id AND category.name = "technicalinspection" '.$limitArr['query'].' ';

        $news = DB::select ( $query ) ;
        //echo '<pre>';print_r();die('======Debugging=======');

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {

                $nwsRow = [
                    'item_id'      => $news_->item_id ,
                    'phone'        => $news_->phone ,
                    'phone1'        => $news_->phone1 ,
                    'phone2'        => $news_->phone2 ,
                    'description'      => $news_->description ,
                    'image'        => Helpers::build_image ( $news_->image, 'technicalinspection' ) ,
                ] ;

                $cnews[] = ( object ) $nwsRow ;
            }

            $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
        }



        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'helpinroad1/{category}' , function($category) {


        $response = array( );
        $catArray = array('tareeqalabdali','tareeqalkabad','tareeqalsabeeh','tareeqalsalmi');
        //$catArray = array('tareeqalabdali','tareeqalkabad','tareeqalsabeeh','tareeqalsalmi');
        //$catArray = array('alasmah','alfarwaniya','aljahra','tareeqalwafratwaalnuwaisib');
        //$catArray = array('alahmadi','fanimotanqal','hauli','mubarakalkabeer');

        $cnews = array () ;

        if( !empty($category) && in_array($category,$catArray)){

            //Limit Query
            $limitArr = Helpers::apiLimitQuery();

            $query = ' SELECT items.*, category.name FROM items,category ' .
                ' WHERE items.category_id = category.category_id AND category.name = "'.$category.'" '.$limitArr['query'].' ';

            $news = DB::select ( $query ) ;
            //echo '<pre>';print_r();die('======Debugging=======');

            if( count($news) > 0 ){

                foreach ( $news as $news_ ) {

                    $nwsRow = [
                        'item_id'      => $news_->item_id ,
                        'phone'        => $news_->phone ,
                        'phone1'        => $news_->phone1 ,
                        'phone2'        => $news_->phone2 ,
                        'description'      => $news_->description ,
                        'image'        => Helpers::build_image ( $news_->image, $category ) ,
                    ] ;

                    $cnews[] = ( object ) $nwsRow ;
                }

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'helpinroad2/{category}' , function($category) {


        $response = array( );
        $catArray = array('alasmah','alfarwaniya','aljahra','tareeqalwafratwaalnuwaisib');
        //$catArray = array('tareeqalabdali','tareeqalkabad','tareeqalsabeeh','tareeqalsalmi');
        //$catArray = array('alasmah','alfarwaniya','aljahra','tareeqalwafratwaalnuwaisib');
        //$catArray = array('alahmadi','fanimotanqal','hauli','mubarakalkabeer');

        $cnews = array () ;

        if( !empty($category) && in_array($category,$catArray)){

            //Limit Query
            $limitArr = Helpers::apiLimitQuery();

            $query = ' SELECT items.*, category.name FROM items,category ' .
                ' WHERE items.category_id = category.category_id AND category.name = "'.$category.'" '.$limitArr['query'].' ';

            $news = DB::select ( $query ) ;
            //echo '<pre>';print_r();die('======Debugging=======');

            if( count($news) > 0 ){

                foreach ( $news as $news_ ) {

                    $nwsRow = [
                        'item_id'      => $news_->item_id ,
                        'phone'        => $news_->phone ,
                        'phone1'        => $news_->phone1 ,
                        'phone2'        => $news_->phone2 ,
                        'description'      => $news_->description ,
                        'image'        => Helpers::build_image ( $news_->image, $category ) ,
                    ] ;

                    $cnews[] = ( object ) $nwsRow ;
                }

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'helpinroad3/{category}' , function($category) {


        $response = array( );
        $catArray = array('alahmadi','fanimotanqal','hauli','mubarakalkabeer');
        //$catArray = array('tareeqalabdali','tareeqalkabad','tareeqalsabeeh','tareeqalsalmi');
        //$catArray = array('alasmah','alfarwaniya','aljahra','tareeqalwafratwaalnuwaisib');
        //$catArray = array('alahmadi','fanimotanqal','hauli','mubarakalkabeer');

        $cnews = array () ;

        if( !empty($category) && in_array($category,$catArray)){

            //Limit Query
            $limitArr = Helpers::apiLimitQuery();

            $query = ' SELECT items.*, category.name FROM items,category ' .
                ' WHERE items.category_id = category.category_id AND category.name = "'.$category.'" '.$limitArr['query'].' ';

            $news = DB::select ( $query ) ;
            //echo '<pre>';print_r();die('======Debugging=======');

            if( count($news) > 0 ){

                foreach ( $news as $news_ ) {

                    $nwsRow = [
                        'item_id'      => $news_->item_id ,
                        'phone'        => $news_->phone ,
                        'phone1'        => $news_->phone1 ,
                        'phone2'        => $news_->phone2 ,
                        'description'      => $news_->description ,
                        'image'        => Helpers::build_image ( $news_->image, $category ) ,
                    ] ;

                    $cnews[] = ( object ) $nwsRow ;
                }

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;



    Route::get ( 'tintingcar' , function() {


        $response = array( );

        $cnews = array () ;

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT items.*, category.name FROM items,category ' .
            ' WHERE items.category_id = category.category_id AND category.name = "talsywahamayatwatajlil" '.$limitArr['query'].' ';

        $news = DB::select ( $query ) ;
        //echo '<pre>';print_r();die('======Debugging=======');

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {

                $nwsRow = [
                    'item_id'      => $news_->item_id ,
                    'phone'        => $news_->phone ,
                    'phone1'        => $news_->phone1 ,
                    'phone2'        => $news_->phone2 ,
                    'description'      => $news_->description ,
                    'image'        => Helpers::build_image ( $news_->image, 'talsywahamayatwatajlil' ) ,
                ] ;

                $cnews[] = ( object ) $nwsRow ;
            }

            $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
        }



        return $response + array( 'results' => $cnews )  ;

    } ) ;



    Route::get ( 'garage/{category}' , function($category) {


        $response = array( );
        $catArray = array('awadamwaradeetarat','barmajatsayaraat','breakmizanwaheena','hydraulics','itaraat','jerat','katagyaar','kharbaawatakeef','makhrth','mechanic','shabagwahadada','shaftsadmat','tadeelranjat','taleemayaadin','tanjeed','zajaj','zeenatsayaratmasjalat');
        //$catArray = array('cadillac','dodgenchrysler','chevrolet','gmc','fordnlincoln','hummer','jeep');

        $cnews = array () ;

        if( !empty($category) && in_array($category,$catArray)){

            //Limit Query
            $limitArr = Helpers::apiLimitQuery();

            $query = ' SELECT items.*, category.name FROM items,category ' .
                ' WHERE items.category_id = category.category_id AND category.name = "'.$category.'" '.$limitArr['query'].' ';

            $news = DB::select ( $query ) ;
            //echo '<pre>';print_r();die('======Debugging=======');

            if( count($news) > 0 ){

                foreach ( $news as $news_ ) {

                    $nwsRow = [
                        'item_id'      => $news_->item_id ,
                        'phone'        => $news_->phone ,
                        'phone1'        => $news_->phone1 ,
                        'phone2'        => $news_->phone2 ,
                        'description'      => $news_->description ,
                        'image'        => Helpers::build_image ( $news_->image, $category ) ,
                    ] ;

                    $cnews[] = ( object ) $nwsRow ;
                }

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;





    Route::get ( 'generalservices/{category}' , function($category) {


        $response = array( );
        $catArray = array('tankad','taleemqayadat','nakalafsh','kafalshayarat','hadadatwamajlat','alshahnalbari','nasaaf','darkatar','crane');
        //$catArray = array('cadillac','dodgenchrysler','chevrolet','gmc','fordnlincoln','hummer','jeep');

        $cnews = array () ;

        if( !empty($category) && in_array($category,$catArray)){

            $categoriesExcep = array('nasaaf','darkatar','crane');

            //Limit Query
            $limitArr = Helpers::apiLimitQuery();

            $query = ' SELECT items.*, category.name FROM items,category ' .
                ' WHERE items.category_id = category.category_id AND category.name = "'.$category.'" '.$limitArr['query'].' ';

            $news = DB::select ( $query ) ;
            //echo '<pre>';print_r();die('======Debugging=======');

            if( count($news) > 0 ){

                foreach ( $news as $news_ ) {


                    if( !in_array($category,$categoriesExcep) ){
                        $imagesrc = Helpers::build_static_image($category);
                    }else{
                        $imagesrc = Helpers::build_image ( $news_->image, $category );
                    }


                    $nwsRow = [
                        'item_id'      => $news_->item_id ,
                        'phone'        => $news_->phone ,
                        'phone1'        => $news_->phone1 ,
                        'phone2'        => $news_->phone2 ,
                        'description'      => $news_->description ,
                        'image'        => $imagesrc ,
                    ] ;

                    $cnews[] = ( object ) $nwsRow ;
                }

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;





    Route::get ( 'showroom/{make}/{displaytype?}' , function($make,$displaytype = null) {


        $response = array( );
        //$catArray = array('mercedes','bmw','rangerover','volvowagon','jaguar','porsche','audi','peugeot','skoda','mini','renault','volvo');
        //$catArray = array('cadillac','dodgenchrysler','chevrolet','gmc','fordnlincoln','hummer','jeep');

        $cnews = array () ;
        $category = 'showroom';

        //if( !empty($category) && in_array($category,$catArray)){
            //Limit Query
            $limitArr = Helpers::apiLimitQuery();

            $query = ' SELECT showroom_car.*, showroom_make.make, photo.photo_name FROM showroom_car ' .
                ' JOIN showroom_make ON showroom_car.showroom_make_id = showroom_make.showroom_make_id ' .
                ' LEFT JOIN photo ON ( showroom_car.showroom_car_id = photo.showroom_car_id AND photo.default = "1" )' .
                ' WHERE showroom_make.make = "'.$make.'" ';

            if( !empty($displaytype) ){

                $displayConf = \Config::get('constant.showroom_display');

                $searchKey = array_search($displaytype,$displayConf);

                if( $searchKey ){
                    $query .= ' AND showroom_car.display = "'.$searchKey.'"  ';
                }

            }


            $query .= ' '.$limitArr['query'].'  ';
//echo '<pre>';print_r($query);die('======Debugging=======');
            $news = DB::select ( $query ) ;

            if( count($news) > 0 ){

                foreach ( $news as $news_ ) {

                    $nwsRow = [
                        'showroom_car_id'      => $news_->showroom_car_id ,
                        'make'        => $news_->make ,
                        'model'        => $news_->model ,
                        'year'        => $news_->year ,
                        'engine'      => $news_->engine ,
                        'transmission'      => $news_->transmission ,
                        'payment'      => $news_->payment ,
                        'price'      => $news_->price ,
                        'description'      => $news_->description ,
                        'contact'      => $news_->contact ,
                        'working_hours'      => $news_->working_hours ,
                        'image'        => Helpers::build_image ( $news_->photo_name, $category, '400' ) ,
                    ] ;

                    $cnews[] = ( object ) $nwsRow ;
                }

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

//        }else{
//            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
//        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;



    Route::get ( 'showroomcar/{showroom_id}' , function($showroom_id) {

        $response = array( );
        $cnews = array () ;

        if( !empty($showroom_id) ){

            //TODO::Item not in
            $news = DB::table('showroom_car')
                ->join('showroom_make', 'showroom_car.showroom_make_id', '=', 'showroom_make.showroom_make_id')
                ->where('showroom_car_id', $showroom_id)
                //->where('category.name', '!=','delivery')
                ->first();



            if( !empty($news) ){

                $photosRaws = DB::table('photo')
                   ->where('showroom_car_id', $showroom_id)
                    ->orderBy('default','DESC')
                    ->get();

                $photos = array();
                foreach($photosRaws as $photosRaw){

                    $photos[] = [
                        'photo_id'      => $photosRaw->photo_id ,
                        'photo_name'        => Helpers::build_image ( $photosRaw->photo_name , 'showroom', '400' ) ,
                        'default'        => $photosRaw->default
                    ] ;

                }



                $cnews = [
                    'showroom_car_id'      => $news->showroom_car_id ,
                    'make'        => $news->make ,
                    'model'        => $news->model ,
                    'year'        => $news->year ,
                    'engine'        => $news->engine ,
                    'transmission'        => $news->transmission ,
                    'payment'        => $news->payment ,
                    'price'        => $news->price ,
                    'description'      => $news->description ,
                    'contact'      => $news->contact ,
                    'working_hours'      => $news->working_hours ,
                    'images'        => $photos  ,
                ] ;

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed'  );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.');
        }
//echo '<pre>';print_r($cnews);die('======Debugging=======');
        return $response + array( 'results' => $cnews )  ;

    } ) ;





    Route::get ( 'item/{item_id}' , function($item_id) {

        $response = array( );
        $cnews = array () ;

        if( !empty($item_id) ){

            //TODO::Item not in
            $news = DB::table('items')
                ->join('category', 'items.category_id', '=', 'category.category_id')
                ->where('item_id', $item_id)
                ->where('category.name', '!=','delivery')
                ->first();



            if( !empty($news) ){

                $cnews = [
                    'item_id'      => $news->item_id ,
                    'category'        => $news->name ,
                    'phone'        => $news->phone ,
                    'phone1'        => $news->phone1 ,
                    'phone2'        => $news->phone2 ,
                    'description'      => $news->description ,
                    'image'        => Helpers::build_image ( $news->image, $news->name, '400' )  ,
                ] ;

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed'  );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.');
        }
//echo '<pre>';print_r($cnews);die('======Debugging=======');
        return $response + array( 'results' => $cnews )  ;

    } ) ;




    Route::get ( 'showroom/{make}/{displaytype?}' , function($make,$displaytype = null) {


        $response = array( );
        //$catArray = array('mercedes','bmw','rangerover','volvowagon','jaguar','porsche','audi','peugeot','skoda','mini','renault','volvo');
        //$catArray = array('cadillac','dodgenchrysler','chevrolet','gmc','fordnlincoln','hummer','jeep');

        $cnews = array () ;
        $category = 'showroom';

        //if( !empty($category) && in_array($category,$catArray)){
        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT showroom_car.*, showroom_make.make, photo.photo_name FROM showroom_car ' .
            ' JOIN showroom_make ON showroom_car.showroom_make_id = showroom_make.showroom_make_id ' .
            ' LEFT JOIN photo ON ( showroom_car.showroom_car_id = photo.showroom_car_id AND photo.default = "1" )' .
            ' WHERE showroom_make.make = "'.$make.'" ';

        if( !empty($displaytype) ){

            $displayConf = \Config::get('constant.showroom_display');

            $searchKey = array_search($displaytype,$displayConf);

            if( $searchKey ){
                $query .= ' AND showroom_car.display = "'.$searchKey.'"  ';
            }

        }


        $query .= ' '.$limitArr['query'].'  ';
//echo '<pre>';print_r($query);die('======Debugging=======');
        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {

                $nwsRow = [
                    'showroom_car_id'      => $news_->showroom_car_id ,
                    'make'        => $news_->make ,
                    'model'        => $news_->model ,
                    'year'        => $news_->year ,
                    'engine'      => $news_->engine ,
                    'transmission'      => $news_->transmission ,
                    'payment'      => $news_->payment ,
                    'price'      => $news_->price ,
                    'description'      => $news_->description ,
                    'contact'      => $news_->contact ,
                    'working_hours'      => $news_->working_hours ,
                    'image'        => Helpers::build_image ( $news_->photo_name, $category, '400' ) ,
                ] ;

                $cnews[] = ( object ) $nwsRow ;
            }

            $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
        }

//        }else{
//            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
//        }

        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'foresale/{makeregion}/{make}' , function($makeregion,$make) {


        $response = array( );
        $cnews = array () ;
        $category = 'foresale';

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT forsale.*,make.make,make_region.name as make_region_name ' .
            'FROM forsale JOIN make ON forsale.make_id = make.make_id ' .
            'JOIN make_region ON make.make_region_id = make_region.make_region_id ' .
            //'LEFT JOIN photo ON forsale.forsale_id = photo.forsale_id ' .
            'WHERE forsale.status = "1" AND make = "'.$make.'" AND make_region.name = "'.$makeregion.'" ';

        $query .= ' '.$limitArr['query'].'  ';

        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {


                //Get one photo
                $firstPhoto = DB::table('photo')
                    ->where('forsale_id', $news_->forsale_id)
                    ->orderBy('forsale_id','DESC')
                    ->first();
                $photo_name_first = '';
                if( !empty($firstPhoto->photo_id) ){
                    $photo_name_first = $firstPhoto->photo_name;
                }



                $nwsRow = [
                    'forsale_id'      => $news_->forsale_id ,
                    'make'      => $news_->make ,
                    'make_region_name'        => $news_->make_region_name ,
                    'title'        => $news_->title ,
                    'phone'        => $news_->phone ,
                    'price'      => $news_->price ,
                    'description'      => $news_->description ,
                    //'default'      => $news_->default ,
                    'image'        => Helpers::build_image ( $photo_name_first, $category, '400' ) ,
                ] ;

                $cnews[] = ( object ) $nwsRow ;
            }

            //echo '<pre>';print_r($cnews);die('======Debugging=======');

            $response = array( 'status'=> 'success', 'message'=> 'Successfully executed','data_count' => count($news) );

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
        }
        return $response + array( 'results' => $cnews )  ;

    } ) ;


    Route::get ( 'foresalead/{foresale_id}' , function($foresale_id) {

        $response = array( );
        $cnews = array () ;

        if( !empty($foresale_id) ){

            //TODO::Item not in
            $news = DB::table('forsale')
                ->join('make', 'forsale.make_id', '=', 'make.make_id')
                ->join('make_region', 'make.make_region_id', '=', 'make_region.make_region_id')
                ->where('forsale_id', $foresale_id)
                ->where('forsale.status', '=','1')
                ->first();

//echo '<pre>';print_r($news);die('======Debugging=======');

            if( !empty($news) ){

                $photosRaws = DB::table('photo')
                    ->where('forsale_id', $foresale_id)
                    ->orderBy('default','DESC')
                    ->get();

                $photos = array();
                foreach($photosRaws as $photosRaw){

                    $photos[] = [
                        'photo_id'      => $photosRaw->photo_id ,
                        'photo_name'        => Helpers::build_image ( $photosRaw->photo_name , 'foresale', '400' ) ,
                        'default'        => $photosRaw->default
                    ] ;

                }

                $cnews = [
                    'forsale_id'      => $news->forsale_id ,
                    'make'        => $news->make ,
                    'make_region_name'        => $news->name ,
                    'title'        => $news->title ,
                    'phone'        => $news->phone ,
                    'price'        => $news->price ,
                    'description'      => $news->description ,
                    'images'        => $photos  ,
                ] ;

                $response = array( 'status'=> 'success', 'message'=> 'Successfully executed'  );

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
            }

        }else{
            $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.');
        }
//echo '<pre>';print_r($cnews);die('======Debugging=======');
        return $response + array( 'results' => $cnews )  ;

    } ) ;



});



// Display all SQL executed in Eloquent
//Event::listen('illuminate.query', function($query)
//{
//    var_dump($query);
//});
