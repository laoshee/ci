<?php

function get_option($para){
   $op = & get_instance();
   
   $op->db->select($para);
   $op->db->from('pengaturan');
   $res = $op->db->get();
   $result =  $res->row();
   
   echo $result->$para;
}