<?php
/**
 * Created by PhpStorm.
 * User: Sin Vuthy
 * Date: 10/21/2017
 * Time: 11:11 PM
 */
?>
    <div class="panel-body">

            <div class="col-md-4">
                    <label class="col-sm-4 control-label"><?php echo get_phrase('language');?></label>
                    <div class="col-sm-8">
                        <select class="form-control">
                            <option>khmer</option>
                            <option>english</option>
                            <option>chinese</option>
                        </select>
                    </div>
            </div>
            <div class="col-md-2">
                    <select class="form-control">
                        <option>k3</option>
                        <option>k4</option>
                        <option>k5</option>
                        <option>1st</option>
                    </select>
            </div>
            <div class="col-md-3">
                    <input type="text" class="form-control" id="school_year" name="school_year" placeholder="School Year"/>
            </div>
            <div class="col-md-3">
                    <input type="text" class="form-control" id="former_school" name="former_school" placeholder="Former School"/>
            </div>
            <br />
            <div style="clear:both" style="margin-bottom: 10px;"></div>
            <button class="btn btn-info pull-right" style="margin-right: 15px;margin-top: 10px; margin-bottom: 10px;"">
                <i class="fa fa-plus"></i>
                <?php echo get_phrase('add_new');?>
            </button>


    <div class="row">
        <table id="datable_study_record" class="table table-striped table-bordered table-hover" width="100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Language</th>
                <th>Grade</th>
                <th>School Year</th>
                <th>Former School</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>

    </div><!-- row -->

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
    </div>

</div><!-- body -->
