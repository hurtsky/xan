<?php
/*-------------------------------------
// Created by: Harrison aka CalciumKid
---------------------------------------
// Released Exclusively for the RAthena
// development boards. Please do not
// redistribute my work without
// permission and leave all credits in
// tact.
---------------------------------------
// !!!THIS WORK IS COPYRIGHTED!!!
// Contact: calciumkid@live.com.au
-------------------------------------*/
if (!defined('FLUX_ROOT')) exit;
?>
<h2><?php echo $title ?></h2>
<?php echo $body ?>
<p><small><?php echo htmlspecialchars(Flux::message('ModifiedLabel')) ?> : <?php echo date('m-d-y',strtotime($modified))?></small></p>