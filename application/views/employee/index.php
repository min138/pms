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
                            <div class="btn-group">
                                <button id="sample_editable_1_new" onclick="location.href='<?php echo base_url();?>employee/add_employee'" class="btn btn-success">
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
                            <th>
                                Gender
                            </th>
                            <th class="hidden-xs">
                                Birth date
                            </th>
                            <th class="hidden-xs">
                                Mobile
                            </th>
                            <th class="hidden-xs">
                                Email
                            </th>
                            <th class="hidden-xs">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($employees) && !empty($employees)) {
                            foreach ($employees as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td>
                                        <?php echo $row->employee_first_name; ?>
                                    </td>
                                    <td>
                                        shuxer
                                    </td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com">
                                            shuxer@gmail.com </a>
                                    </td>
                                    <td>
                                        120
                                    </td>
                                    <td class="center">
                                        12 Jan 2012
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success">
                                            Approved </span>
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