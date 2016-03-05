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
						$name = '';
						$desc = '';
						$action = 'create_requirement';
						if(!empty($kebutuhan)){
							$id = $kebutuhan[0]['id'];
							$name = $kebutuhan[0]['name'];
							$desc = $kebutuhan[0]['description'];
							$action = 'update_requirement';
						}
					?>

					<!-- main content -->
					<div class="col-md-9">
						<div class="toolbar">
							<div class="row">
								<div class="col-md-10"><h6><i class="fa fa-calendar"></i> Form Kebutuhan</h6></div>
								<div class="col-md-2"><a href="<?php echo base_url().'inside/requirement';?>" class="btn btn-primary btn-sm pull-right" title="Kembali ke daftar"><i class="fa fa-arrow-left"></i></a></div>
							</div>
						</div>
						
						<form method="POST" action="<?php echo base_url().'inside/'.$action;?>">
							<input type="hidden" name="id" value="<?php echo $id;?>">
							<div class="form-group">
								<label>Nama Kebutuhan <span>*</span></label>
								<input type="text" name="name" class="form-control" placeholder="Ex : Mesin Jahit, Alat Peraga, SDM dll" value="<?php echo $name;?>" required>
							</div>
							<div class="form-group">
								<label>Keterangan <span>*</span></label>
								<div class="note">Deskripsikan mengenai kebutuhan komunitas Anda saat ini.</div>
								<textarea name="description" class="form-control" rows="4" placeholder="Detail Kebutuhan" required><?php echo $desc;?></textarea>
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
