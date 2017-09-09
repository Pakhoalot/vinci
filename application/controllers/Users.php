<?php
/**
 * Created by PhpStorm.
 * User: pakholeung
 * Date: 8/14/17
 * Time: 11:01 PM
 */
//处理与用户登录登出的应用逻辑
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index()
    {

    }

    public function login()
    {
        $data['string'] = $this->users_model->add_new_user();
        $this->load->view('login', $data);
    }

    public function logout()
    {

    }


}