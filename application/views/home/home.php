<div class="row">
    <div class="col-md-12">
        <div class="panel info-box panel-white">
            <center style="margin-bottom:50px;">

                <div style="width:50%; margin-bottom: 10px; margin-top:10px;">
                    <!-- student paid late -->
                    <div style="float:left;width:50%; color:#FB5656; text-align:left;">
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
                    </div>
                    <!-- attendance -->
                    <div style="float:left; border-left:3px solid #EEE; width:50%; color:#FB5656; text-align:left;">
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
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                </div>
                <div style="clear:both"></div>

                <br />
                <input type="text" id="txtSearchAais" class="form-control"
                       style="width:50%; margin-bottom:10px;" placeholder="<?php echo $this->session->userdata('brand_name');?>  Searching..."/>


                <div style="width:50%; text-align:left;">
                    <h4>Result search (?) </h4>
                </div>

                <div id="div_AaisSearch" style="width:50%; text-align:left; ">
                    <div class="col-sm-12 result_search">
                        <div class="col-sm-10">
                            <h5>
                                <a href="#">ហេង បញ្ញា heng panha - AAIS6-0005148</a>
                            </h5>
                            <b class="col-sm-3">Children</b>: Second child<br />
                            <b class="col-sm-3">Acadenic Year</b>: 2017-2018<br />
                            <b class="col-sm-3">Grade</b>: Conversation 1<br />
                            <b class="col-sm-3">Branch</b>: Apple American International Schoo 6

                        </div>

                        <div class="col-sm-2">
                            <center>
                                <img src="<?php echo $this->crud_model->get_image_url('student','1');?>" class="img"/><br />
                            b 2017-10-20<br />
                            20ys
                            </center>
                        </div>
                    </div>
                    <div class="col-sm-12 result_search">
                        <div class="col-sm-10">
                            <h5>
                                <a href="#">ហេង បញ្ញា heng panha - AAIS6-0005148</a>
                            </h5>
                            <b class="col-sm-3">Children</b>: Second child<br />
                            <b class="col-sm-3">Acadenic Year</b>: 2017-2018<br />
                            <b class="col-sm-3">Grade</b>: Conversation 1<br />
                            <b class="col-sm-3">Branch</b>: Apple American International Schoo 6

                        </div>

                        <div class="col-sm-2">
                            <center>
                                <img src="<?php echo $this->crud_model->get_image_url('student','1');?>" class="img" /><br />
                                2017-10-20<br />
                                20ys
                            </center>
                        </div>
                    </div>
                    <div class="col-sm-12 result_search">
                        <div class="col-sm-10">
                            <h5>
                                <a href="#">ហេង បញ្ញា heng panha - AAIS6-0005148</a>
                            </h5>
                            <b class="col-sm-3">Children</b>: Second child<br />
                            <b class="col-sm-3">Acadenic Year</b>: 2017-2018<br />
                            <b class="col-sm-3">Grade</b>: Conversation 1<br />
                            <b class="col-sm-3">Branch</b>: Apple American International Schoo 6

                        </div>

                        <div class="col-sm-2">
                            <center>
                                <img src="<?php echo $this->crud_model->get_image_url('student','1');?>" class="img" /><br />
                                2017-10-20<br />
                                20ys
                            </center>
                        </div>
                    </div>

                </div>

            </center>
        </div>
    </div>

</div>
<script>
    $('#txtSearchAais').focus();
</script>
