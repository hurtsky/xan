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
$title = Flux::message('PageAddTitle');

// Form values.
$pages	= Flux::config('FluxTables.PagesTable'); 
$title	= trim($params->get('page_title'));
$path	= trim($params->get('page_path'));
$body	= trim($params->get('page_body'));

if(count($_POST))
{
    if($page_title === '') {
        $errorMessage = Flux::Message('PageTitleError');
    }
    elseif($page_path === '') {
        $errorMessage = Flux::Message('PagePathError');
    }
    elseif($page_body === '') {
        $errorMessage = Flux::Message('PageBodyError');    
    }                                                  
    else {
        $sql = "INSERT INTO {$server->loginDatabase}.$pages (title, path, body, modified)";
        $sql .= "VALUES (?, ?, ?, NOW())";
        $sth = $server->connection->getStatement($sql);
        $sth->execute(array($title, $path, $body)); 
		
        $session->setMessageData(Flux::message('PagesAdded'));
        if ($auth->actionAllowed('pages', 'index')) {
            $this->redirect($this->url('pages','index'));
        }
        else {
            $this->redirect();
        }      
    }
}
?>