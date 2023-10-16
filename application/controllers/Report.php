<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');

        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function index()
    {
        $data['tahun']      = $this->Report_model->gettahun();
        $data['title']      = 'Admin: Laporan Pendapatan';
        $data['content']    = $this->Report_model->get()->result();
        $data['page']       = 'pages/report/index';

        $this->view($data);
    }

    function filter(){
		$nilaifilter = $this->input->post('nilaifilter');
		$bulan = $this->input->post('bulan');
		$tahun1 = $this->input->post('tahun1');
		$tahun2 = $this->input->post('tahun2');

		if ($nilaifilter == 2) {
			$data['title'] = "Laporan Penjualan By Bulan";
			$data['subtitle'] = "Bulan : ".$bulan.' Tahun : '.$tahun1;	
			$data['datafilter'] = $this->Report_model->filterbybulan($tahun1,$bulan);

			$this->load->view('pages/report/print', $data);
		} else if ($nilaifilter == 3) {
			$data['title'] = "Laporan Penjualan By Tahun";
			$data['subtitle'] = ' Tahun : '.$tahun2;
			$data['datafilter'] = $this->Report_model->filterbytahun($tahun2);

			$this->load->view('pages/report/print', $data);
		}
	}
}