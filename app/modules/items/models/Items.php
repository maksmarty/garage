<?php 
/*
 * Model        : Category
 * Descripttion : Category model for handle login,registration,logout and user's setting.
 */

namespace App\Modules\Items\Models;

use App,
    View,
    Helpers;
use Input,
    Session,
    Config,
    Auth,
    DB;


class Items extends \Eloquent {

  
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = "items";
	protected $guarded = ["item_id"];
    protected $primaryKey = 'item_id';

	//protected $softDelete = true;


    public function category()
    {
        return $this->belongsTo('Category');
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

        $base_select_query = ' SELECT items.*,CONCAT(phone,"<br>", phone1, "<br>", phone2) as phones ,category1.name FROM items ' .
            ' JOIN category category1 ON items.category_id = category1.category_id ' ;

        $base_count_query = ' SELECT count(items.item_id ) as num_records FROM items ' .
            ' JOIN category category1 ON items.category_id = category1.category_id ';





        $where = ' WHERE 1 ';


        $searchCategory    = trim(Input::get('category'));

        if( !empty($searchCategory) ){

            $where .=  " AND ( items.category_id = '".$searchCategory."'  )";

            $q = trim($q);
            if( !empty($q) ){
                if( is_numeric($q)){
                    $where .=  " AND ( phone LIKE '%".$q."%'  )";
                }else{
                    $where .=  " AND ( category1.name LIKE '%".$q."%'  )";
                }
            }


        }else{

            $category    = trim(Input::get('section'));
            if( !empty($category) ){

                $queryCat = ' SELECT category_id FROM `category` WHERE name = "'.$category.'" ' .
                    ' UNION ALL ' .
                    ' SELECT  category2.category_id FROM `category` category1  ' .
                    ' JOIN  category category2 ON category2.parent = category1.category_id  ' .
                    ' WHERE category1.name = "'.$category.'" ';

                $categs = DB::select($queryCat);

                $cat = array();
                if( !empty($categs) && count($categs) > 0 ){
                    foreach($categs as $categ){

                        if( !empty($categ->category_id) ){
                            $cat[] = $categ->category_id;
                        }

                    }

                    if( !empty($cat) ){
                        $where .=  " AND ( items.category_id IN (". implode(',',$cat)  .")  )";
                    }else{
                        $where .=  " AND ( items.category_id IS NULL ) ";
                    }

                    $q = trim($q);

                    if( !empty($q) ){
                        if( is_numeric($q)){
                            $where .=  " AND ( phone LIKE '%".$q."%'  )";
                        }else{
                            $where .=  " AND ( category1.name LIKE '%".$q."%'  )";
                        }
                    }




                }else{
                    $where .=  " AND ( items.category_id IS NULL ) ";
                }

                //echo '<pre>';print_r($cat);die('======Debugging=======');


            }else{
                $where .=  " AND ( items.category_id IS NULL ) ";
            }


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
            $sort_query = ' ORDER BY item_id ';
            $sort = ' item_id  ';
        } else {
            $sort_query = ' ORDER BY ' . $sort;
        }

        if (empty($order)) {
            $order = 'DESC';
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

        $field = "item_list";

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