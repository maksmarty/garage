<?php
/*
   View Name 	: Application File List
   Description 	: Show table- list of the patent application data
 */
?>
        <!-- widget content -->
<div class="widget-body padding no-padding-bottom" style="min-height: 0 !important;">

    <div class="table-responsive">

        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th class="txt-color-blue " >#</th>
                    <th class="txt-color-blue " >Make</th>
                    <th class="txt-color-blue " >Model</th>
                    <th class="txt-color-blue " >Display type</th>
                    <th class="txt-color-blue " >Action</th>
                </tr>
            </thead>



            <!-- CREATE ROW -->
            <tbody id="seq_data">
            <?php
            //var_dump($APPLICATION);die;
            if(!empty($SHOWROOM['results'])){
            $count = $SHOWROOM['param']['start'];
            foreach ($SHOWROOM['results'] as $row){

            ?>
            <tr id ="files_<?php echo $row->showroom_car_id; ?>" >
                <td><?php echo ++$count; ?></td>
                <td><?php echo (!empty($row->make) ? $row->make : ''); ?></td>
                <td><?php echo (!empty($row->model) ? $row->model : ''); ?></td>
                <td><?php echo (!empty($row->display) ? \Config::get('constant.showroom_display')[$row->display] : ''); ?></td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                   {{-- <a class="btn btn-small btn-success" href="{{ URL::to('item/' . $row->item_id) }}">Show </a>--}}

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    {{--<a class="btn btn-small btn-info" href="{{ route('item.update',$row->item_id)}}">Edit</a>--}}

                    <a class="btn btn-info" href="{{route('showroom.update',$row->showroom_car_id)}}">
                        <i class="fa fa-edit"></i> <span class="hidden-mobile">Update</span>
                    </a>

                </td>
            </tr>
            <?php

            }// foreach closed
            ?>
            <tr>
                <td colspan="7" class="num-records">
                    <?php
                    if(!empty($SHOWROOM['param']['numResults'])) {
                        echo '<div><span>Total Records:</span> <strong>'.($SHOWROOM['param']['numResults']).'</strong></div>';
                    }
                    $uri = '';
                    \Helpers::buildPagination($SHOWROOM['param'], $uri);
                    ?>
                </td>
            </tr>
            <?php
            }else{
            ?>
            <tr >
                <td colspan="7" id="no-data">Data not available.</td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
<!-- end widget content -->


