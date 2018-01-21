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

if($common){
?>
<div class="row m-t-md">
    <div class="col-md-2" style="padding-right:0px; padding-left: 0px;">
        <ul class="nav mailbox-nav" id="document" role="tablist">
            <li class="active default">
                <a href="<?php echo base_url(); ?>branch/branch_list"
                   data-url="<?php echo base_url(); ?>branch/branch_list" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-building"></i>Branch Setup</a></li>
            <li class="default">
                <a href="<?php echo base_url(); ?>room/room_list"
                   data-url="<?php echo base_url(); ?>room/room_list" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-building-o"></i>Room Setup</a></li>
            <li class="default">
                <a href="<?php echo base_url(); ?>classes/classes_list"
                   data-url="<?php echo base_url(); ?>classes/classes_list" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-table"></i>Class Setup</a></li>
            <li class="default">
                <a href="<?php echo base_url(); ?>schoolsession/session_list"
                   data-url="<?php echo base_url(); ?>schoolsession/session_list" data-toggle="tab"
                   aria-expanded="false">
                    <i class="fa fa-table"></i>Session Setup</a></li>
            <li class="default">
                <a href="<?php echo base_url(); ?>schoolsection/section_list"
                   data-url="<?php echo base_url(); ?>schoolsection/section_list" data-toggle="tab"
                   aria-expanded="false">
                    <i class="fa fa-table"></i>Section Setup</a></li>
            <li class="default">
                <a href="<?php echo base_url(); ?>times/times_list"
                   data-url="<?php echo base_url(); ?>times/times_list" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-clock-o"></i>Times Setup</a></li>
            <li class="default">
                <a href="<?php echo base_url(); ?>schedule/schedule_list"
                   data-url="<?php echo base_url(); ?>schedule/schedule_list" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-calendar-o"></i>Schedule Setup</a></li>
            <li class="default">
                <a href="<?php echo base_url(); ?>course/course_list"
                   data-url="<?php echo base_url(); ?>course/course_list" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-file-text"></i>Subject Setup</a></li>
        </ul>
    </div>
    <div class="col-md-10" style="padding-right:0px; padding-left: 0px;">
        <div class="panel panel-white">
            <div class="panel-body mailbox-content">

                <div class="menu-overly-mask"></div>
                <!-- Mobile Filter bar End-->

                <div class="adds-wrapper" style="margin-bottom:200px">
                    <div class="tab-content">
                        <div class="tab-pane active" id="document_render">Loading...</div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

    <script>
        // new upload change file
        function onNewUpload(id) {
            $("#new_file").val(id);
            $("#upload_doc").click();
        }

        $(".upload").click(function () {
            $("#new_file").val(0);
            $("#upload_doc").click();
        });

        $('#upload_doc').change(function (e) {
            if (confirm('Are you sure you want to upload file?')) {
                $('#frmUploadDoc').submit();
            }
        });
    </script>


<?php
    }else{

?>

    <div class="col-md-12" style="padding-right:0px; padding-left: 0px;">
        <div class="panel panel-white">
            <div class="panel-body mailbox-content">

                <div class="menu-overly-mask"></div>
                <!-- Mobile Filter bar End-->

                <div class="adds-wrapper" style="margin-bottom:200px">
                    <div class="tab-content">
                        Please setup common information first, will you use this page!
                    </div>
                </div>

            </div>
        </div>
    </div>


<?php

}

?>

