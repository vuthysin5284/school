<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
	/*auditrial*/
	function auditrial($obj){
		$sql["STUDENT_ID"] 	= 	$obj->STUDENT_ID;
		$sql["BRANCH_ID"] 	= 	$obj->BRANCH_ID;
		$sql["CONTEXT"] 	= 	$obj->CONTEXT;
		$sql["DESCRIPTION"] = 	$obj->DESCRIPTION;
		$sql["AUDIT_DATE"] 	=  	date('Y-m-d H:i:s');
		$sql["OPERATOR_ID"] =  	$this->session->userdata('user_id');
		$sql["IS_SUCCESS"] 	=  	1;
		$sql["GROUP_ID"] 	=  	1;
		$sql["HOSTNAME"] 	=  	$obj->HOSTNAME;
		$sql["IP_ADDRESS"] 	=  	$obj->IP_ADDRESS;		
		$this->db->insert('audit_trial',$sql);
	}
	
	function clear_cache()
	{
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}
	function get_type_name_by_id($type,$type_id='',$field='name')
	{
		return	$this->db->get_where($type,array($type.'_id'=>$type_id))->row()->$field;	
	}

	function get_floor_description_by_id($type,$type_id='',$field='name')
	{
		return	$this->db->get_where($type,array("id" =>$type_id))->row()->$field;	
	}
	
	////////STUDENT/////////////
	function get_students($class_id)
	{
		$query	=	$this->db->get_where('student' , array('class_id' => $class_id));
		return $query->result_array();
	}
	
	function get_student_info($student_id)
	{
		$query	=	$this->db->get_where('student' , array('student_id' => $student_id));
		return $query->result_array();
	}
	
	function get_student_by_register_id( $register_id )
	{
		$query	=	$this->db->get_where('student' , array('register_id' => $register_id));
		return $query->result_array();
	}

	////////REGISTER/////////////
	function get_register_info( $param1 = '' , $param2 = '' )
	{
		//// $param1 = condition
		//// $param2 = array of data
		switch ( $param1 ) {
			case 'all':
				return	$this->db->get('register');
				break;
			default:	//// where clause
				$query	=	$this->db->get_where('register' , $param2);
				return $query->result_array();
				break;
		}
	}
	
	/////////TEACHER/////////////
	function get_teachers()
	{
		$query	=	$this->db->get('teacher' );
		return $query->result_array();
	}
	function get_teacher_name($teacher_id)
	{
		$query	=	$this->db->get_where('teacher' , array('teacher_id' => $teacher_id));
		$res	=	$query->result_array();
		foreach($res as $row)
			return $row['name'];
	}
	function get_teacher_info($teacher_id)
	{
		$query	=	$this->db->get_where('teacher' , array('teacher_id' => $teacher_id));
		return $query->result_array();
	}
	/////////USER/////////////
	function get_users()
	{
		$query	=	$this->db->get('admin');
		return $query->result_array();
	}
	function get_user_name($admin_id)
	{
		$query	=	$this->db->get_where('teacher' , array('teacher_id' => $admin_id));
		$res	=	$query->result_array();
		foreach($res as $row)
			return $row['name'];
	}
	function get_user_info($admin_id)
	{
		$query	=	$this->db->get_where('admin' , array('admin_id' => $admin_id));
		return $query->result_array();
	}
	//////////SUBJECT/////////////
	function get_subjects()
	{
		$query	=	$this->db->get('subject' );
		return $query->result_array();
	}	
	function get_subject_info($subject_id)
	{
		$query	=	$this->db->get_where('subject' , array('subject_id' => $subject_id));
		return $query->result_array();
	}
	function get_subjects_by_class($class_id)
	{
		$query	=	$this->db->get_where('subject' , array('class_id' => $class_id));
		return $query->result_array();
	}
	function get_subject_name_by_id($subject_id)
	{
		$query	=	$this->db->get_where('subject' , array('subject_id' => $subject_id))->row();
		return $query->name;
	}
	////////////CLASS///////////
	function get_class_name($class_id)
	{
		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));
		$res	=	$query->result_array();
		foreach($res as $row)
			return $row['name'];
	}
	
	function get_class_name_numeric($class_id)
	{
		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));
		$res	=	$query->result_array();
		foreach($res as $row)
			return $row['name_numeric'];
	}
	
	function get_classes()
	{
		$query	=	$this->db->get('class' );
		return $query->result_array();
	}	
	function get_class_info($class_id)
	{
		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));
		return $query->result_array();
	}

	function get_class_data_by_class_id( $param1 = '' , $param2 = '', $param3 = '' )
	{
		//// $param1 = condition
		//// $param2 = id
		//// $param2 = column wanted
		switch ( $param1 ) {
			case 'all':
				return	$this->db->get('class');
				break;
			default:	//// where clause
				$query	=	$this->db->get_where('class' , array('class_id' => $param2) );
				$class	= 	$query->result_array();
				foreach($class as $row)
					return $row[$param3];
				break;
		}
	}
	
	//////////CYCLE/////////////
	function get_cycle()
	{
		return	$this->db->get('cycle');
	}

	function get_cycle_data_by_id( $param1 = '' , $param2 = '', $param3 = '' )
	{
		//// $param1 = condition
		//// $param2 = id
		//// $param2 = column wanted
		switch ( $param1 ) {
			case 'all':
				return	$this->db->get('cycle');
				break;
			default:	//// where clause
				$query	=	$this->db->get_where('cycle' , array('id' => $param2) );
				$cycle	= 	$query->result_array();
				foreach($cycle as $row)
					return $row[$param3];
				break;
		}
	}

	//////////INVOICE/////////////
	function get_invoice_id_by_regID( $conditions = '' ){
		//// $conditions is array of WHERE clause conditions
		$query	=	$this->db->get_where( 'invoice' , $conditions );		
		$result = $query->result_array();
		 
		foreach($result as $row)
			return $row['invoice_id'];
	}
	
	function get_invoice_detail_by_regID( $register_id = '' ){
		
		$invoice_id = $this->get_invoice_id_by_regID( array( 'student_id' => $register_id , 'invoice_type' => 1 ) ); //// invoice_type=1 is Study Bill
		$query	=	$this->db->get_where('invoice_detail' , array('invoice_id' => $invoice_id));
		return $query->result_array();
	}
	
	function get_total_price_of_current_credit_by_regID( $register_id = '' ){
		$invoice_id = $this->get_invoice_id_by_regID( array( 'student_id' => $register_id , 'invoice_type' => 1 ) );
		 
		$sql = "SELECT total FROM invoice_detail WHERE invoice_id = ? AND is_paid = 0 ORDER BY invoice_id LIMIT 1"; 
		$query	=	$this->db->query($sql,array($invoice_id));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			
			return $row->total;
		
		}
	}

	function invoice_process_payment( $register_id , $paid_amount , $number_of_credit_to_pay ){	// for school fee payment only
		// get invoice ID
		$invoice_id = $this->get_invoice_id_by_regID( array( 'student_id' => $register_id , 'invoice_type' => 1 ) ); //// invoice_type=1 is Study Bill
		
		// create payment record
		// payment_id of payment table is receipt number on receipt paper?
		$this->db->insert('payment', array( 'paid_amount' => $paid_amount , 'invoice_id' => $invoice_id , 'paid_date' => date("Y-m-d H:i:s") ) ); 
		$payment_id = $this->db->insert_id();
		
		// create invoice_payment record
		$this->db->insert('invoice_payment', array( 'payment_id' => $payment_id , 'invoice_id' => $invoice_id , 'paid_amount' => $paid_amount ) ); 
		$payment_id = $this->db->insert_id();

		// get paid_amount and unpaid_amount from invoice table and manipulate them with the new price
		$sql = "SELECT * FROM invoice WHERE invoice_id = ? AND invoice_type = 1";
		$query = $this->db->query($sql, array( $invoice_id ));
		if ($query->num_rows() > 0) {
			$row = $query->row();

			$invoice_paid_amount = $row->paid_amount + $paid_amount;
			$invoice_unpaid_amount = $row->unpaid_amount - $paid_amount;
		}

		// update data of invoice table
		$this->db->where('student_id', $register_id);
		$this->db->where('invoice_type', 1);
		$data_invoice = array(
							'paid_amount' => $invoice_paid_amount ,
							'unpaid_amount' => $invoice_unpaid_amount
						);
        $this->db->update('invoice', $data_invoice );

		// get data from invoice_detail table
        $sql = "SELECT * FROM invoice_detail WHERE invoice_id = ? AND is_paid = 0";
		$query = $this->db->query($sql, array( $invoice_id ));
		if ( $query->num_rows() > 0 ) {
			$i = 1;
			foreach ( $query->result_array() as $row ) {
				if ( $i <= $number_of_credit_to_pay ) {
					$this->db->where('id', $row['id'] );
					$this->db->update('invoice_detail', array( 'is_paid' => 1 ) );
					$i++;
				}else{break;}
			}
		}

		return $payment_id;
		////// Note
		// Please change paid_amount of payment table to float
		// update table invoice_payment with:  id -> auto_increament, default=null
		//////
	}

	//////////EXAMS/////////////
	function get_exams()
	{
		$query	=	$this->db->get('exam' );
		return $query->result_array();
	}	
	function get_exam_info($exam_id)
	{
		$query	=	$this->db->get_where('exam' , array('exam_id' => $exam_id));
		return $query->result_array();
	}	
	//////////GRADES/////////////
	function get_grades()
	{
		$query	=	$this->db->get('grade' );
		return $query->result_array();
	}	
	function get_grade_info($grade_id)
	{
		$query	=	$this->db->get_where('grade' , array('grade_id' => $grade_id));
		return $query->result_array();
	}	
	function get_grade($mark_obtained)
	{
		$query	=	$this->db->get('grade' );
		$grades	=	$query->result_array();
		foreach($grades as $row)
		{
			if($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
				return $row;
		}
	}

	function create_log($data)
	{
		$data['timestamp']	=	strtotime(date('Y-m-d').' '.date('H:i:s'));
		$data['ip']			=	$_SERVER["REMOTE_ADDR"];
		$location 			=	new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/'.$_SERVER["REMOTE_ADDR"]));
		$data['location']	=	$location->City.' , '.$location->CountryName;
		$this->db->insert('log' , $data);
	}
	function get_system_settings()
	{
		$query	=	$this->db->get('settings' );
		return $query->result_array();
	}	
	function get_setting_data( $param1 = '' , $param2 = '' )
	{
		//// $param1 = condition
		//// $param2 = settings_id
		switch ( $param1 ) {
			case 'all':
				return	$this->db->get('settings');
				break;
			default:	//// where clause
				$query	=	$this->db->get_where('settings' , array('settings_id' => $param2) );
				$settings	= 	$query->result_array();
				foreach($settings as $row)
					return $row["description"];
				break;
		}
	}
		
	
	////////BACKUP RESTORE/////////
	function create_backup($type)
	{
		$this->load->dbutil();
		
		
		$options = array(
                'format'      => 'txt',             // gzip, zip, txt
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
		
		 
		if($type == 'all')
		{
			$tables = array('');
			$file_name	=	'system_backup';
		}
		else 
		{
			$tables = array('tables'	=>	array($type));
			$file_name	=	'backup_'.$type;
		}

		$backup =& $this->dbutil->backup(array_merge($options , $tables)); 


		$this->load->helper('download');
		force_download($file_name.'.sql', $backup);
	}
	
	
	/////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
	function restore_backup()
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');
		$this->load->dbutil();
		
		
		$prefs = array(
            'filepath'						=> 'uploads/backup.sql',
			'delete_after_upload'			=> TRUE,
			'delimiter'						=> ';'
        );
		$restore =& $this->dbutil->restore($prefs); 
		unlink($prefs['filepath']);
	}
	
	/////////DELETE DATA FROM TABLES///////////////
	function truncate($type)
	{
		if($type == 'all')
		{
			$this->db->truncate('student');
			$this->db->truncate('mark');
			$this->db->truncate('teacher');
			$this->db->truncate('subject');
			$this->db->truncate('class');
			$this->db->truncate('exam');
			$this->db->truncate('grade');
		}
		else
		{	
			$this->db->truncate($type);
		}
	}
	
	
	////////IMAGE URL//////////
	function get_image_url($type = '' , $id = '')
	{
		if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))
			$image_url	=	base_url().'uploads/'.$type.'_image/'.$id.'.jpg';
		else
			$image_url	=	base_url().'uploads/user.jpg';
			
		return $image_url;
	}

	////////GENDER//////////
	function get_gender( $gender_id )
	{
		$query	=	$this->db->get_where('gender' , array('genderid' => $gender_id));
		$res	=	$query->result_array();
		foreach($res as $row)
			return $row['gender'];
	}
}

