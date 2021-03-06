<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
    .m-t-md {
        margin-top: -1px;
    }
    #upload_doc{
        display:none;
    }
    .mailbox-content{
        min-height:500px;
        padding: 0px;
        padding-top: 0px;
    }
</style>


<div class="row m-t-md">
    <div class="col-md-2" style="padding-right:0px; padding-left: 0px;">
        <ul class="nav mailbox-nav" id="document" role="tablist" >

            <li class="active default">
                <a href="<?php echo base_url();?>itemsetup/admin_item_fee"
                   data-url="<?php echo base_url();?>itemsetup/admin_item_fee">
                    <i class="fa fa-exclamation-circle"></i><?php echo get_phrase('admin_fee_item');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>school_item_fee/school_item_fee"
                   data-url="<?php echo base_url();?>school_item_fee/school_item_fee">
                    <i class="fa fa-exclamation-circle"></i><?php echo get_phrase('school_fee_item');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>transport_item_fee/transport_item_fee"
                   data-url="<?php echo base_url();?>transport_item_fee/transport_item_fee">
                    <i class="fa fa-exclamation-circle"></i><?php echo get_phrase('transport_fee_item');?></a></li>
            <li class="default">
                <a href="<?php echo base_url();?>lunch_item_fee/lunch_item_fee"
                   data-url="<?php echo base_url();?>lunch_item_fee/lunch_item_fee">
                    <i class="fa fa-exclamation-circle"></i><?php echo get_phrase('lunch_fee_item');?></a></li>
        </ul>
    </div>
    <div class="col-md-10" style="padding-right:0px; padding-left: 0px;">
        <div class="panel panel-white">
            <div class="panel-body mailbox-content">

                <div class="menu-overly-mask"></div>
                <!-- Mobile Filter bar End-->

                <div class="adds-wrapper">
                    <div class="tab-content">
                        <div class="tab-pane active" id="document_render">Loading...</div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="<?php echo base_url();?>assets/js/custom.js"></script>

    <script>
        // new upload change file
        function onNewUpload(id) {
            $("#new_file").val(id);
            $("#upload_doc").click();
        }

        $(".upload").click(function() {
            $("#new_file").val(0);
            $("#upload_doc").click();
        });

        $('#upload_doc').change(function(e) {
            if(confirm('Are you sure you want to upload file?')){
                $('#frmUploadDoc').submit();
            }
        });
    </script>

