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
								<div class="col-md-10"><h6><i class="fa fa-calendar"></i> Data Kebutuhan Komunitas</h6></div>
								<div class="col-md-2"><a href="<?php echo base_url().'inside/requirement/add';?>" class="btn btn-primary btn-sm pull-right" title="Tambahkan Kebutuhan Komunitas"><i class="fa fa-plus-circle"></i></a></div>
							</div>
						</div>
						<table class="table table-bordered data-tables">
						<thead>
							<tr>
								<td>No.</td>
								<td>Kebutuhan</td>
								<td>Status</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($kebutuhan)){ $no=0; foreach($kebutuhan as $keb){ $no++; ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $keb['name'].'<br/>'.$keb['description'];?></td>
								<td><?php echo $keb['status'] == 1 ? '<span class="label label-success">Terpenuhi</label>':'<span class="label label-default">Belum</label>';?></td>
								<td width="100">
									<span class="btn-group">
										<a href="<?php echo base_url().'inside/requirement/edit/'.$keb['id'];?>" class="btn btn-default" title="Edit"><i class="fa fa-edit"></i></a>
										<a href="<?php echo base_url().'inside/changeStatus/'.$keb['id'];?>" class="btn btn-default" title="Ubah Status"><i class="fa fa-check"></i></a>
									</span>
								</td>
							</tr>
							<?php }} ?>
						</tbody>
						</table>
					</div>
				</div>
			</div>	
		</div>		
	</div>
</div>
