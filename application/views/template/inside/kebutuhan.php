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
								<td>Jenis</td>
								<td>Status</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($kebutuhan)){ $no=0; foreach($kebutuhan as $keb){ $no++; ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $keb['name'].'<br/>'.$keb['description'];?></td>
								<td><?php echo generate_type_kebutuhan($keb['type']);?></td>
								<td><?php echo $keb['status'] == 1 ? '<span class="label label-success">Terpenuhi</label>':'<span class="label label-default">Belum</label>';?></td>
								<td width="100">
									<span class="btn-group">
										<a href="<?php echo base_url().'inside/requirement/edit/'.$keb['id'];?>" class="btn btn-default" title="Edit"><i class="fa fa-edit"></i></a>
										<a href="#" data-toggle="modal" data-target="#modalChange" title="Terpenuhi" class="btn btn-default" title="Ubah Status" onclick="return changeStatus('<?php echo $keb['id'];?>')"><i class="fa fa-check"></i></a>
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

<div id="modalChange" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title heading"><i class="fa fa-money"></i> Kebutuhan Telah Terpenuhi</h4>
      </div>
	  <form method="POST" action="<?php echo base_url().'inside/update_requirement/status';?>">
		<input type="hidden" name="id" id="idchange">
		  <div class="modal-body">
			<div class="msg">Apakah Anda ingin mengubah status kebutuhan komunitas?</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			<input type="submit" name="submit" class="btn btn-success" value="Terpenuhi">
		  </div>
	  </form>
    </div>
  </div>
</div>