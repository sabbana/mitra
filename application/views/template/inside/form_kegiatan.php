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
						$location = '';
						$desc = '';
						$start = '';
						$end = '';
						$action = 'create_activity';
						if(!empty($kegiatan)){
							$id = $kegiatan[0]['id'];
							$name = $kegiatan[0]['name'];
							$location = $kegiatan[0]['location'];
							$desc = $kegiatan[0]['description'];
							$start = $kegiatan[0]['date_start'];
							$end = $kegiatan[0]['date_end'];
							$action = 'update_activity';
						}
					?>

					<!-- main content -->
					<div class="col-md-9">
						<div class="toolbar">
							<div class="row">
								<div class="col-md-10"><h6><i class="fa fa-calendar"></i> Form Kegiatan</h6></div>
								<div class="col-md-2"><a href="<?php echo base_url().'inside/activity';?>" class="btn btn-primary btn-sm pull-right" title="Kembali ke daftar"><i class="fa fa-arrow-left"></i></a></div>
							</div>
						</div>
						
						<form method="POST" action="<?php echo base_url().'inside/'.$action;?>">
							<input type="hidden" name="id" value="<?php echo $id;?>">
							<div class="form-group">
								<label>Nama Kegiatan <span>*</span></label>
								<input type="text" name="name" class="form-control" placeholder="Nama Kegiatan" value="<?php echo $name;?>" required>
							</div>
							<div class="form-group">
								<label>Lokasi Kegiatan <span>*</span></label>
								<textarea name="location" class="form-control" rows="2" placeholder="Lokasi/Tempat Kegiatan" required><?php echo $location;?></textarea>
							</div>
							<div class="form-group">
								<label>Keterangan <span>*</span></label>
								<textarea name="description" class="form-control" rows="4" placeholder="Detail Kegiatan" required><?php echo $desc;?></textarea>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>Tgl. Mulai <span>*</span></label>
										<input type="text" name="date_start" class="form-control datepicker" value="<?php echo $start;?>">
									</div>
									<div class="col-md-6">
										<label>Tgl. Selesai <span>*</span></label>
										<input type="text" name="date_end" class="form-control datepicker" value="<?php echo $end;?>">
									</div>
								</div>
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
