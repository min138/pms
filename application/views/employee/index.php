
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <?php if($this->session->flashdata('success')!=""){ ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php
        }
        ?>
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Employee List
                </div>
                <div class="tools">
                </div>
            </div>
            
            <div class="portlet-body">
                <table class="table table-striped table-hover" id="sample_5">
                    <thead>
                        <tr>
                            <th>
                                Employee Name
                            </th>
                            <th>
                                Gender
                            </th>
                            <th class="hidden-xs">
                                Birth date
                            </th>
                            <th class="hidden-xs">
                                Mobile
                            </th>
                            <th class="hidden-xs">
                                Email
                            </th>
                            <th class="hidden-xs">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?= $row->emp_lname . ' ' . $row->emp_fname ?>
                                </td>
                                <td>
                                    <?= $row->gender ?>
                                </td>
                                <td>
                                    <?php $bdate = implode("/", array_reverse(explode("-", $row->bdate))); ?>
                                    <?= $bdate ?>
                                </td>
                                <td>
                                    <?= $row->mobile ?>
                                </td>
                                <td>
                                    <?= $row->email ?>
                                </td>
                                <td>
                                    <a class="edit" href="<?php echo base_url() . 'employee/edit_employee/' . $row->emp_id; ?>">
                                        Edit </a>&nbsp;|&nbsp;
                                        <a class="delete" href="<?php echo base_url() . 'employee/delete_employee/' . $row->emp_id; ?>" onclick="return confirm('Do you want to delete this ?');">
                                        Delete </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>