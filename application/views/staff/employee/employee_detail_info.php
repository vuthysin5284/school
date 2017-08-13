
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('staff_profiles');?></h4>
</div>
<hr style="margin-top: -10px;"/>

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
    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered','enctype' => 'multipart/form-data'));?>
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="employee" role="tablist">

                <li role="presentation" class="active">
                    <a href="<?php echo base_url();?>staff/employee_general"
                           data-url="<?php echo base_url();?>staff/employee_general" data-toggle="tab" aria-expanded="false">
                           General
                           </a>
                </li>
                <li role="presentation">
                     <a href="<?php echo base_url();?>staff/employee_contact/1233"
                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab" aria-expanded="false">
                           Contact
                           </a>
                </li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Background</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Skills</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Language</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Experience</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Family</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">referrence</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Tracking</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Documents</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Internal Training</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Payslip</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>staff/employee_contact/1233"
                                           data-url="<?php echo base_url();?>staff/employee_contact/1233" data-toggle="tab">Discipline</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="col-md-12" style="padding-right:0px; padding-left: 0px;">
                <div class="panel panel-white">
                    <div class="panel-body mailbox-content">

                        <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->

                        <div class="adds-wrapper">
                            <div class="tab-content">
                                <div class="tab-pane active" id="employee_render">Loading...</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="button" class="btn btn-info"><?php echo get_phrase('transfer');?></button>
            <button type="button" class="btn btn-info"><?php echo get_phrase('transfer');?></button>
            <button type="button" class="btn btn-info"><?php echo get_phrase('Review');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info"><?php echo get_phrase('save');?></button>
        </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/employee/employee_tab.js"></script>