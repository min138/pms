<div class="row">
    <div id="ajax-respose"></div>
</div>
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Designation Form Test GIT
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form  id="designation_form" method="post">
                    <div class="form-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Department Name
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="department_name">
                                                    <?php foreach ($department_record as $department_data) { ?>
                                                        <option value="<?php echo $department_data->department_id; ?>"><?php echo $department_data->department_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span>

                                                </span>
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
                                            <span>

                                            </span>
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
</div>
