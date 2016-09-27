<?php

  if (! defined('FLUX_ROOT')) exit;

  /**
   *  Functions for Gthemes ( a Free Flux CP Themes )
   *  Author: "Gerome" John Gerome Baldonado
   *  Email: johngerome@gmail.com
   *  http://rathena.org/board/user/715-gerome/
   *  Website: jiidesignstudio.com
   */
  define('THEME_PATH', $this->themePath(''));

  /**
   * =============================================================================================================
   *  Customize ServerUpDown
   * -------------------------------------------------------------------------------------------------------------
   */
    function gthemes_serverUpDown($bool)
	{

		$class = $bool ? 'up' : 'down';
		return sprintf('<span class="%s label">%s</span>', $class, $bool ? 'Online' : 'Offline');
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
