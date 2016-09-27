<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php if (!$session->isLoggedIn()): ?>

<?php  $serverNames = $this->getServerNames();?>

<?php if (isset($errorMessage)): ?>

<?php else: ?>

<?php endif ?>

<div style='display:none'>
<div id='inline_content' style="padding:10px; ">
<form action="<?php echo htmlspecialchars($this->url('account', 'login', array('return_url' => $params->get('return_url')))) ?>" method="post">
	<?php if (count($serverNames) === 1): ?>
	<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>" />
	<?php endif ?>

       <ul id="txtwarp">
           <li><b>Username</b></li>
           <li><input type="text" name="username" id="username" value="" /></li>
           <li><b>Password</b></li>
           <li><input type="password" name="password" id="password" value=""/></li>
        </ul>
        
		<?php if (count($serverNames) > 1): ?>
		<tr>
			<th><label for="login_server"><?php echo htmlspecialchars(Flux::message('AccountServerLabel')) ?></label></th>
			<td>
				<select name="server" id="login_server"<?php if (count($serverNames) === 1) echo ' disabled="disabled"' ?>>
					<?php foreach ($serverNames as $serverName): ?>
					<option value="<?php echo htmlspecialchars($serverName) ?>"><?php echo htmlspecialchars($serverName) ?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<?php endif ?>
        
		<?php if (Flux::config('UseLoginCaptcha')): ?>
		<tr>
			<?php if (Flux::config('EnableReCaptcha')): ?>
			<th><label for="register_security_code"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label></th>
			<td><?php echo $recaptcha ?></td>
			<?php else: ?>
			<th><label for="register_security_code"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label></th>
			<td>
				<div class="security-code">
					<img src="<?php echo $this->url('captcha') ?>" />
				</div>
				<input type="text" name="security_code" id="register_security_code" />
				<div style="font-size: smaller;" class="action">
					<strong><a href="javascript:refreshSecurityCode('.security-code img')"><?php echo htmlspecialchars(Flux::message('RefreshSecurityCode')) ?></a></strong>
				</div>
			</td>
			<?php endif ?>
		</tr>
		<?php endif ?>

	<ul id="button" >
    <li><input type="submit" id="submit" value="log In" /></li>
    <a href="<?php echo htmlspecialchars($this->url('account','resetpass')) ?>" style="color: #ac1717; "> forgot password ?</a>&nbsp;<br />
	Don't have an Account ? <a href="<?php echo htmlspecialchars($this->url('account','create')) ?>" style="color: #ac1717; ">Register Here!</a>
    </ul>
</form>
</div>
</div>
<?php else: ?>
<div style='display:none'>
    <div id="inline_content" style='padding:10px; background:#fff;'>
        You are currently logged in as <strong><a href="<?php echo htmlspecialchars($this->url('account', 'view')) ?>" title="View account"><?php echo htmlspecialchars($session->account->userid) ?></a></strong>
    </div>
</div>
<?php endif ?>


