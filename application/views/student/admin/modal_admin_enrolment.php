
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_enrollment');?></h4>
</div>

<style>
    .red{
        color:red;
    }
    .panel-white {
        border-top: 1px solid #FFF!important;
    }
    .mailbox-content {
        min-height: 250px;
    }
</style>

<div class="panel-body">
    <input type="hidden" id="enrolment_id" name="enrolment_id" value="<?php echo empty($id)?'':$id?>"/>
    <input type="hidden" id="pb_crud_id" name="pb_crud_id" value="<?php echo empty($crud)?'':$crud?>"/>

    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="enrollment" role="tablist">

            <li role="presentation" class="active">
                <a href="<?php echo base_url();?>student/admin_fee/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/admin_fee/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    ថ្លៃរដ្ឋបាល<!--ថ្លៃរដ្ឋបាល-->
                </a>
            </li>

            <li role="presentation">
                <a href="<?php echo base_url();?>student/admin_study_fee/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/admin_study_fee/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    ថ្លៃសិក្សា<!--ថ្លៃសិក្សា-->
                </a>
            </li>
            <li role="presentation">
                <a href="<?php echo base_url();?>student/admin_food/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/admin_food/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    ថ្លៃអាហារ<!--  ថ្លៃអាហារ -->
                </a>
            </li>
            <li role="presentation">
                <a href="<?php echo base_url();?>student/admin_transport_fee/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/admin_transport_fee/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    <!--?php echo get_phrase('responsibility');?-->
                    ថ្លៃដឹកជញ្ចូន<!--  ថ្លៃដឹកជញ្ចូន-->
                </a>
            </li>
            <li role="presentation">
                <a href="<?php echo base_url();?>student/admin_remidial_fee/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/admin_remidial_fee/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    <!--?php echo get_phrase('responsibility');?-->
                    ថ្នាក់បំប៉នពិសេស​<!--  ថថ្នាក់បំប៉នពិសេស​-->
                </a>
            </li>
            <li role="presentation">
                <a href="<?php echo base_url();?>student/admin_paid_history/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/admin_paid_history/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    ប្រវត្តិបង់ប្រាក់<!--ប្រវត្តិបង់ប្រាក់-->
                </a>
            </li>
            <li role="presentation">
                <a href="<?php echo base_url();?>student/admin_student_not_activity/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/admin_student_not_activity/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    កត់ត្រាសកម្មភាព<!-- កត់ត្រាសកម្មភាព-->
                </a>
            </li>
            <li role="presentation">
                <a href="<?php echo base_url();?>student/admin_attendance_tracking/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/admin_attendance_tracking/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    កត់ត្រាអវត្តមាន<!-- កត់ត្រាអវត្តមាន-->
                </a>
            </li>

            <li role="presentation">
                <a href="<?php echo base_url();?>student/student_pic/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/student_pic/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('picture');?>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="col-md-12" style="padding-right:0px; padding-left: 0px;">
            <div class="panel panel-white">
                <div class="panel-body mailbox-content">

                    <div class="menu-overly-mask"></div>
                    <!-- Mobile Filter bar End-->

                    <div class="adds-wrapper">
                        <div class="tab-content">
                            <div class="tab-pane active" id="enrol_render">Loading...</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/enrollment_tab.js"></script>