
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><i class="fa fa-user m-r-xs"></i><?php echo get_phrase('employee_profiles/'.$crud.'_employee_profile');?></h4>
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
 
        <div role="tabpanel"> 
            <input type="hidden" id="pb_crud_id" value="<?php echo $crud?>" />
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
                <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_background/"
                     data-url="<?php echo base_url();?>staff/employee_background/" data-toggle="tab" aria-expanded="false">
       				 Background
        			</a>
       			 </li>
                <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_skills/"
                     data-url="<?php echo base_url();?>staff/employee_skills/" data-toggle="tab" aria-expanded="false">
       				 Skills
        			</a>
        		</li>
                <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_language/"
                     data-url="<?php echo base_url();?>staff/employee_language/" data-toggle="tab" aria-expanded="false">
       				 Language
        			</a>
        </li>
         <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_experience/"
                     data-url="<?php echo base_url();?>staff/employee_experience/" data-toggle="tab" aria-expanded="false">
       				 Experience
        			</a>
        </li>
                <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_family/"
                     data-url="<?php echo base_url();?>staff/employee_family/" data-toggle="tab" aria-expanded="false">
       				 Family
        			</a>
        </li>
        <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_referrence/"
                     data-url="<?php echo base_url();?>staff/employee_referrence/" data-toggle="tab" aria-expanded="false">
       				 Referrence
        			</a>
        </li>
        <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_tracking/"
                     data-url="<?php echo base_url();?>staff/employee_tracking/" data-toggle="tab" aria-expanded="false">
       				 Tracking
        			</a>
        </li>
        <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_document/"
                     data-url="<?php echo base_url();?>staff/employee_document/" data-toggle="tab" aria-expanded="false">
       				 Document
        			</a>
        </li>
        <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_internal_training/"
                     data-url="<?php echo base_url();?>staff/employee_internal_training/" data-toggle="tab" aria-expanded="false">
       				 Internal Training
        			</a>
        </li>
        
       <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_payslip/"
                     data-url="<?php echo base_url();?>staff/employee_payslip/" data-toggle="tab" aria-expanded="false">
       				 Payslip
        			</a>
        </li>
       
        <li role="presentation">
        		<a href="<?php echo base_url();?>staff/employee_discipline/"
                     data-url="<?php echo base_url();?>staff/employee_discipline/" data-toggle="tab" aria-expanded="false">
       				 Discipline
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
                                <div class="tab-pane active" id="employee_render">Loading...</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>


<script src="<?php echo base_url();?>assets/js/employee/employee_tab.js"></script>