<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Edit Employee Form
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="<?php echo base_url() . "employee/edit_employee/$emp_id"; ?>" class="form-horizontal" method="post">
                    <div class="form-body">
                        <h3 class="form-section">Person Info</h3>
                        <?php
                        foreach ($query as $row) {
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">First Name</label>
                                        <div class="col-md-9">
                                            
                                            <input type="text" class="form-control" placeholder="First Name" value="<?= $row->emp_fname ?>" name="firstname" id="firstname">
                                            <?php echo form_error('firstname'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Surname" value="<?= $row->emp_lname ?>" name="lastname" id="lastname">
                                            <?php echo form_error('lastname'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Gender</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="gender" id="gender">
                                                <option value="" <?php echo ($row->gender == '') ? "selected" : ""; ?>>Choose</option>
                                                <option value="M" <?php echo ($row->gender == 'M') ? "selected" : ""; ?>>Male</option>
                                                <option value="F" <?php echo ($row->gender == 'F') ? "selected" : ""; ?>>Female</option>
                                            </select>
                                            <?php echo form_error('gender'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date of Birth</label>
                                        <div class="col-md-9">
                                            <?php $bdate = implode("/", array_reverse(explode("-", $row->bdate))); ?>
                                            <input type="text" class="form-control" placeholder="dd/mm/yyyy" value="<?= $bdate ?>" name="dob" id="dob">
                                            <?php echo form_error('dob'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mobile</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Mobile" value="<?= $row->mobile ?>" name="mob" id="mob">
                                            <?php echo form_error('mob'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Email" value="<?= $row->email ?>" name="email" id="email">
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Update</button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>