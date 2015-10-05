<div class="row">
    <div id="ajax-respose">
    </div>
</div>
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
                <form class="form-horizontal" id="myForm" method="post">

                    <div class="form-body">
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
                                                <input type="text" name="employee_code" id="employee_code" value="<?php echo set_value('employee_code'); ?>" class="form-control"/>
                                                <?php echo form_error('username'); ?>
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
                                                <input type="text" name="employee_first_name" id="employee_first_name" class="form-control"/>
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
                                                <input type="text" name="employee_middle_name" class="form-control"/>
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
                                                <input type="text" name="employee_last_name" class="form-control"/>
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
                                                <input type="text" name="birth_date" class="form-control"/>
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
                                                <input type="text" name="mobile_number" class="form-control"/>
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
                                                    Image Upload
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
                                                <select name="department_id" class="form-control">
                                                    <option>

                                                    </option>
                                                </select>
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
                                                <select name="designation_id" class="form-control">
                                                    <option>

                                                    </option>
                                                </select>
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
                                                    <select name="experience_year" class="form-control">
                                                        <option>

                                                        </option>
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
                                                    <select name="experience_month" class="form-control">
                                                        <option>

                                                        </option>
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
                                                <input name="join_date" type="text" class="form-control"/>
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
                                                <input type="text" class="form-control"/>
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
                                                <input type="text" class="form-control"/>
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
                                                <input type="text" class="form-control"/>
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
                                                <input type="text" class="form-control"/>
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
                                                <input type="text" class="form-control"/>
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
                                                <input type="text" class="form-control"/>
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
                                                <input type="text" class="form-control"/>
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
                                                <input type="text" name="employee_code" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <div class="col-sm-3">
                                                <label class="control-label">
                                                    Password
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="employee_first_name" class="form-control"/>
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
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
</div>