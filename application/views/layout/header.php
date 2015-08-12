<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OCR - Online Customer Records</title>
	<link href="<?=asset_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=asset_url()?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=asset_url()?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=asset_url()?>css/animate.css" rel="stylesheet">
    <link href="<?=asset_url()?>css/main.css" rel="stylesheet">
</head>
<body>
	<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=site_url()?>"><img src="<?=asset_url()?>images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if($is_logged_in)
                    {
                    ?>
                    	<li><a href="<?=site_url('profile/view');?>">Hi, <?php echo $this->session->userdata['logged_in']['firstname'];?></a></li>
                    	<li><a href="<?=site_url('user/logout');?>">Log Out</a></li>
                    <?php
                    }
                    else
                    {
                    ?>	
                    	<li <?php if($page_title == 'Register') echo 'class="active"'?>><a href="<?=site_url('user/register');?>">Register</a></li>
                    	<li <?php if($page_title == 'Login') echo 'class="active"'?>><a href="<?=site_url('user/login');?>">Log In</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </header><!--/header-->
    <section id="title" class="turquoise">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1><?=$page_title?></h1>
                    <p><?=$page_desc?></p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?=site_url()?>">Home</a></li>
                        <li class="active"><?=$page_title?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    


