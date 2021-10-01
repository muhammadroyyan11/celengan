<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluar extends CI_Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['title'] = "Pengeluaran";
        // $config['base_url'] = base_url("keluar?&query={$this->query}&from={$this->from}&to={$this->to}&categori={$this->nama_categori}");
        //$data['cash'] = $this->base_model->getCash('cash_balance', 'id' ,array('mutation' => 'keluar'))->result();
        $data['cash'] = $this->base_model->joinCategory('id' ,array('mutation' => 'keluar'))->result();
        $data['categori'] = $this->base_model->get('categori')->result();
        // $this->pagination->initialize($config);
        
        $this->template->load('template', 'keluar/data_keluar', $data);

        
    }

    
	public function delete($id){
		$where=array('ID' => $id);
		$this->base_model->del('cash_balance', $where);
		redirect('Keluar');
	}
}