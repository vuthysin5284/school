<!-- Navbar -->
<div class="page-sidebar sidebar horizontal-bar">
    <div class="page-sidebar-inner">
        <ul class="menu accordion-menu">
            <li class="nav-heading"><span>Navigation</span></li>
            <li class="active"><a href="<?php echo base_url();?>main/dashboard">
            	<span class="menu-icon icon-speedometer"></span>
            	<p>Home</p></a></li> 
            <li class="droplink">
            <a href="#"><span class="menu-icon icon-user"></span><p>Students</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url();?>student/profile">Student Profile</a></li>  
                    <li><a href="<?php echo base_url();?>main/compose">Enrolment</a></li>
                    <li><a href="<?php echo base_url();?>main/compose">Study records</a></li> 
                    <li><a href="<?php echo base_url();?>main/compose">Fees Management</a></li> 
                    <li><a href="<?php echo base_url();?>main/compose">Assignments and tasks</a></li> 
                    <li class="droplink"><a href="#"><p>Reports</p><span class="arrow"></span></a>
                        <ul class="sub-menu"> 
                            <li><a href="shop.html">Student Reports</a></li> 
                            <li><a href="pricing-tables.html">Score Reports</a></li>
                            <li><a href="pricing-tables.html">Shiplin Reports</a></li>
                            <li><a href="pricing-tables.html">Score Reports</a></li>
                            <li><a href="pricing-tables.html">Score Reports</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-heading"><span>Features</span></li>
            <li class="droplink">
            	<a href="#">
                <span class="menu-icon icon-briefcase"></span><p>Teachers</p><span class="arrow"></span></a>
                 <ul class="sub-menu"> 
                    <li><a href="<?php echo base_url();?>main/profile">Teacher Profile</a></li> 
                    <li><a href="<?php echo base_url();?>main/compose">Create Teacher</a></li>
                    <li><a href="<?php echo base_url();?>main/compose">Create Lession Plan</a></li>
                    <li><a href="<?php echo base_url();?>main/compose">Student Score</a></li> 
                    <li class="droplink"><a href="#"><p>Reports</p><span class="arrow"></span></a>
                        <ul class="sub-menu"> 
                            <li><a href="shop.html">Teacher Reports</a></li> 
                            <li><a href="pricing-tables.html">Lession Plan Reports</a></li>
                            <li><a href="pricing-tables.html">Student Score Reports</a></li> 
                        </ul>
                    </li>
                </ul> 
            </li>   
            <li class="droplink">
            	<a href="#">
                <span class="menu-icon icon-briefcase"></span><p>Parents</p><span class="arrow"></span></a>
                 <ul class="sub-menu"> 
                    <li><a href="<?php echo base_url();?>main/pivot_table">Create Parent</a></li>
                    <li><a href="<?php echo base_url();?>main/compose"></span>Create Quest</a></li>
                    <li class="droplink"><a href="#"><p>Reports</p><span class="arrow"></span></a>
                        <ul class="sub-menu"> 
                            <li><a href="shop.html">Parent Reports</a></li> 
                            <li><a href="pricing-tables.html">Quest Reports</a></li> 
                        </ul>
                    </li>
                </ul> 
            </li> 
            <li class="droplink">
            	<a href="#">
                <span class="menu-icon icon-grid"></span><p>Attendance</p><span class="arrow"></span></a> 
                 <ul class="sub-menu"> 
                    <li><a href="gallery.html">Attendance</a></li>
                    <li><a href="gallery.html">Attendance Report</a></li>
                    <li><a href="<?php echo base_url();?>main/compose">Absences </a></li> 
                    <li class="droplink">
                    	<a href="#"><p>Schedule</p><span class="arrow"></span></a> 
                        <ul class="sub-menu">
                            <li><a href="<?php echo base_url();?>main/compose">Create Schedule</a></li> 
                            <li class="droplink"><a href="#"><p>Reports</p><span class="arrow"></span></a>
                                <ul class="sub-menu"> 
                                    <li><a href="shop.html">Schedule Reports</a></li>  
                                </ul>
                            </li>
                        </ul>
                	</li>  
                </ul>
            </li>
            
            <li class="droplink">
            	<a href="#"><span class="menu-icon icon-present"></span><p>Financial</p></a>
                <ul class="sub-menu">
                    <li><a href="pricing-tables.html">Cash Collection</a></li>
                    <li><a href="shop.html">Revenue</a></li>           
                    <li><a href="shop.html">Transaction</a></li>
                                      
                    <li class="droplink"><a href="#"><p>Financial Reports</p><span class="arrow"></span></a>
                    	<ul class="sub-menu"> 
                            <li><a href="<?php echo base_url();?>main/compose">Sale Reports</a></li>
                            <li><a href="<?php echo base_url();?>main/compose">Summary AR</a></li>
                    		<li><a href="shop.html">Other Report</a></li>    
                        </ul> 
                    </li>
                    
                    <li class="droplink"><a href="#"><p>Payrolls</p><span class="arrow"></span></a>
                        <ul class="sub-menu"> 
                            <li><a href="<?php echo base_url();?>main/compose">Create Payroll</a></li>
                            <li><a href="<?php echo base_url();?>main/compose">Process Payroll</a></li>
                            <li><a href="<?php echo base_url();?>main/compose">Bank Setup</a></li>
                            <li><a href="<?php echo base_url();?>main/compose">Payroll Reports</a></li> 
                            <li><a href="<?php echo base_url();?>main/compose">Pay Slip</a></li> 
                        </ul>
                    </li>
                    
                </ul>
            </li>  
            <li class="droplink">
            	<a href="#"><span class="menu-icon icon-present"></span><p>Inventory</p></a>
                <ul class="sub-menu">
                    <li><a href="pricing-tables.html">Cash Collection</a></li>
                    <li><a href="shop.html">Revenue</a></li>           
                    <li><a href="shop.html">Transaction</a></li>          
                    <li><a href="shop.html">Student Loans</a></li>
                                      
                    <li class="droplink"><a href="#"><p>Financial Reports</p><span class="arrow"></span></a>
                    	<ul class="sub-menu"> 
                            <li><a href="<?php echo base_url();?>main/compose">Sale Reports</a></li>
                            <li><a href="<?php echo base_url();?>main/compose">Summary AR</a></li>
                    		<li><a href="shop.html">Other Report</a></li>    
                        </ul> 
                    </li>
                    
                    <li class="droplink"><a href="#"><p>Payrolls</p><span class="arrow"></span></a>
                        <ul class="sub-menu"> 
                            <li><a href="<?php echo base_url();?>main/compose">Create Payroll</a></li>
                            <li><a href="<?php echo base_url();?>main/compose">Process Payroll</a></li>
                            <li><a href="<?php echo base_url();?>main/compose">Bank Setup</a></li>
                            <li><a href="<?php echo base_url();?>main/compose">Payroll Reports</a></li> 
                            <li><a href="<?php echo base_url();?>main/compose">Pay Slip</a></li> 
                        </ul>
                    </li>
                    
                </ul>
            </li>  
            <li class="droplink">
            	<a href="#"><span class="menu-icon icon-note"></span><p>EDS Reports</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="404.html">Student Report</a></li>
                    <li><a href="500.html">Teacher Report</a></li>
                    <li><a href="invoice.html">Parent Report</a></li>
                    <li><a href="calendar.html">Room Report</a></li>
                    <li><a href="todo.html">Classes Report</a></li>
                    <li><a href="faq.html">Branch Report</a></li>
                    <li><a href="gallery.html">Attendance Report</a></li> 
                </ul>
            </li> 
            <li class="droplink">
            	<a href="#"><span class="menu-icon icon-note"></span><p>Administration</p><span class="arrow"></span></a> 
                <ul class="sub-menu">
                    <!-- Master data -->
                    <li class="droplink"><a href="#"><p>Master Datas</p><span class="arrow"></span></a>
                        <ul class="sub-menu"> 
                            <li><a href="<?php echo base_url();?>main/compose">Data Rooms Master</a></li>
                            <li><a href="<?php echo base_url();?>main/compose">Data Subjects Master</a></li> 
                            <li><a href="<?php echo base_url();?>main/compose">Data Courses Master</a></li> 
                            <li><a href="<?php echo base_url();?>main/compose">Data Transportation Master</a></li> 
                            <li class="droplink">
                            	<a href="#">Data School Master<span class="arrow"></span></a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo base_url();?>main/compose">School profiles</a></li> 
                                </ul>
                            </li> 
                            <li><a href="<?php echo base_url();?>main/compose">Data locations Master</a></li> 
                        </ul>
                    </li>
                    <!-- Security -->
                     <li class="droplink"><a href="#"><p>Security</p><span class="arrow"></span></a>
                        <ul class="sub-menu"> 
                            <li><a href="shop.html">User management</a></li> 
                            <li><a href="pricing-tables.html">User Role</a></li>
                            <li><a href="pricing-tables.html">User Group</a></li>
                            <li><a href="shop.html">Branch Permission</a></li>
                            <li><a href="shop.html">Access Permission</a></li>
                        </ul>
                    </li>
                </ul>
            </li> 
            
            
        </ul>
    </div><!-- Page Sidebar Inner -->
</div>