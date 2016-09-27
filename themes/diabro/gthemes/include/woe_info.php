<?php 
if (!defined('FLUX_ROOT')) exit;
// please see gthemes/config.php
foreach($dr_woe_sched as $day => $castle): ?>
<?php 	echo $day.' - '.$castle.'<br />'; ?>
<?php endforeach; ?>
<br />
<?php echo $dr_woe_time; ?>