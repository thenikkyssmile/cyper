<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	 public function index()
	{
		$valid = $this->form_validation;

		$valid->set_rules('username', 'Username', 'required', array('required' => 'Username harus diisi'));

		$valid->set_rules('password', 'Password', 'required|min_length[6]', 
					array('required' 	=> 'Password harus diisi',
						  'min_length'	=> 'Password minimal 6 karakter'));

		if($valid->run()=== FALSE) {

			$data = array( 'title' => 'Login Administrator');
			$this->load->view('admin/login_view', $data, FALSE);
		}
		else
		{
			$i 				= $this->input;
			$username 		= $i->post('username');
			$password		= $i->post('password');
			
			$check_login 	= $this->user_model->login($username,$password);

			if(count($check_login) == 1) {
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('akses_level', $check_login->akses_level);
				$this->session->set_userdata('id_user', $check_login->id_user);
				$this->session->set_userdata('nama', $check_login->nama);
			}
			else
			{
				$this->session->set_flashdata('sukses', 'Username atau password tidak cocok');
				redirect(base_url('login'), 'refresh');
			}
		}
		
	}
}
