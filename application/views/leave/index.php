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
                                    <a class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_leave_type">
                                        Add Leave Type
                                    </a>
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
                        <table class="table table-striped table-bordered table-hover" id="leave_type_list">
                            <thead>
                                <tr>
                                    <th>
                                        Leave Name
                                    </th>

                                    <th class="hidden-xs">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($leave) && !empty($leave)) {
                                    foreach ($leave as $row) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td id="<?php echo $row->leave_category_id; ?>">
                                                <?php echo $row->leave_name; ?>
                                            </td>

                                            <td>
                                                <a class="btn btn-primary btn-sm update-leave" data-leave_category_id="<?php echo $row->leave_category_id ?>" data-toggle="modal" data-target="#myModal">
                                                    edit
                                                </a>
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

<div class="modal fade" id="add_leave_type" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <form id="add_leave_type_form" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Leave Type</h4>
            </div>
            <div id="ajax-respose"></div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-4">
                            <label class="control-label">
                                Leave Name
                            </label>
                        </div>
                        <div class="col-sm-8">
                            <input class='form-control col-lg-5 itemSearch' name="leave_name" id="leave_name" type='text' placeholder='Leave Name' />
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
    <form id="update_leave_form" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Leave Type</h4>
            </div>
            <div id="error_update">

            </div>


            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-4">
                        <label class="control-label">
                            Leave Name
                        </label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" id="update_leave_name" name="update_leave_name" class="form-control"/>
                    </div>
                    <div class="col-sm-8">

                        <input type="hidden" id="update_leave_id_hidden" name="update_leave_id_hidden" class="form-control"/>
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