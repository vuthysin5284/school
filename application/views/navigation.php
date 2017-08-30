<?php  
	
	$sql = "   
			SELECT 
				* 
			FROM menu 
			WHERE MENU_ID IN(
				select 
					DISTINCT m.MAIN_MENU_ID 
				from menu m 
				inner join menu_role mr on mr.MENU_ID = m.MENU_ID
				inner join role r on r.role_id = mr.ROLE_ID
				inner join user u on u.role_id = r.role_id  
				where sap_id =  '".$this->session->userdata('sap_id')."' 
			)
			
			AND is_leaf =  ?
			and LOAD_TYPE = 1
			and status_id = 1
			and MAIN_MENU_ID = 0 
			
			union all 
			
			SELECT 
					m.*
			from menu m 
			inner join menu_role mr on mr.MENU_ID = m.MENU_ID
			inner join role r on r.role_id = mr.ROLE_ID
			inner join user u on u.role_id = r.role_id  
			where sap_id = '".$this->session->userdata('sap_id')."'
			AND MAIN_MENU_ID = ? 
			and LOAD_TYPE = 1
			and status_id = 1
				
		ORDER BY order_by ASC
	";
	$result = $this->db->query($sql,array(1,0))->result_array(); 
	 
?>

 
<div class="page-sidebar sidebar horizontal-bar">
    <div class="page-sidebar-inner">
        <ul class="menu accordion-menu">
            <li class="nav-heading"><span>Navigation</span></li> 
            <?php   
					$data_obj=$this->db->get_where('menu' , array('check' => $page_name))->row();
					if($data_obj!=NULL || $data_obj!=''){
						$data["description"] = $data_obj->MAIN_MENU_ID;
						$this->db->where('type','menu_id');
						$this->db->update('settings',$data);
					}
					//
					$select_menu_id = $this->db->get_where('settings' , array('type' => 'menu_id'))->row()->description;
				 
					foreach($result as $row){  
						// checking if menu have child 
						if($select_menu_id == $row["MENU_ID"]){
							$open = ' active open';
						}else{
							$open=' ';
						} 
						//
						if($row["IS_LEAF"]==1){// level one
							echo '<li class="droplink '.$open.'">
									<a href="#">
										<span class="menu-icon '.$row["icon"].'"></span>
										<p>'.$row["MENU_NAME"].'</p><span class="arrow"></span>
									</a>
								<ul  class="sub-menu">'; 
								  
								$result1 = $this->db->query($sql,array(0,$row["MENU_ID"]))->result_array();
								 
								// checking is have sub menu?
								foreach($result1 as $sub){   
									if($sub["IS_LEAF"]==1){ // level two
										echo '<li class="droplink">
													<a href="#">
														<span class="menu-icon '.$sub["icon"].'"></span>
														<p>'.$sub["MENU_NAME"].'</p><span class="arrow"></span>
													</a>
												<ul  class="sub-menu">';  
										$result2 = $this->db->query($sql,array(0,$sub["MENU_ID"]))->result_array();
										foreach($result2 as $sub2){ 
											//
											echo '<li class="'.(($page_name == $sub2["check"])?"active" :" ").'">
													<a href="'.base_url().$sub2["LINK"].'" onClick="onClick();">
														<span class="menu-icon '.$sub2["icon"].'"></span>
														<p>'.$sub2["MENU_NAME"].'</p>
													</a>
												</li>';  
										} 
										echo '</ul></li>';
									}else{
										
										//
										echo '<li class="'.(($page_name == $sub["check"])?"active" :" ").'">
												<a href="'.base_url().$sub["LINK"].'" onClick="onClick();">
													<span class="menu-icon '.$sub["icon"].'"></span>
													<p>'.$sub["MENU_NAME"].'</p>
												</a>
											</li>'; 
									}
								}
							// for main menu 
							echo '</ul></li>';
						}else{
							 echo '<li class="'.(($page_name == $row["check"])?"active" :" ").'">
									<a href="'.base_url().$row["LINK"].'" onClick="onClick();">
										<span class="menu-icon '.$row["icon"].'"></span>
										<p>'.$row["MENU_NAME"].'</p>
									</a>
								</li>';
						}
					}
			 
			 
             ?>
                 
        </ul>
    </div><!-- Page Sidebar Inner-->
</div> 

