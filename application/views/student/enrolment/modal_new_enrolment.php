
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><i class="fa fa-user-plus m-r-xs"></i><?php echo get_phrase($crud.'_register');?></h4>
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


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
                <div id="rootwizard">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#general" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-globe m-r-xs"></i><?php echo get_phrase('General');?>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#parent" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-users m-r-xs"></i>
                                Parent
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#responsible" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-user m-r-xs"></i>
                                <?php echo get_phrase('responsibility');?>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#assign_class" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-book m-r-xs"></i>
                                <?php echo get_phrase('assign_class');?>
                            </a>
                        </li>
                    </ul>


                    <div class="progress progress-sm m-t-sm">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        </div>
                    </div>
                    <form id="wizardForm">
                        <input type="hidden" id="enrolment_id" name="enrolment_id" value="<?php echo empty($id)?'':$id?>"/>
                        <input type="hidden" id="pb_crud_id" name="pb_crud_id" value="<?php echo empty($crud)?'':$crud?>"/>
                        <div class="tab-content">
                            <div class="tab-pane active fade in" id="general">
                                <?php include "student_general.php"; ?>
                            </div>
                            <div class="tab-pane fade" id="parent">
                                <?php include "parent.php"; ?>
                            </div>
                            <div class="tab-pane fade" id="responsible">
                                <?php include "responsible.php"; ?>

                            </div>
                            <div class="tab-pane fade" id="assign_class">
                                <?php include "assign_class.php"; ?>
                            </div>

                            <hr />
                            <ul class="pager wizard">
                                <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                                <li class="pull-right"><a href="#" id="btnSaveNewEnrollment" style="display: none" class="btn btn-default">Save</a></li>
                                <li class="pull-right"><a href="#" id="btnCloseEnrollment" data-dismiss="modal" class="btn btn-default" style="display: none" class="btn btn-info">Close</a></li>
                                <li class="next"><a href="#" id="btnNext" class="btn btn-default">Next</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    $(function () {
        $('#txthiredate').datepicker();

    });
</script>
<!--div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
                <div id="rootwizard">
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#general" data-toggle="tab" aria-expanded="false">
                                < ?php echo get_phrase('General');?>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#parent" data-toggle="tab" aria-expanded="false">
                                Parent
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#responsible" data-toggle="tab" aria-expanded="false">
                                < ?php echo get_phrase('responsibility');?>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#assign_class" data-toggle="tab" aria-expanded="false">
                                < ?php echo get_phrase('assign_class');?>
                            </a>
                        </li>
                    </ul>

                    <div class="progress progress-sm m-t-sm">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        </div>
                    </div>
                    <form id="wizardForm">
                        <div class="tab-content">
                            <div class="tab-pane active fade in" id="general">
                                <div class="row m-b-lg">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="parent">
                                < ?php include "parent.php"; ?>
                            </div>
                            <div class="tab-pane fade" id="responsible">
                                < ?php include "responsible.php"; ?>

                            </div>
                            <div class="tab-pane fade" id="assign_class">
                                < ?php include "assign_class.php"; ?>
                            </div>
                            <ul class="pager wizard">
                                <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                                <li class="next"><a href="#" class="btn btn-default">Next</a></li>
                            </ul>
                        </div>
                    </form>
        < Tab panes
        <div class="col-md-12" style="padding-right:0px; padding-left: 0px;">
            <div class="panel panel-white">
                <div class="panel-body mailbox-content">

                    <div class="menu-overly-mask"></div>

                    <div class="adds-wrapper">
                        <div class="tab-content">
                            <div class="tab-pane active" id="general">
                                < ?php include "student_general.php"; ? >
                            </div>
                            <div class="tab-pane" id="parent">
                                < ?php include "parent.php"; ? >

                            </div>
                            <div class="tab-pane" id="responsible">
                                < ?php include "responsible.php"; ? >

                            </div>
                            <div class="tab-pane" id="assign_class">
                                < ? php include "assign_class.php"; ? >

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div-->



<!--script src="<?php echo base_url();?>assets/js/enrolment/enrollment_tab.js"></script-->

<script src="<?php echo base_url();?>assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/modern.min.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/form-wizard.js"></script>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment_new.js"></script>