<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
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
 		$this->load->helper('form','url_helper');
		$this->load->library('form_validation','session');
		$this->load->model('Identity');
 	}

 	public function index()
 	{
		$data['title'] = "ePresensi Metagama POLBAN";
		if ($this->Identity->is_admin()){
			// $this->Identity->set_session_data('title',$data['title']);
			redirect('Scanner');
			// $this->load->view('Scanner',$data);
		} else {
			// $this->Identity->set_session_data('title',$data['title']);
			// redirect('Site/login');
			$data['title'] = "Masuk | ePresensi Metagama POLBAN";
			$this->load->view('Site',$data);
		}
 	}

	public function login()
	{
		$data['title'] = "Masuk | ePresensi Metagama POLBAN";
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
 		if ($this->form_validation->run() === FALSE) {
			if($this->Identity->is_admin()){
				$data['title'] = "ePresensi Metagama POLBAN";
				redirect('Scanner');
				// $this->load->view('Scanner',$data);
			}else {
				$this->load->view('Site');
			}
		}else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			if($this->Identity->login($data)){
				if($this->Identity->is_admin()){
					$data['title'] = "ePresensi Metagama POLBAN";
					// $this->load->view('Scanner',$data);
					redirect('Scanner');
				}else {
					# redirect if not an admin
				}
			} else {
				$data['title'] = "ePresensi Metagama POLBAN";
	            $data['msg'] = "Username atau Password salah";
	            $this->load->view('Site', $data);
	        }
		}
	}

	public function logout() {
		$this->Identity->logout();
		redirect('Site');
	}
}
?>
