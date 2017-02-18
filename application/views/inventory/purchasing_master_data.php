
<table id="example2" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th width="15%">Age</th>
        <th width="15%">Start date</th>
        <th width="15%">Salary</th>
    </tr>
    </thead>
</table>
  
<script>
	 
	$(document).ready(function() {
    $('#example2').DataTable( {  
			"filter"		: true,
			"info"			: true,
			"paging"		: true,
			"ordering"		: true,  
			"processing"	: true,
			"serverSide"	: true ,  
			 
			"ajax"       : {
				"url"    : baseurl+'dashboard/data',
				"type"   : 'POST', 
				"destroy" : true 
			}, 
			dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ],
			language: {
				 processing: "<img src='<?php echo base_url();?>assets/images/ProgressIcon.gif'>",
				 loadingRecords: "<img src='<?php echo base_url();?>assets/images/ProgressIcon.gif'>",
				 "url": "<?php echo base_url();?>assets/lang/kh.json"
			  },
			"columns"    : [ 
				{ "data" : "id" },
				{ "data" : "deal_name" },
				{ "data" : "contact" }, 
				{ "data" : "tags" },
				{ "data" : "created_date" },
				{ "data" : "value" }
			],
			"order": [[0, 'asc']]  
		});
	} );

</script>
 