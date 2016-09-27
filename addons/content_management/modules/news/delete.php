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
$news		= Flux::config('FluxTables.NewsTable');
$id			= $params->get('id');
$sql		= "SELECT title FROM {$server->loginDatabase}.$news WHERE id = ?";
$sth		= $server->connection->getStatement($sql);
$sth->execute(array($id));
$new		= $sth->fetch();
$redirect	= $auth->actionAllowed('news', 'index') ? $this->url('news', 'index') : null;

if ($new) {
    $sth = $server->connection->getStatement("DELETE FROM {$server->loginDatabase}.$news WHERE id = ?");
    $sth->execute(array($id));
	$session->setMessageData(sprintf(Flux::message('NewsDeleted'), $new->title));
}
else {
	$session->setMessageData(Flux::message('NewsNotFound'));
}
$this->redirect($redirect);
?>