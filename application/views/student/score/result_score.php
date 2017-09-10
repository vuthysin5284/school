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
            <option>Term 1</option>
            <option>Term 2</option>
            <option>Yearly</option>
        </select>

    </div>
</div>
<div style="clear:both"></div>
<br />

<table id="datable_result_score" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>No</th>
        <th><?php echo get_phrase('student_name')?></th>
        <th><?php echo get_phrase('gender')?></th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>​
        <th>10</th>​
        <th>11</th>​
        <th>12</th>​
        <th>13</th>​
        <th>14</th>
        <th>15</th>
        <th>16</th>
        <th>17</th>
        <th>18</th>
        <th>19</th>
        <th>20</th>
        <th>21</th>
        <th>22</th>
        <th>23</th>
        <th>24</th>
        <th>Total</th>
        <th>Average</th>
        <th>Range</th>
    </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/enrolment/result_score.js"></script>

<!--?php
    $this->load->view("student/enrolment/enrolment_detail");
?>


