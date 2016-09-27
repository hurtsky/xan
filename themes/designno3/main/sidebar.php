<?php
if (!defined('FLUX_ROOT')) exit;
$menuItems = $this->getMenuItems();
?>

<ul class="sf-menu" >
<?php if (!empty($menuItems)): ?>
	<?php foreach ($menuItems as $menuCategory => $menus): ?>
	<?php if (!empty($menus)): ?>	
	<li><a href="#"><?php echo htmlspecialchars($menuCategory) ?></a>
        <ul>
        	<?php foreach ($menus as $menuItem):  ?>
        	
        		<li>
        			<a href="<?php echo htmlspecialchars($menuItem['url']) ?>"<?php
        				if ($menuItem['module'] == 'account' && $menuItem['action'] == 'logout')
        					echo ' onclick="return confirm(\'Are you sure you want to logout?\')"' ?>>
        				<?php echo htmlspecialchars($menuItem['name']) ?>
        			</a>
        		</li>
        	<?php endforeach ?>
            </ul>
    </li>
	<?php endif ?>
	<?php endforeach ?>
<?php endif ?>
</ul>