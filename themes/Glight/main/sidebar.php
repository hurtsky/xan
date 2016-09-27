<?php
if (!defined('FLUX_ROOT')) exit;
$adminMenuItems = $this->getAdminMenuItems();
$menuItems = $this->getMenuItems();
?>


<ul class="nav nav-list">
    <?php if (!empty($menuItems)): ?>
    <?php foreach ($menuItems as $menuCategory => $menus): ?>
    
    <?php if($menuCategory != 'Account'): ?>
    
	<?php if (!empty($menus)): ?>
              <li class="nav-header"><?php echo htmlspecialchars($menuCategory) ?></li>
	<?php foreach ($menus as $menuItem):  ?>        
              <li><a href="<?php echo $menuItem['url'] ?>"><?php echo htmlspecialchars($menuItem['name']) ?></a></li>
	<?php endforeach ?>
	<?php endif ?>
    
    <?php endif; ?>
    
	<?php endforeach ?>   
    <?php endif ?>       
</ul>


<?php if (!empty($adminMenuItems) && !Flux::config('AdminMenuNewStyle')): ?>
<ul class="nav nav-list">
<?php foreach ($adminMenuItems as $menuItem): ?>
    <li><a href="<?php echo $this->url($menuItem['module'], $menuItem['action']) ?>"<?php
				if ($menuItem['module'] == 'account' && $menuItem['action'] == 'logout')
					echo ' onclick="return confirm(\'Are you sure you want to logout?\')"' ?>>
				<span><?php echo htmlspecialchars($menuItem['name']) ?></span>
			</a></li>
<?php endforeach ?>
</ul>
<?php endif; ?>


