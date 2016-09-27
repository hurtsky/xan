<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('LogoutHeading')) ?></h2>
<p><strong><?php echo htmlspecialchars(Flux::message('LogoutInfo')) ?></strong> 
<?php printf(Flux::message('LogoutInfo2'), $metaRefresh['location']) ?></p>
<div class="progress progress-striped active">
    <div class="bar" style="width: 100%;"></div>
</div>