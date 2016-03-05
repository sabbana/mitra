<div class="section">
	<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<?php $this->load->view('template/inc/menu');?>
					</div>
					
					<!-- main content -->
					<div class="col-md-9">
						
						<h4 class="heading">Selamat Datang <?php echo $this->session->userdata('name');?></h4>
						<div class="row">
							<h6><i class="fa fa-calendar"></i> Agenda</h6>
							<?php if(!empty($agenda)){ foreach($agenda as $ag){?>
							<div class="col-lg-4 well" style="max-height:400px; margin:5px">
								<h5 class="heading"><?php echo $ag['name'];?></h5>
								<i class="fa fa-map-marker"></i> <?php echo $ag['location'] ? $ag['location']:'-----';?>
								<p><?php echo $ag['description'];?></p>
								<hr/>
								<i class="fa fa-calendar"></i> Mulai : <?php echo date('d/m/Y H:i', strtotime($ag['date_start']));?><br/> 
								<i class="fa fa-calendar"></i> Selesai : <?php echo date('d/m/Y H:i', strtotime($ag['date_end']));?>
							</div>
							<?php }} ?>
						</div>
						
					</div>
				</div>
			</div>	
		</div>		
	</div>			
</div>