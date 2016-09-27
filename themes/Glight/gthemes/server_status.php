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
				'loginServerUp' => $loginServerUp,
				 'charServerUp' => $athenaServer->charServer->isUp(),
				  'mapServerUp' => $athenaServer->mapServer->isUp(),
				'playersOnline' => intval($res ? $res->players_online : 0)
			);
		}
	}
	


?>
<?php foreach ($serverStatus as $privServerName => $gameServers): ?>
<table class="table table-condensed table-bordered">
            <caption><h4>Server Status</h4></caption>
            <thead>
                <tr>
                    <th>Char</th>
                    <th>Login</th>
                    <th>Map</th>
                </tr>
            </thead>
            <tbody>
            
                <tr>
                
                    <?php foreach ($gameServers as $serverName => $gameServer): ?>
                        <td><?php echo gthemes_serverUpDown($gameServer['loginServerUp']) ?></td>
                        <td><?php echo gthemes_serverUpDown($gameServer['charServerUp']) ?></td>
                        <td><?php echo gthemes_serverUpDown($gameServer['mapServerUp']) ?></td>
                    <?php endforeach ?>
                 
                </tr>
            </tbody>
</table>
 <table class="table table-condensed table-bordered">
 <thead>
    <th>Server</th>
    <th>Players Online</th>
 </thead>
 <tbody>
     <tr>
     <?php foreach ($gameServers as $serverName => $gameServer): ?>
        <td><i class="icon icon-home"></i>&nbsp;<?php echo htmlspecialchars($serverName) ?></td>
        <td><i class="icon icon-user"></i>&nbsp;<?php echo $gameServer['playersOnline'] ?></td>
     <?php endforeach ?>
     </tr>
 </tbody>
 
 </table>
 <?php endforeach ?>