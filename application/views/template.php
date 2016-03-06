<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($title) ? $title : "Mitra Komunitas Ilmu Berbagi Foundation";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap and Font Awesome css-->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-awesome.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/themify-icons.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
	
	<!-- plugin custome style -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/plugins/select2/select2.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/plugins/toastr/toastr.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/plugins/datepicker/datepicker3.css';?>">
	
	
	
    <!-- Google fonts - Roboto Condensed for headings, Open Sans for copy-->
    <!-- link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,700%7COpen+Sans:300,400,700" -->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.red.css';?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css';?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url().'assets/img/ico.png';?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

	<?php
    $meta_page = "default";
    if(isset($page)) $meta_page = $page;
    if(file_exists(APPPATH."views/template/meta_top/{$meta_page}.php")) 
        $this->load->view("template/meta_top/{$meta_page}");
    ?>

</head>
<body data-spy="scroll" data-target="#navigation" data-offset="120">
	<!-- Header -->
	<?php $this->load->view("template/header");?>
	
	<!-- main -->
	<?php
	if (!empty($page))
		if(file_exists(APPPATH."views/template/{$page}.php"))
			$this->load->view("template/".$page);
	?>

	<!-- Footer -->
	<?php $this->load->view("template/footer");?>
		
    <!-- Javascript files-->
    <script src="<?php echo base_url().'assets/js/jquery-1.11.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
	<script>
		$(function(){
			$(".link").click(function(){
				window.location.href = $(".link > a").attr('href');
			});
			$(".select").select2();
		});
	</script>
    <script src="<?php echo base_url().'assets/js/jquery.sticky.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.scrollTo.min.js';?>"></script>
	
	<!-- plugin custome js -->
    <script src="<?php echo base_url().'assets/js/plugins/select2/select2.full.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/plugins/toastr/toastr.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/plugins/datepicker/bootstrap-datepicker.js';?>"></script>

    <?php
    if(file_exists(APPPATH."views/template/meta_bottom/{$meta_page}.php"))
        $this->load->view("template/meta_bottom/{$meta_page}");
    ?>
	<!-- lib alert -->
	<script>
		// toasr option initials
		toastr.options = {
			"closeButton" : true,
			"progressBar" : true,
			"positionClass" : "toast-bottom-right",
			"showDuration": "400",
			"hideDuration": "1000",
			"timeOut": "7000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	</script>
	<?php if($this->session->flashdata('success') !== NULL){ ?>
		<script type="text/javascript">
			toastr.success('<?php echo $this->session->flashdata("success");?>','Success!');
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('error') !== NULL){ ?>
		<script type="text/javascript">
	        toastr.error('<?php echo $this->session->flashdata("error");?>','Error!');
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('warning') !== NULL){ ?>	
		<script>
			toastr.warning('<?php echo $this->session->flashdata("warning");?>','Warning!');
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('info') !== NULL){ ?>	
		<script>
			toastr.info('<?php echo $this->session->flashdata("info");?>','Information!');
		</script>
	<?php } ?>
	
  </body>
</html>
