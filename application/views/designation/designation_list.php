
<div class="row">
    <div class="col-md-6 ">
        <div id="error_response">

        </div>
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Designation Form
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form  id="designation_form" method="post">
                    <div class="form-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Department Name
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class='form-control col-lg-5 itemSearch' name="department_name" id="department_name" type='text' placeholder='Select Keywords' />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Designation 
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="designation" name="designation" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/row-->




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
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>

    <div class="col-md-6">
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

                        </div>
                        <table class="table table-striped table-bordered table-hover" id="designation_view">
                            <thead>
                                <tr>
                                    <th>
                                        Department Name
                                    </th>
                                    <th>
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
                            <tbody id="tbody_designation">
                                <?php
                                if (isset($designation) && !empty($designation)) {
                                    foreach ($designation as $row) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td>
                                                <?php echo $row->department_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $row->designation_name; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm update-designation" data-designation_id="<?php echo $row->designation_id; ?>" data-toggle="modal" data-target="#myModal">
                                                    edit
                                                </a>
                                                <a href="<?php echo base_url() . "designation/designation_update/" . $row->designation_id; ?>" >Edit</a>
                                            </td>
                                            <td>
                                                <span class="label label-sm label-<?php echo ($row->status == "active") ? "success" : "danger"; ?> status" style="cursor: pointer;" data-designation_id="<?php echo $row->designation_id; ?>" data-status="<?php echo $row->status; ?>"><?php echo $row->status; ?> </span>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body" id="formModalBody">
            <div class="row">
                <div class="col-md-12">
                    <h4>Some Input</h4>
                    <p>
                        <input type="text" class="col-md-12 form-control" id="update_department_name">
                    </p>
                    <p>
                        <input type="text" class="col-md-12 form-control" id="update_designation_name">
                    </p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default close-button" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary save-changes">Save changes</button>
        </div>
    </div>
</div>