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
	'modules' => array(
		'pages' => array(
		// Pages are available to anyone on the site.
		// Page management is only available to ADMINs
            'index' 	=> AccountLevel::ADMIN,
            'add' 		=> AccountLevel::ADMIN,
            'delete' 	=> AccountLevel::ADMIN,
            'edit' 		=> AccountLevel::ADMIN,
			'content' 	=> AccountLevel::ANYONE,
		),
        'news'  => array(
		// News is available to anyone on the site.
		// News management is only available to ADMINs
            'index' 	=>  AccountLevel::ADMIN,
            'add' 		=>  AccountLevel::ADMIN,
            'edit' 		=>  AccountLevel::ADMIN,
            'delete' 	=>  AccountLevel::ADMIN,
            'views' 	=>  AccountLevel::ANYONE,
        ),
	),
)
?>