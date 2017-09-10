<?php
/**
 * Created by PhpStorm.
 * User: Sin Vuthy
 * Date: 9/7/2017
 * Time: 9:19 PM
 */

?>

<div class="row">
    <div class="col-md-12">
        Student classification score. the user can filter by monthly or by term
    </div>

    <div class="col-md-12">
        <select class="form-control" style="width: 250px;text-align: center">
            <option>Jan</option>
            <option>Feb</option>
        </select>

    </div>
</div>
<div style="clear:both"></div>
<br />

<table id="datable_score_student" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>No</th>
        <th><?php echo get_phrase('student_name')?></th>
        <th><?php echo get_phrase('gender')?></th>
        <th>Khmer</th>
        <th>Math</th>
        <th>Phisic</th>
        <th>Chimistry</th>
        <th>Biology</th>
        <th>Earth</th>
        <th>History</th>
        <th>Morality</th>
        <th>Language</th>​
        <th>Business</th>​
        <th>Homes</th>​
        <!--th>ICT</th-->​
        <th>Sport</th>​
        <th>Total</th>​
        <th>Average</th>
        <th>Range</th>
    </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/enrolment/score_student.js"></script>

<!--?php
    $this->load->view("student/enrolment/enrolment_detail");
?>


