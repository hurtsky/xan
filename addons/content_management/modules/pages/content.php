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

// Form values.
$pages = Flux::config('FluxTables.PagesTable');
$path = trim($params->get('path'));

$sql = "SELECT title, body, modified FROM {$server->loginDatabase}.$pages WHERE path = ?";
$sth = $server->connection->getStatement($sql);
$sth->execute(array($path));

$pages = $sth->fetchAll();

if($pages) {
    foreach($pages as $prow) {
        $title		= $prow->title;
        $body		= $prow->body;
		$modified	= $prow->modified;
    }   
}
else {
    $this->redirect($this->url('main','index'));
}
?>
