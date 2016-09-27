<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php include ('gthemes/config.php') ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	<!--[if lt IE 9]>
	<script src="<?php echo $this->themePath('js/ie9.js') ?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitpngfix.js') ?>"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo $this->themePath('js/jquery-1.8.3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/jquery.revolver.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/lightbox.js') ?>"></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo $this->themePath('css/superfish.css') ?>" media="screen" />
	<script type="text/javascript" src="<?php echo $this->themePath('js/hoverIntent.js') ?>"></script>
	<script type="text/javascript" src="<?php echo $this->themePath('js/superfish.js') ?>"></script>
	
	<link rel="stylesheet" href="<?php echo $this->themePath('css/reset.css') ?>" />
	<link rel="stylesheet" href="<?php echo $this->themePath('css/text.css') ?>" />
	<link rel="stylesheet" href="<?php echo $this->themePath('css/960.css') ?>" />
	<link rel="stylesheet" href="<?php echo $this->themePath('css/main.css') ?>" />
	<link rel="stylesheet" href="<?php echo $this->themePath('css/lightbox.css') ?>" />
	
	
	<script type="text/javascript">
	jQuery(function(){jQuery('ul.sf-menu').superfish();});
	var theme_path = '<?php echo $this->themePath('') ?>';
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
		function reload(){
			window.location.href = '<?php echo $this->url ?>';
		}
	</script>

	<script type="text/javascript">
		function updatePreferredServer(sel){
			var preferred = sel.options[sel.selectedIndex].value;
			document.preferred_server_form.preferred_server.value = preferred;
			document.preferred_server_form.submit();
		}
		
		// Preload spinner image.
		var spinner = new Image();
		spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';
		
		function refreshSecurityCode(imgSelector){
			$(imgSelector).attr('src', spinner.src);
			
			// Load image, spinner will be active until loading is complete.
			var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
			var image = new Image();
			image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();
			
			$(imgSelector).attr('src', image.src);
		}
		function toggleSearchForm()
		{
			$('.search-form').slideToggle('fast');
		}
	</script>
	
	<?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
	<script type="text/javascript">
		 var RecaptchaOptions = {
			theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
		 };
	</script>
	<?php endif ?>
	</head>
    
<body>
<div id="line_top"></div>
<div id="gerome" class="container_12">

	<div id="top_a" class="grid_12">
        <!-- Start Server Status -->
            <div id="server_status" class="grid_6 suffix">
              <h1>Sever Status</h1>
                <div class="wrap">
                   <?php include('gthemes/include/server_status.php');?>
                </div>
            </div>
         <!-- End Server Status -->  
         <!-- Start Server Time --> 
            <div id="server_time" class="grid_4">
                <h6>Sever time</h6>
                    <div class="wrap">
                         <iframe src="http://free.timeanddate.com/clock/i3lz2b5y/n145/tlph/fn6/fs16/fcfff/tc000/ftb/bas2/bat0/bacfff/pa8/th2" frameborder="0" width="82" height="36"></iframe>
                    </div>
            </div>
         <!-- End Server Time --> 
	</div>
	
    <div class="grid_12">
    <img id="banner" src="<?php echo $this->themePath('img/banner.png') ?>" />
        <div id="menu">
            <div class="wrap">
                <?php  include 'main/sidebar.php' ?>
            </div>
        </div>
    </div>
   
    <!-- Start Left Sidebar -->
    <div id="leftbar" class="grid_3">
   <!-- Start login -->
    <div id="user_login">
        <div id="title"><font color="#dc7300">User</font>  Panel</div>
         <?php include 'main/loginbox.php' ?>
         <?php include 'gthemes/include/sidebar_login.php' ?>
    </div>
    <!-- End login -->
    <!-- Start Links -->
    <a href="<?php echo $qlink['register'] ?>"><img src="<?php echo $this->themePath('img/register.gif') ?>"/></a>
    <a href="<?php echo $qlink['download'] ?>"><img src="<?php echo $this->themePath('img/download.gif') ?>"/></a>
    <a href="<?php echo $qlink['vote4points'] ?>"><img src="<?php echo $this->themePath('img/v4p.png') ?>"/></a>
    <!-- End Link -->
    <!-- Start POM -->
    <div id="pom">
        <div id="title"><font color="#e97e00">Player</font> of the Month</div>
        <div id="content">
                <img src="<?php echo $this->themePath('img/pom.gif') ?>" title="Player of the Month" />
            <ul>
                <li><b id="name"><font color="#e97e00">Name: </font><?php echo $pom['name'] ?></b></li>
                <li><b id="ign"><font color="#e97e00">IGN: </font><?php echo $pom['ign'] ?></b></li>
            </ul>
        </div>
    </div>
    <!-- End POM -->
    </div>
    <!-- End Left Sidebar -->

   <!-- Start Right Bar -->
   <div class="clear"></div>
    <div id="rightbars" class="grid_3 psuh_9">
        <div id="woe_info">
            <div id="title">Woe <font color="#e97e00">Sched</font></div>
                <div id="content">
                    <?php include('gthemes/include/woe_info.php') ?>
                </div>
        </div>
        <!-- Start GOM -->
        <div id="gom">
            <div id="title"><font color="#e97e00">Guild</font> of the Month</div>
            <div id="content">
                <img src="<?php echo $this->themePath('img/gom.gif') ?>" title="Guild of the Month"/>
                <ul>
                    <li><b id="name"><font color="#e97e00">Guild: </font><?php echo $gom['guild'] ?> </b></li>
					<?php if(!isset($gom['master']) || !empty($gom['master'])): ?>
					<li><b id="name"><font color="#e97e00">GM: </font><?php echo $gom['master'] ?> </b></li>
					<?php endif; ?>
				</ul>
            </div>
        </div>
        <!-- End GOM -->
        <!-- Start ScreenShots -->
        <div id="screenshots">
            <div id="title">Screen <font color="#e97e00">shots</font></div>
            <div id="content">
                <div class="wrap">
                    <?php include 'gthemes/include/screen_shots.php' ?>
                </div>
            </div>
        </div>
		<!-- End ScreenShots -->
		  <!-- Start FB -->
		<div id="fb_pugins">
            <div id="title">Follow us on <font color="#e97e00">Facebook</font></div>
            <div id="content">
                <div class="wrap">
                    <?php include('gthemes/include/facebook_plugin.php') ?>
                </div>
            </div>
        </div>
         <!-- End FB -->
    </div>
     <!-- End Right Bar -->
    <!-- Start Content -->
    
    <div id="main_content" class="grid_6 push_3">
        
        <!-- <div id="top_middle"></div> -->
        <div id="content">
        <div class="wrap">
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