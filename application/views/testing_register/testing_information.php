<?php
/**
 * Created by PhpStorm.
 * User: Sin Vuthy
 * Date: 5/22/2017
 * Time: 7:46 PM
 */
 
?>


<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab2" role="tab" data-toggle="tab">Information</a></li>
        <li role="presentation"><a href="#tab3" role="tab" data-toggle="tab">Contra Voucher)</a></li>
        <li role="presentation"><a href="#tab4" role="tab" data-toggle="tab">Journal Voucher) </a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="tab2">
          <?php //var_dump($student_test); ?>
          <?php
		  		foreach($student_test as $test):
          ?>
          <input type="hidden" name="pb_hidden_id" value="<?php  echo $test->id; ?>"/>
          <div class="form-group">
            <div class="col-sm-4">
              <label >Student Name:</label>
              <input type="text" class="form-control" id="student_name" name="student_name" value="<?php  echo $test->student_name; ?>" />
            </div>
          </div>
          
         
          <div class="form-group">
            <div class="col-sm-4">
              <label >Middle Name:</label>
              <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php  echo $test->middle_name; ?>"/>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-4">
              <label >Gender:</label>
              <input type="text" class="form-control" id="gender" name="gender" value="<?php  echo $test->gender_id; ?>"/>
            </div>
           </div>
           
           <div class="form-group">
            <div class="col-sm-4">
              <label>Nationality</label>
              <input type="text" class="form-control" id="nationality" name="nationality" value="<?php  echo $test->nationality; ?>" />
            </div>
           </div>
           
            <div class="form-group">
            <div class="col-sm-4">
              <label >Date of Birth</label>
              <input type="date" class="form-control" id="dob" name="dob" value="<?php  echo $test->date_of_birth; ?>" />
            </div>
           </div>
          
           <div class="form-group">
            <div class="col-sm-4">
              <label >Address</label>
              <input type="text" class="form-control" id="address" name="adddress" value="<?php  echo $test->address; ?>" />
            </div>
           </div>
          <?php endforeach; ?>            
           
         
        </div>
        
        <div role="tabpanel" class="tab-pane" id="tab3">
            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab4">
            <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
        </div>
    </div>
</div>
