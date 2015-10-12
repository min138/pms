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
                                <button id="sample_editable_1_new" onclick="location.href = '<?php echo base_url(); ?>employee/add_employee'" class="btn btn-success">
                                    Add New <i class="fa fa-plus"></i>
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
                <table class="table table-striped table-bordered table-hover" id="employee_view">
                    <thead>
                        <tr>
                            <th>
                                Employee Name
                            </th>


                            <th class="hidden-xs">
                                Mobile
                            </th>
                            <th class="hidden-xs">
                                Email
                            </th>
                            <th class="hidden-xs">
                                Joining date
                            </th>
                            <th class="hidden-xs">
                                Designation
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
                        if (isset($employees) && !empty($employees)) {
                            foreach ($employees as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><a href="employee/view_employee_profile/<?php echo $row->employee_id; ?>">
                                            <?php echo $row->employee_last_name; ?>
                                            <?php echo $row->employee_first_name; ?>
                                            <?php echo $row->employee_middle_name; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $row->mobile_number; ?>
                                    </td>
                                    <td>
                                        <a href="mailto:<?php echo $row->email_id; ?>">
                                            <?php echo $row->email_id; ?> </a>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($row->join_date)); ?>
                                    </td>
                                    <td class="center">
                                        <?php echo $row->designation_name; ?>
                                    </td>
                                    <td>
                                        <a href="employee/edit_employee/<?php echo $row->employee_id; ?>"><i class="fa fa-edit"></i>&nbsp;<span class="text-muted">Edit</span></a>
                                        &nbsp;|&nbsp;<a href="employee/view_employee_profile/<?php echo $row->employee_id; ?>"><i class="fa fa-search"></i>&nbsp;<span class="text-muted">View</span></a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-<?php echo ($row->status == "active") ? "success" : "danger"; ?> status" style="cursor: pointer;" data-employee_id="<?php echo $row->employee_id; ?>" data-status="<?php echo $row->status; ?>"><?php echo $row->status; ?> </span>
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