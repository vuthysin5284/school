
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_testing_register');?></h4>
</div>

<style>
    .red{
        color:red;
    }
    .panel-white {
        border-top: 1px solid #FFF!important;
    }
    .mailbox-content {
        min-height: 200px;
    }
</style>

<div class="panel-body">
    <input type="hidden" id="testing_enrol_id" name="testing_enrol_id" value="<?php echo empty($id)?'':$id?>"/>
    <input type="hidden" id="pb_crud_id" name="pb_crud_id" value="<?php echo empty($crud)?'':$crud?>"/>

    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="students" role="tablist">
            <li role="presentation" class="active">
                <a href="#general" data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('general');?>
                </a>
            </li>
            <li role="presentation">
                <a href="#study_record" data-toggle="tab" aria-expanded="false">
                    <?php echo get_phrase('study_record');?>
                </a>
            </li>
            <li role="presentation">
                <a href="#expected_class" data-toggle="tab">
                    <?php echo get_phrase('expected_class');?>
                </a>
            </li>

            <li role="presentation">
                <a href="#relative" data-toggle="tab">
                    <?php echo get_phrase('relative');?>
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
                            <div id="general" class="tab-pane active fade in">
                                <?php include_once ("testing_general.php");?>

                            </div>
                            <div id="study_record" class="tab-pane fade in">
                                <?php include_once ("study_record.php");?>

                            </div>
                            <div id="expected_class" class="tab-pane fade in">
                                <?php include_once ("expected_class.php");?>

                            </div>
                            <div id="relative" class="tab-pane fade in">
                                <?php include_once ("relative.php");?>

                            </div>
                            <!--div class="tab-pane active" id="students_render">Loading...</div-->
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

<!--script src="<?php echo base_url();?>assets/js/testing_record/testing_record_tab.js"> </script-->