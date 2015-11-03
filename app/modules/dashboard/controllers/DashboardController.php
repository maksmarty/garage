<?php 
/*
 * Controller   : Dashboard
 * Descripttion : dashboard controller- Landing page after login succesfully implemented.
 * @Author      : Akbar
 * @Date        : Nov 4,2014
 */
#create namesapce here
namespace App\Modules\Dashboard\Controllers;
use App\Modules\Dashboard\Models\Dashboard;
use App, View, Helpers,  Session, Config, Redirect, Input, DB, Request, Validator, Auth, Hash, Response;

class DashboardController extends \BaseController {

    //protected $layout = 'layouts.base';
	//public $restful = true;
    
     protected $dashboard_model_object;

    public function __construct() {
        # initialize model object
        $this->dashboard_model_object    =  new Dashboard();
    }

    
    public function getIndex() {
        
        # check user is already logged in 
//        if(Auth::check()){
            
            # User is valid and call index view
            $title           = 'Dashboard';
            $breadcrumb      = 'Dashboard';
            
            # get data for dashboard entity
            //$records = $this->dashboard_model_object->getTotalRecords();
            
            $data   = array(
                        'TITLE'         => $title,
                        'BREADCRUMB'    => $breadcrumb,
                        //'RECORDS'       => $records
                       
                     );
                      
            #redirect to home
            return View::make( 'dashboard::index', $data );
            
//        }else{
//
//            # redirect to login
//            return Redirect::to('/');
//        }
    }
       
    public function getExaminerSearch(  ) {
       
        $search = Input::get('q');
        $records = array();
        if(!empty($search)){
            
            $records = $this->dashboard_model_object->getExaminerSearchRecords( $search );
            $records[] = array("examiner_id" => "0","text"=>"View All");
        }
        
        return json_encode($records);
    }
    
    public function getArtunitSearch(  ) {
       
        $search = Input::get('q');
        $records = array();
        if(!empty($search)){
            
            $records = $this->dashboard_model_object->getArtUnitSearchRecords( $search );
            $records[] = array("examiner_id" => "0","text"=>"View All");
        }
        
        return json_encode($records);
       
    }
    
    public function getApplicationSearch(  ) {
       
        $search = Input::get('q');
        $records = array();
        if(!empty($search)){
            
            $records = $this->dashboard_model_object->getApplicationSearchRecords( $search );
            $records[] = array("application_id" => "0","text"=>"View All");
        }
        
        return json_encode($records);        
    }
    
    
    #data for genrating  graph by total number of application by year/month
    public function postGraphDataByApplicationCount(){
        
        $graphData = $this->dashboard_model_object->getGraphDataByApplicationCount();
        
        if(!empty($graphData) && is_array($graphData)){
            
          return json_encode($graphData);
          
        }else {
            
          return json_encode('No Data');
          
        }
    }
    
    #data for genrating  graph by application status by year/month
    public function postGraphDataByApplicationStatus(){
        
        $year = Input::get('year');
        
       
        $graphData = $this->dashboard_model_object->getGraphDataByApplicationStatus($year);        
        if(!empty($graphData) && is_array($graphData)){
            
          return json_encode($graphData);
          
        }else {
            
          return json_encode('No Data');
          
        }
    }   
}