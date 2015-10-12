<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div id="alert_msg">
            <?php if ($this->session->flashdata('success') != "") { ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php
            }
            ?>
        </div>
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
                            <div class="btn-group">
                                <button id="sample_editable_1_new" onclick="location.href = '<?php echo base_url(); ?>leave/apply_employee_leave'" class="btn btn-success">
                                    Apply New <i class="fa fa-plus"></i>
                                </button>
                            </div>
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
                <table class="table table-striped table-bordered table-hover" id="employee_leave_view">
                    <thead>
                        <tr>
                            <th>
                                Employee Name
                            </th>
                            <th class="hidden-xs">
                                Leave Type
                            </th>
                            <th class="hidden-xs">
                                Date
                            </th>
                            <th class="hidden-xs">
                                Leave
                            </th>
                            <th class="hidden-xs">
                                Leave Application date
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
                        if (isset($employees_leave) && !empty($employees_leave)) {
                            foreach ($employees_leave as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><a href="<?php echo base_url(); ?>employee/view_employee_profile/<?php echo $row->employee_id; ?>">
                                            <?php echo $row->employee_last_name; ?>
                                            <?php echo $row->employee_first_name; ?>
                                            <?php echo $row->employee_middle_name; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $row->leave_name; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row->leave_type == "Range") {
                                            echo date('d/m/Y', strtotime($row->start_date));
                                            ?>
                                            &nbsp;To&nbsp;
                                            <?php
                                            echo date('d/m/Y', strtotime($row->end_date));
                                        } else {
                                            echo date('d/m/Y', strtotime($row->start_date));
                                        }
                                        ?>
                                    </td>

                                    <td class="center">

                                        <?php
                                        if ($row->leave_type == "Range") {
                                            $diff = abs(strtotime($row->end_date) - strtotime($row->start_date));
                                            $years = floor($diff / (365 * 60 * 60 * 24));
                                            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                                            echo ($days + 1) . " Days";
                                        } else {
                                            echo $row->leave_type;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y h:i:s', strtotime($row->leave_application_date)); ?>
                                    </td>

                                    <td id="col5_<?php echo $row->leave_id; ?>">
                                        <?php
                                        $emp_id = $this->session->userdata('empid');
                                        if ($emp_id == 0) {
                                            ?>
                                            <a class="view-leave" style="cursor: pointer;" data-leave_id="<?php echo $row->leave_id ?>" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-search"></i>&nbsp;<span class="text-muted">view</span>
                                            </a>
                                            <?php
                                        } else {
                                            echo "---";
                                        }
                                        ?>
                                    </td>
                                    <td id="col6_<?php echo $row->leave_id; ?>">
                                        <?php
                                        if ($row->leave_status == "approved") {
                                            ?>
                                            <span class="label label-sm label-success status" style="cursor: pointer;" data-leave_id="<?php echo $row->leave_id; ?>" data-status="<?php echo $row->leave_status; ?>"><?php echo str_replace("_"," ",$row->leave_status); ?></span>
                                            <?php
                                        } elseif ($row->leave_status == "disapproved") {
                                            ?>
                                            <span class="label label-sm label-danger status" style="cursor: pointer;" data-leave_id="<?php echo $row->leave_id; ?>" data-status="<?php echo $row->leave_status; ?>"><?php echo str_replace("_"," ",$row->leave_status); ?></span>
                                            <?php
                                        } else {
                                            ?>
                                            <span class="label label-sm label-warning status" style="cursor: pointer;" data-leave_id="<?php echo $row->leave_id; ?>" data-status="<?php echo $row->leave_status; ?>"><?php echo str_replace("_"," ",$row->leave_status); ?></span>
            <?php
        }
        ?>
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

<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="update_employee_leave_form" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Employee Leave Info</h4>
            </div>
            <div id="error_update">

            </div>


            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-3">
                        <label class="control-label">
                            <strong>Name</strong>
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="hidden" name="update_employee_leave_id" id="update_employee_leave_id">
                        <label class="control-label" id="emp_name"></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-3">
                        <label class="control-label">
                            <strong>Leave Type</strong>
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <label class="control-label" id="emp_leave_type"></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-3">
                        <label class="control-label">
                            <strong>Leave</strong>
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <label class="control-label" id="emp_leave"></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-3">
                        <label class="control-label">
                            <strong>Date</strong>
                        </label>
                    </div>
                    <div class="col-sm-9">
                        <label class="control-label" id="emp_leave_date"></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-12">
                        <label class="control-label">
                            <strong>Reason</strong>
                        </label>
                    </div>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                   
                    <div class="col-sm-12">
                        <label class="control-label" id="emp_leave_reason" style="text-align: justify;"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-3">
                        <label class="control-label">
                            <strong>Status</strong>
                        </label>
                    </div>
                    <div class="col-sm-9" id="emp_status">

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