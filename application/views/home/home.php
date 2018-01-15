<div class="row">
    <div class="col-md-12">
        <div class="panel info-box panel-white" style="min-height:550px">
            <center style="margin-bottom:50px;">
                <!-- main -->
                <div style="width:99%; margin-bottom: 10px; margin-top:10px;">
                    <!-- student paid late -->
                    <div style="float:left;width:25%; color:#FB5656; text-align:left;">
                        <a href='<?php echo base_url();?>index.php?admin/student_late_paid' style="text-decoration: none">
                            <div class="col-lg-12 col-md-12">
                                <div class="panel info-box panel-white">
                                    <div class="panel-body">
                                        <div class="info-box-stats">
                                            <p class="counter">77</p>
                                            <span class="info-box-title">Monthly student payment late</span>
                                        </div>
                                        <div class="info-box-icon">
                                            <i class="icon-users"></i>
                                        </div>
                                        <div class="info-box-progress">
                                            <div class="progress progress-xs progress-squared bs-n">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div><!-- end paid -->

                    <!-- attendance -->
                    <div style="float:left; border-left:3px solid #EEE; width:25%; color:#FB5656; text-align:left;">
                        <a href='<?php echo base_url();?>index.php?attendance/student_absent_detail' style="text-decoration: none">
                            <div class="col-lg-12 col-md-12">
                                <div class="panel info-box panel-white">
                                    <div class="panel-body">
                                        <div class="info-box-stats">
                                            <p class="counter">5</p>
                                            <span class="info-box-title">Today attendance - Student</span>
                                        </div>
                                        <div class="info-box-icon">
                                            <i class="icon-users"></i>
                                        </div>
                                        <div class="info-box-progress">
                                            <div class="progress progress-xs progress-squared bs-n">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div><!-- end attendance -->

                    <!-- attendance -->
                    <div style="float:left; border-left:3px solid #EEE; width:25%; color:#FB5656; text-align:left;">
                        <a href='<?php echo base_url();?>index.php?attendance/student_absent_detail' style="text-decoration: none">
                            <div class="col-lg-12 col-md-12">
                                <div class="panel info-box panel-white">
                                    <div class="panel-body">
                                        <div class="info-box-stats">
                                            <p class="counter">5</p>
                                            <span class="info-box-title">Today attendance - Staff</span>
                                        </div>
                                        <div class="info-box-icon">
                                            <i class="icon-users"></i>
                                        </div>
                                        <div class="info-box-progress">
                                            <div class="progress progress-xs progress-squared bs-n">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div><!-- end attendance -->
                    <!-- attendance -->
                    <div style="float:left; border-left:3px solid #EEE; width:25%; color:#FB5656; text-align:left;">
                        <a href='<?php echo base_url();?>index.php?attendance/student_absent_detail' style="text-decoration: none">
                            <div class="col-lg-12 col-md-12">
                                <div class="panel info-box panel-white">
                                    <div class="panel-body">
                                        <div class="info-box-stats">
                                            <p class="counter">5</p>
                                            <span class="info-box-title">Dialy attendance</span>
                                        </div>
                                        <div class="info-box-icon">
                                            <i class="icon-users"></i>
                                        </div>
                                        <div class="info-box-progress">
                                            <div class="progress progress-xs progress-squared bs-n">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div><!-- end attendance -->

                </div><!-- end main -->


                <div style="clear:both"></div>

                <br />
                <input type="text" id="txtSearchAais" class="form-control"
                       style="width:50%; margin-bottom:10px;" placeholder="<?php echo $this->session->userdata('brand_name');?>  Searching..."/>


                <div style="width:50%; text-align:left;">
                    <h4>Result search (?) </h4>
                </div>

                <div id="div_AaisSearch" style="width:50%; text-align:left; "></div>

            </center>
        </div>
    </div>

</div>
<script>
    $('#txtSearchAais').focus();
    $('#txtSearchAais').on('keypress',function (evt) {
        if(evt.which == 13) {
            $.ajax({
                url: baseurl+'home/search',
                data: {},
                type: 'POST',
                dataType: 'json',
                success: function(result){
                    var data = '<div class="col-sm-12 result_search">'+
'                        <div class="col-sm-10">'+
'                            <h5>'+ '<a href=\''+baseurl+'/main/profile\' class="label label-info" title="Student Profiles"><i class="fa fa-user"></i></a>'+
'                            <a href="<?php echo base_url();?>main/profile">ហេង បញ្ញា heng panha - AAIS6-0005148</a>'+
'                            </h5>'+
'                            <b class="col-sm-4">Children</b>: Second child<br />'+
'                            <b class="col-sm-4">Running Session</b>: 2017-2018<br />'+
'                            <b class="col-sm-4">Grade</b>: Conversation 1<br />'+
'                            <b class="col-sm-4">Branch</b>: Apple American International Schoo 6'+
'                        </div>'+
'                        <div class="col-sm-2">'+
'                            <center>'+
'                                <img src="<?php echo $this->crud_model->get_image_url('student','1');?>" class="img"/><br /><br />'+
'                                b 2017-10-20<br />'+
'                                20ys'+
'                            </center>'+
'                        </div>'+
'                    </div>';


                    $("#div_AaisSearch").html(data);
                }
            });


        }
        
    });
</script>
