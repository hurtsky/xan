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
$title = Flux::message('NewsEditTitle');

// Form values.
$news	= Flux::config('FluxTables.NewsTable');
$id		= $params->get('id');
$sql	= "SELECT id, title, body, link, author, modified FROM {$server->loginDatabase}.$news WHERE id = ?";
$sth	= $server->connection->getStatement($sql);
$sth->execute(array($id));
$new	= $sth->fetch();

if($new) {
    $title	= $new->title;
    $body	= $new->body;
    $link	= $new->link;
    $author	= $new->author;
    
    if(count($_POST)) {
        $title	= trim($params->get('news_title'));
        $body 	= trim($params->get('news_body'));
		$link 	= trim($params->get('news_link'));
		$author = trim($params->get('news_author'));
        
        if($title === '') {
            $errorMessage = Flux::Message('NewsTitleError');
        }
        elseif($body === '') {
            $errorMessage = Flux::Message('NewsBody');
        }
		elseif($author == '') {
				 $errorMessage = Flux::Message('NewsAuthor');
		}
		else {
			if($link) {
				if (!preg_match('!^http://!i', $news_link)) {
					$news_link = "http://$news_link";
				}
			}
			
			$sql = "UPDATE {$server->loginDatabase}.$news SET ";
			$sql .= "title = ?, body = ?, link = ?, author = ?, modified = NOW() ";
			$sql .= "WHERE id = ?";
			$sth = $server->connection->getStatement($sql);
			$sth->execute(array($title, $body, $link, $author, $id));
			
			$session->setMessageData(Flux::message('NewsUpdated'));
			if ($auth->actionAllowed('news', 'index')) {
				$this->redirect($this->url('news','index'));
			}
			else {
				$this->redirect();
			}           
		}
    }
}
?>