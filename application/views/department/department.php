
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
                <form  id="department_id" method="post">
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
                                                <input type="text" class="form-control" name="department_name" id="department_name"/>
                                                
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
                            <div class="row">
                                <div class="col-md-6">
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#">
                                                    Print </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="department_list">
                            <thead>
                                <tr>
                                    <th>
                                        Department Name
                                    </th>

                                    <th class="hidden-xs">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($department) && !empty($department)) {
                                    foreach ($department as $row) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td>
                                                <?php echo $row->department_name; ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo base_url() . "department/department_data/" . $row->department_id; ?>" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>
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
</div>