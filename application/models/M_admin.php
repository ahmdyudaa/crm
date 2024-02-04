<?php

class M_admin extends CI_model{
    public function login(){
        return $this->db->get('admin')->result_array();
    }
}