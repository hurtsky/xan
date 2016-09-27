<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php require_once('gthemes/config.php') ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="Gerome" />
	<?php if (isset($metaRefresh)): ?>
	<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
	<?php endif ?>
	<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>  
	<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
	<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
	<?php if (Flux::config('EnableReCaptcha')): ?>
	<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
	<?php endif ?>	

	<?php echo script_tag('js/jquery.tools.min.js'); ?>
	<?php echo script_tag('js/jquery-1.8.3.min.js'); ?>
	<?php echo script_tag('js/flux.datefields.js'); ?>
	<?php echo script_tag('js/flux.unitip.js'); ?>
	<?php echo script_tag('js/jquery.jclock.js'); ?>     
	<?php echo script_tag('js/jui/jquery.ui.core.js'); ?>
	<?php echo script_tag('js/jui/jquery.ui.widget.js'); ?>
	<?php echo script_tag('js/jui/jquery.ui.tabs.js'); ?>
	<?php echo script_tag('js/jquery.revolver.min.js'); ?>
	<?php echo script_tag('js/lightbox.js'); ?>
	<?php echo script_tag('js/hoverIntent.js'); ?>
	<?php echo script_tag('js/superfish.js'); ?>
	<?php echo link_tag('css/superfish.css','stylesheet','','','screen'); ?>
	<?php echo link_tag('css/jquery.ui.tabs.css'); ?>
	<?php echo link_tag('css/reset.css'); ?>
	<?php echo link_tag('css/text.css'); ?>
	<?php echo link_tag('css/960.css'); ?>
	<?php echo link_tag('css/main.css'); ?>
	<?php echo link_tag('css/lightbox.css'); ?>
	<?php echo link_tag('favicon.ico','shortcut icon','image/ico'); ?>
	<!-- End Gthemes -->

	<script type="text/javascript">
	jQuery(function(){jQuery('ul.sf-menu').superfish();});
	var theme_path = '<?php echo $this->themePath('') ?>';
	</script>
	<script type="text/javascript">
	$(function() {
	  $( "#tabs" ).tabs();
	});
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
			//$('.search-form').toggle();
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
	
	<script type="text/javascript">
	$(document).ready(function(){$('#qckLogin').hover(function(){$(this).css('width', '370');});$('#qckLogin').mouseout(function(){$(this).width('270');});$('#qckVote4Points').hover(function(){$(this).css('width', '370');});$('#qckVote4Points').mouseout(function(){$(this).width('270');});$('#qckWriteReview').hover(function(){$(this).css('width', '370');});$('#qckWriteReview').mouseout(function(){$(this).width('270');});  $('#qckDonationInfo').hover(function(){$(this).css('width', '370');});$('#qckDonationInfo').mouseout(function(){$(this).width('270');});});
	</script>
	
	<script type="text/javascript">
		$(function($) {
		  var options = {
			format: '%I:%M:%S %p', // 12-hour with am/pm 
			fontFamily: 'Verdana, Times New Roman',
			fontSize: '14px',
			foreground: '#d2c58b',
			background: 'transparent'
		  }
		  $('.jclock').jclock(options);
		});
	  </script>
	<script type="text/javascript">
		$(document).ready(function(){
		   //Download
		  $('.img_qckVote4Points').hover(function() {
				$(this).attr('src','<?php echo $this->themePath('css/img/btnDownloadClient.png') ?>');
		   });
		  $('.img_qckVote4Points').mouseout(function() {
				$(this).attr('src','<?php echo $this->themePath('css/img/btnDownloadClient_hover.png') ?>');
		   });
		  //HelpDesk
		  $('.img_HelpDesk').hover(function() {
				$(this).attr('src','<?php echo $this->themePath('css/img/btnHelpDesk.png') ?>');
		   });
		  $('.img_HelpDesk').mouseout(function() {
				$(this).attr('src','<?php echo $this->themePath('css/img/btnHelpDesk_hover.png') ?>');
		   });
		 }); 
	</script>

