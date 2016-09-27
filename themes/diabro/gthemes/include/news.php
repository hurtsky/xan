<?php
if (!defined('FLUX_ROOT')) exit;

$title	= Flux::message('NewsPage');
$news	= Flux::config('FluxTables.NewsTable'); 
if(!$news){
	echo '<p class="red">WARNING: FluxCMS is not Installed! Please download it in rathena.org</p>';
}else{
	$sql = "SELECT * FROM {$server->loginDatabase}.$news ORDER BY id DESC";
	$sth = $server->connection->getStatement($sql);
	$sth->execute();
	$news = $sth->fetchAll();
}
?>
<table cellpadding="20" cellspacing="10">
<?php if($news): ?>
<?php foreach($news as $nrow):?>
<tr>
    <td class="title">
	<b>
		<a href="<?php echo $this->url('news','view') ?>">
		<?php echo $nrow->title?>
		</a>
		</b><br/>
		<span class="author">Posted by: <strong><?php echo $nrow->author ?></strong></span>
	</td>
    <td class="date"><?php echo date('d-m-Y',strtotime($nrow->created))?></td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<p>No News has been added.</p>
<?php endif; ?>
</table>