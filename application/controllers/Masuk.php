<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['title'] = "Pemasukan";
        // $data['cash'] = $this->base_model->getCash('cash_balance', 'id' ,array('mutation' => 'masuk'))->result();
        $data['cash'] = $this->base_model->joinCategory('id' ,array('mutation' => 'masuk'))->result();
        $this->template->load('template', 'masuk/data_masuk', $data);
    }

    
	public function delete($id){
		$where=array('ID' => $id);
		$this->base_model->del('cash_balance', $where);
		redirect('Masuk');
	}
}