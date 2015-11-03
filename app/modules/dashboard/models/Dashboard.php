<?php
namespace App\Modules\Dashboard\Models;

use App,
    View,
    Helpers;
use Input,
    Session,
    Config,
    DB;

class Dashboard extends \Eloquent {
    
    
    public function getTotalRecords() {

        $query_count = "SELECT"
            . " COUNT(application_id) as total_application, "
            . " COUNT(distinct examiner_id ) as total_examiner, "
            . " COUNT(distinct art_unit_id ) as total_art_unit, "
            . " (SELECT COUNT(*) FROM law_firm ) as total_law_firm, "
            . " (SELECT COUNT(distinct attorney_registration_number) FROM attorney_agent ) as total_attorney, "
            . " SUM(allowed) as total_patent_application, "
            . " SUM(rejected) as total_rejected_application "
            . " FROM report_application_summary  ";



        $results = DB::select($query_count);

        $data = array();
        if (!empty($results) && count($results) > 0) {
            foreach ($results as $value) {
                $data['total_application'] = number_format($value->total_application);
                $data['total_examiner'] = number_format($value->total_examiner);
                $data['total_art_unit'] = number_format($value->total_art_unit);
                $data['total_law_firm'] = number_format($value->total_law_firm);
                $data['total_attorney'] = number_format($value->total_attorney);
                $data['total_rejected_application'] = number_format($value->total_rejected_application);
                $data['total_patent_application'] = number_format($value->total_patent_application);
                $data['total_pending_application'] = number_format($value->total_application - ( $value->total_patent_application + $value->total_rejected_application ));
            }
            ///\Helpers::dump($data);die;

            return $data;
        } else {
            return FALSE;
        }
    }

    
    public function getExaminerSearchRecords( $q ) {
        
        
        
        $query_count = "SELECT COUNT(distinct report_application_summary.application_id) as total_application ,
                        examiner.first_name , examiner.last_name ,examiner.examiner_id,
                        substring_index(GROUP_CONCAT(distinct art_unit.group_art_unit SEPARATOR ', ' ), ',', 2)  as group_art_unit ,
                        SUM(
                            CASE
                            WHEN report_application_summary.allowed = 1
                            THEN 1
                            ELSE 0
                            END
                        ) as allowed_application
                        FROM `examiner`
                        LEFT JOIN report_application_summary
                        ON report_application_summary.examiner_id = examiner.examiner_id
                        LEFT JOIN application 
                        ON application.examiner_id = examiner.examiner_id AND application.application_id = report_application_summary.application_id
                        LEFT JOIN art_unit 
                        ON art_unit.art_unit_id = application.art_unit_id ";
        
        // check if word contain space
        if(preg_match('/\s/',$q)){
            $str = explode(" ", $q);            
            $query_count .= " WHERE  ( examiner.last_name  like '%$str[0]%' OR examiner.first_name  like '%$str[1]%' ) ";
        
        }else{
            $query_count .= " WHERE  ( examiner.last_name  like '%$q%' OR examiner.first_name  like '%$q%' ) ";
        }       
                         
        $query_count .= " GROUP BY examiner.`examiner_id` LIMIT 10 ";
                        
        //echo $query_count;
        $results = DB::select(($query_count));
        //\Helpers::dump($results);die;
        $data = array();
        $temp = array();
        if(!empty($results) && count($results) > 0) {
            foreach ($results as $value) {
              
                
                $temp['examiner_id'] = $value->examiner_id;
                $temp['last_name'] = $value->last_name;
                $temp['first_name'] = $value->first_name;
                $temp['art_unit'] = $value->group_art_unit;
                $temp['application'] = $value->total_application;
                
                $temp['allowence_rate']  = 0.00;
                
                if( $value->total_application )
                    $temp['allowence_rate'] = round($value->allowed_application / ( $value->total_application ) * 100 ,2);
                
                
                
                $data[] = $temp;
            }
            
            
            
        }     
        return $data;
    }
    
    
    public function getArtUnitSearchRecords( $q ) {
        
       $query_count = ' SELECT art_unit.art_unit_id, COUNT(distinct report_application_summary.examiner_id) as examiner_numrow ,'
                    . ' art_unit.group_art_unit , COUNT( distinct report_application_summary.application_id ) as total_application, '
                    . 'SUM(report_application_summary.allowed) as allowed_patent , SUM(report_application_summary.pending ) as pending_patent , '
                    . 'SUM(report_application_summary.rejected ) as rejected_patent FROM art_unit  '
                     
                     . '  RIGHT JOIN report_application_summary ON art_unit.art_unit_id = report_application_summary.art_unit_id ' 
                        . ' WHERE  ( art_unit.group_art_unit  like "%' . $q . '%" ) LIMIT 10 ' ;
                    //. '  GROUP BY report_examiner.total_application,report_examiner.allowed_patent , report_examiner.pending_patent , report_examiner.rejected_patent LIMIT 10' ;
                        
        //echo $query_count;
        $results = DB::select(($query_count));
        //\Helpers::dump($results);die;
        $data = array();
        $temp = array();
        if(!empty($results[0]->examiner_numrow) ) {
            foreach ($results as $value) {
                
                if(!$value->allowed_patent)
                    $value->allowed_patent = 0;
                
                if(!$value->rejected_patent)
                    $value->rejected_patent = 0;
                
                if(!$value->total_application)
                    $value->total_application = 0;
                
                $temp['art_unit_id'] = $value->art_unit_id; 
                $temp['total_examiner'] = $value->examiner_numrow;               
                $temp['art_unit'] = $value->group_art_unit;
                $temp['application'] = $value->total_application;
                
                
                
                $temp['allowence_rate']  = 0;
                
                if( $value->total_application )
                $temp['allowence_rate'] = round($value->allowed_patent / ( $value->total_application ),1);
                
                
                $data[] = $temp;
            }
            
            
            
        }     
        return $data;
        
    }
    
