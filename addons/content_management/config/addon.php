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
return array(
	// Defines how many news items to show on home page.
	'LimitNews' => 2,
	
	// - Menu and sub-menu items. (displayed on left nav & content sub menu)
	'MenuItems' => array(
		'Main Menu' => array(
			// Sample items for pages function.
            'Downloads' => array('module' => 'pages','action'=>'content&path=downloads'),
            'Rules' => array('module' => 'pages','action'=>'content&path=rules'),
            'Features' => array('module' => 'pages','action'=>'content&path=features'),
        ),
		'Content Management' => array(
			'News' => array('module' => 'news'),
			'Pages' => array('module' => 'pages'),
		)
	),
    'SubMenuItems' => array(
        'pages' => array(
            'index' => 'Manage',
            'add'   => 'Add'
        ),
        'news' =>   array(
            'index' =>  'Manage',
            'add'   =>  'Add News',
        ),
    ),
	
	// Do not touch this.
    'FluxTables' => array(
        'NewsTable' => 'cp_news',
        'PagesTable' => 'cp_pages',
    )
)
?>