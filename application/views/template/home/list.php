<div class="section">
	<div class="content">
		<div class="container">
			<div class="row">
				<h2 class="heading">Mitra Komunitas</h2>
				<table class="table data-tables">
				<thead>
					<tr>
						<th>Komunitas</th>
						<th>Bidang</th>
					</tr>
				</thead>
				<tbody>
				<?php if(!empty($community)){ foreach ($community as $com){ if($com['id'] != 7){ ?>
					<tr>
						<td>
							<img src="<?php echo $com['logo'] ? $com['logo']:base_url().'assets/img/default_logo.png';?>" class="pull-left" width="150" style="margin:0 10px 10px 0">
							<?php echo "<h4>".$com['name']."</h4>".$com['description'];?>
							<hr/>
							<ul style="list-style:none;margin:0; padding:0">
								<li><i class="fa fa-map-marker"></i> Lokasi : <?php echo $com['address'] ? $com['address']:'---';?></li>
								<li><i class="fa fa-phone"></i> Phone : <?php echo $com['phone'] ? $com['phone']:'---';?></li>
								<li><i class="fa fa-envelope"></i> Email : <?php echo $com['email'] ? $com['email']:'---';?></li>
								<li><i class="fa fa-globe"></i> Website : <?php echo $com['website'] ? '<a target="_blank" href="'.$com['website'].'">'.$com['website'].'</a>':'---';?></li>
							</ul>
						</td>
						<td><?php echo $com['nama_bidang'];?></td>
					</tr>
				</tbody>
				<?php }}} ?>
				</table>
			</div>
		</div>
	</div>
</div>