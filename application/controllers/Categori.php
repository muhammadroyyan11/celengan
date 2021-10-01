<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categori extends CI_Controller
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
        $data['title'] = "Categori";
        $data['categori'] = $this->base_model->get('categori')->result();
        $this->template->load('template', 'categori/data_categori', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_categori', 'Nama categori', 'required|trim');
    }


    public function add()
    {
        // if ($this->input->is_ajax_request()) {
        //     echo "yes";
        // } else{
        //     echo "no";
        // }
        $this->_validasi();
        $login = userdata('id_user');

        if ($this->form_validation->run() == false) {
            $data['title'] = "categori";
            $this->template->load('template', 'categori/add_categori', $data);
        } else {
            $input = $this->input->post(null, true);
            $input['id_user'] = $login;
            $insert = $this->base_model->insert('categori', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('categori');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('categori/add');
            }
        }
    }
    
	public function delete($id){
		$where=array('ID' => $id);
		$this->base_model->del('cash_balance', $where);
		redirect('Masuk');
	}
}