<div class="section">
	<div class="content">
		<div class="container">
			<div class="row">
				<br/>
				<h3 class="heading">Jadilah Mitra Komunitas Kami</h3>

				<form method="POST" enctype="multipart/form-data" action="<?php echo base_url().'home/registration';?>">
					<div class="col-md-4">
						<h6>Informasi Umum</h6>
						<div class="form-group">
							<label>Nama Komunitas<span>*</span></label>
							<input type="text" name="name" class="form-control" placeholder="Nama komunitas" required>
						</div>
						<div class="form-group">
							<label>Jenis Komunitas<span>*</span></label>
							<select name="type" class="form-control" id="type" required>
								<option value="0">Community</option>
								<option value="1">Foundation</option>
							</select>
						</div>
						<div class="form-group akta" style="display:none">
							<label>Nomor Akta</label>
							<input type="text" name="legality" class="form-control" placeholder="Nomor Akta Pendirian">
						</div>
						<div class="form-group">
							<label>Penanggungjawab<span>*</span></label>
							<input type="text" name="pic" class="form-control" placeholder="Nama Penanggungjawab" required>
						</div>
						<div class="form-group">
							<label>Tanggal Berdiri</label>
							<input type="text" name="founding_date" class="form-control datepicker" placeholder="Tanggal berdiri">
						</div>
						<hr/>
						<div class="form-group">
							<label>Email<span>*</span></label>
							<input type="email" name="email" class="form-control" placeholder="Email Komunitas" required>
						</div>
						<div class="form-group">
							<label>Phone<span>*</span></label>
							<input type="phone" name="phone" class="form-control" placeholder="Nomor Telepon" required>
						</div>
						<div class="form-group">
							<label>Website</label>
							<input type="url" name="website" class="form-control" placeholder="Website komunitas">
						</div>
					</div>

					<div class="col-md-4">
						<h6>Kegiatan Komunitas</h6>
						<div class="form-group">
							<label>Bidang Kegiatan <span>*</span></label>
							<select name="field" class="form-control select2" required>
								<option value="">- Select Bidang -</option>
								<?php if (!empty($bidang)){ foreach ($bidang as $bid){?>
								<option value="<?php echo $bid['id'];?>"><?php echo $bid['nama_bidang'];?></option>
								<?php }} ?>
							</select>
						</div>
						<div class="form-group">
							<label>Tentang Komunitas <span>*</span></label>
							<div class="note">Uraian singkat tentang komunitas</div>
							<textarea name="description" class="form-control" rows="5" required></textarea>
						</div>
						<h6>Asal Daerah Komunitas</h6>
						
						<div class="form-group">
							<select name="region" class="form-control propinsi" required>
								<option value="">- Select Propinsi -</option>
								<?php if (!empty($propinsi)){ foreach ($propinsi as $pro){?>
								<option value="<?php echo $pro['provinsi_id'];?>"><?php echo $pro['provinsi_nama'];?></option>
								<?php }} ?>
							</select>
						</div>
						<div class="form-group">
							<select name="city" class="form-control kabupaten" required>
								<option value="">- Select Kabupaten -</option>
							</select>
						</div>
						<div class="form-group">
							<select name="district" class="form-control kecamatan">
								<option value="">- Select Kecamatan -</option>
							</select>
						</div>
						<div class="form-group">
							<label>Alamat Sekretariat</label>
							<textarea name="alamat" class="form-control" rows="2" placeholder="Detail Lokasi"></textarea>
						</div>
						<h6>Logo Komunitas</h6>
						<div class="form-group">
							<div class="note">Jenis file JPG/PNG, kurang dari 100 KB</div>
							<input type="file" name="logo" class="form-control" class="btn">
						</div>

					</div>
					<div class="col-md-4 section-gray" style="padding:10px">
						<h6>Jejaring Sosial</h6>
						<div class="form-group">
							<label>Facebook</label>
							<input type="url" name="facebook" class="form-control" placeholder="Facebook Page">
						</div>
						<div class="form-group">
							<label>Twitter</label>
							<input type="url" name="twitter" class="form-control" placeholder="Twitter">
						</div>
						<div class="form-group">
							<label>Google+</label>
							<input type="url" name="google" class="form-control" placeholder="Google+">
						</div>
						<div class="form-group">
							<label>Email Aktivasi <span>*</span></label>
							<div class="note">Kami akan mengirimkan email aktivasi ke email ini</div>
							<input type="email" name="email_active" class="form-control" placeholder="Email Aktivasi Akun">
						</div>
						<div class="form-submit">
							<input type="submit" name="submit" class="btn btn-danger" value="Register">
							<input type="reset" name="reset" class="btn btn-primary" value="Cancel">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>