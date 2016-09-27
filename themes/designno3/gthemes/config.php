<?php
if (!defined('FLUX_ROOT')) exit; 


/**
* --------------------
* Quick Links
* --------------------
* You can use Full url path
*      Ex. = 'http://www.myro.com/cp/module=download&action=view';
* or Flux Helper Link.. $this->url('module', 'action');
*      Ex. = $this->url('account', 'view');
* 
*/
$gtheme_qlink['voteforpoints'] = $this->url('voteforpoints');
$gtheme_qlink['ratemyserver']  = 'http://ratemyserver.net';
$gtheme_qlink['donationinfo']  = '';

$gtheme_qlink['download']   = '';
$gtheme_qlink['help_desk']  = '';

/**
* --------------------
* PvP Ranking
* --------------------
*/
$minimumkills = 10;       // Minimum Kills of a player to show in the ladder..
$minimumRank  = 3;         // No of Player(s) that will Display in the ladder . If the value is 3 it will display 1st - 3rd


/**
* --------------------
*  Image Slider
* --------------------
* Put all you images in /photos/ folder.
* Format:
*	'<image_name>' => 'image title/caption',
*
*/

$gtheme_images = array(

	'image1.jpg' => 'Caption of Image1',
	'image2.jpg' => 'Caption of Image2',
	'image3.jpg' => 'Caption of Image3',
	'image4.jpg' => 'Caption of Image4',
);


/**
* --------------------
* POM and GOM Config
* --------------------
*/
$gtheme_config['pom_image']		= 'pom.gif'; // image_name w/ extension located in img folder
$gtheme_config['char_id'] 		= '';	 	 // char_id of the Player of the Month
$gtheme_config['guild_id'] 		= '';		 // guild_id of the Guild of the Month


/*============================
*	Facebook Fan Page
*=============================
* NOTE:
* http://facebook.com/<facebook_page_name>
* $gtheme_config['facebook_page_name'] = '/<facebook_page_name>';
*/

$gtheme_config['facebook_page_name'] = 'platform';




//======================================
require_once('include/function.php');
?>
