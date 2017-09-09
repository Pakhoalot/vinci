<?php
/**
 * Created by PhpStorm.
 * User: pakholeung
 * Date: 8/15/17
 * Time: 8:31 PM
 */

class Sensors_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_new_sensor($name = null, $type, $device_id = null, $description = '')
    {
        // 构造插入列数据
        $data= array(
          'name' => $name,
          'type' => $type,
          'device_id' => $device_id,
          'description' => $description
        );
        $query = $this->db->insert('sensors', $data);
    }

    public function upload_info($user_id, $device_id, $sensor_id, $value)
    {
        $data= array(
            'sensor_id' => $sensor_id,
            'device_id' => $device_id,
            'user_id' => $user_id,
            'value' => $value
        );
        $query = $this->db->insert('sensors_info', $data);
    }

    public function get_sensor_info($sensor_id)
    {
        $data = array(
            'sensor_id' => $sensor_id
        );

        $query = $this->db->get_where('sensors_info',$data);
        return $query->row_array();
    }

    public function upload_img($user_id, $device_id, $sensor_id, $img_path)
    {
        $data= array(
            'user_id' => $user_id,
            'device_id' => $device_id,
            'sensor_id' => $sensor_id,
            'img_path' => substr($img_path, 2, strlen($img_path)-2)
        );
        $query = $this->db->insert('imgs', $data);

    }

    public function get_img($user_id, $device_id, $sensor_id)
    {
        $data= array(
            'user_id' => $user_id,
            'device_id' => $device_id,
            'sensor_id' => $sensor_id,
        );
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('imgs',$data);
        return $query->result_array();
    }

}