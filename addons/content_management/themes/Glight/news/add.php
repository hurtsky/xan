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
if (Flux::config('UseCleanUrls') == true && Flux::config('BaseURI') == '/') {
	$bpath = $this->basePath.FLUX_ADDON_DIR.'/content_management/';
} else if (Flux::config('UseCleanUrls') == true ) {
	$bpath = $this->basePath.'/'.FLUX_ADDON_DIR.'/content_management/';
} else {
	$bpath = FLUX_ADDON_DIR.'/content_management/';
}

?>
<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo $bpath.'tiny_mce/tiny_mce.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $bpath.'tiny_mce/tiny_settings.js'; ?>"></script>
<!-- /TinyMCE -->
<h2><?php echo htmlspecialchars(Flux::message('NewsAddTitle')) ?></h2>
<?php if (!empty($errorMessage)): ?>
    <p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
<?php endif ?>

<form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
	<table class="generic-form-table" width="100%"> 
        <tr>
            <th width="100"><label for="news_title"><?php echo htmlspecialchars(Flux::message('NewsTitleLabel')) ?></label></th>
            <td colspan="2"><input type="text" name="news_title" id="news_title" value="<?php echo htmlspecialchars($title) ?>"/></td>
        </tr>
        <tr>
            <th><label for="news_body"><?php echo htmlspecialchars(Flux::message('NewsBodyLabel')) ?></label></th>
            <td colspan="2">
				<textarea name="news_body" cols="70" class="cmsEnabled"><?php echo htmlspecialchars($body) ?></textarea>
			</td>
        </tr>
		<tr>
            <th><label for="news_link"><?php echo htmlspecialchars(Flux::message('NewsLinkLabel')) ?></label></th>
            <td width="100">
                <input type="text" name="news_link" id="news_link" value="<?php echo htmlspecialchars($link) ?>"/>
            </td>
			<td align="left"><?php echo htmlspecialchars(Flux::message('OptionalLabel')) ?></td>
        </tr>
	<tr>
            <th><label for="news_author"><?php echo htmlspecialchars(Flux::message('NewsAuthorLabel')) ?></label></th>
            <td width="100">
                <input type="text" name="news_author" id="news_author" value="<?php echo htmlspecialchars($author) ?>"/>
            </td>
			<td align="left"><?php echo htmlspecialchars(Flux::message('RequiredLabel')) ?></td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" value="Add" /></td>
        </tr>
    </table>
</form>