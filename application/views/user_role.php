

<?php  
	$role_id = (empty($role_id)?0:$role_id); 
	$sql = "
			select 
			m.*,
			mu.MENU_ID as user_id
			from menu m 
			left join menu_role mu on mu.MENU_ID = m.MENU_ID and mu.ROLE_ID = ".$role_id." 
			where MAIN_MENU_ID = ?
			order by order_by asc
		";
	$result = $this->sys->query($sql,array(0))->result_array();
	
?>
<center>  
    <?php echo form_open(base_url() . 'user/user_role/filter' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>  
	<div class="panel-body" style="border:0px solid #EEE; width:500px; padding:5px; min-height:500px;">
     
           <div class="pull-left" style="text-align:left; padding-top:10px; width:50px;">Role:</div> 
           <div class="pull-left" style="margin-left:10px;"> 
                <select id="role" name="role" class="form-control">
                	<option value="0"> ... select ... </option>
                    <?php $sql_pm = "select * from role where status = 1";
						$perm = $this->sys->query($sql_pm)->result_array();
						foreach($perm as $pm){
							if($pm["role_id"] == $role_id){
								$select = " selected";
							}else{$select = "";}
					?> 
                		<option value="<?php echo $pm["role_id"]?>" <?php echo $select;?> ><?php echo $pm["name"]?></option>
                    <?php } ?>
                </select>
           </div>
            <div class="pull-left" style="margin-left:10px;"> 
                <button type="submit" name="btnSubmit" class="btn btn-info"><?php echo get_phrase('filter');?></button>
                <button type="button" class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/new_role/');" >
					<?php echo get_phrase('create_role');?></button>
           </div>
            <br />
            <br />
    		<br />
        <span class="pull-left">Menus</span><br />
        
        <div style="border:1px solid #EEE; text-align:left; padding:5px; min-height:500px;"> 
					<ul style="list-style-type: none;">
                    <?php  
							foreach($result as $row){ 
								$checked="";
								if(!empty($row["user_id"]))
									$checked="checked";		
						 
								if($row["IS_LEAF"]==1){
									echo '<li>
												<a href="#">
													<i class="'.$row["icon"].'"></i>
													<span>'.$row["MENU_NAME"].'</span>
												</a><ul style="list-style-type: none;">'; 
												
												$result1 = $this->sys->query($sql,array($row["MENU_ID"]))->result_array();
												// checking is have sub menu?
												foreach($result1 as $sub){  
													$checked="";
													if(!empty($sub["user_id"]))
													$checked="checked";	
													
													
													
													if($sub["IS_LEAF"]==1){
														echo '<li>
																	<a href="#">
																		<i class="'.$sub["icon"].'"></i>
																		<span>'.$sub["MENU_NAME"].'</span>
																	</a><ul style="list-style-type: none;">'; 
													
														$result2 = $this->sys->query($sql,array($sub["MENU_ID"]))->result_array();
														// checking is have sub menu?
														foreach($result2 as $sub2){  
															$checked="";
															if(!empty($sub2["user_id"]))
																$checked="checked";	
															
																//
															echo '<li> 
																<input type="checkbox" class="col-md-1" name="chk" id="chk'.$sub2["MENU_ID"].'" '.$checked.'  onClick="onChange('.$sub2["MENU_ID"].');"/>
																<lable class="col-md-11">'.$sub2["MENU_NAME"].'</lable> 
														   </li>';
														}
														// for main menu 
														echo '</ul></li>';
													}else{ 
														//
														echo '<li> 
																<input type="checkbox" class="col-md-1"  name="chk" id="chk'.$sub["MENU_ID"].'" '.$checked.'  onClick="onChange('.$sub["MENU_ID"].');"/>
																<lable class="col-md-11" >'.$sub["MENU_NAME"].'</lable> 
														   </li>';
													}
												}
										// for main menu 
										echo '</ul></li>';
										 // end sub 
									 
							}else{  // main 
								echo '<li> 
											<input type="checkbox"  class="col-md-1" name="chk" id="chk'.$row["MENU_ID"].'" '.$checked.' onClick="onChange('.$row["MENU_ID"].');"/> 
											<lable class="col-md-11" >'.$row["MENU_NAME"].'</lable> 
									   </li>';
							}
							
						} // main list
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
	function onChange(menu_id){
		 
		//
		if($('#chk'+menu_id).is(':checked')==true){
			var add_menu_role = 'add_menu_role';
		}else{
			var add_menu_role = 'remove_menu_role';
		}
		
		$.ajax({ 
		  		url		: "<?php echo base_url();?>user/user_role/"+add_menu_role,
                data	: {
                    	'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>', 
                    	role_id: '<?php echo $role_id;?>',
						menu_id: menu_id
						
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