    public function getApplicationSearchRecords( $q ) {
       $query_count = ' SELECT application.status, application.application_id, application.application_number,  examiner.last_name, '
                    . 'examiner.first_name, art_unit.group_art_unit   FROM application  '
                     . '  LEFT JOIN examiner ON application.examiner_id = examiner.examiner_id ' 
                     . '  LEFT JOIN art_unit ON art_unit.art_unit_id = application.art_unit_id ' 
                        . ' WHERE  ( application.application_number  like "%' . $q . '%" )  LIMIT 10' ;
                        
        //echo $query_count;
        $results = DB::select(($query_count));
        //\Helpers::dump($results);die;
        $data = array();
        $temp = array();
        if(!empty($results) && count($results) > 0) {
            foreach ($results as $value) {
                $temp['application_id'] = $value->application_id;
                $temp['application_number'] = $value->application_number;
                $temp['last_name'] = $value->last_name;
                $temp['first_name'] = $value->first_name;
                $temp['art_unit'] = $value->group_art_unit;
                $temp['status'] = $value->status;
               
                
                $data[] = $temp;
            }
        }     
        return $data;
    }
    
    
    public function getGraphDataByApplicationCount() {
        
        $query = " SELECT DATE_FORMAT(filing_date, '%Y') as 'year', "
                ." COUNT(application_id) as 'total' "
                ." FROM application "
                . " WHERE YEAR(filing_date) >= 2000 "
                ." GROUP BY DATE_FORMAT(filing_date, '%Y') ";
        $results = DB::select($query);
       
        $data_by_years = array();
        $temp = array();
        
        $years = array();
        
        if(!empty($results) && count($results) > 0) {
            foreach ($results as $value) {
                
                $temp['name'] = "$value->year";
                
                $years[] = $temp['name'];
                
                $temp['y'] = (int)$value->total;
                
                $temp['drilldown'] = "$value->year" ;
                $data_by_years[] = $temp;
            }
        }  
        
        $inner_temp = array();
         $data_by_months = array();
         $inner_data = array();
        
        // now we are getting total number of application by year per month
        if(is_array($years) && !empty($years)){
            foreach ($years as $yr) {
                 
                $query = "SELECT DATE_FORMAT(filing_date, '%M') as 'month', " 
                           ." COUNT(application_id) as 'total'  FROM application "
                          . " WHERE YEAR(filing_date) = '".$yr."' "
                          . " GROUP BY DATE_FORMAT(filing_date, '%Y%m')" ;
                
                $results = DB::select($query);
                if(!empty($results) && count($results) > 0) {                    
                    $inner_data = array();
                    foreach ($results as $value) {
                        
                        $month_name = $value->month;
                        $total_app_by_month = (int)$value->total;   
                        
                        $tmp = array ( "$month_name" , $total_app_by_month );
                        
                        $inner_data[] = $tmp ;

                        
                    }
                    
                    $inner_temp['name'] = "$yr";                        
                    $inner_temp['id'] = "$yr";
                    $inner_temp['data'] = $inner_data ;
                }
                
                $data_by_months[] = $inner_temp;
                //\Helpers::dump($data_by_months);die;
            }
        }
        
        $final_return_array = array(
            'data_by_years'     => $data_by_years,
            'data_by_months'    => $data_by_months
        );
        
        
        return $final_return_array;
    }
    
    
    public function getGraphDataByApplicationStatus( $year ) {
        if(!empty($year)){
                 
            $query = "SELECT COUNT(application_id) as total_application, " 
                    ." SUM(allowed) as total_patent_application , "
                    ." SUM(rejected) as total_rejected_application "                            
                    . "  FROM report_application_summary " ;
            if($year != 'all'){
                $query .= " WHERE YEAR(application_filing_date) = '".$year."' ";
            }else{
                $query .= "  ";
            }

             $results = DB::select($query); 

            if(!empty($results) && count($results) > 0) {                    
                $data = array();
                foreach ($results as $value) {

                    $allowed    = (int)$value->total_patent_application;
                    $rejected   = (int)$value->total_rejected_application;
                    $pending    =  (int)$value->total_application - ( $allowed + $rejected );
                    $data['total_application'] = (int)$value->total_application;
                    $data['allowed']    =   $allowed ;
                    $data['rejected']   =   $rejected ;
                    $data['pending']    =   $pending ;
                }
                 return $data;
            }
        }
    }
    
    

    function get_month_name($month){
        $months = array(
            1   =>  'Jan',
            2   =>  'Feb',
            3   =>  'Mar',
            4   =>  'Apr',
            5   =>  'May',
            6   =>  'Jun',
            7   =>  'Jul',
            8   =>  'Aug',
            9   =>  'Sep',
            10  =>  'Oct',
            11  =>  'Nov',
            12  =>  'Dec'
        );

        return $months[$month];
    }
}
