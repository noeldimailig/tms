<?php
    defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

    // Account Functions
    if ( ! function_exists('is_logged_in'))
    {
        function is_logged_in() {
            $LAVA =& lava_instance();
            if($LAVA->session->userdata('logged_in') == 1)
                return true;
        }
    }

    if ( ! function_exists('set_logged_in'))
    {
        function set_logged_in($username) {
            $LAVA =& lava_instance();
            return $LAVA->session->set_userdata(array('username' => $username, 'logged_in' => 1));
        }
    }

    if ( ! function_exists('set_logged_out'))
    { 
        function set_logged_out() {
            $LAVA =& lava_instance();
            $LAVA->session->unset_userdata(array('loggedin', 'username'));
            $LAVA->session->sess_destroy();
        }
	}

    if ( ! function_exists('check_login_user'))
    {
        function check_login_user()
        {
            $LAVA =& lava_instance();
            if($_SESSION['user_type'] == "Faculty")
                redirect('Faculty');
            elseif($LAVA->session->userdata('user_type') == "Student")
                redirect('Student');
            elseif($LAVA->session->userdata('user_type') == "Staff")
                redirect('Staff');
        }
    }

    if ( ! function_exists('passwordhash'))
    { 
        function passwordhash($password)
        {
            $options = array(
            'cost' => 4,
            );
            return password_hash($password, PASSWORD_BCRYPT, $options);
        }
    }

    if ( ! function_exists('check_dp'))
    {
        function check_dp($dp) {
            $path = BASE_URL . 'profile/' . $dp;
            if(strlen($dp) < 50)
                return $path;
            else
                return $dp;
        }
    }

    if ( ! function_exists('get_username'))
    { 
        function get_username()
        {
            $LAVA =& lava_instance();
            $username = $LAVA->session->userdata('username');
            return !empty($username) ? $username : false;
        }
    }

	if ( ! function_exists('set_logged_out'))
    { 
        function set_logged_out() {
            $LAVA =& lava_instance();
            $LAVA->session->unset_userdata(array('logged_in', 'username'));
            $LAVA->session->sess_destroy();
        }
	}

    // Encrypt and Decrypt ID

    if ( ! function_exists('encrypt_id'))
    {
        function encrypt_id($id) {
            $formula = (double)$id*71316.09;

            return rtrim(strtr(base64_encode($formula), '+/', '-_'), '=');
        }
    }

    if ( ! function_exists('decrypt_id'))
    {
        function decrypt_id($encrypt) {
            $decrypt = base64_decode(str_pad(strtr($encrypt, '-_', '+/'), strlen($encrypt) % 4, '=', STR_PAD_RIGHT));
            $id = (double)$decrypt/71316.09;

            return $id;
        }
    }

?>