<?php
 if (!defined('FLUX_ROOT')) exit;
 
 $query  = "SELECT `char`.name as char_name, guild.name as guild_name FROM {$session->loginAthenaGroup->loginDatabase}.`char` ";
 $query	.= "LEFT JOIN {$session->loginAthenaGroup->loginDatabase}.guild ";
 $query	.= "ON {$session->loginAthenaGroup->loginDatabase}.`char`.char_id = {$session->loginAthenaGroup->loginDatabase}.guild.char_id ";
 $query	.= "WHERE {$session->loginAthenaGroup->loginDatabase}.`char`.char_id = ? ";
 $sth = $session->loginAthenaGroup->connection->getStatement($query);
 $sth->execute(array($gtheme_config['char_id']));
 $gtheme_pom = $sth->fetchAll();

 //see gthemes/config.php
?>

<ul class="pgom">
<li>
	<img class="pom" src="<?php echo $this->themePath('img/'.$gtheme_config['pom_image']) ?>"/>
</li>
<?php if($gtheme_config['char_id']): ?>
<?php foreach($gtheme_pom as $pom): ?>
<li class="lbl" ><b>Name:&nbsp;</b>  <?php echo ($pom->char_name)? $pom->char_name:'???' ?></li>
<li class="lbl" ><b>Guild:&nbsp;</b> <?php echo ($pom->guild_name)? $pom->guild_name:'???' ?></li>
<?php endforeach; ?>
<?php else: ?>
<li class="lbl" ><b>Name:&nbsp;</b>  Gerome</li>
<li class="lbl" ><b>Guild:&nbsp;</b> rAthena</li>
<?php endif; ?>
</ul>
