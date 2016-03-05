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
								<div class="col-md-10"><h6><i class="fa fa-money"></i> Data Rekening Komunitas</h6></div>
								<div class="col-md-2"><a href="<?php echo base_url().'inside/account/add';?>" class="btn btn-primary btn-sm pull-right" title="Tambahkan Data Rekening Komunitas"><i class="fa fa-plus-circle"></i></a></div>
							</div>
						</div>
						<table class="table table-bordered data-tables">
						<thead>
							<tr>
								<td>No.</td>
								<td>Bank</td>
								<td>No.Rekening</td>
								<td>Atas Nama</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($rekening)){ $no=0; foreach($rekening as $rec){ $no++; ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $rec['bank'];?></td>
								<td><?php echo $rec['number'];?></td>
								<td><?php echo $rec['name'];?></td>
								<td>
									<span class="btn-group">
										<a href="<?php echo base_url().'inside/account/edit/'.$rec['id'];?>" class="btn btn-default" title="Edit"><i class="fa fa-edit"></i></a>
										<a href="#" data-toggle="modal" data-target="#modalHapus" class="btn btn-default" title="Hapus" onclick="return singleDelete('<?php echo $rec['id'];?>')"><i class="fa fa-trash"></i></a>
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
        <h4 class="modal-title heading"><i class="fa fa-money"></i> Hapus Rekening</h4>
      </div>
	  <form method="POST" action="<?php echo base_url().'inside/delete_rekening';?>">
		<input type="hidden" name="id" id="iddelete">
		  <div class="modal-body">
			<div class="msg">Apakah Anda yakin ingin menghapus data Rekening Komunitas?</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			<input type="submit" name="submit" class="btn btn-danger" value="Hapus">
		  </div>
	  </form>
    </div>
  </div>
</div>
