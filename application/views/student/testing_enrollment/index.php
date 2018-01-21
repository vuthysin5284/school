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
<?php
    //var_dump($result);
    ?>

<div class="row m-t-md">
    <div class="col-md-2" style="padding-right:0px; padding-left: 0px;">
        <ul class="nav mailbox-nav" id="document" role="tablist" >

            <li class="active default">
                <a href="<?php echo base_url();?>testing_enrollment/testing_record_list"
                   data-url="<?php echo base_url();?>testing_enrollment/testing_record_list">
                    <i class="fa fa-user"></i><?php echo get_phrase('testing_student');?><!--Testing Recordsតារាងបញ្ជីរប្រឡងសាកល្បង--></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>testing_enrollment/testing_result"
                   data-url="<?php echo base_url();?>testing_enrollment/testing_result">
                    <i class="fa fa-money"></i><?php echo get_phrase('waiting_payment');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>testing_enrollment/testing_result"
                   data-url="<?php echo base_url();?>testing_enrollment/testing_result">
                    <i class="fa fa-pencil"></i><?php echo get_phrase('examination');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>testing_enrollment/testing_result"
                   data-url="<?php echo base_url();?>testing_enrollment/testing_result">
                    <i class="fa fa-check"></i><?php echo get_phrase('testing_result');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>testing_enrollment/waiting_register"
                   data-url="<?php echo base_url();?>testing_enrollment/waiting_register">
                    <i class="fa fa-check-square-o"></i><?php echo get_phrase('waiting_enrollment');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>testing_enrollment/fee_management"
                   data-url="<?php echo base_url();?>testing_enrollment/fee_management">
                    <i class="fa fa-ban"></i><?php echo get_phrase('canceling_list');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>testing_enrollment/testing_report"
                   data-url="<?php echo base_url();?>testing_enrollment/testing_report">
                    <i class="fa fa-bar-chart"></i><?php echo get_phrase('convert_to_student');?></a></li>
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
