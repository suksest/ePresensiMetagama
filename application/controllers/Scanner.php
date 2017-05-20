<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scanner extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('ScannerModel');
 		$this->load->helper('form','url_helper');
 	}

 	public function index()
 	{
    $this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$data['status'] = "none";
		$data['query'] = $this->db->query("SELECT * FROM kehadiran,mentee WHERE kehadiran.nim = mentee.nim ORDER BY kehadiran.idKehadiran DESC LIMIT 1")->result(); //query ini hanya untuk handle tampilan awal agar tidak ada error di vscanner
 		if ($this->form_validation->run() === FALSE) {
			$this->load->view('Scanner',$data);
		}else {
			$this->ScannerModel->set_kehadiran();
		}
 	}

	// public function last()
	// {
	// 	$qscanner = $this->Mscanner->get_last_kehadiran();
	// 	$this->load->view('vdetail',$qscanner);
	// }
}
?>
