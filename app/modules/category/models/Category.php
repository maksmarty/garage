<?php 
/*
 * Model        : Category
 * Descripttion : Category model for handle login,registration,logout and user's setting.
 */

namespace App\Modules\Category\Models;

use App,
    View,
    Helpers;
use Input,
    Session,
    Config,
    Auth,
    DB;


class Category extends \Eloquent {

  
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = "category";
	protected $guarded = ["category_id"];
    protected $primaryKey = 'category_id';
	//protected $softDelete = true;

    public function items()
    {
        return $this->hasMany('Items');
    }


    public function getList(){

        //$sequence_ID = 1;
        $PER_PAGE = Config::get('constant.records_per_page');

        $q = Input::get('q');
        $p = 1;

        if (isset($page) && $page > 0) {
            $p = $page; // Page
        } else {
            $p = Input::get('page');
            if (!$p) {
                $p = Input::get('page');
            }
        }


        $sort = $order = $where = $pp = '';
        $start = 1;

        $base_query = $query_count = '';

        $base_select_query = ' SELECT category.*,parentCategory.name as parent_name FROM category LEFT JOIN category parentCategory ON `category`.`category_id`= `parentCategory`.`parent` ';

        $base_count_query = ' SELECT count(* ) as num_records FROM category  LEFT JOIN category parentCategory ON `category`.`category_id`= `parentCategory`.`parent` ' ;



        $where = ' WHERE 1';


        $q = trim($q);
        if( is_numeric($q)){
            //$where .=  " AND ( phone LIKE '%".$q."%'  )";
        }else{
            $where .=  " AND ( category.name LIKE '%".$q."%'  )";
        }

        $base_query = $base_count_query . $where;
        $response = DB::select($base_query);
        $numResults = $response[0]->num_records;


        if ($numResults > 0) {
            $totalPages = ceil($numResults / $PER_PAGE);
            $firstPage = 1;

            if ($totalPages > 0) {
                $lastPage = $totalPages;
            } else {
                $lastPage = 1;
            }
        }

        if (empty($sort)) {
            $sort_query = ' ORDER BY category.category_id ';
            $sort = ' category_id  ';
        } else {
            $sort_query = ' ORDER BY ' . $sort;
        }

        if (empty($order)) {
            $order = 'ASC';
        }

        $query = $base_select_query . $where .$sort_query . $order;
        //echo $query;


        if (!empty($p) && $p == 'all') {
            // NO NEED TO LIMIT THE CONTENT
        } else {

            if (!empty($p) || $p != 0) {

                $start = ($p - 1) * $PER_PAGE;
                $query .= " LIMIT $start, " . $PER_PAGE;
            } else {
                $query .= " LIMIT 0, " . $PER_PAGE;
                $start = 0;
            }
        }



        //echo $query;die;
        $result = DB::select(($query));

        $files = array();
        foreach ($result as $row) {
            $files[] = $row;
        }

        $paginationParams = Helpers::buildParamForPagination($numResults, $p, $PER_PAGE);

        $field = "category_list";

        $params = Helpers::requestToParams($numResults, $start, $paginationParams ['totalPages'], $paginationParams ['firstPage'], $paginationParams ['lastPage'], $paginationParams ['currentPage'], $sort, $order, $q, $field);
        $arr = array(
            'results' => $files,
            'param' => $params,
            //'query' => $params,
        );
        // \Helpers::dump($arr);die;
        return $arr;
    }


}