<?php
if (!defined('FLUX_ROOT')) exit; 
/**
 * Please see /gthemes/config.php
 */
 
 $inc = 0;

?>
<style type="text/css">
#my_slider {
	width: 100%;
	height: 150px;
	overflow: hidden;
	position: relative;
	background: #000;
}

#my_slider .slide {
	left: 0;
	position: absolute;
	top: 0;
}

#my_slider .hidden {
	display: none;
}
</style>
<div id="my_slider">
<?php foreach($dr_images as $img => $key): ?>
	<a href="<?php echo $this->themePath('photos/'.$img) ?>" rel="lightbox" title="<?php echo $key ?>"><img src="<?php echo $this->themePath('photos/'.$img) ?>" class="slide <?php echo ($inc) ? 'hidden':'' ?>" alt=""/></a>
<?php 
	$inc+=1;
	endforeach; 
?>
</div>

<script>
$('#my_slider').revolver({transition: {type: 'slide'}});
</script>