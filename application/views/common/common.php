<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>School Info</a></li>
                        <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-truck m-r-xs"></i>Contact</a></li>
                    </ul>
                        <div class="tab-content">
                            <div class="tab-pane active fade in" id="tab1">
                                <div class="row m-b-lg">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputName">First Name</label>
                                                <input type="text" class="form-control" name="exampleInputName" id="exampleInputName" placeholder="First Name">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="exampleInputName2">Last Name</label>
                                                <input type="text" class="form-control col-md-6" name="exampleInputName2" id="exampleInputName2" placeholder="Last Name" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputEmail">Email address</label>
                                                <input type="email" class="form-control" name="exampleInputEmail" id="exampleInputEmail" placeholder="Enter email" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1" placeholder="Password" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword2">Confirm Password</label>
                                                <input type="password" class="form-control" name="exampleInputPassword2" id="exampleInputPassword2" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Personal Info</h3>
                                        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
                                        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="assets/images/envato-logo.png" width="250" alt="">
                                        <div class="m-t-md">
                                            <address>
                                                <strong>Twitter, Inc.</strong><br>
                                                795 Folsom Ave, Suite 600<br>
                                                San Francisco, CA 94107<br>
                                                <abbr title="Phone">P:</abbr> (123) 456-7890
                                            </address>
                                            <address>
                                                <strong>Full Name</strong><br>
                                                <a href="mailto:#">first.last@example.com</a>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputProductName">Product Name</label>
                                            <input type="text" class="form-control" name="exampleInputProductName" id="exampleInputProductName" placeholder="Product Name" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputProductId">Product ID</label>
                                            <input type="text" class="form-control" name="exampleInputProductId" id="exampleInputProductId" placeholder="Product ID">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputQuantity">Quantity</label>
                                            <input type="number" min="1" max="5" class="form-control" name="exampleInputQuantity" id="exampleInputQuantity" placeholder="Quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr style="margin-top: 10px;"/>
                        <div class="form-actions pull-right" style="margin-right:20px;">
                            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
                            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>

                        </div>

            </div>
        </div>
    </div>

</div>