<div class="section">
	<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<?php $this->load->view('template/inc/menu');?>
					</div>
					
					<?php
						# data rekening
						$id = '';
						$bank = '';
						$number = '';
						$name = '';
						$action = 'create_account';
						if(!empty($rekening)){
							$id = $rekening[0]['id'];
							$bank = $rekening[0]['bank'];
							$number = $rekening[0]['number'];
							$name = $rekening[0]['name'];
							$action = 'update_account';
						}
					?>
					
					<!-- main content -->
					<div class="col-md-9">
						<div class="toolbar">
							<div class="row">
								<div class="col-md-10"><h6><i class="fa fa-money"></i> Form Rekening</h6></div>
								<div class="col-md-2"><a href="<?php echo base_url().'inside/account';?>" class="btn btn-primary btn-sm pull-right" title="Kembali ke daftar"><i class="fa fa-arrow-left"></i></a></div>
							</div>
						</div>
						
						<form method="POST" action="<?php echo base_url().'inside/'.$action;?>">
							<input type="hidden" name="id" value="<?php echo $id;?>">
							<div class="form-group">
								<label>Nama Bank <span>*</span></label>
								<input type="text" name="bank" class="form-control" placeholder="Ex : BRI, BNI, BCA" value="<?php echo $bank;?>" required>
							</div>
							<div class="form-group">
								<label>No. Rekening <span>*</span></label>
								<input type="text" name="number" class="form-control" placeholder="Nomor Rekening" value="<?php echo $number;?>" required>
							</div>
							<div class="form-group">
								<label>Nama Pemilik <span>*</span></label>
								<input type="text" name="name" class="form-control" placeholder="Nama Pemilik Rekening" value="<?php echo $name;?>" required>
							</div>
							<div class="form-action">
								<input type="reset" name="reset" value="Batal" class="btn btn-primary">
								<input type="submit" name="submit" class="btn btn-danger" value="Simpan">
							</div>
						</form>
						
					</div>
				</div>
			</div>	
		</div>		
	</div>
</div>