</head>

<body>
<div id="headContainer">
    <!-- (Server Status/Online Players/Server Time) -->
    <div id="topContainer">
        <div class="wrapper container_12">
            <?php include('gthemes/include/server_status.php');?>
            <div id="onlinePlayerContainer" class="cleanMP"><b><?php include 'gthemes/include/online_player.php' ?></b></div>
            <div id="server_time" class="cleanMP">
                <b>Server Time</b>
                <div class="jclock"></div>
            </div>
        </div>
    </div>
    <!-- (Ragnarok Online Banner) -->
    <div id="bannerContainer">
        <div class="wrapper container_12">
            <img src="<?php echo $this->themePath('img/banner.png') ?>" />
        </div>
    </div>
    <!-- (Top Menu) -->
    <div id="menuContainer" class="container_12">
        <div class="grid_12">
        <?php  include 'main/sidebar.php' ?>
        </div>
    </div>
</div>

<div id="mainContentWrapper" class="container_12">
    <div id="leftbarContainer" class="grid_3">
    <!-- (Left Sidebar Links) -->
        <a class='inline' href="<?php echo $this->url('account','login'); ?>" title="Login Here" ><span id="qckLogin"></span></a>
        <a href="<?php echo $gtheme_qlink['voteforpoints'] ?>" title="Vote for Points"><span id="qckVote4Points"></span></a>
        <a href="<?php echo $gtheme_qlink['ratemyserver'] ?>" title="Write a Review"><span id="qckWriteReview"></span></a>
        <a href="<?php echo $gtheme_qlink['donationinfo'] ?>" title="Donation Info"><span id="qckDonationInfo"></span></a>
        <div id="MoreLinks">
            <a href="<?php echo $gtheme_qlink['download'] ?>" title="Download Client Here!"><img class="img_qckVote4Points leftlink" src="<?php echo $this->themePath('css/img/btnDownloadClient.png') ?>" /></a>
            <a href="<?php echo $gtheme_qlink['help_desk'] ?>" title="Click Here if you need Help"><img class="img_HelpDesk leftlink" src="<?php echo $this->themePath('css/img/btnHelpDesk.png') ?>" /></a>
        </div>
    <!-- (End Sidebar Links) -->
    </div>
    
    <div id="mainContentContainer" class="grid_7">
    <div id="showcaseContainer">
        <div id="slideShowContainer">
	<!-- (Slideshow) -->
	<div id="slideshow">
    <?php include 'gthemes/include/slideshow.php' ?>
    </div>
            
        </div>
	<!-- (Woe Schedule) -->	
        <div id="woeSchedContainer"></div>
    </div>
    <?php if($_GET['module'] == 'main'): ?>
    <h2>Welcome To <?php echo Flux::config('SiteTitle'); ?></h2>
    <div style="width: 500px; padding: 10px;" class="cleanMP">
    <div id="nuConteiner">
	<img src="<?php echo $this->themePath('css/img/newsAndUpdates.png') ?>" style="margin: 0px 0px 10px 0px;"/>
    <?php include 'gthemes/include/newsandupdates.php'; ?>
    </div>
    <div id="PvpRankContainer">
    <?php include('gthemes/include/pvpranking.php'); ?>
    </div>
    </div>
    <?php endif; ?> 
    <?php include 'main/loginbox.php' ?>
    <div id="contentWrapper">
		<?php if (Flux::config('DebugMode') && @gethostbyname(Flux::config('ServerAddress')) == '127.0.0.1'): ?>
			<p class="notice">Please change your <strong>ServerAddress</strong> directive in your application config to your server's real address (e.g., myserver.com).</p>
		<?php endif ?>
		<?php if ($message=$session->getMessage()): ?>
			<p class="message"><?php echo htmlspecialchars($message) ?></p>
		<?php endif ?>
		<?php include 'main/submenu.php' ?>
		<?php include 'main/pagemenu.php' ?>
		
		<?php if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>