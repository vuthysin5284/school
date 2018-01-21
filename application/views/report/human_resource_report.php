<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
    .m-t-md {
        margin-top: -1px;
    }
    #upload_doc{
        display:none;
    }
    .mailbox-content{
        min-height:500px;
        padding: 0px;
        padding-top: 0px;
    }
</style>


<div class="row m-t-md">
    <div class="col-md-2" style="padding-right:0px; padding-left: 0px;">
        <ul class="nav mailbox-nav" id="document" role="tablist" >
            <li class="active default">
                <a href="<?php echo base_url();?>report/family"
                   data-url="<?php echo base_url();?>report/family" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-file-text-o"></i><?php echo get_phrase('student_report');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>student_report/employee"
                   data-url="<?php echo base_url();?>student_report/employee" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-file-text-o"></i><?php echo get_phrase('staff_attendance');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>student_report/employee"
                   data-url="<?php echo base_url();?>student_report/employee" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-file-text-o"></i><?php echo get_phrase('activity_log');?></a></li>
        </ul>
    </div>
    <div class="col-md-10" style="padding-right:0px; padding-left: 0px;">
        <div class="panel panel-white">
            <div class="panel-body mailbox-content">

                <div class="menu-overly-mask"></div>
                <!-- Mobile Filter bar End-->

                <div class="adds-wrapper">
                    <div class="tab-content">
                        <div class="tab-pane active" id="document_render">Loading...</div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
