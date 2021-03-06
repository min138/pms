<?php
$class = strtolower($this->router->fetch_class());
?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: for circle icon style menu apply page-sidebar-menu-circle-icons class right after sidebar-toggler-wrapper -->
        <ul class="page-sidebar-menu">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <div class="clearfix">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">
                <form class="search-form" role="form" action="index.html" method="get">
                    <div class="input-icon right">
                        <i class="icon-magnifier"></i>
                        <input type="text" class="form-control" name="query" placeholder="Search...">
                    </div>
                </form>
            </li>
            <li class="start <?php echo $class == "dashboard" ? "active" : ''; ?> ">
                <a href="<?php echo base_url('dashboard'); ?>">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="<?php echo ($class == "employee" || $class == "designation" || $class == "department" || $class == "leave") ? "active" : ''; ?>">
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">Employee</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <?php
                    $employee_id = $this->session->userdata('empid');
                    if($employee_id==0){
                    ?>
                    <li class="<?php echo $active_tab == "employee" ? "active" : ''; ?>">
                        <a href="<?php echo base_url('employee'); ?>">
                            <i class="icon-grid"></i>
                            Employee List
                        </a>
                    </li>
                    <li class="start <?php echo $active_tab == "add-department" ? "active" : ''; ?> ">
                        <a href="<?php echo base_url('department'); ?>">
                            <i class="icon-grid"></i>
                            <span class="title">Department</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="start <?php echo $active_tab == "add-designtion" ? "active" : ''; ?> ">
                        <a href="<?php echo base_url('designation'); ?>">
                            <i class="icon-grid"></i>
                            <span class="title">Designation</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="start <?php echo $active_tab == "add-leave" ? "active" : ''; ?> ">
                        <a href="<?php echo base_url('leave'); ?>">
                            <i class="icon-grid"></i>
                            <span class="title">Leave Type</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="start <?php echo $active_tab == "add-employee-leave" ? "active" : ''; ?> ">
                        <a href="<?php echo base_url('leave/employee_leave_request'); ?>">
                            <i class="icon-grid"></i>
                            <span class="title">Employee Leave</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>