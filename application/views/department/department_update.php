<div class="row">
    <div class="col-md-6">
        <div id="ajax-respose"></div> 
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Department Form
                </div>

            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="<?php echo base_url().'department/department_data/'.$department_id;?>" method="post">
                    
                       <?php
           // echo $this->session->flashdata('set_success');
            if (isset($record_edit) && !empty($record_edit)) {
                foreach ($record_edit as $row) {
                    ?>
                    <div class="form-body">

                        <div class="row">
                            <div class="col-sm-12">




                                <div class="col-sm-9">

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-6">
                                                <label class="control-label" >
                                                    Department Name
                                                </label>
                                               
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="department_name" value="<?php echo $row->department_name; ?>" id="department_name"/>
                                                <?php echo form_error('department_name'); ?>
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
                
                 <?php
                    }
                }
                ?>
                 
            </div>
        </div>