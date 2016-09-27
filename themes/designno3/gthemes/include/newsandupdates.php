<?php 
if (!defined('FLUX_ROOT')) exit;

$news_table = Flux::config('FluxTables.NewsTable');
$c=0;
$gtheme_errMsg = NULL;

if($news_table){

$sql = "SELECT title, body, link, author, created, modified FROM {$server->loginDatabase}.$news_table ORDER BY id DESC ";
$sql .= "LIMIT ".(int)Flux::config('LimitNews');
$sth = $server->connection->getStatement($sql);
$sth->execute();
$news = $sth->fetchAll();
}else{
	$gtheme_errMsg = 'FluxCMS Addons is not Installed. You can get it From rathena.org/download';
}
?>
<?php if($gtheme_errMsg): ?>
<p class="red"><?php echo $gtheme_errMsg ?></p>
<?php else: ?>
<?php if($news): ?>
<?php foreach($news as $nrow):?>
<ul class="item">
        <li class="title"><?php echo $nrow->title ?></li>
        <li class="postedby"><small>posted by: <?php echo $nrow->author ?></small></li>
        <li class="date"><small>-<?php echo $nrow->created?></small></li>
</ul>
<ul class="itemContentContainer cleanMP">
        <li class="itemContent cleanMP">
                <?php echo $nrow->body ?>
        </li>
        <li class="cleanMP">
        <?php if($nrow->created != $nrow->modified):?>
				<small class="date"><?php echo htmlspecialchars(Flux::message('ModifiedLabel')) ?> : <?php echo $nrow->modified ?></small>
			<?php endif; ?>
			<?php if($nrow->link): ?>
				<a class="news_link" href="<?php echo htmlspecialchars($nrow->link) ?>"><small><?php echo htmlspecialchars(Flux::message('NewsLink')) ?></small></a>
			<?php endif; ?>

		</li>
</ul>
<?php endforeach; ?>
	
<?php else: ?>
	<p><?php echo htmlspecialchars(Flux::message('NewsEmpty')) ?><br/><br/></p>
<?php endif; ?>
<?php endif; ?>