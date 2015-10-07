<div class="col-md-6 ">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i>Designation Form
            </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="<?php echo base_url() . 'designation/designation_update/' . $designation_id; ?>" method="post">
                <div class="form-body">
                    <?php
                    if (isset($record_edit) && !empty($record_edit)) {
                        foreach ($record_edit as $row) {
                            ?>
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
                                                    <span><?php echo form_error('department_name'); ?></span>
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
                                                    <input value="<?php echo $row->designation_name; ?>" type="text" id="designation" name="designation" class="form-control"/>
                                                    <span><?php echo form_error('designation'); ?></span>
                                                </div>
                                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
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