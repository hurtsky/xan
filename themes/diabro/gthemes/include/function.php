<?php
if (!defined('FLUX_ROOT')) exit;

    /**
     *  Functions for Gthemes ( a Free Flux CP Themes )
     *  Author: "Gerome" John Gerome Baldonado
     *  Email: johngerome@gmail.com
     *  http://rathena.org/board/user/715-gerome/
     */
     
     
     if(empty($_GET['module'])){
		$_GET['module'] = 'main';
	 }
 
    /**
     * =============================================================================================================
     *  The same function to serverUpdown  
     *  but instead of Text it will Display as Image
     *  it needs to be Configure first
     * -------------------------------------------------------------------------------------------------------------
     */
     
           
     define('IMAGE_PATH',$this->themePath('img'));// name of the Folder where you put all your images
     define('ONLINE_IMAGE','imgOnline.png');      // filename of an image that represent that the Server is Online
     define('OFFLINE_IMAGE','imgOffline.png');    // filename of an image that represent that the Server is Offline
     
     function serverUpDownImage($bool)
    {
        $imgDown = IMAGE_PATH.'/'.OFFLINE_IMAGE;
        $imgUp =  IMAGE_PATH.'/'.ONLINE_IMAGE;
        $class = $bool ? 'up' : 'down';
        return sprintf('<span class="%s">%s</span>', $class, $bool ? '<img src="'.$imgUp.'"/>' : '<img src="'.$imgDown.'"/>');
    }
    
    
/* End of File */
/* /gthemes/functions.php */