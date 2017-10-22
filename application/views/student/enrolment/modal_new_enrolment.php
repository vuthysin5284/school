
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
        min-height: 400px;
    }
</style>

<div class="panel-body">
    <input type="hidden" id="enrolment_id" name="enrolment_id" value="<?php echo empty($id)?'':$id?>"/>
    <input type="hidden" id="pb_crud_id" name="pb_crud_id" value="<?php echo empty($crud)?'':$crud?>"/>

    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="enrollment" role="tablist">

            <li role="presentation" class="active">
                <a href="<?php echo base_url();?>student/student_general/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/student_general/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('General');?>
                </a>
            </li>
            <li role="presentation">
                <a href="<?php echo base_url();?>student/parent/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/parent/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    Parent
                </a>
            </li>
            <li role="presentation">
                <a href="<?php echo base_url();?>student/responsible/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/responsible/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('responsibility');?>
                </a>
            </li>
            <li role="presentation">
                <a href="<?php echo base_url();?>student/assign_class/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>"
                   data-url="<?php echo base_url();?>student/assign_class/<?php echo empty($id)?'':$id?>/<?php echo empty($crud)?'':$crud?>" data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('assign_class');?>
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