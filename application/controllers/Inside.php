<?php

/**
 * @package    mitrakomunitas.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Inside extends CI_Controller {
	
	var $data = array();
	
	function __construct(){
		parent::__construct();
		$this->load->model("Mdl_mitra","model");
		if($this->session->userdata('logged') !== 1) redirect('login');
	}

	public function index() {
		$this->data['title'] = 'Mitra Komunitas - Home';
		$this->data['page'] = 'inside/home';
		$this->data['agenda'] = $this->model->agenda($this->session->userdata('id'));
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
		
		$this->data['komunitas'] = $this->model->currentCommunity($this->session->userdata('id'));
		$this->load->view('template', $this->data);
	}
	
	public function update_community(){
		$id = $this->input->post('id');
		$email_community = $this->input->post('email');
		$date = $this->input->post('founding_date');
		$newDate = str_replace('/','-', $date);

		$data = array(
			"name"	=> $this->input->post('name'),
			"type"	=> $this->input->post('type'),
			"legality_number" => $this->input->post('legality'),
			"pic" => $this->input->post('pic'),
			"founding_date" => date('Y-m-d', strtotime($newDate)),
			"email" => $email_community,
			"phone" => $this->input->post('phone'),
			"website" => $this->input->post('website'),
			"region" => $this->input->post('region'),
			"city" => $this->input->post('city'),
			"district" => $this->input->post('district'),
			"address" => $this->input->post('alamat'),
			"description" => $this->input->post('description'),
			"field" => $this->input->post('field'),
		);
		
		$act = $this->model->update_community($id, $data);
		if($act)
			$this->session->set_flashdata('success','Data Komunitas telah diupdate.');
		else
			$this->session->set_flashdata('error','Terjadi kesalahan sistem saat menyimpan data');
		
		redirect('inside/data');
			
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
	
	public function create_account(){
		$data = array(
			'community_id'	=> $this->session->userdata('id'),
			'bank'	=> $this->security->xss_clean($this->input->post('bank')),
			'number'	=> $this->security->xss_clean($this->input->post('number')),
			'name'	=> $this->security->xss_clean($this->input->post('name')),
			'date_input'	=> date('Y-m-d H:i:s')
		);
		$act = $this->model->save_rekening($data);
		if($act)
			$this->session->set_flashdata('success','Nomor Rekening atas nama <b>'.$data['name'].'</b> telah ditambahkan sebagai rekening komunitas.');
		else
			$this->session->set_flashdata('error','Terjadi kesalahan sistem saat menyimpan data');
		redirect('inside/account');
	}
	
	public function update_account(){
		$id = $this->security->xss_clean($this->input->post('id'));
		$data = array(
			'bank'	=> $this->security->xss_clean($this->input->post('bank')),
			'number'	=> $this->security->xss_clean($this->input->post('number')),
			'name'	=> $this->security->xss_clean($this->input->post('name')),
		);
		$act = $this->model->update_rekening($id, $data);
		if($act)
			$this->session->set_flashdata('success','Nomor rekening komunitas telah diupdate.');
		else
			$this->session->set_flashdata('error','Terjadi kesalahan sistem saat menyimpan data');
		redirect('inside/account');
	}
	
	public function delete_rekening(){
		$id = $this->input->post('id');
		$act = $this->model->delete_rekening($id);
		if($act)
			$this->session->set_flashdata('success','Data Kegiatan telah dihapus.');
		else
			$this->session->set_flashdata('error','Terjadi kesalahan sistem saat menghapus data');
		
		redirect('inside/account');
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
	
	public function create_activity(){
		$data = array(
			'community_id'	=> $this->session->userdata('id'),
			'name'			=> $this->security->xss_clean($this->input->post('name')),
			'description'	=> $this->security->xss_clean($this->input->post('description')),
			'location'		=> $this->security->xss_clean($this->input->post('location')),
			'date_start'	=> date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('date_start')))),
			'date_end'		=> date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('date_end')))),
			'date_input'	=> date('Y-m-d H:i:s')
		);
		$act = $this->model->save_activity($data);
		if($act)
			$this->session->set_flashdata('success','Kegiatan <b>'.$data['name'].'</b> telah ditambahkan.');
		else
			$this->session->set_flashdata('error','Terjadi kesalahan sistem saat menyimpan data');
		redirect('inside/activity');
	}
	
	public function update_activity(){
		$id = $this->input->post('id');
		$data = array(
			'name'			=> $this->security->xss_clean($this->input->post('name')),
			'description'	=> $this->security->xss_clean($this->input->post('description')),
			'location'		=> $this->security->xss_clean($this->input->post('location')),
			'date_start'	=> date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('date_start')))),
			'date_end'		=> date('Y-m-d H:i:s', strtotime(str_replace('/','-', $this->input->post('date_end')))),
		);
		$act = $this->model->update_activity($id, $data);
		if($act)
			$this->session->set_flashdata('success','Kegiatan <b>'.$data['name'].'</b> telah diupdate.');
		else
			$this->session->set_flashdata('error','Terjadi kesalahan sistem saat menyimpan data');
		redirect('inside/activity');
	}
	
	public function delete_activity(){
		$id = $this->input->post('id');
		$act = $this->model->delete_activity($id);
		if($act)
			$this->session->set_flashdata('success','Data Kegiatan telah dihapus.');
		else
			$this->session->set_flashdata('error','Terjadi kesalahan sistem saat menghapus data');
		
		redirect('inside/activity');
	}
	
	# requirement modules
	# ==============================
	public function requirement($param = '', $id = ''){
		$this->data['title'] = "Kebutuhan Komunitas";
		$this->data['page'] = 'inside/kebutuhan';
		if($param != null)
			$this->data['page'] = 'inside/form_kebutuhan';
		
		$this->data['kebutuhan'] = $this->model->requirement($this->session->userdata('id'));
		$this->load->view('template', $this->data);
	}
	
	public function create_requirement(){
		$data = array(
			'community_id'	=> $this->session->userdata('id'),
			'name'			=> $this->security->xss_clean($this->input->post('name')),
			'description'	=> $this->security->xss_clean($this->input->post('description')),
			'date_input'	=> date('Y-m-d H:i:s')
		);
		$act = $this->model->save_requirement($data);
		if($act)
			$this->session->set_flashdata('success','Kegiatan <b>'.$data['name'].'</b> telah ditambahkan.');
		else
			$this->session->set_flashdata('error','Terjadi kesalahan sistem saat menyimpan data');
		redirect('inside/activity');
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