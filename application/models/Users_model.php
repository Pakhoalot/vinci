<?php
/**
 * Created by PhpStorm.
 * User: pakholeung
 * Date: 8/14/17
 * Time: 10:38 PM
 */

class Users_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_new_user($user = null){
        return 'this is setUser';
    }

    public function get_by_name($name = null, $pass = null){
        return 'this is get_by_name';
    }

    public function set_sensor($user = null, $sensor = null){
        return 'this is set_sensor';
    }

    public function password_check($username = null, $password = null){
        return 'this is password_check';
    }

}