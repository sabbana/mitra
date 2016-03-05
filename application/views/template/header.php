    <!-- navbar-->
    <header class="header">
      <div class="sticky-wrapper">
        <div role="navigation" class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#intro" class="navbar-brand scroll-to"><img src="<?php echo base_url().'assets/img/ib_logo.png';?>" alt="Mitra Komunitas Ilmu Berbagi Foundation"></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="<?php echo $this->uri->segment(1) != null ? '':'active';?>"><a href="<?php echo base_url();?>#intro">Home</a></li>
                <?php if ($this->uri->segment(1) == null){?>
                <li><a href="#about">Tentang Mitra Komunitas </a></li>
                <li><a href="#services">Manfaat</a></li>
                <li><a href="#mitra">Mitra Komunitas</a></li>
                <li><a href="#contact">Kontak</a></li>
				<?php if($this->session->userdata('logged') != 1){?>
					<li class="link"><a href="<?php echo base_url().'login';?>"><span class="label label-danger" style="cursor:pointer">Login</span></a></li>
				<?php }else{?>
					<li class="link"><a href="<?php echo base_url().'inside';?>"><span class="label label-danger" style="cursor:pointer">Inside</span></a></li>
				<?php } ?>
                <?php }else{?>
					<?php if($this->session->userdata('logged') != 1){?>
						<li class="<?php echo $this->uri->segment(1) == 'join' ? 'active':'';?>"><a href="<?php echo base_url().'join';?>">Join</a></li>
						<li><a class="link" href="<?php echo base_url().'login';?>"><span class="label label-danger" style="cursor:pointer">Login</span></a></li>
					<?php }else{?>
						<li><a class="link" href="<?php echo base_url().'auth/logout';?>"><i class="fa fa-sign-out"></i> Logout</span></a></li>
					<?php } ?>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- /.navbar-->
    
