<?php
/**
 * Created by PhpStorm.
 * User: pakholeung
 * Date: 8/15/17
 * Time: 9:11 PM
 */

class Sensors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sensors_model');
        $this->load->helper('url');
    }

    public function index(){
        echo 'This is index';
    }
    //注册传感器
    public function register()
    {
        $name = $this->input->post('name');
        $type = $this->input->post('type');
        $device_id = $this->input->post('device_id');
        $description = $this->input->post('description');

        $this->sensors_model->add_new_sensor($name, $type, $device_id, $description);
    }
    //上传传感器信息
    public function upload()
    {
        $user_id = $this->input->post('user_id');
        $device_id = $this->input->post('device_id');
        $sensor_id = $this->input->post('sensor_id');
        $value = $this->input->post('value');


        $this->sensors_model->upload_info($user_id, $device_id, $sensor_id, $value);
    }
    //获取传感器信息
    public function get_info()
    {
        $sensor_id = $this->input->post('sensor_id');

        $result['data'] = $this->sensors_model->get_sensor_info($sensor_id);

        $this->load->view('json', $result);
    }

    //上传图片
    public function upload_img()
    {
        //获取其他用户信息
        $user_id = $this->input->post('user_id');
        $device_id = $this->input->post('device_id');
        $sensor_id = $this->input->post('sensor_id');
        //定义配置段
        $config['upload_path']      = './uploads/'.(string) $user_id .'/' .(string) $device_id.'/';
//        $config['upload_path'] = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['file_name']        = (string)time().'.jpg';
        $config['max_size']     = 100;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

        #处理文档位置
        if(!file_exists($config['upload_path'])) mkdir($config['upload_path'], 0777, true);

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            echo $config['upload_path'];
            echo $config['file_name'];
            $error = array('error' => $this->upload->display_errors());
            echo $error['error'];

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->sensors_model->upload_img($user_id, $device_id, $sensor_id, $config['upload_path'] . $config['file_name']);

        }


    }
    //获取图片
    public function get_img()
    {
        $user_id = $this->input->post('user_id');
        $device_id = $this->input->post('device_id');
        $sensor_id = $this->input->post('sensor_id');

        $result = $this->sensors_model->get_img($user_id, $device_id, $sensor_id);
        $result['data'] = $this->sensors_model->get_img($user_id, $device_id, $sensor_id);
        $this->load->view('img_show',$result);

    }

}