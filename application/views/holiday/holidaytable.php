    
<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <?php if ($this->session->flashdata('success') != "") { ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php
                }
                ?>

                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Managed Table
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="#portlet-config" data-toggle="modal" class="config">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                            <a href="javascript:;" class="remove">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#">
                                                    Print </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="holiday">
                            <thead>
                                <tr>
                                    <th>
                                        Holiday Name
                                    </th> 
                                    <th>
                                        Holiday Description
                                    </th>
                                    <th>
                                        Date from
                                    </th>  
                                    <th>
                                        Date to
                                    </th>
                                    <th class="hidden-xs">
                                        Action
                                    </th>
                                    <th class="hidden-xs">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $post) { ?>
                                <tr class="odd gradeX">
                                    <td>
                                        <?php echo $post->holiday_name; ?>
                                    </td>
                                     <td>
                                        <?php echo $post->holiday_description; ?>
                                    </td>
                                     <td>
                                        <?php echo $post->date_from; ?>
                                    </td>
                                     <td>
                                        <?php echo $post->date_to; ?>
                                    </td>

                                    <td>
<!--                                        <a class="btn btn-primary btn-sm update-department" data-department_id="<?php // echo $row->department_id ?>" data-toggle="modal" data-target="#myModal">
                                            edit
                                        </a>-->
                                           <a  class="btn btn-primary btn-sm" href="<?php echo base_url() . "holiday_master/update_holiday/" . $post->holiday_id; ?>" > edit </a>
                                    </td>
                                             <td>
                                                <span class="label label-sm label-<?php echo ($post->status == "active") ? "success" : "danger"; ?> status" style="cursor: pointer;" data-holiday_id="<?php echo $post->holiday_id; ?>" data-status="<?php echo $post->status; ?>"><?php echo $post->status; ?> </span>
                                            </td>
                    
                                </tr>
                                <?php
                                }
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
</div>
</div>
