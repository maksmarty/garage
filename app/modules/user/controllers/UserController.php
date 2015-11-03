<?php

/*
 * Controller   : Login Controller
 * Descripttion : Handle login and Register functionallity.
 */

namespace App\Modules\User\Controllers;

use App\Modules\User\Models\User;
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

class UserController extends \BaseController {

    public $restful = true;
    
    public function __construct() {

//         if(!(Auth::check())){
//
//             # call login view
//             return View::make('user::login');
//         }
    }
    
    # Show Login Form  
    public function showLogin(){

        //echo  Hash::make('admin');
        if(Auth::check()){

           # redirect to dahboard
           return Redirect::to('/dashboard');
        }else{

            # call login view
            return View::make('user::login');
        }
    }
    
    
    # Manage Login Method    
    public function postLogin(){
        //echo Hash::make(Input::get('gaurav123'));die;
        //global $BASE_URL;
        //echo '<pre>';print_r(1);die('======Debugging=======');
        # No view is required
        $this->layout = null;
        
        # check request is ajax or not
        if (Request::ajax()) {     
                
            # intailize variable here
            $data = array();
            $redirect='';
            $msg = '';
            $response = array();


            # validate the info, create rules for the inputs
            # apply server side validation
            $rules = array(
                    'email'    => 'required|email',
                    'password' => 'required|alphaNum|min:3'
            );

            # run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);

            # if the validator fails, redirect back to the login
            if ($validator->fails()) {
                //echo '<pre>';print_r($validator->messages()->all() );//$validator->messages();
                $response['status'] = 'error';
                $response['message'] = Helpers::buildErrorMessage($validator->messages()->all());

            } else {

                # create our user data for the authentication
                $data = array(
                        'email' 	=> Input::get('email'),
                        'password' 	=> Input::get('password')
                );

                if (Auth::attempt($data)){
                    Auth::login(Auth::user(), true);
                    $response['status'] = 'success';
                    $response['redirect'] = '/dashboard';
                    $response['message'] = 'Login Sucessfully!';
                }else{

                    $response['status'] = 'error';
                    $response['message'] = 'Something went wrong';
                }
            }

        }else{
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong';
        }

        return Response::json($response);
        die;
    }
    
    # logout - Use Auth module , destroy seesion
    # redirect to login url
    public function logout(){

       Auth::logout(); // log the user out of our application
       Session::flush();
       return Redirect::to('/');
    }


    # Show Rgeister Form
    public function showRegister(){
		// show the Register form
		return View::make('user::register');
    }


    # Register Method     
    public function doRegister(){
        
       
    }
    
    # change -password
    public function changePassword(){
        
         if(Auth::check()){

            # redirect to dahboard
            return View::make('user::changePassword');
         }else{

             # call login view
             return View::make('user::login');
         }       
    }
    
    # handle change password post data
    public function postUserChangePassword(){
        
        $user = Auth::user();
     
        $rules = array(
            'cp_old_password' => 'required|alphaNum|between:5,255',
            'cp_new_password' => 'required|alphaNum|between:5,255'
        );

        $validator = Validator::make(Input::all(), $rules);
             
        

        if ($validator->fails()) 
        {
            return Redirect::action('\App\Modules\User\Controllers\UserController@changePassword',$user->id)->withErrors($validator);
        } 
        else 
        {
                           
            if (!Hash::check(Input::get('cp_old_password'), $user->password)) 
            {
                return Redirect::action('\App\Modules\User\Controllers\UserController@changePassword',$user->id)->withErrors('Your old password does not match');
            }
            else
            {
                $user->password = Hash::make(Input::get('cp_new_password'));
                $user->save();
                return Redirect::action('\App\Modules\User\Controllers\UserController@changePassword',$user->id)->with('success',"Password have been changed");
            }
        }
    }
    
    # edit -profile
    public function editProfile(){
        
         if(Auth::check()){

            # redirect to dahboard
            return View::make('user::editProfile');
         }else{

             # call login view
             return View::make('user::login');
         }
    }
    
    

}
