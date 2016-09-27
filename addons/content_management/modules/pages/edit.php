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
$title = Flux::message('PageEditTitle');

// Form values.
$pages 	= Flux::config('FluxTables.PagesTable');
$id 	= $params->get('id');
$sql 	= "SELECT id, title, path, body, modified FROM {$server->loginDatabase}.$pages WHERE id = ?";
$sth 	= $server->connection->getStatement($sql);
$sth->execute(array($id));
$page 	= $sth->fetch();

if($page) {
	$title	= $page->title;
	$path	= $page->path;
	$body	= $page->body;
    
    if(count($_POST)) {
        $title = trim($params->get('page_title'));
		$path 	= trim($params->get('page_path'));
        $body 	= trim($params->get('page_body'));
        
        if($title === '') {
            $errorMessage = Flux::Message('PageTitleError');
		}
        elseif($path === '') {
            $errorMessage = Flux::Message('PagePathError');
        }
        elseif($body === '') {
            $errorMessage = Flux::Message('PageBodyError');    
        }                                                  
        else {
            $sql  = "UPDATE {$server->loginDatabase}.$pages SET ";
            $sql .= "title = ?, path = ?, body = ?, modified = NOW() ";
            $sql .= "WHERE id = ?";
            
            $sth = $server->connection->getStatement($sql);
            $sth->execute(array($title, $path, $body, $id)); 
			
            $session->setMessageData(Flux::message('PagesUpdated'));
            if ($auth->actionAllowed('pages', 'index')) {
                $this->redirect($this->url('pages','index'));
            }
            else {
                $this->redirect();
            }      
        }
    }
}
?>