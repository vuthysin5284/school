<center>
    <?php echo form_open(base_url() . 'assignitemclass/assign_item_class/filter' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
	<div class="panel-body" style="border:0px solid #EEE; width:500px; padding:5px; min-height:500px;">
     
           <div class="pull-left" style="text-align:left; padding-top:10px; width:50px;">Classes:</div>
           <div class="pull-left" style="margin-left:10px;"> 
                <select id="class_id" name="class_id" class="form-control">
                	<option value="0"> ... select ... </option>
                    <?php
						foreach($class_list as $pm){
							if($pm["id"] == (empty($class_id)?0:$class_id)){
								$select = " selected";
							}else{$select = "";}
					?> 
                		<option value="<?php echo $pm["id"]?>" <?php echo $select;?> ><?php echo $pm["classes_name"]?></option>
                    <?php } ?>
                </select>
           </div>
            <div class="pull-left" style="margin-left:10px;">
                <button type="submit" name="btnSubmit" class="btn btn-info"><?php echo get_phrase('filter');?></button>
           </div>
            <br />
            <br />
    		<br />
        <span class="pull-left">Items fee</span><br />
        
        <div style="border:1px solid #EEE; text-align:left; padding:5px; min-height:500px;"> 
					<ul style="list-style-type: none;">
                    <?php

							foreach($item_list as $row){
								$checked="";
								if(!empty($row["item_id"]))
									$checked="checked";

                                echo '<li> 
                                        <input type="checkbox"  class="col-md-1" name="chk" id="chk'.$row["id"].'" '.$checked.' 
                                            onClick="onChange('.$row["id"].');"/> 
                                        <lable class="col-md-11" >'.$row["item_name_kh"].'</lable> 
                                   </li>';
							
						}
					?> 
               </ul>
               
        </div>
    			<!--br />
    			<br />
    			<br />
                <input type="button" value="Save" style="width:80px" onclick="onSave()" class="button" />&nbsp;
                <input type="button" value="Check All" style="width:80px" onclick="checkall()" class="button" />&nbsp;
                <input type="button" value="Uncheck All" class="button" style="width:80px" onclick="uncheckall()" /-->
       
    </div> </form>
</center>

 


<script>
	// on checking check box
	function onChange(item_id){
        var assign_item_class='';
		//
		if($('#chk'+item_id).is(':checked')==true){
			assign_item_class = 'assign_item_class';
		}else{
			assign_item_class = 'remove_item_class';
		}
		
		$.ajax({ 
		  		url		: "<?php echo base_url();?>assignitemclass/assign_item_class/"+assign_item_class,
                data	: {
                    	'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
                        class_id: '<?php echo $class_id;?>',
						item_id: item_id
						
                },
                dataType: "json",
                type	: "POST",
                success: function(data){  }
		});
		 
	}
 
	function checkall()
	{
		for(i=0; i<document.frmGroupmenu.elements.length; i++)
		{
			if(document.frmGroupmenu.elements[i].type=="checkbox")
			{
				document.frmGroupmenu.elements[i].checked=true;
			}
		}
	}
	
	function uncheckall()
	{
		for(i=0; i<document.frmGroupmenu.elements.length; i++)
		{
			if(document.frmGroupmenu.elements[i].type=="checkbox")
			{
				document.frmGroupmenu.elements[i].checked=false;
			}
		}
	}

</script>