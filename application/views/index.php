<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>EDS</title>
    
    
	<?php include 'includes_top.php';?> 
	
</head>
<body class="compact-menu page-horizontal-bar page-header-fixed page-sidebar-fixed">
<div class="overlay"></div>

 
     <form class="search-form" action="#" method="GET">
        <div class="input-group">
            <input type="text" name="search" style="text-align: center"  class="form-control search-input" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
            </span>
        </div><!-- Input Group -->
    </form><!-- Search Form -->
    <main class="page-content content-wrap">
    

	<?php include 'header.php';?>
    <?php include 'navigation.php';?>	
    
        <!-- Page Sidebar -->
        <div class="page-inner">  
			<div class="page-breadcrumb">
                <ol class="breadcrumb container">
                    <!--button class="btn btn-info pull-right" id="btnGSearch">search</button>
                    <input type="text" id="fuzzysearch" class="pull-right form-control" style="width: 25%; margin-right: 5px; height: 32px;" placeholder="searching your favorite" /-->
                    <li><a href="<?php echo base_url()?>home">Home</a></li>
                    <li><?php echo $page_main;?></li>
                    <li><?php echo $page_title;?></li>
                </ol>
            </div>
            
        	<div id="main-wrapper" class="container">
			<?php include $page_name.'.php';?>  
            </div>
             
         </div><!-- Page Inner -->
        <?php include 'footer.php';?>
    </main>
    <?php include 'chat.php';?>
    <?php include 'modal.php';?>
    <?php include 'includes_bottom.php';?>
    
    
 
</body>
</html>

<script>
    $(document).ready(function () {
        $('#fuzzysearch').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: baseurl+"search/search",
                    data: 'query=' + query,
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        result($.map(data, function (item) {
                            return item;
                        }));
                    }
                });
            }
        });

        // on search
        $("#btnGSearch").on('click',function(e){
            e.preventDefault();

            $.ajax({
                url: baseurl+"search/search_result",
                data: 'query=' + $("#fuzzysearch").val(),
                dataType: "json",
                type: "POST",
                success: function (data) {
                    $('#main-wrapper').html(JSON.stringify(data));
                }
            });
        });
    });
</script>

 