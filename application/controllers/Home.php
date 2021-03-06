<?php

/**
 * @package    mitra.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	var $data = array();
	
	function __construct(){
		parent::__construct();
		$this->load->model("Mdl_mitra","model");
	}

	public function index() {
		$this->data['page'] = 'home/home';
		$this->data['community'] = $this->model->getAllCommunity();
		$marker = $this->model->getGeocommunity();
		$listMarker = array();
		$listMarker[0] = array(
			"-7.7559607", "110.3785723", "<div class='geotitle'><a href='".base_url('community/MIBF20160001')."'><b>Rumah Ilmu Berbagi</b></a></div><div class='geocontent'>Jl.Pandegasiwi no.14, Kaulirang KM.5,6 Kec.Depok, Sleman, Jogjakarta 55281</div></div>"
		);
		if(!empty($marker)){
			$x = 1;
			foreach ($marker as $m){
				$desc = '<div class="geotitle"><a href="'.base_url().'community/'.$m['username'].'"><b>'.$m['name'].'</b></a></div><div class="geocontent">'.$m['address'].'</div>';
				$listMarker[$x] = array(
					$m['lat'], $m['long'], $desc
				);
				$x++;
			}
		}
		$this->data['listMarker'] = json_encode($listMarker);
		
		$this->data['kegiatan'] = $this->model->activities();
		$this->data['kebutuhan'] = $this->model->requirement();
		$this->data['agenda'] = $this->model->agenda();

        $this->load->view('template', $this->data);
    }
	
	public function login(){
		$this->data['page'] = 'home/login';
		$this->load->view('template', $this->data);
	}

	public function join(){
		$this->data['page'] = 'home/join';
		$this->data['bidang'] = $this->model->getBidang();
		$this->data['propinsi'] = $this->model->getPropinsi();
		$this->load->view('template', $this->data);
	}
	
	public function registration(){

		$email = $this->input->post('email_active');
		$email_community = $this->input->post('email');
		$date = $this->input->post('founding_date');
		$newDate = str_replace('/','-', $date);
		$pass = generatePassword(8,4);
		
		$count = $this->model->count_mitra_per_year();
		
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
			"facebook" => $this->input->post('facebook'),
			"twitter" => $this->input->post('twitter'),
			"googleplus" => $this->input->post('google'),
			"username" => generate_code_mitra($count+1),
			"password" => md5($pass),
			"date_input" => date('Y-m-d H:i:s'),
		);
		
		# check file input logo
		if($_FILES['logo']['tmp_name'] !== ""){
			$config = array(
				'upload_path'	=> './assets/img/partner/',
				'allowed_types'	=> 'JPG|JPEG|jpg|jpeg|PNG|png',
				'max_size'		=> '100',
				'overwrite'		=> FALSE,
			);
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('logo')){
				$this->session->set_flashdata('warning', $this->upload->display_errors('', ''));
			}else{
				$data['logo'] =  base_url().'assets/img/partner/'.$_FILES['logo']['name'];
			}
		}
		
		// print_r($data); die();
		
		$act = $this->model->save_community($data);
		if($act){
			
			# set location 
			# ================================
			$geodata = array(
				'community_id' => $act,
				'lat'	=> $this->input->post('lat'),
				'long'	=> $this->input->post('long'),
				'str_address'	=> $this->input->post('city'),
				'last_modified' => date('Y-m-d H:i:s')
			);
			$this->model->save_geoaddress($geodata);
			
			$this->load->library('Lib_mailer');
			$this->lib_mailer->init();
			# message body
			$param = array(
				'name' 		=> $data['name'],
				'username'	=> $data['username'],
				'password'	=> $pass,
			);
			$bcc = array(
				'email' => 'sabbana.a7@gmail.com',
				'name'	=> 'Sabbana Azmi'
			);
			$cc = array(
				'email'	=> 'info@ilmuberbagi.or.id',
				'name'	=> 'Ilmu Berbagi Foundation'
			);

			$message = $this->load->view('template/mailer/createUser', $param, TRUE);
			$this->lib_mailer->sendmail(array('email'=>$email), 'Selamat Datang di Mitra Komunitas IBF', $message, $cc, $bcc);
			
			$this->session->set_flashdata('success','<b>Selamat,</b> Komunitas Anda telah terdaftar sebagai Mitra Komunitas Ilmu Berbagi Foundation. Kami telah mengirimkan email akun komunitas Anda yang dapat digunakan untuk masuk di halaman Inside Mitra Komunitas');
		}

		redirect('join');
	}
	
	# get region 
	# ===================
	public function getKabupaten($pid){
		$data = $this->model->getKabupaten($pid);
		$opt = "";
		foreach($data as $kab){
			$opt .= "<option value='".$kab['kota_id']."'>".$kab['kokab_nama']."</option>";
		}
		echo $opt;
	}

	public function getKecamatan($kid){
		$data = $this->model->getKecamatan($kid);
		$opt = "";
		foreach($data as $kec){
			$opt .= "<option value='".$kec['kecam_id']."'>".$kec['nama_kecam']."</option>";
		}
		echo $opt;
	}
	
	public function list_communities($userid = ''){
		$this->data['page'] = 'home/list';
		$this->data['community'] = $this->model->getAllCommunity();
		
		$marker = $this->model->getGeocommunity();
		$listMarker = array();
		if(!empty($marker)){
			$x = 0;
			foreach ($marker as $m){
				$desc = '<div class="geotitle"><a href="'.base_url().'community/'.$m['username'].'">'.$m['name'].'</a></div><div class="geocontent">'.$m['address'].'</div>';
				$listMarker[$x] = array(
					$m['lat'], $m['long'], $desc
				);
				$x++;
			}
		}
		$this->data['listMarker'] = json_encode($listMarker);
		
		$this->data['kegiatan'] = $this->model->activities();
		$this->data['kebutuhan'] = $this->model->requirement();
		$this->data['agenda'] = $this->model->agenda();
		
		if($userid !== ''){
			$id = $this->model->getIdfromUsername($userid);
			$this->data['page'] = 'home/detail_komunitas';
			$this->data['community'] = $this->model->currentCommunity($userid);
			if(empty($this->data['community'])){
				redirect('community');
			}
			$this->data['rekening'] = $this->model->getRekening($id);
			$this->data['kegiatan'] = $this->model->activities($id);
			$this->data['kebutuhan'] = $this->model->requirement($id);
		}
		$this->load->view('template', $this->data);
	}
	
	public function donate($userid){
		$this->data['page'] = 'home/donate';
		$this->data['community'] = $this->model->currentCommunity($userid);
		$this->load->view('template', $this->data);
	}

}