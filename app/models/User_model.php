
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
	public function __construct() {
        parent::__construct();
        $this->call->database();
    }

    public function get_last_id() {
        return $this->db->last_id();
    }

	public function check_email($email) {
        $result = $this->db->table('users')->select('email, password')->where('email', $email)->get();
        if($result) return $result;
        else return false;
    }

    public function verify($email, $token) {
        $condition = [
            'u.email' => $email,
            'u.token' => $token
        ];

        $result = $this->db->table('users as u')
                 ->select('u.user_id, u.username, u.fname, u.lname, u.profile, u.email, u.user_type')
                 ->where($condition)
                 ->get();

        $status = ['status' => 1];
        if($result){
            $verify = $this->db->table('users as u')->where($condition)->update($status);
            if($verify)
                return true;
            else
                return false;    
        }
    }

    public function forgot($email, $newpass, $code) {
        $result = $this->db->table('users as u')
            ->select('u.user_id, u.username, u.fname, u.lname, u.profile, u.email, u.user_type')
            ->where('u.email', $email)
            ->get();
        
        $data = [
            'token' => $code,
            'status' => 0,
            'password' => $newpass
        ];
        if($result){
            $verify = $this->db->table('users as u')->where('u.email', $email)->update($data);
            if($verify)
                return true;
            else
                return false;    
        }
    }

    public function google_signup($google_id, $type, $profile, $lname, $fname, $email, $token, $status) {
        $data = [
            'google_id' => $google_id,
            'user_type' => $type,
            'profile' => $profile,
            'lname' => $lname,
            'fname' => $fname,
            'email' => $email,
            'token' => $token,
            'status' => $status
        ];

        $result = $this->db->table('users')->insert($data);

        if($result)
            return true;
        else
            return false;    
    }

    public function register($type, $fname, $mname = "", $lname, $nameex = "", $uname, $email, $address, $contact, $gender, $bdate, $designation, $position, $password, $token)
	{
		$bind = array(
			'user_type' => $type,
			'fname' => $fname,
			'mname' => $mname,
			'lname' => $lname,
			'name_ex' => $nameex,
			'username' => $uname,
			'email' => $email,
			'address' => $address,
			'contact' => $contact,
			'gender' => $gender,
			'bdate' => $bdate,
			'designation' => $designation,
			'position' => $position,
			'email' => $email,
			'password' => passwordhash($password),
			'token' => $token
			);
		return $this->db->table('users')->insert($bind);
	}

    public function signin($email, $password)
	{
    	$condition = [
			'email' => $email,
			'status' => 1
		];
    	$row = $this->db->table('users')
						->select('user_id, profile, fname, lname, username, user_type, email, password')					
    					->where($condition)
    					->get();
		if($row)
		{
			if(password_verify($password, $row['password']))
			{
				return $row;
			} else {
				return false;
			}
		}
	}

    public function google_signin($google_id, $email, $status) {
        $condition = [
            'google_id' => $google_id,
            'email' => $email,
            'status' => $status
        ];

        $result = $this->db->table('users')
                 ->select('user_id, username, fname, lname, profile, email, user_type')
                 ->where($condition)
                 ->get();

        if($result)
            return $result;
        else
            return false;
    }

    public function get_user($type, $user_id) {
        return $this->db->table('users')
                        ->select('*')
                        ->where('user_type = ? and user_id = ?', [$type, $user_id])
                        ->get();
    }

    public function update_personal_details($profile, $email, $fname, $mname, $lname, $nameex, $address, $contact, $gender, $bdate) {
        $data = [
            'profile' => $profile,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'name_ex' => $nameex,
            'address' => $address,
            'contact' => $contact,
            'gender' => $gender,
            'bdate' => $bdate
        ];

        $result = $this->db->table('users')->where('email', $email)->update($data);

        if($result)
            return true;
        else
            return false;    
    }

    public function update_account_details($email, $password, $username, $salutation, $position) {
        $data = [
            'username' => $username,
            'password' => $password,
            'designation' => $salutation,
            'position' => $position
        ];

        $result = $this->db->table('users')->where('email' , $email)->update($data);

        if($result)
            return true;
        else
            return false;    
    }
}
?>
