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
							<a href="<?php echo base_url().'community/donate';?>" class="btn btn-success btn-block">DONASI</a>
							<?php foreach ($rekening as $rek){?>
								<hr/>
								Bank <?php echo $rek['bank'];?><br/>
								No.Rek <?php echo $rek['number'];?><br/>
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
									<h6 class="">Tentang Komumitas</h6>
									<?php echo $community[0]['description'];?>
									<h6 class="">Sosial Media</h6>
									<?php echo $community[0]['facebook'] ? '<i class="fa fa-facebook-square"></i> '.$community[0]['facebook'].'<br/>':'';?>
									<?php echo $community[0]['twitter'] ? '<i class="fa fa-twitter-square"></i> '.$community[0]['twitter'].'<br/>':'';?>
									<?php echo $community[0]['googleplus'] ? '<i class="fa fa-google-plus-square"></i> '.$community[0]['googleplus'].'<br/>':'';?>
									
									<h6>Asal Komunitas</h6>
									<?php echo $community[0]['provinsi_nama'].', '.$community[0]['kokab_nama'].', '.$community[0]['nama_kecam'];?>
									
								</div>
							</div>
							
							<div class="col-md-12">
								<h6 class=""><i class="fa fa-calendar"></i> Agenda Kegiatan <?php echo $community[0]['name'];?></h6>
								<?php if(!empty($kegiatan)){ foreach($kegiatan as $keg){?>
									<div class="col-md-4">
										<div class="well">
											<h6 class=""><?php echo $keg['name'];?></h6>
											<small><?php echo $keg['description'];?></small>
											<br/><small><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($keg['date_start']));?>
											&nbsp; s/d &nbsp;
											<i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($keg['date_end']));?></small>
										</div>
									</div>
								<?php }}else{?>
								Belum ada agenda ...
								<?php } ?>
							</div>
							<div class="col-md-12">
								<h6 class=""><i class="fa fa-cubes"></i> Kebutuhan <?php echo $community[0]['name'];?> saat ini</h6>
								<?php if(!empty($kebutuhan)){ foreach($kebutuhan as $keb){?>
									<div class="col-md-4">
										<div class="thumbnail" style="padding:10px">
											<h6 class="title"><?php echo $keb['name'];?></h6>
											<small><?php echo $keb['description'];?></small>
										</div>
									</div>
								<?php }}else{?>
								Belum ada kebutuhan ...
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>		
	</div>
</div>
