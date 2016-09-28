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
    /*
        Route::get ( 'scrape/american' , function() {

            $response = array( );


            $query = ' SELECT items.*, category.name FROM items,category ' .
                ' WHERE items.category_id = category.category_id AND category.name = "american" limit 0,20 ';

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

        } ) ;



        Route::get ( 'scrape/american/{category}' , function($category) {


            $response = array( );

            $catArray = array('cadillac','dodgenchrysler','chevrolet','gmc','fordnlincoln','hummer','jeep');

            $cnews = array () ;

            if( !empty($category) && in_array($category,$catArray)){

                $query = ' SELECT items.*, category.name FROM items,category ' .
                    ' WHERE items.category_id = category.category_id AND category.name = "'.$category.'" limit 0,20 ';

                $news = DB::select ( $query ) ;

                if( count($news) > 0 ){

                    foreach ( $news as $news_ ) {

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
                    $response = array( 'status'=> 'fail', 'message'=> 'Sorry, There is no relevant data found.' );
                }

            }else{
                $response = array( 'status'=> 'fail', 'message'=> 'Sorry, Request can not be executed.' );
            }

            return $response + array( 'results' => $cnews )  ;

        } ) ;
    */


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




    /*
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
                            'image'        => Helpers::build_image ( $news_->photo_name, $category, 'original' ) ,
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

    */


    Route::get ( 'showroom/{make}/{parentCarId?}' , function($make,$parentCarId = null) {


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
            ' WHERE showroom_car.status = "1" AND showroom_make.make = "'.$make.'" ';

        if( !empty($parentCarId) ){

            $query .= ' AND showroom_car.parent_model = "'.$parentCarId.'"  ';

        }else{
            $query .= ' AND showroom_car.parent_model = "0" ';
        }


        $query .= ' '.$limitArr['query'].'  ';
//echo '<pre>';print_r($query);die('======Debugging=======');
        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {
//echo '<pre>';print_r($news_);die('======Debugging=======');

                $phones = array();
                if( !empty($news_->phone) ){
                    $phones = explode(',',$news_->phone);
                }

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
                    'phones'      => $phones ,
                    'working_hours'      => $news_->working_hours ,
                    'warranty'      => $news_->warranty ,
                    'parent_model'      => $news_->parent_model ,
                    'hasChild'      => $news_->hasChild ,
                    'image'        => Helpers::build_image ( $news_->photo_name, $category, 'original' ) ,
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
                        'photo_name'        => Helpers::build_image ( $photosRaw->photo_name , 'showroom', 'original' ) ,
                        'default'        => $photosRaw->default
                    ] ;

                }

                $phones = array();
                if( !empty($news->phone) ){
                    $phones = explode(',',$news->phone);
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
                    'phones'      => $phones ,
                    'working_hours'      => $news->working_hours ,
                    'warranty'      => $news->warranty ,
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

        return $response + array( 'results' => $cnews )  ;

    } ) ;




    Route::get ( 'foresale/{makeregion}/{make}/{uuid?}' , function($makeregion,$make,$uuid = null) {


        $response = array( );
        $cnews = array () ;

        $apiUser = App\Modules\Forsale\Models\Apiuser::where('token', '=', trim($uuid))->first();

        $request_user_mobile_id = null;
        //User already registered
        if( !empty($apiUser->api_users_id) && !empty($apiUser->is_active) ){
            $request_user_mobile_id = $apiUser->api_users_id;
        }


        $category = 'foresale';

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT forsale.*,make.make,make_region.name as make_region_name ' .
            'FROM forsale JOIN make ON forsale.make_id = make.make_id ' .
            'JOIN make_region ON make.make_region_id = make_region.make_region_id ' .
            //'LEFT JOIN photo ON forsale.forsale_id = photo.forsale_id ' .
            'WHERE forsale.status = "1" AND make.slug = "'.$make.'" AND make_region.slug = "'.$makeregion.'" ' .
            'ORDER BY forsale.updated_at DESC';

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

                $date = '';
                if( !empty($news_->created_at) ){
                    $date = date('Y-m-d',strtotime($news_->created_at));
                }

                $isOwner = 0;
                if(  !empty($news_->api_users_id) && $request_user_mobile_id == $news_->api_users_id ){
                    $isOwner = 1;
                }

                $nwsRow = [
                    'forsale_id'      => $news_->forsale_id ,
                    'make'      => $news_->make ,
                    'make_region_name'        => $news_->make_region_name ,
                    'model'        => $news_->model ,
                    'title'        => $news_->title ,
                    'phone'        => $news_->phone ,
                    'price'      => $news_->price ,
                    'description'      => $news_->description ,
                    'post_date'      => $date ,
                    'is_owner'      => $isOwner ,
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


    Route::get ( 'foresalead/{foresale_id}/{uuid?}' , function($foresale_id,$uuid = null) {

        $response = array( );
        $cnews = array () ;

        if( !empty($foresale_id) ){

            $apiUser = App\Modules\Forsale\Models\Apiuser::where('token', '=', trim($uuid))->first();

            $request_user_mobile_id = null;
            //User already registered
            if( !empty($apiUser->api_users_id) && !empty($apiUser->is_active) ){
                $request_user_mobile_id = $apiUser->api_users_id;
            }


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

                $date = '';
                if( !empty($news->created_at) ){
                    $date = date('Y-m-d',strtotime($news->created_at));
                }

                $isOwner = 0;
                if( !empty($news->api_users_id) && $request_user_mobile_id == $news->api_users_id ){
                    $isOwner = 1;
                }



                $cnews = [
                    'forsale_id'      => $news->forsale_id ,
                    'make'        => $news->make ,
                    'make_region_name'        => $news->name ,
                    'model'        => $news->model ,
                    'title'        => $news->title ,
                    'phone'        => $news->phone ,
                    'price'        => $news->price ,
                    'description'      => $news->description ,
                    'post_date'      => $date ,
                    'is_owner'      => $isOwner ,
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






    Route::get ( 'spareparts/{make}' , function($make) {


        $response = array( );

        $cnews = array () ;

        //if( !empty($category) && in_array($category,$catArray)){
        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT spare_part.*, showroom_make.make FROM spare_part ' .
            ' JOIN showroom_make ON spare_part.showroom_make_id = showroom_make.showroom_make_id ' .
            ' WHERE spare_part.status = "1" AND showroom_make.make = "'.$make.'" ';


        $query .= ' '.$limitArr['query'].'  ';
//echo '<pre>';print_r($query);die('======Debugging=======');
        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {

                $nwsRow = [
                    'spare_part_id'      => $news_->spare_part_id ,
                    'branch_name'        => $news_->branch_name ,
                    'phone'        => $news_->phone ,
                    'internal_phone'      => $news_->internal_phone ,
                    'address'      => $news_->address ,
                    'working_time'      => $news_->working_time ,
                    'make'        => $news_->make
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


    Route::get ( 'sparepart/{spare_part_id}' , function($spare_part_id) {

        $response = array( );
        $cnews = array () ;

        if( !empty($spare_part_id) ){

            //TODO::Item not in
            $news = DB::table('spare_part')
                ->join('showroom_make', 'spare_part.showroom_make_id', '=', 'showroom_make.showroom_make_id')
                ->where('spare_part_id', $spare_part_id)
                ->first();


            if( !empty($news) ){

                $cnews = [
                    'spare_part_id'      => $news->spare_part_id ,
                    'branch_name'        => $news->branch_name ,
                    'phone'        => $news->phone ,
                    'internal_phone'      => $news->internal_phone ,
                    'address'      => $news->address ,
                    'working_time'      => $news->working_time ,
                    'make'        => $news->make
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




    Route::get ( 'servicecenters/{make}' , function($make) {


        $response = array( );

        $cnews = array () ;

        //if( !empty($category) && in_array($category,$catArray)){
        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT service_center.*, showroom_make.make FROM service_center ' .
            ' JOIN showroom_make ON service_center.showroom_make_id = showroom_make.showroom_make_id ' .
            ' WHERE service_center.status = "1" AND showroom_make.make = "'.$make.'" ';


        $query .= ' '.$limitArr['query'].'  ';
//echo '<pre>';print_r($query);die('======Debugging=======');
        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {

                $nwsRow = [
                    'service_center_id'      => $news_->service_center_id ,
                    'branch_name'        => $news_->branch_name ,
                    'phone'        => $news_->phone ,
                    'internal_phone'      => $news_->internal_phone ,
                    'address'      => $news_->address ,
                    'working_time'      => $news_->working_time ,
                    'make'        => $news_->make
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


    Route::get ( 'servicecenter/{service_center_id}' , function($service_center_id) {

        $response = array( );
        $cnews = array () ;

        if( !empty($service_center_id) ){

            //TODO::Item not in
            $news = DB::table('service_center')
                ->join('showroom_make', 'service_center.showroom_make_id', '=', 'showroom_make.showroom_make_id')
                ->where('service_center_id', $service_center_id)
                ->first();


            if( !empty($news) ){

                $cnews = [
                    'service_center_id'      => $news->service_center_id ,
                    'branch_name'        => $news->branch_name ,
                    'phone'        => $news->phone ,
                    'internal_phone'      => $news->internal_phone ,
                    'address'      => $news->address ,
                    'working_time'      => $news->working_time ,
                    'make'        => $news->make
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


    Route::get ( 'marine/{category}' , function($category) {


        $response = array( );
        $catArray = array('fiberglassandsmithy', 'mobilemechanicselectricity','freelycenters');

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
                        'image'        => Helpers::build_image ( $news_->image, $category, '400' ) ,
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




    Route::get ( 'scrapuser/{makeregion}/{uuid?}' , function($makeregion,$uuid = null) {


        $response = array( );
        $cnews = array () ;

        $apiUser = App\Modules\Forsale\Models\Apiuser::where('token', '=', trim($uuid))->first();

        $request_user_scrap_id = null;
        //User already registered
        if( !empty($apiUser->api_users_id) && !empty($apiUser->is_active) ){
            $request_user_scrap_id = $apiUser->api_users_id;
        }


        $category = 'scrap';

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT scrap.*,make_region.name as make_region_name ' .
            'FROM scrap ' .
            'JOIN make_region ON scrap.make_region_id = make_region.make_region_id ' .
            //'LEFT JOIN photo ON forsale.forsale_id = photo.forsale_id ' .
            'WHERE scrap.status = "1" AND make_region.slug = "'.$makeregion.'" ' .
            ' ORDER BY updated_at DESC ';

        $query .= ' '.$limitArr['query'].'  ';

        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {


                //Get one photo
                $firstPhoto = DB::table('photo')
                    ->where('scrap_id', $news_->scrap_id)
                    ->orderBy('scrap_id','DESC')
                    ->first();
                $photo_name_first = '';
                if( !empty($firstPhoto->photo_id) ){
                    $photo_name_first = $firstPhoto->photo_name;
                }

                $date = '';
                if( !empty($news_->created_at) ){
                    $date = date('Y-m-d',strtotime($news_->created_at));
                }

                $isOwner = 0;
                if(  !empty($news_->api_users_id) && $request_user_scrap_id == $news_->api_users_id ){
                    $isOwner = 1;
                }



                $nwsRow = [
                    'scrap_id'      => $news_->scrap_id ,
                    'make_region_name'        => $news_->make_region_name ,
                    'model'        => $news_->model ,
                    'title'        => $news_->title ,
                    'phone'        => $news_->phone ,
                    'price'      => $news_->price ,
                    'description'      => $news_->description ,
                    'post_date'      => $date ,
                    'is_owner'      => $isOwner ,
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

    Route::get ( 'scrapuserdetail/{scrap_id}/{uuid?}' , function($scrap_id,$uuid = null) {

        $response = array( );
        $cnews = array () ;

        if( !empty($scrap_id) ){

            $apiUser = App\Modules\Forsale\Models\Apiuser::where('token', '=', trim($uuid))->first();

            $request_user_scrap_id = null;
            //User already registered
            if( !empty($apiUser->api_users_id) && !empty($apiUser->is_active) ){
                $request_user_scrap_id = $apiUser->api_users_id;
            }


            //TODO::Item not in
            $news = DB::table('scrap')
                ->join('make_region', 'scrap.make_region_id', '=', 'make_region.make_region_id')
                ->where('scrap_id', $scrap_id)
                ->where('scrap.status', '=','1')
                ->first();

//echo '<pre>';print_r($news);die('======Debugging=======');

            if( !empty($news) ){

                $photosRaws = DB::table('photo')
                    ->where('scrap_id', $scrap_id)
                    ->orderBy('default','DESC')
                    ->get();

                $photos = array();
                foreach($photosRaws as $photosRaw){

                    $photos[] = [
                        'photo_id'      => $photosRaw->photo_id ,
                        'photo_name'        => Helpers::build_image ( $photosRaw->photo_name , 'scrap', '400' ) ,
                        'default'        => $photosRaw->default
                    ] ;

                }


                $date = '';
                if( !empty($news->created_at) ){
                    $date = date('Y-m-d',strtotime($news->created_at));
                }

                $isOwner = 0;
                if(  !empty($news->api_users_id) && $request_user_scrap_id == $news->api_users_id ){
                    $isOwner = 1;
                }

                $cnews = [
                    'scrap_id'      => $news->scrap_id ,
                    'make_region_name'        => $news->name ,
                    'model'        => $news->model ,
                    'title'        => $news->title ,
                    'phone'        => $news->phone ,
                    'price'        => $news->price ,
                    'description'      => $news->description ,
                    'post_date'      => $date ,
                    'is_owner'      => $isOwner ,
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



    Route::get ( 'marineuser/{makeregion}/{uuid?}' , function($makeregion,$uuid = null) {


        $response = array( );
        $cnews = array () ;

        $apiUser = App\Modules\Forsale\Models\Apiuser::where('token', '=', trim($uuid))->first();

        $request_user_marine_id = null;
        //User already registered
        if( !empty($apiUser->api_users_id) && !empty($apiUser->is_active) ){
            $request_user_marine_id = $apiUser->api_users_id;
        }




        $category = 'marine';

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT marine.*,marine_make_region.name as make_region_name ' .
            'FROM marine ' .
            'JOIN marine_make_region ON marine.marine_make_region_id = marine_make_region.marine_make_region_id ' .
            //'LEFT JOIN photo ON forsale.forsale_id = photo.forsale_id ' .
            'WHERE marine.status = "1" AND marine_make_region.slug = "'.$makeregion.'" '.
            'ORDER BY updated_at DESC';

        $query .= ' '.$limitArr['query'].'  ';

        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {


                //Get one photo
                $firstPhoto = DB::table('photo')
                    ->where('marine_id', $news_->marine_id)
                    ->orderBy('marine_id','DESC')
                    ->first();
                $photo_name_first = '';
                if( !empty($firstPhoto->photo_id) ){
                    $photo_name_first = $firstPhoto->photo_name;
                }

                $date = '';
                if( !empty($news_->created_at) ){
                    $date = date('Y-m-d',strtotime($news_->created_at));
                }

                $isOwner = 0;
                if(  !empty($news_->api_users_id) && $request_user_marine_id == $news_->api_users_id ){
                    $isOwner = 1;
                }



                $nwsRow = [
                    'marine_id'      => $news_->marine_id ,
                    'make_region_name'        => $news_->make_region_name ,
                    'model'        => $news_->model ,
                    'title'        => $news_->title ,
                    'phone'        => $news_->phone ,
                    'price'      => $news_->price ,
                    'description'      => $news_->description ,
                    'post_date'      => $date ,
                    'is_owner'      => $isOwner ,
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

    Route::get ( 'marineuserdetail/{marine_id}/{uuid?}' , function($marine_id,$uuid=null) {

        $response = array( );
        $cnews = array () ;

        if( !empty($marine_id) ){


            $apiUser = App\Modules\Forsale\Models\Apiuser::where('token', '=', trim($uuid))->first();

            $request_user_marine_id = null;
            //User already registered
            if( !empty($apiUser->api_users_id) && !empty($apiUser->is_active) ){
                $request_user_marine_id = $apiUser->api_users_id;
            }



            //TODO::Item not in
            $news = DB::table('marine')
                ->join('marine_make_region', 'marine.marine_make_region_id', '=', 'marine_make_region.marine_make_region_id')
                ->where('marine_id', $marine_id)
                ->where('marine.status', '=','1')
                ->first();

//echo '<pre>';print_r($news);die('======Debugging=======');

            if( !empty($news) ){

                $photosRaws = DB::table('photo')
                    ->where('marine_id', $marine_id)
                    ->orderBy('default','DESC')
                    ->get();

                $photos = array();
                foreach($photosRaws as $photosRaw){

                    $photos[] = [
                        'photo_id'      => $photosRaw->photo_id ,
                        'photo_name'        => Helpers::build_image ( $photosRaw->photo_name , 'marine', '400' ) ,
                        'default'        => $photosRaw->default
                    ] ;

                }

                $date = '';
                if( !empty($news->created_at) ){
                    $date = date('Y-m-d',strtotime($news->created_at));
                }

                $isOwner = 0;
                if(  !empty($news->api_users_id) && $request_user_marine_id == $news->api_users_id ){
                    $isOwner = 1;
                }


                $cnews = [
                    'marine_id'      => $news->marine_id ,
                    'make_region_name'        => $news->name ,
                    'model'        => $news->model ,
                    'title'        => $news->title ,
                    'phone'        => $news->phone ,
                    'price'        => $news->price ,
                    'description'      => $news->description ,
                    'post_date'      => $date ,
                    'is_owner'      => $isOwner ,
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




    Route::get ( 'accessoriesuser/{makeregion}/{uuid?}' , function($makeregion,$uuid=null) {


        $response = array( );
        $cnews = array () ;


        $apiUser = App\Modules\Forsale\Models\Apiuser::where('token', '=', trim($uuid))->first();

        $request_user_accessories_id = null;
        //User already registered
        if( !empty($apiUser->api_users_id) && !empty($apiUser->is_active) ){
            $request_user_accessories_id = $apiUser->api_users_id;
        }



        $category = 'accessories';

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT accessories.*,accessories_make_region.name as make_region_name ' .
            'FROM accessories ' .
            'JOIN accessories_make_region ON accessories.accessories_make_region_id = accessories_make_region.accessories_make_region_id ' .
            //'LEFT JOIN photo ON forsale.forsale_id = photo.forsale_id ' .
            'WHERE accessories.status = "1" AND accessories_make_region.slug = "'.$makeregion.'" ' .
            'ORDER BY updated_at DESC';

        $query .= ' '.$limitArr['query'].'  ';

        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {


                //Get one photo
                $firstPhoto = DB::table('photo')
                    ->where('accessories_id', $news_->accessories_id)
                    ->orderBy('accessories_id','DESC')
                    ->first();
                $photo_name_first = '';
                if( !empty($firstPhoto->photo_id) ){
                    $photo_name_first = $firstPhoto->photo_name;
                }

                $date = '';
                if( !empty($news_->created_at) ){
                    $date = date('Y-m-d',strtotime($news_->created_at));
                }

                $isOwner = 0;
                if(  !empty($news_->api_users_id) && $request_user_accessories_id == $news_->api_users_id ){
                    $isOwner = 1;
                }



                $nwsRow = [
                    'accessories_id'      => $news_->accessories_id ,
                    'make_region_name'        => $news_->make_region_name ,
                    'model'        => $news_->model ,
                    'title'        => $news_->title ,
                    'phone'        => $news_->phone ,
                    'price'      => $news_->price ,
                    'description'      => $news_->description ,
                    'post_date'      => $date ,
                    'is_owner'      => $isOwner ,
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

    Route::get ( 'accessoriesuserdetail/{accessories_id}/{uuid?}' , function($accessories_id,$uuid=null) {

        $response = array( );
        $cnews = array () ;

        if( !empty($accessories_id) ){

            $apiUser = App\Modules\Forsale\Models\Apiuser::where('token', '=', trim($uuid))->first();

            $request_user_accessories_id = null;
            //User already registered
            if( !empty($apiUser->api_users_id) && !empty($apiUser->is_active) ){
                $request_user_accessories_id = $apiUser->api_users_id;
            }

            //TODO::Item not in
            $news = DB::table('accessories')
                ->join('accessories_make_region', 'accessories.accessories_make_region_id', '=', 'accessories_make_region.accessories_make_region_id')
                ->where('accessories_id', $accessories_id)
                ->where('accessories.status', '=','1')
                ->first();

//echo '<pre>';print_r($news);die('======Debugging=======');

            if( !empty($news) ){

                $photosRaws = DB::table('photo')
                    ->where('accessories_id', $accessories_id)
                    ->orderBy('default','DESC')
                    ->get();

                $photos = array();
                foreach($photosRaws as $photosRaw){

                    $photos[] = [
                        'photo_id'      => $photosRaw->photo_id ,
                        'photo_name'        => Helpers::build_image ( $photosRaw->photo_name , 'accessories', '400' ) ,
                        'default'        => $photosRaw->default
                    ] ;

                }

                $date = '';
                if( !empty($news->created_at) ){
                    $date = date('Y-m-d',strtotime($news->created_at));
                }

                $isOwner = 0;
                if(  !empty($news->api_users_id) && $request_user_accessories_id == $news->api_users_id ){
                    $isOwner = 1;
                }



                $cnews = [
                    'accessories_id'      => $news->accessories_id ,
                    'make_region_name'        => $news->name ,
                    'model'        => $news->model ,
                    'title'        => $news->title ,
                    'phone'        => $news->phone ,
                    'price'        => $news->price ,
                    'description'      => $news->description ,
                    'post_date'      => $date ,
                    'is_owner'      => $isOwner ,
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



    Route::get ( 'boatfishinglist' , function() {


        $response = array( );
        $cnews = array () ;


        $category = 'boatfishing';

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT boat_fishing.*  ' .
            'FROM boat_fishing ' ;

        $query .= ' '.$limitArr['query'].'  ';

        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {


                //Get one photo
                $firstPhoto = DB::table('photo')
                    ->where('boat_fishing_id', $news_->boat_fishing_id)
                    ->orderBy('boat_fishing_id','DESC')
                    ->first();
                $photo_name_first = '';
                if( !empty($firstPhoto->photo_id) ){
                    $photo_name_first = $firstPhoto->photo_name;
                }


                $nwsRow = [
                    'boat_fishing_id'      => $news_->boat_fishing_id ,
                    'description'      => $news_->description ,
                    'phone'        => $news_->phone ,
                    'contact'      => $news_->contact ,
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


    Route::get ( 'boatfishinglist/{boat_fishing_id}' , function($boat_fishing_id) {

        $response = array( );
        $cnews = array () ;

        if( !empty($boat_fishing_id) ){


            //TODO::Item not in
            $news = DB::table('boat_fishing')
                ->where('boat_fishing_id', $boat_fishing_id)
                ->first();

//echo '<pre>';print_r($news);die('======Debugging=======');

            if( !empty($news) ){

                $photosRaws = DB::table('photo')
                    ->where('boat_fishing_id', $boat_fishing_id)
                    ->orderBy('default','DESC')
                    ->get();

                $photos = array();
                foreach($photosRaws as $photosRaw){

                    $photos[] = [
                        'photo_id'      => $photosRaw->photo_id ,
                        'photo_name'        => Helpers::build_image ( $photosRaw->photo_name , 'boatfishing', '400' ) ,
                        'default'        => $photosRaw->default
                    ] ;

                }


                $cnews = [
                    'boat_fishing_id'      => $news->boat_fishing_id ,
                    'description'      => $news->description ,
                    'phone'        => $news->phone ,
                    'contact'      => $news->contact ,
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



    Route::get ( 'carwashlist' , function() {


        $response = array( );
        $cnews = array () ;


        $category = 'carwash';

        //Limit Query
        $limitArr = Helpers::apiLimitQuery();

        $query = ' SELECT car_wash.*  ' .
            'FROM car_wash ' ;

        $query .= ' '.$limitArr['query'].'  ';

        $news = DB::select ( $query ) ;

        if( count($news) > 0 ){

            foreach ( $news as $news_ ) {


                //Get one photo
                $firstPhoto = DB::table('photo')
                    ->where('car_wash_id', $news_->car_wash_id)
                    ->orderBy('car_wash_id','ASC')
                    ->first();
                $photo_name_first = '';
                if( !empty($firstPhoto->photo_id) ){
                    $photo_name_first = $firstPhoto->photo_name;
                }


                $phones = array();
                if( !empty($news_->phone) ){
                    $phones = explode(',',$news_->phone);
                }


                $nwsRow = [
                    'car_wash_id'      => $news_->car_wash_id ,
                    'name'      => $news_->name ,
                    'description'      => $news_->description ,
                    'phone'        => $phones ,
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


    Route::get ( 'carwashlist/{car_wash_id}' , function($car_wash_id) {

        $response = array( );
        $cnews = array () ;

        if( !empty($car_wash_id) ){


            //TODO::Item not in
            $news = DB::table('car_wash')
                ->where('car_wash_id', $car_wash_id)
                ->first();

//echo '<pre>';print_r($news);die('======Debugging=======');

            if( !empty($news) ){

                $photosRaws = DB::table('photo')
                    ->where('car_wash_id', $car_wash_id)
                    ->orderBy('default','DESC')
                    ->get();

                $photos = array();
                foreach($photosRaws as $photosRaw){

                    $photos[] = [
                        'photo_id'      => $photosRaw->photo_id ,
                        'photo_name'        => Helpers::build_image ( $photosRaw->photo_name , 'carwash', '400' ) ,
                        'default'        => $photosRaw->default
                    ] ;

                }

                $phones = array();
                if( !empty($news->phone) ){
                    $phones = explode(',',$news->phone);
                }


                $cnews = [
                    'car_wash_id'      => $news->car_wash_id ,
                    'name'      => $news->name ,
                    'description'      => $news->description ,
                    'phone'        => $phones ,
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



