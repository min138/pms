<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Holiday Form
        </div>
        <div class="tools">
            <a href="" class="collapse"></a>
            <a href="#portlet-config" data-toggle="modal" class="config"></a>
            <a href="" class="reload"></a>
            <a href="" class="remove"></a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" action="<?php echo base_url() . 'holiday_master'; ?>" role="form" method="post"> 
            <?php echo $this->session->flashdata('error'); ?>
            <?php echo $this->session->flashdata('success'); ?>
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Holiday Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="holiday_name" value="<?php echo set_value('holiday_name'); ?>" placeholder="Enter text">
                        <?php echo form_error('holiday_name'); ?>

<!--                        <span class="help-block">
    A block of help text. </span>-->
                    </div>
                </div>







                <div class="form-group">
                    <label class="col-md-3 control-label">Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="holiday_description" value="<?php echo set_value('holiday_description'); ?>" rows="3"></textarea>
                        <?php echo form_error('holiday_description'); ?>
                    </div>
                </div>




                <div class="form-group">
                    <label class="col-md-3 control-label">Inline Radio</label>
                    <div class="col-md-9">
                        <div class="radio-list">
                            <label class="radio-inline">
                                <input type="radio" name="singleholiday" id="s1" value="0" > Single </label>
                            <label class="radio-inline">
                                <input type="radio" name="singleholiday" id="v1" value="1" > Vacation </label>
                          
                        </div>
                    </div>
                </div>

                <div class="form-group" id="single">
                    <label class="control-label col-md-3">Default Datepicker </label>
                    <div class="col-md-9">
                        <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value=""/>
                        <span class="help-block">
                            Select date </span>
                    </div>
                </div>
            </div>

            <div class="form-group" id="vacation" style="display: none">
                <label class="control-label col-md-3">Date Range</label>
                <div class="col-md-4">
                    <div class="input-group input-large">
                        <input type="text" class="form-control date-picker" name="date_from" value="<?php echo set_value('date_from'); ?>" >
                        <?php echo form_error('date_from'); ?>
                        <span class="input-group-addon">
                            to </span>
                        <input type="text" class="form-control date-picker" name="date_to" value="<?php echo set_value('date_to'); ?>">
                        <?php echo form_error('date_to'); ?>
                    </div>
                    <!-- /input-group -->
<!--                    <span class="help-block">
                        Select date range </span>-->
                </div>
            </div>





            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
