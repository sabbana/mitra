<div class="section">
	<div class="content">
			<div class="container">
				<div class="row">
					<br/>
					<div class="col-md-4" style="margin:0 auto; float:none">
						<h2 class="heading"><i class="fa fa-lock"></i> Login</h2>
						<p align="center">Silakan masukkan username dan password komunitas Anda, Jika Anda telah terdaftar sebagai Mitra Komunitas Ilmuberbagi</p>
						<?php if($this->session->flashdata('error')){?>
						<p class="alert alert-warning"><i class="fa fa-warning"></i> <?php echo $this->session->flashdata('error');?></p>
						<?php } ?>
						<form method="POST" action="auth">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-action">
								<input type="submit" name="submit" class="btn btn-block btn-danger" value="Login">
							</div>
						</form><br/>
						<a href="<?php echo base_url().'join';?>" class="btn btn-primary btn-block">Jadilah Mitra</a>
					</div>
				</div>
			</div>	
		</div>		
	</div>			
</div>