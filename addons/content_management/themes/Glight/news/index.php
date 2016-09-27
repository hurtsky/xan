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
$this->loginRequired();
?>
<h2><?php echo htmlspecialchars(Flux::message('NewsPage')) ?></h2>
<p>This news management system is an Add-on of Flux Control Panel. This allows you to add, edit, delete news.</p>
<?php if($news): ?>
	<table class="horizontal-table" width="100%">  
		<tr>
			<th><?php echo htmlspecialchars(Flux::message('NewsTitleLabel')) ?></th>    
			<th><?php echo htmlspecialchars(Flux::message('NewsAuthorLabel')) ?></th>    
			<th><?php echo htmlspecialchars(Flux::message('CreatedLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('ModifiedLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('ActionLabel')) ?></th>    
		</tr>
		<?php foreach($news as $nrow):?>
			<tr>
				<td><?php echo $nrow->title?></td>
				<td><?php echo $nrow->author?></td>
				<td><?php echo date('d-m-Y',strtotime($nrow->created))?></td>
				<td><?php echo date('d-m-Y',strtotime($nrow->modified))?></td>
				<td>
					<a href="<?php echo $this->url('news', 'edit', array('id' => $nrow->id)); ?>">Edit</a> |
					<a href="<?php echo $this->url('news', 'delete', array('id' => $nrow->id)); ?>" onclick="return confirm('<?php echo htmlspecialchars(Flux::message('ConfirmLabel')) ?>');">Delete</a>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
<?php else: ?>
	<p>
		<?php echo htmlspecialchars(Flux::message('NewsEmpty')) ?><br/><br/>
		<a href="<?php echo $this->url('news', 'add') ?>"><?php echo htmlspecialchars(Flux::message('CreateLabel')) ?></a>
	</p>
<?php endif ?>