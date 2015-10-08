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
                <form class="form-horizontal" action="<?php echo base_url() . 'employee/add_employee'; ?>" enctype="multipart/form-data" id="myForm" method="post">
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
                                                <input type="text" name="employee_code" value="<?php echo set_value('employee_code'); ?>" class="form-control"/>
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
                                                <input type="text" name="employee_first_name" value="<?php echo set_value('employee_first_name'); ?>" class="form-control"/>
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
                                                <input type="text" name="employee_middle_name" value="<?php echo set_value('employee_middle_name'); ?>" class="form-control"/>
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
                                                <input type="text" name="employee_last_name" value="<?php echo set_value('employee_last_name'); ?>" class="form-control"/>
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
                                                <input type="text" name="birth_date" value="<?php echo set_value('birth_date'); ?>" class="form-control date-picker"/>
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
                                                <input type="text" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>" class="form-control"/>
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
                                            <div class="col-sm-8">
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="employee_gender" value="Male"> Male
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="employee_gender" value="Female"> Female
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
                                                <input class='form-control col-lg-5 itemSearch' name="department_id" id="department_id" type='text' placeholder='Select a Department' onchange="designation_list(this.value);" />
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
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <select name="experience_month" class="form-control">
                                                        <option value="0" selected="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
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
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <select name="experience_year" class="form-control">
                                                        <option value="0" selected="">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
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
                                                <input name="join_date" type="text" class="form-control date-picker date-picker"/>
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
                                                <input name="email_id" type="text" class="form-control"/>
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
                                                <input type="text" name="bno" class="form-control"/>
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
                                                <input type="text" name="landmark" class="form-control"/>
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
                                                <input type="text" name="country" class="form-control"/>
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
                                                <input type="text" name="state" class="form-control"/>
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
                                                <input type="text" name="city" class="form-control"/>
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
                                                <input type="text" name="pincode" class="form-control"/>
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
                                                <input type="text" name="homeno" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="form-section">Employee Login Detail</h3>
                                        <div class="col-sm-6 form-group">
                                            <div class="col-sm-3">
                                                <label class="control-label">
                                                    Employee Login ID
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="login" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <div class="col-sm-3">
                                                <label class="control-label">
                                                    Password
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="password" class="form-control"/>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>