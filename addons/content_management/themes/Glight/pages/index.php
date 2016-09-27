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
<h2><?php echo htmlspecialchars(Flux::message('PagePage')) ?></h2>
<p>This content management system is an Add-on of Flux Control Panel. This allows you to add, edit, delete pages.</p>
<?php if($pages): ?>
	<table class="horizontal-table" width="100%">  
		<tr>
			<th><?php echo htmlspecialchars(Flux::message('PageTitleLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('ActionLabel')) ?></th>    
		</tr>
		<?php foreach($pages as $prow):?>
			<tr >
				<td><a href="<?php echo "/?module=pages&action=content&path=". $prow->path?>" title="View the <?php echo $prow->title?> Page"><?php echo $prow->title?></a></td>
				<td align="center">
					<a href="<?php echo $this->url('pages', 'edit', array('id' => $prow->id)); ?>">Edit</a> |
					<a href="<?php echo $this->url('pages', 'delete', array('id' => $prow->id)); ?>" onclick="return confirm('<?php echo htmlspecialchars(Flux::message('ConfirmLabel')) ?>');">Delete</a>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
<?php else: ?>
	<p>
		<?php echo htmlspecialchars(Flux::message('PageEmpty')) ?><br/><br/>
		<a href="<?php echo $this->url('pages', 'add') ?>">Create now?</a>
	</p>
<?php endif ?>