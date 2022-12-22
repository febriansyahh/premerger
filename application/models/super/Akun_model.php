<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_model extends CI_Model {

    private $_table = "mst_users";

    public function index()
    {
        // return $this->db->get($this->_table)->result();
        return $this->db->query("SELECT * FROM `mst_users` WHERE `user_delete` = 0 ")->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $username = $post['username'];
        $nama = $post['nama'];
        $password = $post['password'];
        $level = $post['level'];
        $sistem = $post['sistem'];

        $date = date("Y-m-d H:i:s");

        $this->username        = $username;
        $this->nama_user       = $nama;
        $this->password        = hash('sha256', $password);
        $this->user_level      = $level;
        $this->user_sistem     = $sistem;
        $this->user_active     = 'Active';
        $this->user_join       = $date;
        $this->user_delete     = 0;

        return $this->db->insert($this->_table, $this);
    }

    public function reset()
    {
        $post = $this->input->post();
        $id = $post['iduser'];
        $username = $post['username'];
        $nama = $post['nama'];
        $pass = $post['password'];
        $password = hash('sha256', $pass);

        $this->db->query("UPDATE `mst_users` SET `password` = '".$password."', `username` = '$username', `nama_user` = '$nama' WHERE `id_user` = '". $this->variasi->decode($id)."' ");
    }

    public function delete($id)
    {
        $this->db->query("UPDATE `mst_users` SET `user_delete` = '1', `user_active` = 'Nonactive' WHERE `id_user` = '$id' ");
    }
    
}