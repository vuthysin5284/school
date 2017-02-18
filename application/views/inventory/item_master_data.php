 

<div class="normalheader transition animated fadeIn small-header">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-down"></i>
                </div>
            </a> 
            <div id="hbreadcrumb" class="pull-right">
                <ol class="hbreadcrumb breadcrumb">
                    <li><a href="index.html">Inventory</a></li>
                    <li class="active">
                        <span>Items master data</span>
                    </li> 
                </ol>
            </div>
            <h2 class="font-light m-b-xs">
                Items master data
            </h2>
            <small>Show user data in clear profile design</small>
            
        </div> 
    </div>
</div>

<div class="content animate-panel">


<div class="row"> 
    <div class="col-lg-8">
        <div class="hpanel">
            <div class="panel-body">
                <form method="get" class="form-horizontal">
                  
                    <div class="row form-group">
                        <label class="col-sm-2 control-label">Item No.</label>
                       <div class="col-sm-2"> <input type="text" class="form-control" /></div>
                            
                        <div class="col-sm-8"><input type="text" class="form-control" /></div>
                    </div>
                    
                     <div class="row form-group">
                        <label class="col-sm-2 control-label">Description</label> 
                        <div class="col-sm-10"><input type="text" class="form-control" /></div>
                    </div> 
                    
                    <div class="row form-group">
                        <label class="col-sm-2 control-label">Foriegn name</label> 
                        <div class="col-sm-10"><input type="text" class="form-control" /></div>
                    </div> 
                    
                    <div class="row form-group">
                        <label class="col-sm-2 control-label">Item type</label> 
                        <div class="col-sm-3"><select class="form-control" name="account">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                            </select></div>
                    </div>
                    
                    <div class="row form-group">
                        <label class="col-sm-2 control-label">Item group</label> 
                        <div class="col-sm-3"><select class="form-control" name="account">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                            </select></div>
                    </div> 
                    
                    <div class="row form-group">
                        <label class="col-sm-2 control-label">UoM Group</label> 
                        <div class="col-sm-3"><select class="form-control" name="account">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                            </select></div>
                        
                        <label class="col-sm-2 control-label">Bar code</label> 
                        <div class="col-sm-2">
                        	<input type="text" class="form-control" />
                        </div>
                        <div class="col-sm-2"> 
                            <button class="btn btn-info" type="button">...</button>
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <label class="col-sm-2 control-label">Price list</label> 
                        <div class="col-sm-3"><select class="form-control" name="account">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                            </select></div>
                        <label class="col-sm-2 control-label">Unit Price</label> 
                        <div class="col-sm-2">
                        	<select class="form-control" name="account">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                        	<input type="text" class="form-control" />
                        </div>
                        <div class="col-sm-1"> 
                            <button class="btn btn-info" type="button">...</button>
                        </div>
                    </div>
                    
                    
                </form>
                
            </div><!-- panel-body --> 
        </div>
    </div> 
    
    <div class="col-lg-4">
        <div class="hpanel">  
            <div class="panel-body">
                <form method="get" class="form-horizontal"> 
                        <div class="col-sm-10">
                            <div class="checkbox"><label> <input type="checkbox" class="i-checks" checked> Inventory Item </label></div>
                            <div class="checkbox"><label> <input type="checkbox" class="i-checks" checked> Sales Item </label></div> 
                            <div class="checkbox"><label> <input type="checkbox" class="i-checks" checked> Purchase Item </label></div> 
                        </div> 
                </form>
            </div>
        </div>
    </div>
</div>
 



<div class="row"> 
    
    
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="hpanel">
			<!-- tab header -->
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1">Generals</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2">Purchasing Data</a></li>
                <li class=""><a data-toggle="tab" href="#tab-3">Sales Data</a></li>
                <li class=""><a data-toggle="tab" href="#tab-4">Inventory Data</a></li>
                <li class=""><a data-toggle="tab" href="#tab-5">Planning Data</a></li>
                <li class=""><a data-toggle="tab" href="#tab-6">Production Data</a></li>
                <li class=""><a data-toggle="tab" href="#tab-7">Properties</a></li>
                <li class=""><a data-toggle="tab" href="#tab-8">Remarks</a></li>
                <li class=""><a data-toggle="tab" href="#tab-9">Attachments</a></li> 
            </ul>
            
            <div class="tab-content">
            	
                <!-- tab-1-->
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body"> 
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing</p>  
                        <?php include_once('general_master_data.php');?>
                    </div>
                </div><!-- tab-pane -->
                
                <!-- tab-2-->
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body"> 
						<p>Hello tab 2</p>
                        <?php include_once('purchasing_master_data.php');?>
                         
                    </div>
                </div>
                
                
                <!-- tab-3-->
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body"> 
						<p>Hello tab 3</p> 
                         
                    </div>
                </div>
                
                <!-- tab-4-->
                <div id="tab-4" class="tab-pane">
                    <div class="panel-body"> 
						<p>Hello tab 4</p> 
                         
                    </div>
                </div>
                <!-- tab-5-->
                <div id="tab-5" class="tab-pane">
                    <div class="panel-body"> 
						<p>Hello tab 5</p> 
                         
                    </div>
                </div>
                
                <!-- tab-6-->
                <div id="tab-6" class="tab-pane">
                    <div class="panel-body"> 
						<p>Hello tab 6</p> 
                         
                    </div>
                </div>
                <!-- tab-7-->
                <div id="tab-7" class="tab-pane">
                    <div class="panel-body"> 
						<p>Hello tab 7</p> 
                         
                    </div>
                </div>
                <!-- tab-8-->
                <div id="tab-8" class="tab-pane">
                    <div class="panel-body"> 
						<p>Hello tab 8</p> 
                         
                    </div>
                </div>
                <!-- tab-9-->
                <div id="tab-9" class="tab-pane">
                    <div class="panel-body"> 
						<p>Hello tab 9</p>  
                         
                    </div>
                </div>
                
            </div><!-- tab-content -->


            </div>
        </div>
    </div>
</div>
