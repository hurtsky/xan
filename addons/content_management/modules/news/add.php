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
$title = Flux::message('NewsAddTitle');

// Form values.
$news	= Flux::config('FluxTables.NewsTable');
$title	= trim($params->get('news_title'));
$body	= trim($params->get('news_body'));
$link	= trim($params->get('news_link'));
$author	= trim($params->get('news_author'));

if(count($_POST))
{
    if($title === '') {
        $errorMessage = Flux::Message('NewsTitleError');
    }
    elseif($body === '') {
        $errorMessage = Flux::Message('NewsBody');
    }
    elseif($author === '') {
        $errorMessage = Flux::Message('NewsAuthor');
    }
	else {
		if($link) {
			if(!preg_match('!^http://!i', $link)) {
				$news_link = "http://$link";
			}
		}
		
        $sql = "INSERT INTO {$server->loginDatabase}.$news (title, body, link, author, created, modified)";
        $sql .= "VALUES (?, ?, ?, ?, NOW(), NOW())"; 
        $sth = $server->connection->getStatement($sql);
        $sth->execute(array($title, $body, $link, $author));
        
        $session->setMessageData(Flux::message('NewsAdded'));
        if ($auth->actionAllowed('news', 'index')) {
            $this->redirect($this->url('news','index'));
        }
        else {
            $this->redirect();
        }          
    }
}
?>