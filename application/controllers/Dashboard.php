<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        // // $this->load->model('Auth_model', 'auth');
        // $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $tanggal = date('Y-m-d');
        //$login = $this->session->userdata('id_user');
        $data['title'] = "Dashboard";
        $data['satuanIn'] = $this->base_model->get_uang('cash_balance', 'id' ,array('mutation' => 'masuk', 'date' => $tanggal))->result();
        $data['satuanOut'] = $this->base_model->get_uang('cash_balance', 'id' ,array('mutation' => 'keluar', 'date' => $tanggal))->result();
        $data['total'] = $this->base_model->getTotal()->result();
        $data['categori'] = $this->base_model->get('categori')->result();
        $this->template->load('template', 'dashboard/dashboard', $data);

        // $userId = $ci->session->userdata('login_session')['user'];
        // return $this->base_model->get('user', ['id_user' => $userId])[$field];
    }

    public function addsaldo()
    {
        // echo $this->input->post('categori');
        
        $this->db->insert('cash_balance', array(
            'date' => date("Y-m-d"),
            'mutation' => $this->input->post('mutation'),
            'amount' => str_replace(',', '', $this->input->post('amount')),
            'description' => $this->input->post('description'),
            // 'user_id' => userdata('id_user')
            'id_user' => userdata('id_user'),
            'category' => $this->input->post('categori')
        ));

        if ($this->db->affected_rows()) {
            $this->data = array(
                'status' => true,
                'message' => "Data berhasil disimpan"
            );
        } else {
            $this->data = array(
                'status' => false,
                'message' => "Gagal saat menyimpan data!"
            );
        }

        redirect('dashboard');
    }
}
