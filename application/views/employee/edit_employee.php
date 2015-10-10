<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Employee Form
                </div>
                <div class="tools">
                </div>
            </div>

            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="form-horizontal" action="<?php echo base_url() . "employee/edit_employee/$employee->employee_id"; ?>" enctype="multipart/form-data" id="employee_form1" method="post">
                    <div class="form-body">

                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <h3 class="form-section">Person Info</h3>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Employee Code
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="employee_code" value="<?php echo set_value('employee_code', (isset($employee->employee_code) && !empty($employee->employee_code)) ? $employee->employee_code : ""); ?>" class="form-control"/>
                                                <?php echo form_error('employee_code'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    First Name
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="employee_first_name" value="<?php echo set_value('employee_first_name', (isset($employee->employee_first_name) && !empty($employee->employee_first_name)) ? $employee->employee_first_name : ""); ?>" class="form-control"/>
                                                <?php echo form_error('employee_first_name'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Middle Name
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="employee_middle_name" value="<?php echo set_value('employee_middle_name', (isset($employee->employee_middle_name) && !empty($employee->employee_middle_name)) ? $employee->employee_middle_name : ""); ?>" class="form-control"/>
                                                <?php echo form_error('employee_middle_name'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Last Name
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="employee_last_name" value="<?php echo set_value('employee_last_name', (isset($employee->employee_last_name) && !empty($employee->employee_last_name)) ? $employee->employee_last_name : ""); ?>" class="form-control"/>
                                                <?php echo form_error('employee_last_name'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Birth Date
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="birth_date" value="<?php echo set_value('birth_date', (isset($employee->birth_date) && !empty($employee->birth_date)) ? date('m/d/Y', strtotime($employee->birth_date)) : ""); ?>" class="form-control date-picker"/>
                                                <?php echo form_error('birth_date'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Mobile Number
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="mobile_number" value="<?php echo set_value('mobile_number', (isset($employee->mobile_number) && !empty($employee->mobile_number)) ? $employee->mobile_number : ""); ?>" class="form-control"/>
                                                <?php echo form_error('mobile_number'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Gender
                                                </label>
                                            </div>
                                            <?php
                                            $gender = $employee->employee_gender;
                                            $m = ($gender == "Male") ? "checked" : "";
                                            $f = ($gender == "Female") ? "checked" : "";
                                            ?>
                                            <div class="col-sm-8">
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="employee_gender" value="Male" <?php echo $m; ?>> Male
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="employee_gender" value="Female" <?php echo $f; ?>> Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <h3 class="form-section">General Info</h3>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Upload Image
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="file" name="employee_photo" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Department
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input class='form-control col-lg-5 itemSearch'  name="department_id" id="department_id" type='text' placeholder='Select a Department' onchange="designation_list(this.value);" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Designation
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input class='form-control col-lg-5 itemSearch' name="designation_id" id="designation_id" type='text' placeholder='Select a Designation' />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label pull-left">
                                                    Experience
                                                </label>
                                            </div>

                                            <?php $exp_m = $employee->experience_month ?>

                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <select name="experience_month" class="form-control">
                                                        <option value="0" <?php if ($exp_m == '0') { ?> selected <?php } ?>>0</option>
                                                        <option value="1" <?php if ($exp_m == '1') { ?> selected <?php } ?>>1</option>
                                                        <option value="2" <?php if ($exp_m == '2') { ?> selected <?php } ?>>2</option>
                                                        <option value="3" <?php if ($exp_m == '3') { ?> selected <?php } ?>>3</option>
                                                        <option value="4" <?php if ($exp_m == '4') { ?> selected <?php } ?>>4</option>
                                                        <option value="5" <?php if ($exp_m == '5') { ?> selected <?php } ?>>5</option>
                                                        <option value="6" <?php if ($exp_m == '6') { ?> selected <?php } ?>>6</option>
                                                        <option value="7" <?php if ($exp_m == '7') { ?> selected <?php } ?>>7</option>
                                                        <option value="8" <?php if ($exp_m == '8') { ?> selected <?php } ?>>8</option>
                                                        <option value="9" <?php if ($exp_m == '9') { ?> selected <?php } ?>>9</option>
                                                        <option value="10" <?php if ($exp_m == '10') { ?> selected <?php } ?>>10</option>
                                                        <option value="11" <?php if ($exp_m == '11') { ?> selected <?php } ?>>11</option>
                                                        <option value="12" <?php if ($exp_m == '12') { ?> selected <?php } ?>>12</option>
                                                    </select>
                                                    <span class="input-group-addon">Months</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Experience
                                                </label>
                                            </div>

                                            <?php $exp_y = $employee->experience_year ?>

                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <select name="experience_year" class="form-control">
                                                        <option value="0" <?php if ($exp_y == '0') { ?> selected <?php } ?>>0</option>
                                                        <option value="1" <?php if ($exp_y == '1') { ?> selected <?php } ?>>1</option>
                                                        <option value="2" <?php if ($exp_y == '2') { ?> selected <?php } ?>>2</option>
                                                        <option value="3" <?php if ($exp_y == '3') { ?> selected <?php } ?>>3</option>
                                                        <option value="4" <?php if ($exp_y == '4') { ?> selected <?php } ?>>4</option>
                                                        <option value="5" <?php if ($exp_y == '5') { ?> selected <?php } ?>>5</option>
                                                        <option value="6" <?php if ($exp_y == '6') { ?> selected <?php } ?>>6</option>
                                                        <option value="7" <?php if ($exp_y == '7') { ?> selected <?php } ?>>7</option>
                                                        <option value="8" <?php if ($exp_y == '8') { ?> selected <?php } ?>>8</option>
                                                        <option value="9" <?php if ($exp_y == '9') { ?> selected <?php } ?>>9</option>
                                                        <option value="10" <?php if ($exp_y == '10') { ?> selected <?php } ?>>10</option>
                                                    </select>
                                                    <span class="input-group-addon">Years</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Joining Date
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input name="join_date" type="text" value="<?php echo set_value('join_date', (isset($employee->join_date) && !empty($employee->join_date)) ? date('m/d/Y', strtotime($employee->join_date)) : ""); ?>" class="form-control date-picker date-picker"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Email Address
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input name="email_id" value="<?php echo set_value('email_id', (isset($employee->email_id) && !empty($employee->email_id)) ? $employee->email_id : ""); ?>" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <h3 class="form-section">Address Info</h3>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Block No
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="bno" value="<?php echo set_value('block_no', (isset($employee->block_no) && !empty($employee->block_no)) ? $employee->block_no : ""); ?>" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Landmark
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="landmark" value="<?php echo set_value('area', (isset($employee->area) && !empty($employee->area)) ? $employee->area : ""); ?>" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Country
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="country" value="<?php echo set_value('country', (isset($employee->country) && !empty($employee->country)) ? $employee->country : ""); ?>" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    State
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="state" value="<?php echo set_value('state', (isset($employee->state) && !empty($employee->state)) ? $employee->state : ""); ?>" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    City
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="city" value="<?php echo set_value('city', (isset($employee->city) && !empty($employee->city)) ? $employee->city : ""); ?>" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Pin code
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="pincode" value="<?php echo set_value('pin_code', (isset($employee->pin_code) && !empty($employee->pin_code)) ? $employee->pin_code : ""); ?>" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Home Number
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="homeno" value="<?php echo set_value('office_number', (isset($employee->office_number) && !empty($employee->office_number)) ? $employee->office_number : ""); ?>" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="form-section">Employee Login Detail</h3>
                                        <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <div class="col-sm-3">
                                                        <label class="control-label">
                                                            Employee Login ID
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="login" value="<?php echo set_value('company_email_id', (isset($employee->company_email_id) && !empty($employee->company_email_id)) ? $employee->company_email_id : ""); ?>" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                            <h3 class="form-section">Add Leave Details</h3>
                                            <?php foreach ($leave as $post) { ?>
                                                <div class="row">
                                                    <div class="col-sm-12 form-group">
                                                        <div class="col-sm-3">
                                                            <label class="control-label">
                                                                <?php echo $post->leave_name; ?>
                                                            </label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            
                                                            <input type="hidden" name="employee_leave_id[]" value="<?php echo $post->employee_leave_id; ?>">
                                                            <input type="text" name="leave[]" class="form-control" value="<?php echo $post->allowed_days; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?> 
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>