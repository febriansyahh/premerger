<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        $this->load->view("login");
    }

    public function checked()
    {
        $username = $this->input->post('username');
        $pw = $this->input->post('password');

        $password = hash('sha256', $pw);


        $lognon = $this->Login_model->loginnon($username, $password);

        if ($lognon) {
            foreach ($lognon as $value) {
                $this->session->set_userdata('iduser', $value->id_user);
                $this->session->set_userdata('username', $value->username);
                $this->session->set_userdata('nama', $value->nama_user);
                $this->session->set_userdata('level', $value->user_level);
                $this->session->set_userdata('sistem', $value->user_sistem);

                redirect('admin/home');
            }

        }else{
            $login = $this->Login_model->loginws($username, $pw);
    
            if ($login->status == 'true') {
                $response = $login->result->data; 
                if ($response->level == 'dosen') {

                    $this->session->set_userdata('iduser', $response->iduser);
                    $this->session->set_userdata('kode', $response->kode);
                    $this->session->set_userdata('nis', $response->nis);
                    $this->session->set_userdata('nidn', $response->nidn);
                    $this->session->set_userdata('nama', $response->nama);
                    $this->session->set_userdata('nama_gelar', $response->nama_gelar);
                    $this->session->set_userdata('prodi', $response->prodi);
                    $this->session->set_userdata('level', $response->level);
                    
    
                    redirect('dosen/home');
    
                } elseif ($response->level == 'pegawai') {
                    $kode = $response->kode;
                    $cekadmin = $this->Login_model->loginadm($kode);
                    if ($cekadmin) {
                        # code...
                        $this->session->set_userdata('iduser', $cekadmin->id_user);
                        $this->session->set_userdata('username', $cekadmin->username);
                        $this->session->set_userdata('nama', $response->nama_gelar);
                        $this->session->set_userdata('level', $cekadmin->user_level);
                        $this->session->set_userdata('sistem', $cekadmin->user_sistem);
    
                        redirect('admin/home');
                    }else{
                        echo "<script>alert('Maaf anda tidak memiliki akses masuk !'); document.location='index' </script>";
                    }
                   
                }else{
                    echo "<script>alert('Maaf anda tidak memiliki akses masuk !'); document.location='index' </script>";
                }
            }else{
                echo "<script>alert('Username atau password anda tidak sesuai !'); document.location='index' </script>";
            }
        }

    }

    public function Logout()
    {
        session_destroy();
        redirect('login');
    }
}