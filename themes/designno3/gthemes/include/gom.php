<?php
 if (!defined('FLUX_ROOT')) exit;
 

 $query  =  "SELECT name, master FROM {$session->loginAthenaGroup->loginDatabase}.guild WHERE guild_id = ? ";
 $sth = $session->loginAthenaGroup->connection->getStatement($query);
 $sth->execute(array($gtheme_config['guild_id']));
 $gtheme_gom = $sth->fetchAll();
 
?>

<ul class="pgom">

<?php if($gtheme_config['guild_id']): ?>
<?php 	foreach($gtheme_gom as $gom): ?>
<li>
	<img src="<?php echo $this->emblem($row->guild_id) ?>"/>
</li>
<li class="lbl" ><b>Guild:&nbsp;</b> <?php echo ($gom->name)? $gom->name:'???' ?> </li>
<li class="lbl" ><b>GM:&nbsp;</b> <?php echo ($gom->master)? $gom->master:'???' ?></li>
<?php 	endforeach; ?>
<?php else: ?>
<li>
	<img class="gom" src="<?php echo $this->themePath('img/empty.bmp') ?>"/>
</li>
<li class="lbl" ><b>Guild:&nbsp;</b> rAthena</li>
<li class="lbl" ><b>GM:&nbsp;</b> Gerome</li>
<?php endif; ?>
</ul>
