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
                    <th class="txt-color-blue " >Name</th>
                    <th class="txt-color-blue " >Action</th>
                </tr>
            </thead>

            <!-- CREATE ROW -->
            <tbody id="seq_data">
            <?php
            //var_dump($APPLICATION);die;
            if(!empty($APPLICATION['results'])){
                $count = $APPLICATION['param']['start'];
                foreach ($APPLICATION['results'] as $row){

                    ?>
                       <tr id ="files_<?php echo $row->application_id; ?>" >
                           <td><?php echo ++$count; ?></td>
                           <td><?php echo (!empty($row->application_number) ? $row->application_number : ''); ?></td>
                           <td><?php echo (!empty($row->title_of_invention) ? $row->title_of_invention : ''); ?></td>
                           <td><?php echo (!empty($row->filing_date) ? $row->filing_date : ''); ?></td>
                           <td><?php echo (!empty($row->application_type) ? $row->application_type : ''); ?></td>
                           <td><?php echo (!empty($row->status) ? $row->status : ''); ?></td>
                           <td><a href="/application/application-data/<?php echo $row->application_number ?>" id="application_show_<?php echo $row->application_id ?>" class="showApplication" title="Application Detail" style="text-decoration: none"><i class="fa fa-search fa-2x"></i></a></td>
                       </tr>
                   <?php

                }// foreach closed
                ?>
                <tr>
                   <td colspan="7" class="num-records">
                       <?php
                               if(!empty($APPLICATION['param']['numResults'])) {
                                   echo '<div><span>Total Records:</span> <strong>'.($APPLICATION['param']['numResults']).'</strong></div>';
                               }
                               $uri = '';
                               \Helpers::buildPagination($APPLICATION['param'], $uri);
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
