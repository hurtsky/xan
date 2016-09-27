<?php
if (!defined('FLUX_ROOT')) exit;
	$serverStatus = array();
	foreach (Flux::$loginAthenaGroupRegistry as $groupName => $loginAthenaGroup) {
		if (!array_key_exists($groupName, $serverStatus)) {
			$serverStatus[$groupName] = array();
		}
		$loginServerUp = $loginAthenaGroup->loginServer->isUp();
		foreach ($loginAthenaGroup->athenaServers as $athenaServer) {
			$serverName = $athenaServer->serverName;
			$sql = "SELECT COUNT(char_id) AS players_online FROM {$athenaServer->charMapDatabase}.char WHERE online > 0";
			$sth = $loginAthenaGroup->connection->getStatement($sql);
			$sth->execute();
			$res = $sth->fetch();
			$serverStatus[$groupName][$serverName] = array(
				'playersOnline' => intval($res ? $res->players_online : 0)
			);
		}
	}
?>
<?php foreach ($serverStatus as $privServerName => $gameServers): ?>
    <?php foreach ($gameServers as $serverName => $gameServer): ?>
    <?php echo $gameServer['playersOnline'] ?>
    <?php endforeach ?>
<?php endforeach ?>


