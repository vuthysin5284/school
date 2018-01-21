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


            <!--li class="default">
                <a href="<?php echo base_url();?>score/score_student"
                   data-url="<?php echo base_url();?>score/score_student">
                    <i class="fa fa-exclamation-circle"></i>រៀបលំដាប់ចំណាត់ថ្នាក់ < !-- រៀបលំដាប់ចំណាត់ថ្នាក់  Score by Student-- ></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>score/classify_score"
                   data-url="<?php echo base_url();?>score/classify_score">
                    <i class="fa fa-exclamation-circle"></i>តារាងចំណាត់ថ្នាក់< !-- តារាងចំណាត់ថ្នាក់ Classify Score-- ></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>score/honorable_table"
                   data-url="<?php echo base_url();?>score/honorable_table">
                    <i class="fa fa-exclamation-circle"></i>តារាងកិត្តិយស< !-- តារាងកិត្តិយស Honorable tables-- ></a></li-->


            <li class="default">
                <a href="<?php echo base_url();?>examination/score_student"
                   data-url="<?php echo base_url();?>examination/score_student">
                    <i class="fa fa-exclamation-circle"></i>Score by Student</a></li>
            <li class="default">
                <a href="<?php echo base_url();?>examination/classify_score"
                   data-url="<?php echo base_url();?>examination/classify_score">
                    <i class="fa fa-exclamation-circle"></i>Classify Score</a></li>
            <li class="default">
                <a href="<?php echo base_url();?>examination/honorable_table"
                   data-url="<?php echo base_url();?>examination/honorable_table">
                    <i class="fa fa-exclamation-circle"></i>Honorable tables</a></li>

            <li class="default">
                <a href="<?php echo base_url();?>student/enrolment"
                   data-url="<?php echo base_url();?>student/enrolment">
                    <i class="fa fa-volume-off"></i><!--របាយការណ៍--><?php echo get_phrase('student_low_score');?></a></li>

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

