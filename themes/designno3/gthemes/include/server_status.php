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

			$serverStatus[$groupName][$serverName] = array(
				'loginServerUp' => $loginServerUp,
				 'charServerUp' => $athenaServer->charServer->isUp(),
				  'mapServerUp' => $athenaServer->mapServer->isUp(),
				
			);
		}
	}
?>

<?php foreach ($serverStatus as $privServerName => $gameServers): ?>
<ul id="serverStatus" class="cleanMP">
    <?php foreach ($gameServers as $serverName => $gameServer): ?>
    <li id="lblLogin" class="cleanM">&nbsp;<?php echo serverUpDownImage($gameServer['loginServerUp']) ?> </li>
    <li id="lblChar"  class="cleanM">&nbsp;<?php echo serverUpDownImage($gameServer['charServerUp']) ?></li>
    <li id="lblMap"   class="cleanM">&nbsp;<?php echo serverUpDownImage($gameServer['mapServerUp']) ?></li>
    <?php endforeach ?>              
</ul>
<?php endforeach ?>


