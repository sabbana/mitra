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
								<div class="col-md-10"><h6><i class="fa fa-calendar"></i> Data Kegiatan Komunitas</h6></div>
								<div class="col-md-2"><a href="<?php echo base_url().'inside/activity/add';?>" class="btn btn-primary btn-sm pull-right" title="Tambahkan Kegiatan Komunitas"><i class="fa fa-plus-circle"></i></a></div>
							</div>
						</div>
						<table class="table table-bordered data-tables">
						<thead>
							<tr>
								<td>No.</td>
								<td>Nama Kegiatan</td>
								<td>Tgl. Mulai</td>
								<td>Tgl. Selesai</td>
								<td>Lokasi</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($kegiatan)){ $no=0; foreach($kegiatan as $keg){ $no++; ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $keg['name'].'<br/>'.$keg['description'];?></td>
								<td><?php echo date('d/m/Y H:i', strtotime($keg['date_start']));?></td>
								<td><?php echo date('d/m/Y H:i', strtotime($keg['date_end']));?></td>
								<td><?php echo $keg['location'];?></td>
								<td>
									<span class="btn-group">
										<a href="<?php echo base_url().'inside/activity/edit/'.$keg['id'];?>" class="btn btn-default" title="Edit"><i class="fa fa-edit"></i></a>
										<a href="#" onclick="return singleDelete('<?php echo $keg['id'];?>')" data-toggle="modal" data-target="#modalHapus" class="btn btn-default" title="Hapus"><i class="fa fa-trash"></i></a>
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

<div id="modalHapus" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title heading"><i class="fa fa-calendar"></i> Hapus Kegiatan</h4>
      </div>
	  <form method="POST" action="<?php echo base_url().'inside/delete_activity';?>">
		<input type="hidden" name="id" id="iddelete">
		  <div class="modal-body">
			<div class="msg">Apakah Anda yakin ingin menghapus data kegiatan Komunitas?</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			<input type="submit" name="submit" class="btn btn-danger" value="Hapus">
		  </div>
	  </form>
    </div>
  </div>
</div>