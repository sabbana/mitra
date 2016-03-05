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
								<div class="col-md-10"><h6><i class="fa fa-users"></i> Data Komunitas</h6></div>
								<div class="col-md-2"><a href="<?php echo base_url().'inside/data/edit';?>" class="btn btn-primary btn-sm pull-right" title="Edit Data Komunitas">
								<i class="fa fa-edit"></i></a></div>
							</div>
						</div>
						
						<div class="col-md-6">
							<h6 class="">Data Komunitas</h6>
							<table class="table-hover info">
								<tr><th>Nama Komunitas</th></tr>
								<tr><td><?php echo $komunitas[0]['name'];?></td></tr>
								<tr><th>Jenis Komunitas</th></tr>
								<tr><td><?php echo $komunitas[0]['type'] == 0? 'Community':'Foundation';?></td></tr>
								<tr><th>No Akta</th></tr>
								<tr><td><?php echo $komunitas[0]['legality_number'] ? $komunitas[0]['legality_number']:'-----';?></td></tr>
								<tr><th>Penanggungjawab</th></tr>
								<tr><td><?php echo $komunitas[0]['pic'];?></td></tr>
								<tr><th>Alamat</th></tr>
								<tr><td><?php echo $komunitas[0]['address'];?></td></tr>
								<tr><th>Email Komunitas</th></tr>
								<tr><td><?php echo $komunitas[0]['email'];?></td></tr>
								<tr><th>Phone</th></tr>
								<tr><td><?php echo $komunitas[0]['phone'];?></td></tr>
								<tr><th>Website</th></tr>
								<tr><td><?php echo $komunitas[0]['website'] ? $komunitas[0]['website'] : '-----';?></td></tr>
							</table>
						</div>
						<div class="col-md-6">
							<h6 class="">Bidang</h6>
							<?php echo $komunitas[0]['nama_bidang'];?>
							<h6 class="">Tentang Komumitas</h6>
							<?php echo $komunitas[0]['description'];?>
							<h6 class="">Sosial Media</h6>
							<?php echo $komunitas[0]['facebook'] ? '<i class="fa fa-facebook-square"></i> '.$komunitas[0]['facebook'].'<br/>':'';?>
							<?php echo $komunitas[0]['twitter'] ? '<i class="fa fa-twitter-square"></i> '.$komunitas[0]['twitter'].'<br/>':'';?>
							<?php echo $komunitas[0]['googleplus'] ? '<i class="fa fa-google-plus-square"></i> '.$komunitas[0]['googleplus'].'<br/>':'';?>
							
						</div>
					</div>
				</div>
			</div>	
		</div>		
	</div>			
</div>