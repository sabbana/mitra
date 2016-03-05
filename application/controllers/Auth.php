<?php

/**
 * @package    mitrakomunitas.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	var $data = array();
	
	function __construct(){
		parent::__construct();
		$this->load->model("Mdl_mitra","model");
	}

	public function index(){
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$login = $this->model->cekuser($username, $password);
		if ($login){
			foreach($login as $data){
				$create_session = array(
					'id'			=> $data['id'],
					'email'			=> $data['email'],
					'username'		=> $username,
					'name'			=> $data['name'],
					'logged'		=> 1,
				);
				$this->session->set_userdata($create_session);
			}
			redirect('inside');
		}
		else{			
			$this->session->set_flashdata('error','Username dan atau password tidak valid!');
			redirect('login');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}