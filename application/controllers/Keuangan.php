<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
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
        $data['title'] = "Keuangan";
        $data['categori'] = $this->base_model->get('categori')->result();
        $data['cashk'] = $this->base_model->joinCategory('id' ,array('mutation' => 'keluar'))->result();
        $data['cashm'] = $this->base_model->joinCategory('id' ,array('mutation' => 'masuk'))->result();
        $this->template->load('template', 'keuangan/data_keuangan', $data);
    }

	public function delete($id){
		$where=array('ID' => $id);
		$this->base_model->del('cash_balance', $where);
		redirect('Masuk');
	}
}