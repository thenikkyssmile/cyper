<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $user = $this->user_model->listing();

        $data = array( 'title' => 'Data User ('.count($user).')',
                        'user' => $user,
                        'isi'  =>  'admin/user/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    
    public function tambah(){

        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama', 'required', array('required' => ' Nama harus diisi'));

        $valid->set_rules('email', 'Email', 'required|valid_email', 
        array('required'    => ' Email harus diisi',
              'valid_email' => ' Format email tidak benar'));
       
        $valid->set_rules('username', 'Username', 'required|is_unique[user.username]', 
                    array('required'    => ' Username harus diisi',
                          'is_unique'   => ' Username <strong>'.$this->input->post('username').'</strong> sudah ada'));
                           
        $valid->set_rules('password', 'Password', 'required|min_length[6]', 
                    array('required'    => ' Password harus diisi',
                          'min_length'  => ' Password minimal 6 karakter'));

        if($valid->run()=== FALSE) {
                            
        $data = array( 'title' => 'Tambah User',
                        'isi'  =>  'admin/user/tambah');
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;
            $data = array( 'nama'           => $i->post('nama'),
                           'email'          => $i->post('email'),
                           'username'       => $i->post('username'),
                           'password'       => sha1($i->post('password')),
                           'akses_level'    => $i->post('akses_level'),
                           'keterangan'     => $i->post('keterangan')
                          );
            $this->user_model->tambah($data);
            $this->session->set_flashdata('sukses', ' Data telah masuk');
            redirect(base_url('admin/user'), 'refresh');
        }
    }

    public function edit($id_user){

        $user = $this->user_model->detail($id_user);

        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama', 'required', array('required' => ' Nama harus diisi'));

        $valid->set_rules('email', 'Email', 'required|valid_email', 
        array('required'    => ' Email harus diisi',
              'valid_email' => ' Format email tidak benar'));

        if($valid->run()=== FALSE) {
                            
        $data = array( 'title' => 'Edit User: '.$user->nama,
                        'user' => $user,
                        'isi'  =>  'admin/user/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);

        }else{
            $i = $this->input;

            if(strlen($i->post('password')) > 6){

                $data = array( 'id_user'         => $id_user,
                                'nama'           => $i->post('nama'),
                                'email'          => $i->post('email'),
                                'password'       => sha1($i->post('password')),
                                'akses_level'    => $i->post('akses_level'),
                                'keterangan'     => $i->post('keterangan')
                            );
            }else{

                $data = array(  'id_user'       => $id_user,
                                'nama'          => $i->post('nama'),
                                'email'         => $i->post('email'),
                                'akses_level'   => $i->post('akses_level'),
                                'keterangan'    => $i->post('keterangan')
                            );

            }
            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', ' Data telah diupdate');
            redirect(base_url('admin/user'), 'refresh');
        }
    }

    public function delete($id_user) {
        $data = array('id_user' =>$id_user);
        $this->user_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/user'), 'refresh');
    }
}
