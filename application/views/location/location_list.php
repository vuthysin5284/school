<?php /*
<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_location');?>
        </button>
    </div>
</div>
*/
?>

<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<!-- Location -->
<style>
    .block_location{
        width: 197px;
        height: 300px;
        float: left;
        padding-right: 20px;
        padding-left: 15px;
    }
    .wrap{
        width: 100%;
        height: 100%;
        padding: 0 auto;
    }
</style>

<div class="wrap">
    <div class="block_location">                        <!-- Country -->
        <div class="form-group">
            <label for="country" class="col-sm-3 control-label"><?php echo get_phrase('Country');?></label>
            <br/><br/>
            <select size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                <option value="Khmer">Khmer</option>
                <option value="United State">United State</option>
                <option value="Thailand">Thailand</option>
                <option value="Portugal">Portugal</option>
                <option value="Khmer">Khmer</option>
                <option value="United State">United State</option>
                <option value="Thailand">Thailand</option>
                <option value="Portugal">Portugal</option>
                <option value="Khmer">Khmer</option>
                <option value="United State">United State</option>
                <option value="Thailand">Thailand</option>
                <option value="Portugal">Portugal</option>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="country" name="country" />
            <br/>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Add New');?>
            </button>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Update');?>
            </button>
        </div>
    </div>
    <div class="block_location">                        <!-- Nationality -->
        <div class="form-group">
            <label for="nationality" class="col-sm-3 control-label"><?php echo get_phrase('Nationality');?></label>
            <br/><br/>
            <select size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                <?php

                ?>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="nationality" name="nationality" />
             <br/>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Add New');?>
            </button>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Update');?>
            </button>
        </div>
    </div>
    <div class="block_location">                        <!-- Province -->
        <div class="form-group">
            <label for="province" class="col-sm-3 control-label"><?php echo get_phrase('Province');?></label>
            <br/><br/>
            <select size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                <?php

                ?>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="province" name="province" />
             <br/>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Add New');?>
            </button>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Update');?>
            </button>
        </div>
    </div>
    <div class="block_location">                        <!-- District -->
        <div class="form-group">
            <label for="district" class="col-sm-3 control-label"><?php echo get_phrase('District');?></label>
            <br/><br/>
            <select size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                <?php

                ?>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="district" name="district" />
             <br/>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Add New');?>
            </button>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Update');?>
            </button>
        </div>
    </div>
    <div class="block_location">                           <!-- Commune -->
        <div class="form-group">
            <label for="commune" class="col-sm-3 control-label"><?php echo get_phrase('Commune');?></label>
            <br/><br/>
            <select size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                <?php

                ?>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="commune" name="commune" />
            <br/>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Add New');?>
            </button>
            <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
                <?php echo get_phrase('Update');?>
            </button>
        </div>
    </div>
</div>



















<?php 
/*
<table id="datable_location" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>location Number</th>
            <th>location Name</th>
            <th>Building</th>
            <th>Floor</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>
*/
?>

<script src="<?php echo base_url();?>assets/js/location/location.js"></script>
