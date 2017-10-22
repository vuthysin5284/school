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
            <option>Term 1</option>
            <option>Term 2</option>
            <option>Yearly</option>
        </select>

    </div>
</div>
<div style="clear:both"></div>
<br />

<table id="datable_classify_score"  class="table table-striped table-bordered table-hover" width="100%">
    <thead>
    <tr>
        <th>លរ</th>
        <th><?php echo get_phrase('student_name')?></th>
        <th><?php echo get_phrase('gender')?></th>
        <th>Total</th>​
        <th>Average</th>
        <th>និទ្ទេស</th>​
        <th>ចំណាត់ថ្នាក់</th>
    </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/enrolment/classify_score.js"></script>

<!--?php
    $this->load->view("student/enrolment/enrolment_detail");
?>


