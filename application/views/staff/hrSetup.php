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
            <li class="default active">
                <a href="<?php echo base_url();?>employee_status/employee_status"
                   data-url="<?php echo base_url();?>employee_status/employee_status" data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('1._employee_status');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>position_status/position_status"
                   data-url="<?php echo base_url();?>position_status/position_status" data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('2._position_status');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>department/department_status"
                   data-url="<?php echo base_url();?>staff/department_status"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('3._department');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>position/position"
                   data-url="<?php echo base_url();?>position/position"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('4._position');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>section/section"
                   data-url="<?php echo base_url();?>section/section"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('5._section');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>main_station/main_station"
                   data-url="<?php echo base_url();?>main_station/main_station"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('6._main_station');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>employee_location/employee_location"
                  data-url="<?php echo base_url();?>employee_location/employee_location"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('7._employee_location');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>job_level/job_level"
                   data-url="<?php echo base_url();?>job_level/job_level"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('8._job_level');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>country/country"
                   data-url="<?php echo base_url();?>country/country"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('9._country');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>education_type/education_type"
                   data-url="<?php echo base_url();?>education_type/education_type"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('10._education_type');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>relationship_type/relationship_type"
                   data-url="<?php echo base_url();?>relationship_type/relationship_type"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('11._relationship_type');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>leave_reason/leave_reason"
                   data-url="<?php echo base_url();?>leave_reason/leave_reason"  data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('12._leave_reason');?></a></li>
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

    <script>
        // new upload change file
        function onNewUpload(id) {
            $("#new_file").val(id);
            $("#upload_doc").click();
        }

        $(".upload").click(function() {
            $("#new_file").val(0);
            $("#upload_doc").click();
        });

        $('#upload_doc').change(function(e) {
            if(confirm('Are you sure you want to upload file?')){
                $('#frmUploadDoc').submit();
            }
        });
    </script>

