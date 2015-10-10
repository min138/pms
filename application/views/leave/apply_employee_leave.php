<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Employee Leave Form
                </div>
                <div class="tools">
                </div>
            </div>

            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="form-horizontal" action="<?php echo base_url() . 'leave/apply_employee_leave'; ?>" id="apply_leave" method="post">
                    <div class="form-body">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <h3 class="form-section">Leave Info</h3>
                                    <?php
                                    $emp_id=$this->session->userdata('empid');
                                    if($emp_id==0){
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Employee Name
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input class='form-control col-lg-5 itemSearch' name="employee_id" id="employee_id" type='text' placeholder='Select a Employee'/>
                                                <?php echo form_error('employee_id'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }else{
                                    ?>
                                    <input class='form-control' name="employee_id"  type='hidden' placeholder='Select a Employee' value="<?php echo $emp_id; ?>"/>
                                    <?php
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Leave Type
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input class='form-control col-lg-5 itemSearch' name="employee_leave_type" id="employee_leave_type" type='text' placeholder='Select a Employee Leave'/>
                                                <?php echo form_error('employee_leave_type'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Leave
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <select name="employee_leave" class="form-control">
                                                        <option value="One Day" selected="">One Day</option>
                                                        <option value="Half Day">Half Day</option>
                                                        <option value="Range">Range</option>
                                                        
                                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    Start Date
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="start_date" value="<?php echo set_value('start_date'); ?>" class="form-control date-picker"/>
                                                <?php echo form_error('start_date'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">
                                                    End Date
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input name="end_date" type="text" value="<?php echo set_value('end_date'); ?>" class="form-control date-picker date-picker"/>
                                                <?php echo form_error('end_date'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>

                               

                                <div class="col-sm-6">
                                    <h3 class="form-section">Leave Reason</h3>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            
                                            <div class="col-sm-12">
                                                <textarea name="msg" class="form-control" rows="10"></textarea>
                                                <?php echo form_error('msg'); ?>
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