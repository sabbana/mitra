<div class="section">
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="heading">Mitra Komunitas</h2>
					<div id="map_canvas" style="width:100%; height:400px"></div>
				</div>
				
				<hr/>
				<!-- agenda dan kebutuhan komunitas -->
				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item list-title"><i class="fa fa-calendar"></i> Agenda</li>
						<?php if (!empty($agenda)){ foreach($agenda as $ag){?>
						<li class="list-group-item">
							<b><?php echo $ag['name'];?></b><br/>
							<?php echo date('d/m/Y H:i', strtotime($ag['date_start']));?> s/d 
							<?php echo date('d/m/Y H:i', strtotime($ag['date_end']));?>
						</li>
						<?php } } ?>
					</ul>
				</div>
				
				<div class="col-md-6">
					<ul class="list-group">
						<li class="list-group-item list-title"><i class="fa fa-cubes"></i> Kebutuhan Komunitas</li>
						<?php if (!empty($kebutuhan)){ foreach($kebutuhan as $keb){?>
						<li class="list-group-item">
							<b><?php echo $keb['name'];?></b><br/>
							<?php echo $keb['nama_komunitas'];?> sedang membutuhkan <?php echo $keb['name'];?><br/>
							<a href="<?php echo base_url().'community/'.$keb['username'];?>">Lihat selengkapnya &raquo;</a>
						</li>
						<?php } } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>