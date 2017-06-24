<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
 	// 	$this->load->model('KegiatanModel');
 		$this->load->model('Identity');
 		$this->load->model('EventModel');
 		$this->load->helper('url_helper');
 	}

 	public function index()
 	{
		if($this->Identity->is_admin()){
			$data['title'] = "Atur Kegiatan | ePresensi Metagama POLBAN";
			$data['qEvent'] = $this->EventModel->get_event();
			$this->load->view('Event',$data);
		}else{
			redirect('site');
		}
 	}

	public function create(){
		$action = $this->uri->segment(2);
		var_dump($action);
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Tambah Kegiatan';

		$this->form_validation->set_rules('namaKegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('nickKegiatan', 'Nama Pendek Kegiatan', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan');
		$this->form_validation->set_rules('waktuMulai', 'Waktu Mulai Kegiatan');
		$this->form_validation->set_rules('waktuSelesai', 'Waktu Selesai Kegiatan');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('CreateEvent',$data);
		}else {
			$result = $this->EventModel->set_event($action,0);
			$data['title'] = 'Tambah Kegiatan';
			if ($result) {
				redirect('event');
			}else {
				$this->load->view('CreateEvent.php',$data);
			}
		}
	}

	public function edit(){
		$action = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		var_dump($action);
		var_dump($id);

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Edit Kegiatan';
		$data['qEvent'] = $this->EventModel->get_event_by_id($id);

		$this->form_validation->set_rules('namaKegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('nickKegiatan', 'Nama Pendek Kegiatan', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan');
		$this->form_validation->set_rules('waktuMulai', 'Waktu Mulai Kegiatan');
		$this->form_validation->set_rules('waktuSelesai', 'Waktu Selesai Kegiatan');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('EditEvent',$data);
		}else {
			$result = $this->EventModel->set_event($action,$id);
			if ($result) {
				redirect('event');
			}else {
				$data['title'] = 'Ubah Data Gagal!!';
				$data['qEvent'] = $this->EventModel->get_event_by_id($id);
				$this->load->view('EditEvent',$data);
			}
		}
	}

	public function delete($id){
		$result = $this->EventModel->del_event($id);
		if ($result) {
			redirect('event');
		}
	}

	public function detail(){

	}
}
?>
