<?php
/**
 * Created by PhpStorm.
 * User: Sin Vuthy
 * Date: 9/7/2017
 * Time: 9:19 PM
 */

?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <br />
    <!-- button create new admin-->
    <div class="col-md-2 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>prizelist/prize_list_new/0/new');">
            <i class="fa fa-plus"></i>
            <!--?php echo get_phrase('enroll_new');?-->
            បង្កើតថ្មី
        </button>
    </div>

        <div style="clear:both"></div>
        <br />

        <table id="datable_prize_list"  class="table table-striped table-bordered table-hover" width="100%">
            <thead>
            <tr>
                <th width="50px">លរ</th>
                <th>Description</th>
                <th width="150px">Prize</th>
                <th width="90px">Status</th>
                <th width="90px">Actions</th>
            </tr>
            </thead>
        </table>
    </div>


    <div class="col-md-2"></div>
</div>
<script src="<?php echo base_url();?>assets/js/master_data/prize_list.js"></script>




