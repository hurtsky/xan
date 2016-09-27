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
$pages 	  = Flux::config('FluxTables.PagesTable');
$id 	  = $params->get('id');
$sql 	  = "SELECT title FROM {$server->loginDatabase}.$pages WHERE id = ?";
$sth 	  = $server->connection->getStatement($sql);
$sth->execute(array($id));
$page	  = $sth->fetch();
$redirect = $auth->actionAllowed('pages', 'index') ? $this->url('pages', 'index') : null;

if ($page) {
    $sth = $server->connection->getStatement("DELETE FROM {$server->loginDatabase}.$pages WHERE id = ?");
    $sth->execute(array($id));
	$session->setMessageData(sprintf(Flux::message('PageDeleted')));
}
else {
	$session->setMessageData(Flux::message('PageNotFound'));
}
$this->redirect($redirect);
?>