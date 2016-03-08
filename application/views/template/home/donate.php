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
							<form method="POST" action="#">
								<div class="form-group">
									<label>Nama Donatur</label>
									<input type="text" name="name" class="form-control" placeholder="Nama Donatur">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>	
		</div>		
	</div>
</div>
