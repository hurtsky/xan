<?php if (!defined('FLUX_ROOT')) exit; ?>  
 </div>   
    </div>
    
    <div id="rightbarContainer" class="grid_3">
        <div id="rightTop"></div>
        <div id="rightbarContent">
            <div id="rightbarWrapper">
            <!--Start RightBar Content here! -->
                <div class="pom_gom">
                	<div id="tabs">
                		<ul>
                			<li><a href="#tabs-pom" id="apom" ><img src="<?php echo $this->themePath('img/pvp_tp.png') ?>"/></a></li>
                			<li><a href="#tabs-gom" id="agom" ><img src="<?php echo $this->themePath('img/emp_top.png') ?>"/></a></li>
                		</ul>
                		<div id="tabs-pom">
                				<?php include 'gthemes/include/pom.php' ?>
                		</div>
                		<div id="tabs-gom">
                				<?php include 'gthemes/include/gom.php' ?>
                		</div>
                	</div>
                </div>
				<div class="pom_gom" style="overflow: hidden;">
				    <?php include('gthemes/include/facebook_plugins.php'); ?>
				</div>
            <!-- End RightBar Content -->
            </div>
			
        </div>
        <div id="rightBottom"></div>
    </div>
</div>

<div id="footer">
<div class="container_12">
<div id="creditsContainer"></div>
<div id="copyrightContainer" class="grid_1">
<p>
    Copyright &copy; <?php echo date('Y');?>. <?php echo Flux::config('SiteTitle'); ?> <br />
    All other trademarks are property of Gravity & Lee Myounggjin (Studio DTDS).<br />and the Respective owners.<br />
    Design and Coded by:  <a href="http://rathena.org/board/user/715-gerome/">Gerome</a>
</p>
</div>
</div>
</div>
</body>
</html>