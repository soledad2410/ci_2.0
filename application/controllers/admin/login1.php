<?php

/**
 * Login
 * 
 * @package CI
 * @author syhung_it
 * @copyright 2011
 * @version 1.0
 * @access public
 */
class Login extends MY_Controller
{

    function Login()
    {
        parent::__construct();
        $this->load->helpers('url');

        $this->load->model('admin_model');
    }

    /**
     * Login::index()
     * 
     * @return void
     */
    public function index()
    {
        if (isset($this->user))
        {
            redirect('admin/admin/index');
            //var_dump($this->user);
        }
        $data['title'] = 'Trang đăng nhập quản trị';

        $this->load->view('back_end/login/login', $data);

    }

    /**
     * Login::check_login()
     * 
     * @return void
     */
    public function check_login()
    {
        $name = $this->input->post('name', true);
        $password = $this->input->post('pwd', true);
        $query = $this->admin_model->load_admin(false, array('tbluser.user_name' => $name, 'tbluser.user_pwd' => md5($password),'tblgroup.group_level < '=>4));

        if ($query->num_rows() != 1)
        {
            echo '0';
        } else
        {
            $rows = $query->result_array();
            if ($rows['0']['user_block'] == 1)
            {
                echo '1';
            } else
            {
                
                $_SESSION['lang_admin'] = 'vi';
                $this->user=$rows['0'];
                $_SESSION['skin']='blue';
                $time = mktime(date('H'), date('m'), date('s'), date('m'), date('d'), date('Y'));
                $this->admin_model->db->update('tbluser', array('last_login' => $time, 'user_ip' => $_SERVER['REMOTE_ADDR']), array('user_name' => $name));
                 
                echo '2';
            }
        }


    }

    public function resetpassword()
    {
        $email = $this->input->post('email');
        $user = $this->input->post('username');
        $captcha = $this->input->post('captcha');
        if ($captcha != $_SESSION['captcha'])
        {
            echo '1';
            return;
        }
        $info = $this->admin_model->select_query('tbluser', 'user_block', array('user_name' => $user, 'user_email' => $email));
        if ($info->num_rows() == 0)
        {
            echo '2';
            return;
        }
        $user = $this->admin_model->get_array($info);
        if ($user['0']['user_block'] == '1')
        {
            echo '3';
            return;
        }
        $active_code = md5(time());
        $this->admin_model->db->update('tbluser', array('active_code' => $active_code), array('user_name' => $user));
        $link = base_url() . 'admin/login/changepassword.html?uid=' . $user . '&code=' . $active_code;
        $email_subject = 'Thay đổi mật khẩu quản trị hệ thống website http://' . $_SERVER['SERVER_NAME'];

        $email_content = 'Thông tin thay đổi mật khẩu quản trị hệ thống website của bạn đã được gửi đi,';
        $email_content .= 'Click vào ' . $link . ' để thực hiện các bước tiếp theo';
        $this->email->subject($email_subject);
        $this->email->message($email_content);
        $this->email->to($email);
        if ($this->email->send())
        {
            echo '0';
        }

    }

    /**
     * Login::changepassword()
     * 
     * @return void
     */
    public function changepassword()
    {
        $message = '';
        $user_name = $this->input->get('uid');
        $active_code = $this->input->get('code');
        if (!$user_name || !$active_code)
        {
            redirect(base_url() . 'admin/login.html');
        }

        $info = $this->admin_model->select_query('tbluser', false, array('user_name' => $user_name, 'user_block' => 0, 'active_code' => $active_code), false, false, false, false, true);
        if (count($info) != 1)
        {
            redirect(base_url() . 'admin/login.html');
        }
        $data['title'] = 'Trang thay đổi mật khẩu quản trị';
        $data['user'] = $info['0'];

        if ($this->input->post('user_pwd'))
        {
            $captcha = $this->input->post('captcha');
            if ($captcha != $_SESSION['captcha'])
            {
                $message = admin_error('Mã xác nhận không chính xác');
            } else
            {
                $active_code = md5(time());
                $this->admin_model->db->update('tbluser', array('user_pwd' => md5($this->input->post('user_pwd')), 'active_code' => $active_code), array('user_name' => $user_name));
                $message = admin_success('Thay đổi mật khẩu thành công');
            }
        }
        $data['message'] = $message;
        $this->load->view('back_end/login/changepassword', $data);
    }


}

?>