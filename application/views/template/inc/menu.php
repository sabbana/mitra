<div class="logo" data-toggle="modal" data-target="#uploadLogo">
	<?php if($this->session->userdata('logo') == null){?>
		<img src="<?php echo base_url().'assets/img/default_logo.png';?>" class="img img-responsive">
	<?php }else{?>
		<img src="<?php echo $this->session->userdata('logo');?>" class="img img-responsive">
	<?php } ?>
</div>
<?php if($this->session->userdata('privilage') == 0){?>
<ul class="navigation">
	<li class="<?php echo $this->uri->segment(2) == ''?'current':'';?>"><a href="<?php echo base_url().'inside';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="<?php echo $this->uri->segment(2) == 'data'?'current':'';?>"><a href="<?php echo base_url().'inside/data';?>"><i class="fa fa-users"></i> Data Komunitas</a></li>
	<li class="<?php echo $this->uri->segment(2) == 'account'?'current':'';?>"><a href="<?php echo base_url().'inside/account';?>"><i class="fa fa-money"></i> Rekening Komunitas</a></li>
	<li class="<?php echo $this->uri->segment(2) == 'activity'?'current':'';?>"><a href="<?php echo base_url().'inside/activity';?>"><i class="fa fa-calendar"></i> Kegiatan Komunitas</a></li>
	<li class="<?php echo $this->uri->segment(2) == 'requirement'?'current':'';?>"><a href="<?php echo base_url().'inside/requirement';?>"><i class="fa fa-cubes"></i> Kebutuhan Komunitas</a></li>
</ul>
<?php }else{?>
<ul class="navigation">
	<li class="<?php echo $this->uri->segment(2) == ''?'current':'';?>"><a href="<?php echo base_url().'admin';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="<?php echo $this->uri->segment(2) == 'data'?'current':'';?>"><a href="<?php echo base_url().'admin/data';?>"><i class="fa fa-users"></i> Data Komunitas</a></li>
	<li class="<?php echo $this->uri->segment(2) == 'account'?'current':'';?>"><a href="<?php echo base_url().'admin/account';?>"><i class="fa fa-money"></i> Rekening Komunitas</a></li>
	<li class="<?php echo $this->uri->segment(2) == 'activity'?'current':'';?>"><a href="<?php echo base_url().'admin/activity';?>"><i class="fa fa-calendar"></i> Kegiatan Komunitas</a></li>
	<li class="<?php echo $this->uri->segment(2) == 'requirement'?'current':'';?>"><a href="<?php echo base_url().'admin/requirement';?>"><i class="fa fa-cubes"></i> Kebutuhan Komunitas</a></li>
</ul>
<?php }?>
<div id="uploadLogo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title heading"><i class="fa fa-image"></i> Ganti Logo Komunitas</h4>
      </div>
	  <form method="POST" enctype="multipart/form-data" action="<?php echo base_url().'inside/changelogo';?>">
		  <div class="modal-body">
			<p>Ganti Logo Komunitas Anda</p>
			<input type="file" name="logo" class="form-control" required>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			<input type="submit" name="submit" class="btn btn-danger" value="Upload">
		  </div>
	  </form>
    </div>

  </div>
</div>