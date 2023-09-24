<link href="<?php echo base_url('assets');?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendor/iCheck/minimal/blue.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendor/Ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendor/AdminLTE-2.4.3/css/AdminLTE.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendor/AdminLTE-2.4.3/css/skins/_all-skins.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendor/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets');?>/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src='<?php echo base_url('assets');?>/vendor/tinymce/tinymce.min.js'></script>
<script>

	tinymce.init({
		selector: '#mytextarea',
		menubar: 'file edit insert format',
		plugins: "link advlist wordcount",
		save_enablewhendirty: true,
	});

</script>
<style type="text/css">
	.ngepasin{
		background-color: #ecf0f5;
		margin-bottom: 50px;
		margin-top: 10px;
	}

	.example-modal .modal {
	  position: relative;
	  top: auto;
	  bottom: auto;
	  right: auto;
	  left: auto;
	  display: block;
	  z-index: 1;
	}
	a .alink{
		color: black;
	}
	.example-modal .modal {
	  background: transparent !important;
	}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131424865-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131424865-1');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W7FZLJX');</script>
<!-- End Google Tag Manager -->