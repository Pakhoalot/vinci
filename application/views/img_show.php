<?php
/**
 * Created by PhpStorm.
 * User: pakholeung
 * Date: 8/18/17
 * Time: 9:47 AM
 */
foreach ($data as $row):
    echo $row['uptime'].'  ';
    echo base_url($row['img_path']).'<br>';

endforeach;