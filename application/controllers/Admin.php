<?php

/**
 * @package    mitrakomunitas.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	var $data = array();
	
	function __construct(){
		parent::__construct();
		$this->load->model("Mdl_mitra","model");
		if($this->session->userdata('logged') !== 1) redirect('login');
	}

	public function index() {
		$this->data['title'] = 'Mitra Komunitas - Home';
		$this->data['page'] = 'inside/home';
		$this->data['agenda'] = $this->model->agenda();
		$this->load->view('template', $this->data);
    }
	
	# community data
	# ==============================================
	public function data($param = ""){
		$this->data['page'] = 'inside/datakomunitas';
		if($param !== ""){
			$this->data['bidang'] = $this->model->getBidang();
			$this->data['propinsi'] = $this->model->getPropinsi();
			$this->data['page'] = 'inside/form_community';
		}
		
		$this->data['komunitas'] = $this->model->currentCommunity();
		$this->load->view('template', $this->data);
	}
	

	
	# community account modules
	# =======================================
	public function account($param = "", $id = ""){
		$this->data['title'] = 'Data Rekening Komunitas';
		$this->data['page'] = 'inside/rekening';
		$this->data['rekening'] = $this->model->getRekening($this->session->userdata('id'));
		if($param !== ""){
			if($param == "add"){
				$this->data['page'] = 'inside/form_rekening';
				$this->data['rekening'] = array();
			}else{
				$this->data['page'] = 'inside/form_rekening';
				$this->data['rekening'] = $this->model->currentRekening($id);
			}
		}
		$this->load->view('template', $this->data);
	}
	

	# community_activities
	# ========================================
	
	public function activity($param = "", $id = ""){
		$this->data['title'] = 'Kegiatan Komunitas';
		$this->data['page'] = 'inside/kegiatan';
		$this->data['kegiatan'] = $this->model->activities($this->session->userdata('id'));
		if($param !== ""){
			if($param == "add"){
				$this->data['kegiatan'] = array();
				$this->data['page'] = 'inside/form_kegiatan';
			}else{
				$this->data['kegiatan'] = $this->model->currentActivity($id);
				$this->data['page'] = 'inside/form_kegiatan';				
			}
		}
		
		$this->load->view('template', $this->data);
	}
	

	# requirement modules
	# ==============================
	public function requirement($param = '', $id = ''){
		$this->data['title'] = "Kebutuhan Komunitas";
		$this->data['page'] = 'inside/kebutuhan';
		$this->data['kebutuhan'] = $this->model->requirement($this->session->userdata('id'));
		if($param != null){
			$this->data['page'] = 'inside/form_kebutuhan';
			$this->data['kebutuhan'] = $this->model->current_requirement($id);
		}
		$this->load->view('template', $this->data);
	}
	
	
	# upload
	# ==============================
	public function changelogo(){
		if($_FILES['logo']['tmp_name'] != NULL){
			$config = array(
				'upload_path'	=> './assets/img/partner/',
				'allowed_types'	=> 'JPG|JPEG|jpg|jpeg|PNG|png',
				'max_size'		=> '100',
				'overwrite'		=> FALSE,
			);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('logo')){
				$this->session->set_flashdata('error', $this->upload->display_errors('', ''));
			}else{
				$id = $this->session->userdata('id');
				$data = array(
					'logo'	=> base_url().'assets/img/partner/'.$_FILES['logo']['name'],
				);
				$act = $this->model->update_community($id, $data);
				if($act){
					$this->session->unset_userdata('logo');
					$this->session->set_userdata('logo', $data['logo']);
					$this->session->set_flashdata('success','Logo Komunitas Anda telah diupload.');
				}
			}
		}
		redirect('inside');
	}
	

}