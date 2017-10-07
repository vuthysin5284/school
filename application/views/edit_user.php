<?php  
	$sql = " select 
				* 
			from user u 
			where admin_id=?";
	$result = $this->db->query($sql,array($param2))->row();  
	
	if($param2!=''){ 
		$form = 'update';
	}
	  
?>
    
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($form.'_user');?></h4> 
</div>

<style>
	.red{
		color:red;
	}
</style>
 
<div class="panel-body">

    <?php echo form_open(base_url() . 'user/user_management/'.$form.'' , array('class' => 'form-horizontal form-groups-bordered validate ajax-submit','id'=>'frmUser', 'enctype' => 'multipart/form-data'));?>
     
     	<input type="hidden" name="user_id" value="<?php echo $result->admin_id;?>"/>
     
        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('full_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" name="full_name" placeholder="full name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" autofocus  value="<?php echo $result->name;?>"/>
            </div>
        </div>  
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('SAP_ID');?><span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" name="sap_id" value="<?php echo $result->SAP_ID;?>"/>
             </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" name="email" placeholder="email" value="<?php echo $result->email;?>"/>
             </div>
        </div>  
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" name="phone" placeholder="phone" value="<?php echo $result->phone;?>"/>
             </div>
        </div> 
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('role');?></label>
            <div class="col-sm-8">  
                <select id="role" name="role_id" class="form-control">
                	<option value="0"> ... select ... </option>
                    <?php $sql_pm = "select * from role where status = 1";
						$perm = $this->db->query($sql_pm)->result_array();
						foreach($perm as $pm){ 
							if($pm["role_id"] == $result->role_id){
								$select = " selected";
							}else{$select = "";}
					?> 
                		<option value="<?php echo $pm["role_id"]?>" <?php echo $select;?> ><?php echo $pm["name"]?></option>
                    <?php } ?>
                </select>
             </div>
        </div>  
        
        <hr style="margin-top: 10px;"/>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('username');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" name="username" placeholder="username" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"  value="<?php echo $result->username;?>"/>
             </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('password');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="password" class="form-control" name="password" placeholder="your password ..." />
            </div>
        </div>    
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="is_admin" id="is_admin" <?php echo $result->is_admin==1?'checked':''?>/>
            	<label for="is_admin"><?php echo get_phrase('is_admin');?></label>
            </div>
        </div>          
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status" <?php echo $result->status==1?'checked':''?>/>
            	<label for="status"><?php echo get_phrase('status');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-group"> 
                <button type="button" class="btn btn-info pull-right" style="margin-right:20px;" data-dismiss="modal">Close</button>  
                <button type="submit" class="btn btn-info pull-right" style="margin-right:5px;" id="submit-button"><?php echo get_phrase('create');?></button>  
             
        </div>
    <?php echo form_close();?>
</div> 

<script>

	$(function () { 
		/* look up data report_to 
		 * one character entry
		 */
		$("#report_to").autocomplete({
			minLength: 2, 
			source: function(request, response) {
                        $.ajax({
                            type	: "POST", 
                             url	: _base_url+'auto/user_lookup',
							 data	: { 
								forwhom_auto : $("#report_to").val() 
							},
                            dataType: "json",
                            success	: function (data) {
								 
                                if (data != null) {

                                    response(data);
                                }
                            },
                            error: function(result) {
                                alert("Error");
                            }
                        });
                    } 
		}).focus(function(){   
            $(this).autocomplete("search");
		}); 
	
	});
	 
	
</script>