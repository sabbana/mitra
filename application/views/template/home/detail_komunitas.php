<div class="section">
	<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-3"  style="text-align:center">
						<img src="<?php echo $community[0]['logo'] ? $community[0]['logo'] : base_url().'assets/img/default_logo.png';?>" class="img-reponsive" width="80%">
						<hr/>
						<span style="font-size:30px">
							<?php echo $community[0]['facebook'] ? '<a href="'.$community[0]['facebook'].'"><i class="fa fa-facebook-square"></i></a>':'';?>
							<?php echo $community[0]['twitter'] ? '<a href="'.$community[0]['facebook'].'"><i class="fa fa-twitter-square"></i></a>':'';?>
							<?php echo $community[0]['googleplus'] ? '<a href="'.$community[0]['googleplus'].'"><i class="fa fa-google-plus-square"></i></a>':'';?>
							<?php echo $community[0]['email'] ? '<a href="mailto:'.$community[0]['email'].'"><i class="fa fa-envelope"></i></a>':'';?>
						</span>
						<?php if(!empty($rekening)){ ?>
							<a href="#" data-toggle="modal" data-target="#modalDonate" class="btn btn-success btn-block">DONASI</a>
							<?php foreach ($rekening as $rek){?>
								<hr/>
								Bank <?php echo $rek['bank'];?><br/>
								No.Rek <b><?php echo $rek['number'];?></b><br/>
								A/n <?php echo $rek['name'];?>
							<?php } ?>
						<?php } ?>
					</div>
					
					<!-- main content -->
					<div class="col-md-9">
						<div class="toolbar">
							<div class="row">
								<div class="col-md-10"><h6><i class="fa fa-users"></i> <?php echo $community[0]['name'];?></h6></div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<h6>Sekilas tentang <?php echo $community[0]['name'];?><span class="pull-right btn btn-primary bdetail"><i class="fa fa-arrow-down"></i></span></h6>
								<p><?php echo $community[0]['description'];?></p>
							</div>
							<div class="col-md-12 detail" style="display:none">
								<div class="col-md-6 detail">
									<h6>Informasi Umum</h6>
									<table class="table-hover info">
										<tr><th>Nama Komunitas</th></tr>
										<tr><td><?php echo $community[0]['name'];?></td></tr>
										<tr><th>Jenis Komunitas</th></tr>
										<tr><td><?php echo $community[0]['type'] == 0? 'Community':'Foundation';?></td></tr>
										<tr><th>No Akta</th></tr>
										<tr><td><?php echo $community[0]['legality_number'] ? $community[0]['legality_number']:'-----';?></td></tr>
										<tr><th>Penanggungjawab</th></tr>
										<tr><td><?php echo $community[0]['pic'];?></td></tr>
										<tr><th>Alamat</th></tr>
										<tr><td><?php echo $community[0]['address'];?></td></tr>
										<tr><th>Email Komunitas</th></tr>
										<tr><td><?php echo $community[0]['email'];?></td></tr>
										<tr><th>Phone</th></tr>
										<tr><td><?php echo $community[0]['phone'];?></td></tr>
										<tr><th>Website</th></tr>
										<tr><td><?php echo $community[0]['website'] ? $community[0]['website'] : '-----';?></td></tr>
									</table>
									<br/>
								</div>
								<div class="col-md-6">
									<h6 class="">Bidang</h6>
									<?php echo $community[0]['nama_bidang'];?>
									<h6 class="">Sosial Media</h6>
									<?php echo $community[0]['facebook'] ? '<i class="fa fa-facebook-square"></i> '.$community[0]['facebook'].'<br/>':'';?>
									<?php echo $community[0]['twitter'] ? '<i class="fa fa-twitter-square"></i> '.$community[0]['twitter'].'<br/>':'';?>
									<?php echo $community[0]['googleplus'] ? '<i class="fa fa-google-plus-square"></i> '.$community[0]['googleplus'].'<br/>':'';?>
									
									<h6>Asal Komunitas</h6>
									<?php echo $community[0]['provinsi_nama'].', '.$community[0]['kokab_nama'].', '.$community[0]['nama_kecam'];?>
									
								</div>
							</div>
							
							<div class="col-md-6">
								<h6 class=""><i class="fa fa-calendar"></i> Agenda Kegiatan <?php echo $community[0]['name'];?></h6>
								<ul class="list-group">
									<?php if(!empty($kegiatan)){ foreach($kegiatan as $keg){?>
										<li class="list-group-item">
											<h6 class=""><?php echo $keg['name'];?></h6>
											<small><?php echo $keg['description'];?></small>
											<br/><small><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($keg['date_start']));?>
											&nbsp; s/d &nbsp;
											<i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($keg['date_end']));?></small>
										</li>
									<?php }}else{?>
										<li class="list-group-item">Belum ada kegiatan ...</li>
									<?php } ?>
								</ul>
							</div>
							<div class="col-md-6">
								<h6 class=""><i class="fa fa-cubes"></i> Kebutuhan <?php echo $community[0]['name'];?> saat ini</h6>
								<ul class="list-group">
									<?php if(!empty($kebutuhan)){ foreach($kebutuhan as $keb){?>
									<li class="list-group-item">
										<div class="title"><i class="fa fa-arrow-circle-right"></i> 
										<?php echo $keb['name'];?></div>
										<small><?php echo $keb['description'];?></small>
									</li>
									<?php }}else{?>
									<li class="list-group-item">Belum ada kebutuhan ...</li>
								<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>		
	</div>
</div>

<!-- modal delete media -->
<div class="modal inmodal" id="modalDonate" tabindex="-1" aria-hidden="true" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content animated fadeInRight">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<i class="fa fa-money modal-icon"></i>
				<h4 class="modal-title">Donasi</h4>
				<div class="font-bold">Konfimasi Donasi</div>
			</div>
			<form action="" method="POST">
				<div class="modal-body">
					
					<div class="form-group">
						<label>Nama Donatur <span>*</span></label>
						<input type="text" name="donatur" class="form-control" placeholder="Nama Donatur">
					</div>
					<div class="form-group">
						<label>Email <span>*</span></label>
						<input type="email" name="email" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Jenis Donasi <span>*</span></label>
						<select name="jenis" class="form-control type" required>
							<option value="">- Jenis Donasi -</option>
							<option value="0">Dana/Uang</option>
							<option value="1">Barang</option>
							<option value="2">Volunteer</option>
							<option value="3">Lainnya</option>
						</select>
					</div>
					<div class="form-group">
						<div class="input-group pilihan" id="dana">
							<span class="input-group-addon">
								<select name="mata_uang" style="font-size:0.8em">
									<option value="RP">RP</option>
									<option value="USD">USD</option>
									<option value="WON">WON</option>
								<select>
							</span>
							<input type="text" name="jumlah" class="form-control" placeholder="Masukkan Jumlah">
						</div>
						<div class="pilihan" id="barang">
							<input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang">
						</div>
						<div class="pilihan" id="volunteer">
							<input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
						</div>
						<div class="pilihan" id="lain">
							<input type="text" name="lain" class="form-control" placeholder="Masukkan Keterangan Donasi">
						</div>
					</div>
					<div class="form-group">
						<label>Tanggal Donasi <span>*</span></label>
						<input type="text" name="tanggal" class="form-control datepicker" placeholder="Tanggal Donasi">
					</div>

				</div>
				<div class="modal-footer">
					<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
					<input type="submit" name="submit" value="OK" class="btn btn-success">
				</div>
			</form>
		</div>	
	</div>
</div>

