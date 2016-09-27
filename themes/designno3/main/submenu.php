<?php
$adminMenuItems = $this->getAdminMenuItems();
$menuItems = $this->getMenuItems();
?>

<?php if (!empty($adminMenuItems) && !Flux::config('AdminMenuNewStyle')): ?>
<table id="admin_sidebar">
	<tr>
		<td><img src="<?php echo $this->themePath('img/sidebar_admin_complete_top.gif') ?>" /></td>
	</tr>
	<tr>
		<th class="menuitem"><strong>Admin Menu</strong></td>
	</tr>
	<?php foreach ($adminMenuItems as $menuItem): ?>
	<tr>
		<td class="menuitem">
			<a href="<?php echo htmlspecialchars($this->url($menuItem['module'], $menuItem['action'])) ?>"<?php
				if ($menuItem['module'] == 'account' && $menuItem['action'] == 'logout')
					echo ' onclick="return confirm(\'Are you sure you want to logout?\')"' ?>>
				<span><?php echo htmlspecialchars($menuItem['name']) ?></span>
			</a>
		</td>
	</tr>
	<?php endforeach ?>
	<tr>
		<td><img src="<?php echo $this->themePath('img/sidebar_admin_complete_bottom.gif') ?>" /></td>
	</tr>
</table>
<?php endif ?>



<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php $subMenuItems = $this->getSubMenuItems(); $menus = array() ?>
<?php if (!empty($subMenuItems)): ?>
	<div id="submenu">Menu:
	<?php foreach ($subMenuItems as $menuItem): ?>
		<?php $menus[] = sprintf('<a href="%s" class="sub-menu-item%s">%s</a>',
			$this->url($menuItem['module'], $menuItem['action']),
			$params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action'] ? ' current-sub-menu' : '',
			htmlspecialchars($menuItem['name'])) ?>
	<?php endforeach ?>
	<?php echo implode(' - ', $menus) ?>
	</div>
<?php endif ?>