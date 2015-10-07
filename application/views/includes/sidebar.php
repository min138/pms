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
            <li class="<?php echo $class == "employee" ? "active" : ''; ?>">
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">Employee</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo $active_tab == "employee" ? "active" : ''; ?>">
                        <a href="<?php echo base_url('employee'); ?>">
                            <i class="icon-grid"></i>
                            Employee List
                        </a>
                    </li>
                    <li class="<?php echo $active_tab == "add-employee" ? "active" : ''; ?>">
                        <a href="<?php echo base_url('employee/add_employee'); ?>">
                            <i class="icon-plus"></i>
                            Add Employee
                        </a>
                    </li>

                    
                     
                </ul>
                 <li class="start <?php echo $class == "department" ? "active" : ''; ?> ">
                <a href="<?php echo base_url('department'); ?>">
                    <i class="icon-grid"></i>
                    <span class="title">Department</span>
                    <span class="selected"></span>
                </a>
            </li>
            
            <li class="start <?php echo $class == "designation" ? "active" : ''; ?> ">
                <a href="<?php echo base_url('designation'); ?>">
                    <i class="icon-grid"></i>
                    <span class="title">Designation</span>
                    <span class="selected"></span>
                </a>
            </li>
            
            </li>
         </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>