<?php

class Mdl_mitra extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	# for auth
	# ==========================
	public function cekuser($u, $p){
		$user = str_replace(array("'",'"'),'', $u);
		$pass = md5($p);
		$sql = "select * from community where (username = '$user' OR email = '$user') and password = '$pass'";
		return $this->db->query($sql)->result_array();
	}
	
	# model bidang 
	# =========================
	public function getBidang(){
		$sql = "select * from bidang order by id ASC";
		return $this->db->query($sql)->result_array();
	}
	
	# model community
	# =========================
	public function getAllCommunity(){
		$sql = "select a.*, b.nama_bidang as nama_bidang from community a left join bidang b on a.field = b.id
				order by name ASC";
		return $this->db->query($sql)->result_array();
	}
	
	public function getIdfromUsername($username){
		$sql = "select id from community where username='$username'";
		$data = $this->db->query($sql)->result_array();
		return $data[0]['id'];
	}
	
	public function currentCommunity($id){
		$sql = "select a.*, b.provinsi_nama, c.kokab_nama, d.nama_kecam, e.nama_bidang from community a 
				left join propinsi b on a.region = b.provinsi_id
				left join kabupaten c on a.city = c.kota_id
				left join kecamatan d on a.district = d.kecam_id
				left join bidang e on a.field = e.id
				where a.username = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function count_mitra_per_year(){
		$sql = "select id from community where YEAR(date_input) = YEAR(current_date)";
		$count = $this->db->query($sql)->num_rows();
		return $count;
	}

	public function save_community($data){
		$this->db->insert('community', $data);
		$res = $this->db->insert_id();
		return $res;
	}

	public function save_geoaddress($data){
		return $this->db->insert('geocommunity', $data);
	}

	public function getGeocommunity(){
		$sql = "select a.*, b.name, b.address, b.username from geocommunity a 
				left join community b on a.community_id = b.id 
				order by a.last_modified DESC";
		return $this->db->query($sql)->result_array();
	}
	
	
	public function update_community($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('community', $data);
	}
	
	# model account
	# ================================
	public function getRekening($id = null){
		$sql = "select a.*, b.name as nama_komunitas from community_account a left join community b on a.community_id = b.id order by date_input DESC";
		if($id != null)		
			$sql = "select a.*, b.name as nama_komunitas from community_account a left join community b on a.community_id = b.id where a.community_id = '$id' order by date_input DESC";
		
		return $this->db->query($sql)->result_array();
	}
	
	public function currentRekening($id){
		$sql ="select * from community_account where id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function save_rekening($data){
		return $this->db->insert('community_account', $data);
	}
	
	public function update_rekening($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('community_account', $data);
	}
		
	public function delete_rekening($id){
		$this->db->where('id', $id);
		return $this->db->delete('community_account');
	}

	# model activity
	# ===============================
	public function activities($community_id = null){
		$sql = "select a.*, b.name as nama_komunitas, b.username from daily_activity a left join community b on a.community_id = b.id order by date_input ASC";
		if ($community_id !== null)
			$sql = "select * from daily_activity where community_id = '$community_id' order by date_input ASC";
		return $this->db->query($sql)->result_array();
	}
	
	public function currentActivity($id){
		$sql ="select * from daily_activity where id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function save_activity($data){
		return $this->db->insert('daily_activity', $data);
	}

	public function update_activity($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('daily_activity', $data);
	}
	
	public function delete_activity($id){
		$this->db->where('id', $id);
		return $this->db->delete('daily_activity');
	}

	public function agenda($id = ''){
		$sql = "select * from daily_activity where date_start > CURRENT_DATE order by date_start ASC";
		if($id !== '')
			$sql = "select * from daily_activity where community_id = '$id' and date_start > CURRENT_DATE order by date_start ASC";
		return $this->db->query($sql)->result_array();
	}
	
	# model requirement
	# ================================
	public function requirement($id = null){
		$sql = "select a.*, b.name as nama_komunitas, b.username from community_requirement a left join community b on a.community_id = b.id order by date_input DESC";
		if($id !== null)
			$sql = "select a.*, b.name as nama_komunitas, b.username from community_requirement a left join community b on a.community_id = b.id where community_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function current_requirement($id){
		$sql = "select * from community_requirement where id = '$id'";
		return $this->db->query($sql)->result_array();
	}

	public function save_requirement($data){
		return $this->db->insert('community_requirement', $data);
	}

	public function update_requirement($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('community_requirement', $data);
	}
	
	# model region
	# ================================
	public function getPropinsi(){
		$sql = "select * from propinsi order by provinsi_id asc";
		return $this->db->query($sql)->result_array();
	}

	public function getKabupaten($pid){
		$sql = "select * from kabupaten where provinsi_id = '$pid' order by kota_id asc";
		return $this->db->query($sql)->result_array();
	}

	public function getKecamatan($kid){
		$sql = "select * from kecamatan where kota_id = '$kid' order by kecam_id asc";
		return $this->db->query($sql)->result_array();
	}
	

}