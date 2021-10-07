<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index() {
//        var_dump(userdata('email'));
        $this->template->load('template', 'profile/profile_view');
    }
    
//    public function edit($id) {
//        print_r($this->session->userdata());   
//    }
    
    public function edit($getId)
    {
//        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit User";
            $data['user'] = $this->base_model->get('user', ['id_user' => $id]);
            $this->template->load('template', 'profile/profile_edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'nama'          => $input['nama'],
                'username'      => $input['username'],
                'email'         => $input['email'],
                'no_telp'       => $input['no_telp'],
                'role'          => $input['role']
            ];

            if ($this->base_model->update('user', 'id_user', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('user');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('user/edit/' . $id);
            }
        }
    }

    public function delete($id) {
        $where = array('ID' => $id);
        $this->base_model->del('cash_balance', $where);
        redirect('Masuk');
    }

}
