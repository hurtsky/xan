<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php include('gthemes/functions.php') ?>


<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Ragnarok Online">
        <meta name="author" content="John Gerome Baldonado">

		<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
		<?php endif ?>
		<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php if (Flux::config('EnableReCaptcha')): ?>
		<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php endif ?>
		<!--[if IE]>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux/ie.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<![endif]-->	
        
        
		<!-- Le styles -->
        <link href="<?php echo $this->themePath('') ?>gthemes-components/bootstrap/css/bootstrap.css" rel="stylesheet">
        
        <!--<link href="<?php echo $this->themePath('') ?>gthemes-components/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" >  -->
        <link href="<?php echo $this->themePath('') ?>css/gthemes.css" rel="stylesheet" >
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="<?php echo $this->themePath('') ?>favicon.ico" >
        <style type="text/css">
          body {
            padding-bottom: 40px;
          }
         
        </style>
        
	</head>
    
	<body>
    
    <div class="navbar navbar-inverse navbar-fixed-top ">
      <div class="main_menu navbar ">
        <div class="container" >
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse collapse">
          
          <!--
          <ul class="nav nav-pills">
          <li><a href="http://rathena.org"> rathena.org</a></li>
          <li><a href="http://ratemyserver.net"> ratemyserver</a></li>
          <li><a href="http://jiidesignstudio.com"> jiidesignstudio</a></li>
          </ul>
          -->
          
          <?php if ($session->isLoggedIn()): ?>
           <ul class="nav pull-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i>&nbsp;My Account<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $this->url('account','view') ?>">View Account</a></li>
                  <li><a href="<?php echo $this->url('history') ?>">History</a></li>
                  <li><a href="<?php echo $this->url('account','logout') ?>">Log-out</a></li>
                </ul>
            </li>
            </ul>
            <?php else: ?>
            
            <?php  $serverNames = $this->getServerNames();?>
            
            <form class="navbar-form pull-right" action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="POST">
            <?php if (count($serverNames) === 1): ?>
                <input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>" />
            <?php endif ?>
              
              <input class="span2" type="text" placeholder="Username" name="username">
              <input class="span2" type="password" placeholder="Password" name="password">
              <button type="submit" class="btn btn-primary"><?php echo htmlspecialchars(Flux::message('LoginButton')) ?></button>
              or 
              <a href="<?php echo $this->url('account','create') ?>" >Create</a>
            </form>
            <?php endif; ?>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

   <div class="row-fluid">
        <div class="row server-heading">
            <div class="span5 server-banner"></div>  
        </div>
    </div>
    
    
    <hr />
     <div class="container main_con">
     
     <br class="clearfix">
      <div class="row">
        <div class="span3">
        <!-- Server Status -->
        <?php include('gthemes/server_status.php') ?>
            
        
        
        
        
        <br class="clearfix"/>
        <!-- Main Menu -->
        <div class="well sidebar-nav">
        <?php include('main/sidebar.php'); ?>
        </div>
        
        </div><!--/span-->
        <div class="span9">
        
        
        <?php if($_GET['module'] == 'main' OR empty($_GET['module']) == true): ?>  
        <?php include('gthemes/slideshow.php') ?>
        <?php endif; ?>
        
        
        <?php include 'main/loginbox.php' ?>
        
          
          <div class="row">
            <div class="span9">


								<?php if (Flux::config('DebugMode') && @gethostbyname(Flux::config('ServerAddress')) == '127.0.0.1'): ?>
									<p class="notice">Please change your <strong>ServerAddress</strong> directive in your application config to your server's real address (e.g., myserver.com).</p>
								<?php endif ?>
								
								<!-- Messages -->
								<?php if ($message=$session->getMessage()): ?>
									<p class="message"><?php echo htmlspecialchars($message) ?></p>
								<?php endif ?>
								
								<!-- Sub menu -->
								<?php include 'main/submenu.php' ?>
								
								<!-- Page menu -->
								<?php include 'main/pagemenu.php' ?>
								
								<!-- Credit balance -->
								<?php if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>
