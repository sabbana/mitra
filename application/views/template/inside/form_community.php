<div class="section">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('template/inc/menu');?>
				</div>
				
				<!-- main content -->
				<div class="col-md-9">
					<div class="toolbar">
						<div class="row">
							<div class="col-md-10"><h6><i class="fa fa-edit"></i> Edit Data Komunitas</h6></div>
							<div class="col-md-2"><a href="<?php echo base_url().'inside/data';?>" class="btn btn-primary btn-sm pull-right" title="Kembali Ke Data"><i class="fa fa-arrow-left"></i></a></div>
						</div>
					</div>
					<?php $fd = date('d/m/Y', strtotime($komunitas[0]['founding_date']));?>
					<form method="POST" action="<?php echo base_url().'inside/update_community';?>" class="form">
						<input type="hidden" name="id" value="<?php echo $komunitas[0]['id'];?>">
						<div class="col-md-6">
							<h6>Informasi Umum</h6>
							<div class="form-group">
								<label>Nama Komunitas<span>*</span></label>
								<input type="text" name="name" class="form-control" placeholder="Nama komunitas" value="<?php echo $komunitas[0]['name'];?>" required>
							</div>
							<div class="form-group">
								<label>Jenis Komunitas<span>*</span></label>
								<select name="type" class="form-control" id="type" required>
									<option value="0" <?php echo $komunitas[0]['type'] == 0 ? 'selected':'';?>>Community</option>
									<option value="1" <?php echo $komunitas[0]['type'] == 1 ? 'selected':'';?>>Foundation</option>
								</select>
							</div>
							<div class="form-group akta" style="display:<?php echo $komunitas[0]['type'] == 1 ? 'block':'';?>">
								<label>Nomor Akta</label>
								<input type="text" name="legality" class="form-control" value="<?php echo $komunitas[0]['legality_number'];?>" placeholder="Nomor Akta Pendirian">
							</div>
							<div class="form-group">
								<label>Penanggungjawab<span>*</span></label>
								<input type="text" name="pic" class="form-control" placeholder="Nama Penanggungjawab" value="<?php echo $komunitas[0]['pic'];?>" required>
							</div>
							<div class="form-group">
								<label>Tanggal Berdiri</label>
								<input type="text" name="founding_date" class="form-control datepicker" placeholder="Tanggal berdiri" value="<?php echo $fd;?>">
							</div>
							<hr/>
							<div class="form-group">
								<label>Email<span>*</span></label>
								<input type="email" name="email" class="form-control" placeholder="Email Komunitas"  value="<?php echo $komunitas[0]['email'];?>" required>
							</div>
							<div class="form-group">
								<label>Phone<span>*</span></label>
								<input type="phone" name="phone" class="form-control" placeholder="Nomor Telepon"  value="<?php echo $komunitas[0]['phone'];?>" required>
							</div>
							<div class="form-group">
								<label>Website</label>
								<input type="url" name="website" class="form-control" placeholder="Website komunitas"  value="<?php echo $komunitas[0]['website'];?>">
							</div>
						</div>
						
						<div class="col-md-6">
							<h6>Kegiatan Komunitas</h6>
							<div class="form-group">
								<label>Bidang Kegiatan <span>*</span></label>
								<select name="field" class="form-control select2" required>
									<option value="">- Select Bidang -</option>
									<?php if (!empty($bidang)){ foreach ($bidang as $bid){?>
									<option value="<?php echo $bid['id'];?>" <?php echo $bid['id'] == $komunitas[0]['field']? 'selected':'';?>><?php echo $bid['nama_bidang'];?></option>
									<?php }} ?>
								</select>
							</div>
							<div class="form-group">
								<label>Tentang Komunitas <span>*</span></label>
								<div class="note">Uraian singkat tentang komunitas</div>
								<textarea name="description" class="form-control" rows="5" required><?php echo $komunitas[0]['description'];?></textarea>
							</div>
							<h6>Asal Daerah Komunitas</h6>
							
							<div class="form-group">
								<select name="region" class="form-control propinsi" required>
									<option value="">- Select Propinsi -</option>
									<?php if (!empty($propinsi)){ foreach ($propinsi as $pro){?>
									<option value="<?php echo $pro['provinsi_id'];?>" <?php echo $pro['provinsi_id'] == $komunitas[0]['region']? 'selected':'';?>>
									<?php echo $pro['provinsi_nama'];?></option>
									<?php }} ?>
								</select>
							</div>
							<div class="form-group">
								<select name="city" class="form-control kabupaten" required>
									<option value="<?php echo $komunitas[0]['city'];?>"><?php echo $komunitas[0]['kokab_nama'];?></option>
								</select>
							</div>
							<div class="form-group">
								<select name="district" class="form-control kecamatan">
									<option value="<?php echo $komunitas[0]['district'];?>"><?php echo $komunitas[0]['nama_kecam'];?></option>
								</select>
							</div>
							<div class="form-group">
								<label>Alamat Sekretariat</label>
								<textarea name="alamat" class="form-control" rows="2" placeholder="Detail lokasi"><?php echo $komunitas[0]['address'];?></textarea>
							</div>
							<div class="form-submit">
								<input type="submit" name="submit" class="btn btn-danger" value="Update">
								<input type="reset" name="reset" class="btn btn-primary" value="Cancel">
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>