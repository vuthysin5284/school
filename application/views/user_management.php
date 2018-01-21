<span id="display_action" style="display:none">   
    <a class="btn" onClick="onSubmit();"> 
        <i class="entypo-trash"></i>
    </a>  
</span> 
<div style="clear:both"></div>

<div class="row" style="margin-top:12px;min-height: 500px;">  
	<div class="col-md-12"> 
		<div class="panel panel-primary" style="padding:10px;">
        
				<?php 	
					$per_page = $this->session->userdata("per_page");
                    $counter = 1;
                    $page = $this->uri->segment(5)==""?1:$this->uri->segment(5);
					
					$p = $per_page*($page-1); 
					
                    $sql = " 
                             SELECT 
							 	u.*,
								r.name as role_name,
								b.branch_name,
								b.prefix 
								
							FROM user u
							inner join role r on r.role_id = u.role_id
							inner join branch b on b.id = u.branch_id
							where u.`status` in(1,0)
							group by u.admin_id
							LIMIT ".$p.", ".$per_page." 
                    	";
                    $result	=	$this->sys->query($sql)->result_array();
                    
                    
                    $sql1 = " select count(*) number from user where `status` in(1,0)";
                    $result_p	=	$this->sys->query($sql1)->row();
                    $num_P = ($result_p->number/$per_page)<'0.5'?1:round($result_p->number/$per_page); 
                     ?>
                      
             
            <div class="input-group pull-right" style="width:15%"> <span class="input-group-addon">Pages</span> 
                <select class="form-control" onChange="onFilterPage(this.value);">
                    <?php for($i=1; $i<= $num_P;$i++){
                            if($page==$i){
                                $selected = " selected";
                            }else{$selected = " ";}
                        echo "<option value='".$i."' ".$selected.">".$i."</option>";
                    }?>
                </select> 
            </div>
            <div class="input-group pull-left" style="width:40%; margin-bottom:3px; margin-right:10px;"> <span class="input-group-addon">Filter</span> 
                <input id="filter" type="text" class="form-control" placeholder="Type here..."> 
            </div> 
            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/add_user/');" class="btn btn-info">
                <i class="entypo-user"></i>
                <?php echo get_phrase('create_user');?>
            </a>  
            <form id="fruser" enctype="multipart/form-data">
            <!-- striped style -->
            <table class="table table-striped">
                 <thead style="background:#EEE">
                    <tr>
                        <th width="5px">#</th>
                        <th><div style="font-weight:bold"><?php echo get_phrase('user_name');?></div></th>
                        <th><div style="font-weight:bold"><?php echo get_phrase('SAP');?></div></th>
                        <th width="30%"><div style="font-weight:bold"><?php echo get_phrase('full_name');?></div></th>
                        <th><div style="font-weight:bold"><?php echo get_phrase('branch');?></div></th>
                        <th><div style="font-weight:bold"><?php echo get_phrase('phone');?></div></th>
                        <th><div style="font-weight:bold"><?php echo get_phrase('email');?></div></th>  
                        <th><div style="font-weight:bold"><?php echo get_phrase('role_name');?></div></th> 
                        <th><div style="font-weight:bold"><?php echo get_phrase('login');?></div></th> 
                        <th></th> 
                    </tr>
                </thead> 
                <tbody  class="searchable">
                    <?php foreach($result as $row): ?>
                    <tr>
                        <td><?php echo $row['admin_id'];?>.</td>
                        <td>
                        	<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/edit/-/edit_user/<?php echo $row['admin_id'] ?>');">
                            	<i class="entypo-user" style="margin-right:10px; color:green"></i><?php echo $row['username'];?></a> 
                        </td> 
                        <td><?php echo $row['SAP_ID'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo '[ '. $row['prefix'].' ] '.$row['branch_name'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['email']; ?></td>   
                        <td><?php echo $row['role_name']; ?></td>   
                        <td style="color:<?php echo $row['is_login']=='online'?'blue':'';?>"><?php echo $row['is_login'];?></td>  
                        <td style="color:<?php echo $row['status']=='1'?'blue':'';?>"><?php echo $row['status']=='1'?'Active':'Inactive';?></td>  
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table> 
            </form>
        </div>
    </div> 
</div> 



 
 <script>
 	$(document).ready(function () {

		(function ($) {
	
			$('#filter').keyup(function () {
	
				var rex = new RegExp($(this).val(), 'i');
				$('.searchable tr').hide();
				$('.searchable tr').filter(function () {
					return rex.test($(this).text());
				}).show();
	
			})
	
		}(jQuery));
	
	});
 
		//
		function onFilterPage(val){
			window.location = "<?php echo base_url();?>index.php?crm/deal/stage_view/incoming/"+val;
		}
	 
		
		$('#selectAllList').change(function() {
			var checkboxes = $(this).closest('table').find(':checkbox');
			if($(this).is(':checked')) {
				checkboxes.prop('checked', true);
			} else {
				checkboxes.prop('checked', false);
			}
			
			$("#selected_value").text($(".case:checked").length);
			$("#display_action").toggle(this.checked); 
		});
		
		$(".case").click(function(){ 
			if($(".case").length == $(".case:checked").length) {
				$("#selectAllList").prop('checked', true); 
				
			}else if($(".case:checked").length== '0'){
				$("#display_action").toggle(this.checked);  
			}else{
				$("#selectAllList").removeAttr("checked");  
				 $('#display_action').css('display', ''); 
			}
			
			$("#selected_value").text($(".case:checked").length);
		}); 
		
		
		function onSubmit(){
			if(!confirm('Are you sure you want to delete user?')){
				return false
			}
			
			var formData = $('#fruser').serialize();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>index.php?nvc/user_management/delete",
					data: formData,
					success: function(data) {
						 window.location.reload();
					}
				});
				 
			
		}
 </script>
            
           
        
        	