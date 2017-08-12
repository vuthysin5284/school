<style>
    .red{
        color:red;
    }
</style>

<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab2" role="tab" data-toggle="tab">General</a></li>
        <li role="presentation"><a href="#tab3" role="tab" data-toggle="tab">Information 1</a></li>
        <li role="presentation"><a href="#tab4" role="tab" data-toggle="tab">Information 2</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab2">

            <?php echo form_open(base_url(),array('class' => 'form-groups-bordered',
                                 'id'=>'frmEditEnrolment', 'enctype' => 'multipart/form-data'));?>

            <input type="hidden" name="pb_hidden_id" value="<?php echo $data->id; ?>"/>
            <input type="hidden" name="pb_crud_id" value="<?php echo 'edit'; ?>"/>

            <br/>
            <div class="form-group">  
                <label for="field-1" class="control-label"><?php echo get_phrase('enrolment_name');?> <span class="red">*</span>
                <input type="text" id="name" name="name" class="form-control" placeholder="enrolment name" style="width: 200px"
                value="<?php echo $data->name; ?>" />
            </div>

            <div class="form-group">
                <label for="field-1" class="control-label"><?php echo get_phrase('enrolment_email');?> <span class="red">*</span>
                <input type="text" id="email" name="email" class="form-control" placeholder="enrolment gender" style="width: 200px" value="<?php echo $data->email; ?>" />
            </div>

            <div class="form-group">
                <label for="field-1" class="control-label"><?php echo get_phrase('enrolment_address');?> <span class="red">*</span>    
                <input type="text" id="address" name="address" class="form-control" placeholder="enrolment email" style="width: 200px" value="<?php echo $data->address; ?>" />
                
            </div>
            

            <div class="form-group">               
                <input type="checkbox" name="status" id="status"
                 <?php echo $data->status==0?'':'checked';?> />
                <label for="status"><?php echo get_phrase('is active');?></label>
            </div>

            <hr style="margin-top: 10px;"/>
            <div class="form-actions" style="margin-right:20px;">
                <button type="button" id="btnEdit" class="btn btn-info">
                    <?php echo get_phrase('edit'); ?>
                </button>
            </div>

            <?php echo form_close();?>
        </div>

        <div role="tabpanel" class="tab-pane" id="tab3">
            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab4">
            <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment_edit.js"></script>