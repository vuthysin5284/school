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
    .warning{
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<div class="wrap">
    <div class="block_location">                        <!-- Country -->
        <div class="form-group">
            <form>
            <label for="country" class="col-sm-3 control-label"><?php echo get_phrase('Country');?></label>
            <br/><br/>
            <select id="scountry" name="scountry" size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                    <?php
                            foreach ($countries as $country) {
                                echo "<option value='$country->country'>$country->name</option>";
                            }
                    ?>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="country" name="country" />
            <br/>
            <button id="btnadd_country" class="btn btn-info" onclick="">
                <?php echo get_phrase('Add New');?>
            </button>
            <button id="btnupdate_country" class="btn btn-info" onclick="">
                <?php echo get_phrase('Update');?>
            </button>
            <label class="warning" id='country_warning'></label>
            </form>
        </div>
    </div>
    <div class="block_location">                        <!-- Province -->
        <div class="form-group">
            <label for="province" class="col-sm-3 control-label"><?php echo get_phrase('Province');?></label>
            <br/><br/>
            <select id="sprovince" name="sprovince" size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                <?php

                ?>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="province" name="province" />
             <br/>
            <button id="btnadd_province" class="btn btn-info" onclick="">
                <?php echo get_phrase('Add New');?>
            </button>
            <button id="btnupdate_province" class="btn btn-info" onclick="">
                <?php echo get_phrase('Update');?>
            </button>
            <label class="warning" id='province_warning'></label>
        </div>
    </div>
    <div class="block_location">                        <!-- District -->
        <div class="form-group">
            <label for="district" class="col-sm-3 control-label"><?php echo get_phrase('District');?></label>
            <br/><br/>
            <select id="sdistrict" name="sdistrict" size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                <?php

                ?>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="district" name="district" />
             <br/>
            <button id="btnadd_district" class="btn btn-info" onclick="">
                <?php echo get_phrase('Add New');?>
            </button>
            <button id="btnupdate_district" class="btn btn-info" onclick="">
                <?php echo get_phrase('Update');?>
            </button>
            <label class="warning" id='district_warning'></label>
        </div>
    </div>
    <div class="block_location">                           <!-- Commune -->
        <div class="form-group">
            <label for="commune" class="col-sm-3 control-label"><?php echo get_phrase('Commune');?></label>
            <br/><br/>
            <select id="scommune" name="scommune" size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                <?php

                ?>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="commune" name="commune" />
            <br/>
            <button id="btnadd_commune" class="btn btn-info" onclick="">
                <?php echo get_phrase('Add New');?>
            </button>
            <button id="btnupdate_commune" class="btn btn-info" onclick="">
                <?php echo get_phrase('Update');?>
            </button>
            <label class="warning" id='commune_warning'></label>
        </div>
    </div>
    <div class="block_location">                        <!-- Village -->
        <div class="form-group">
            <label for="Village" class="col-sm-3 control-label"><?php echo get_phrase('Village');?></label>
            <br/><br/>
            <select id="svillage" name="svillage" size="10" class="col-sm-3 form-control" style="width: 180px;height: 197px;margin-bottom: 20px">
                <?php

                ?>
            </select>
            <input type="text" class="form-control" style="width: 180px" id="Village" name="Village" />
             <br/>
            <button id="btnadd_village" class="btn btn-info" onclick="">
                <?php echo get_phrase('Add New');?>
            </button>
            <button id="btnupdate_village" class="btn btn-info" onclick="">
                <?php echo get_phrase('Update');?>
            </button>
            <label class="warning" id='village_warning'></label>
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
