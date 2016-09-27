<?php

  if (! defined('FLUX_ROOT')) exit;
  define('THEME_PATH', $this->themePath(''));
  
  /**
   *  Functions for Gtheme ( a Free Flux CP Theme )
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

  // filename of an image that represent that the Server is Online
  define('ONLINE_IMAGE', 'Online.png');
  // filename of an image that represent that the Server is Offline
  define('OFFLINE_IMAGE', 'Offline.png');

  function serverUpDownImage($bool)
  {
      $imgDown = THEME_PATH.'img/'.OFFLINE_IMAGE;
      $imgUp = THEME_PATH.'img/'.ONLINE_IMAGE;
      $class = $bool?'up':'down';
      return sprintf('<span class="%s">%s</span>', $class, $bool?'<img src="'.$imgUp.
          '"/>':'<img src="'.$imgDown.'"/>');
  }


  /**
   * @param	mixed	stylesheet hrefs
   * @param	string	rel
   * @param	string	type
   * @param	string	title
   * @param	string	media
   * @return String
   */
  function link_tag($href = '', $rel = 'stylesheet', $type = 'text/css', $title =
      '', $media = '', $charset = '')
  {
      if (strpos($href, '://'))
      {
          $link = '<link href="'.$href.'" rel="'.$rel.'" type="'.$type.'" ';

      } else
      {
          $link = '<link href="'.THEME_PATH.$href.'" rel="'.$rel.'" type="'.$type.'" ';
      }


      if ($title != '')
      {
          $title .= 'title="'.$title.'" ';
      }
      if ($media != '')
      {
          $link .= 'media="'.$media.'" ';
      }
      if ($charset != '')
      {
          $link .= 'charset ="'.$charset.'" ';
      }
      $link .= ' />';
      return $link."\n";
  }


  /**
   * @param	string	Source
   * @return String
   */
  function script_tag($src = '')
  {
      if (strpos($src, '://'))
      {
          $link = '<script type="text/javascript" src="'.$src.'"></script>';

      } else
      {
          $link = '<script type="text/javascript" src="'.THEME_PATH.$src.'"></script>';
      }

      return $link."\n";
  }

  /**
   * @param	string	Source
   * @return String
   */

  function img($src = '', $alt = '', $class = '', $width = '', $height = '', $title =
      '', $rel = '')
  {

      $img = '<img ';
      if (strpos($src, '://'))
      {
          $img .= 'src ="'.$src.'" ';
      } else
      {
          $img .= 'src ="'.THEME_PATH.$src.'" ';
      }
      if ($alt != '')
      {
          $img .= 'alt ="'.$alt.'" ';
      }
      if ($class != '')
      {
          $img .= 'class ="'.$class.'" ';
      }
      if ($width != '')
      {
          $img = 'width ="'.$width.'" ';
      }
      if ($height != '')
      {
          $img = 'height ="'.$height.'" ';
      }
      if ($title != '')
      {
          $img = 'title ="'.$title.'" ';
      }
      if ($rel != '')
      {
          $img = 'rel ="'.$rel.'" ';
      }

      $img .= '/>';

      return $img;
  }


  /* End of File */
  /* /gthemes/functions.php */
