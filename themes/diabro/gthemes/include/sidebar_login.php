<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php  $serverNames = $this->getServerNames();?>

<?php if (!$session->isLoggedIn()): ?>
<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
	<?php if (count($serverNames) === 1): ?>
	<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>" />
	<?php endif ?>
	<table>
        <tr>
            <td><label>Username</label></td>
			<td><input type="text" name="username" id="username" value="<?php echo htmlspecialchars($params->get('username')) ?>" /></td>
		</tr>
        
        <tr>
            <td><label>Password</label></td>
			<td><input type="password" name="password" id="password" /></td>
		</tr>
	</table>
    <input type="submit" value="<?php echo htmlspecialchars(Flux::message('LoginButton')) ?>" id="login" />
</form>
<?php endif ?>

