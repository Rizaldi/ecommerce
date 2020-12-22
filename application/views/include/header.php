<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.ico" sizes="16x16">
	
	<title><?php echo $title; ?></title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/meanmenu.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/easy-autocomplete.css">
    <link rel="stylesheet" href="<?php echo base_url('') ?>public/css/easy-autocomplete.themes.css">


	<link rel="stylesheet" href="<?php echo base_url('') ?>public/fonts/iconfonts.css">
	<link rel="stylesheet" href="<?php echo base_url('') ?>public/css/plugins.css">
	<link rel="stylesheet" href="<?php echo base_url('') ?>public/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url('') ?>public/css/responsive.css">
	<link rel="stylesheet" href="<?php echo base_url('') ?>public/css/color.css">
	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
	<script type="text/javascript">
		var base_url = "<?php echo base_url(''); ?>";
	</script>
</head>
<body>
	<?php $this->load->view('include/menu_head'); ?>