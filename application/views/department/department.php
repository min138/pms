<!--
<div class="row">
    <div class="col-md-6">
        <div id="ajax-respose"></div> 
         BEGIN SAMPLE FORM PORTLET
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Department Form
                </div>

            </div>
            <div class="portlet-body form">
                 BEGIN FORM
                <form  id="department_id" method="post">
                    <div class="form-body">

                        <div class="row">
                            <div class="col-sm-12">




                                <div class="col-sm-9">

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-6">
                                                <label class="control-label" >
                                                    Department Name
                                                </label>
                                               
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="department_name" id="department_name"/>
                                                
                                            </div>
                                        </div>
                                    </div>









                                </div>



                            </div>

                        </div>
                    </div>
                    /row




                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Submit</button>

                                        <button type="button" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>

                </form>
                
                
                 
            </div>
             END SAMPLE FORM PORTLET




        </div>
    </div>-->
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
                            <a class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_department">
                                Add Department
                            </a>
                        </div>
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
                        <table class="table table-striped table-bordered table-hover" id="department_list">
                            <thead>
                                <tr>
                                    <th>
                                        Department Name
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
                                <?php
                                if (isset($department) && !empty($department)) {
                                    foreach ($department as $row) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td>
                                                <?php echo $row->department_name; ?>
                                            </td>

                                            <td>
                                                <a class="btn btn-primary btn-sm update-department" data-department_id="<?php echo $row->department_id ?>" data-toggle="modal" data-target="#myModal">
                                                    edit
                                                </a>
                                            </td>



                                            <td>
                                                <span class="label label-sm label-<?php echo ($row->status == "active") ? "success" : "danger"; ?> status" style="cursor: pointer;" data-department_id="<?php echo $row->department_id; ?>" data-status="<?php echo $row->status; ?>"><?php echo $row->status; ?> </span>
                                            </td>
                                        </tr>
                                        <?php
                                    }
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



<!--Start Add With Model-->

<div class="modal fade" id="add_department" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <form id="department_add_from" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Department</h4>
            </div>
            <div id="ajax-respose"></div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-4">
                            <label class="control-label">
                                Department Name
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <input class='form-control col-lg-5 itemSearch' name="department_name" id="department_name" type='text' placeholder='Select Keywords' />
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-button" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary save-changes">Save changes</button>
            </div>
        </div>
    </form>
</div>

<!--end Add With Model-->


<!--Start Update Model-->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="update_department_form" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Department</h4>
            </div>
            <div id="error_update">

            </div>


            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-4">
                        <label class="control-label">
                            Department Name
                        </label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" id="update_department_name" name="update_department_name" class="form-control"/>
                    </div>
                    <div class="col-sm-8">

                        <input type="hidden" id="update_department_id_hidden" name="update_department_id_hidden" class="form-control"/>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-button" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary save-changes">Save changes</button>
            </div>
        </div>
    </form>
</div>
<!--End Update Model-->