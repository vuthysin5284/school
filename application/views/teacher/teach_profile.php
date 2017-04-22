<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Teacher Active </a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Teacher Inactive</a></li>  
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
<table id="example1" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
    <tr>
    	<th>ID</th>
        <th>Photo</th>
        <th>Branch</th>
        <th>Teache name</th>
        <th width="15%">Gender</th>
        <th width="15%">Date Birth</th>
        <th width="15%">Phone</th>
        <th>Email</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
                		
                	<?php $i=1; foreach($file_teacher_active as $result):?>
                	<tr>   
                    	<td><?php echo $i;?></td> 
                    	<td></td>
                        <td></td>           
                        <td><?php echo $result->name; ?></td>
                        <td><?php echo $result->sex;?></td>
                        <td><?php echo $result->birthday;?></td>
                        <td><?php echo $result->phone;?></td>
                        <td><?php echo $result->email;?></td>
                        <td><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-wrench" aria-hidden="true"></i> Edit</button>
                        	<button type="button" class="btn btn-primary btn-xs">Delete</button>
                        </td>
                    </tr>
                    <?php $i++; endforeach;?>
                </tbody> 
</table>
</div>
    <div role="tabpanel" class="tab-pane" id="profile">

<table id="example2" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
    <tr>
    	<th>ID</th>
        <th>Photo</th>
        <th>Branch</th>
        <th>Teache name</th>
        <th width="15%">Gender</th>
        <th width="15%">Date Birth</th>
        <th width="15%">Phone</th>
        <th>Email</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody>
                		
                	<?php $i=1; foreach($file_teacher_inactive as $result_inactive):?>
                	<tr>   
                    	<td><?php echo $i;?></td> 
                    	<td></td>
                        <td></td>           
                        <td><?php echo $result_inactive->name; ?></td>
                        <td><?php echo $result_inactive->sex;?></td>
                        <td><?php echo $result_inactive->birthday;?></td>
                        <td><?php echo $result_inactive->phone;?></td>
                        <td><?php echo $result_inactive->email;?></td>
                        <td><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-wrench" aria-hidden="true"></i> Edit</button>
                        	<button type="button" class="btn btn-primary btn-xs">Delete</button>
                        </td>
                    </tr>
                    <?php $i++; endforeach;?>
                </tbody> 
</table>
 
</div>
 
  </div>

</div>
<script>
	 
	$(document).ready(function() {
   		 $('#example1').DataTable();
		  $('#example2').DataTable();
	});
			
</script>
 
          
      
       
        	