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
$title	= Flux::message('NewsPage');
$news	= Flux::config('FluxTables.NewsTable'); 

$sql = "SELECT id, title, author, created, modified FROM {$server->loginDatabase}.$news ORDER BY id DESC";
$sth = $server->connection->getStatement($sql);
$sth->execute();

$news = $sth->fetchAll();
?>