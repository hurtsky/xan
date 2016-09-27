<?php if (!defined('FLUX_ROOT')) exit; ?>  
            </div>
        </div>
		<?php if($_GET['module'] == 'main'): ?>
           <!-- Start News and Updates -->
            <div id="news" class="grid_6">
                <div id="title">News and updates</div>
                <div id="content">
                     <?php include 'gthemes/include/news.php' ?>
                </div>
            </div>
            <!-- End News and Updates -->
			<?php endif; ?>
     </div>
    <!-- End COntent -->
 
     <!-- Start Footer -->
     <div id="footer" class="grid_12">
     <!-- start Credits -->
     <div id="credits" class="grid_10">
        <div id="design_by" class="grid_4 prefix_1">
            <ul>
                <li>Designed and Coded by:</li> 
                <li><a href="http://rathena.org/board/user/715-gerome/"><img src="<?php echo $this->themePath('img/gerome.png') ?>" title="View my Profile" /></a></li> 
            </ul>
        </div>
     </div>
     <!-- end Credits -->
     <!-- Start Copyright -->
     <div id="copyrights" class="grid_12">
        <p>Copyright <?php echo date('Y');?>. <?php echo Flux::config('SiteTitle'); ?> <br />
        All other trademarks are property of Gravity & Lee Myounggjin (Studio DTDS).<br />
        and the Respective owners.
        </p>
     </div>
     <!-- end Copyright -->
     </div>
     <!-- End Footer -->
</div>
</body>
</html>