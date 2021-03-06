
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Classes extends Controller {
	public function __construct()
	{
		parent::__construct();
  	}

	public function open($user_id, $class_code)
	{
		$this->call->model('Class_model');
		$this->call->model('User_model');

		$data['announcement'] = $this->Class_model->get_ann(decrypt_id($user_id), $class_code);
		$data['class'] = $this->Class_model->get_class($class_code, decrypt_id($user_id));
		$data['faculty'] = $this->User_model->get_user('Faculty', decrypt_id($user_id));
		$data['accepted'] = $this->Class_model->get_students($class_code, 1);
		$data['joining'] = $this->Class_model->get_students($class_code, 0);

		$this->call->view('faculty/classroom', $data);
	}

	public function students($user_id, $class_code)
	{
		$this->call->model('Class_model');

		$data['class'] = $this->Class_model->get_class($class_code, decrypt_id($user_id));
		$data['accepted'] = $this->Class_model->get_students($class_code, 1);

		$this->call->view('faculty/student_lists', $data);
	}

	public function accept_student() {
		$this->call->model('Class_model');

		$stud_id = decrypt_id($this->io->post('stud_id'));
		$course_id = decrypt_id($this->io->post('course_id'));

		$result = $this->Class_model->accept_student($stud_id, $course_id);
		if($result) {
            $msg['status'] = true;
			$msg['id'] = encrypt_id($result['student_id']);
			$msg['code'] = $result['class_code'];
            $msg['msg'] = "Accepting student successful";
            echo json_encode($msg);
            exit;
        } else{
            $msg['status'] = false;
            $msg['msg'] = "Accepting student failed. Please try again.";
            echo json_encode($msg);
            exit;
        }
	}

	public function count_students($class_code, $user_id)
	{
		$this->call->model('Class_model');
		return $this->Class_model->count_students($class_code, $user_id);
	}

    public function all_students()
	{
		$this->call->model('Student_model');
		$data['students'] = $this->Student_model->all_students();
		$this->call->view('faculty/all_students',$data);
	}
	
	public function create()
	{
		$this->call->model('Class_model');

		$faculty_id = decrypt_id($this->io->post('id'));
		$course_code = $this->io->post('code');
		$course_desc = $this->io->post('description');
		$units = $this->io->post('units');
		$room = $this->io->post('name');
		$section = $this->io->post('section');
		$day = $this->io->post('day');
		$start = $this->io->post('start');
		$end = $this->io->post('end');

		$schedule = $day . ', ' . date('h:i A', strtotime($start)) . ' - ' . date('h:i A', strtotime($end));
        $class_code = random_string(6);
        $payment_provider = $this->io->post('provider');
        $payment_acc = $this->io->post('account');

		$result = $this->Class_model->create($faculty_id, $course_code, $course_desc, $units, $room, $section, $schedule, $class_code, $payment_provider, $payment_acc);

		if($result) {
            $msg['status'] = true;
            $msg['msg'] = "Class creation successful";
            echo json_encode($msg);
            exit;
        } else{
            $msg['status'] = false;
            $msg['msg'] = "Class creation failed. Please try again.";
            echo json_encode($msg);
            exit;
        }
	}
	public function create_ann()
	{
		$this->call->model('Class_model');

		$cou_id = decrypt_id($this->io->post('c_course_id'));
		$user_id = decrypt_id($this->io->post('c_user_id'));
		$title = $this->io->post('c_title');
		$content = $this->io->post('c_content');
		$name = $this->io->post('c_user_name');
		$date_posted = date("Y-m-d h:i:s a");

		$result = $this->Class_model->create_ann($cou_id, $user_id, $title, $content, $date_posted);

		if($result) {
            $msg['ann_status'] = true;
            $msg['msg'] = "Announcement creation successful";
			$msg['title'] = $title;
			$msg['content'] = $content;
			$msg['date'] = $date_posted;
			$msg['name'] = $name;
            echo json_encode($msg);
            exit;
        } else{
            $msg['ann_status'] = false;
            $msg['msg'] = "Announcement creation failed. Please try again.";
            echo json_encode($msg);
            exit;
		}
	}

	public function create_act()
	{
		$this->call->model('Class_model');

		$cou_id = decrypt_id($this->io->post('course_id'));
		$user_id = decrypt_id($this->io->post('user_id'));
		$title = $this->io->post('title');
		$desc = $this->io->post('description');
		$check = $this->io->post('check');
		$date = $this->io->post('date');
		$time = $this->io->post('time');
		$attachment = $_FILES['attachment']['name'];
		date_default_timezone_set('Asia/Manila');
		$date_posted = date("Y-m-d h:i:s a");

		$due_date = $date . ' ' . $time;
		
		if ($attachment != '') {
			if (isset($_FILES['attachment'])) {
				$this->call->library('upload');
				$upload = new Upload($_FILES['attachment']);
				$upload->set_dir('Faculty/Course Materials/');
				
				if (! $upload->do_upload()) {
					$attachment = $upload->get_name();
					$result = $this->Class_model->create_act($cou_id, $user_id, $title, $desc, $check, $attachment, $date_posted, $due_date);
					if($result){
						$msg['error'] = false;
						$msg['msg'] = "Activity posted.";
						echo json_encode($msg);
						exit;
					}
				} 
			}
		}
		else {
			$msg['error'] = false;
            $msg['msg'] = "Activity creation failed. Please try again.";
            echo json_encode($msg);
            exit;
		}

	}
}
?>
