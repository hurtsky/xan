<?php
if (!defined('FLUX_ROOT')) exit; 
/**
 *-------------------------------
 *  Theme: DiabRO
 *  Coded and Design by: Gerome
 *	Email: johngerome@gmail.com
 *--------------------------------
 */
 

/**
 *-------------
 *  Quick Links
 *------------
 * You can use FUll/Complete url path
 *      Ex. http://www.myro.com/cp/module=download&action=view
 * or Flux Helper Link.. $this->url('module', 'action');
 *      Ex. $this->url('account', 'view');
 * 
 */
 
 $qlink['register'] 	= $this->url('account', 'create');
 $qlink['download'] 	= 'http://www.myro.com/cp/module=download&action=view';
 $qlink['write_review'] = 'http://www.ratemyserver.net';
 $qlink['vote4points']  = $this->url('voteforpoints');
 
 /**
 *--------------------
 *  Image Slider
 *--------------------
 * Put all you images in /photos/ folder.
 * Format:
 *	'<image_path>' => 'image title/caption',
 *
 */
 
 $dr_images = array(

	'image1.jpg' => 'this is one of my favorite flower.',
	'image2.jpg' => 'this is cool',
	'image3.jpg' => '',
 
 );
 
 /**
 *--------------------
 *  Player of the Month
 *--------------------
 * Image is fix. if you want to resize the Image, Edit the css in css/main.css
 * To replace the image  :  name your image to pom.gif and save it to img folder
 */
 
 $pom['name']   =   'John Smith';
 $pom['ign']    =   'Gerome';
 
 
 /**
 *--------------------
 *  Guild of the Month
 *--------------------
 * Image is fix. if you want to resize the Image, Edit the css in css/main.css
 * To replace  the image :  name your image to gom.gif and save it to img folder
 */
 
 $gom['guild']   = 'Hukbalahap';
 $gom['master']  = 'Gerome'; //<-- this is Optional You can use <br> to Print next line 

 
 /**
 *--------------------
 *  WOE Schedule
 *--------------------
 */
 $dr_woe_time  = '6:00pm to 8:00pm';
 $dr_woe_sched = array(
	'Sunday' 	=>	'Kriemhild',
	'Monday' 	=>	'Kriemhild',
	'Tuesday' 	=>	'Kriemhild',
	'Wednesday' =>	'Kriemhild',
	'Thursday' 	=>	'Kriemhild',
	'Friday' 	=>	'Kriemhild',
	'Saturday' 	=>	'Kriemhild',
 );

 /**
 *--------------------
 *  Facebook Page
 *--------------------
 * NOTE:
 * http://facebook.com/<facebook_page_name>
 * $gtheme_config['facebook_page_name'] = '<facebook_page_name>';
 *
 */

$gtheme_config['facebook_page_name'] = 'platform';


//----------- Config End --------------------------
//==================================================
require_once('include/function.php')
?>