<?php
return [
	'Theme' => [
		'admin' => [
			'sidebar' => [
				'title' => 'A Kereső',
				
			],
			'sidebarMenu' => [
				'Admin' => [
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Categories'),
						'controller'=> 'Categories',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Companies'),
						'controller'=> 'Companies',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Company openings'),
						'controller'=> 'Companyopenings',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Persons'),
						'controller'=> 'Persons',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Person openings'),
						'controller'=> 'Personopenings',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Phones'),
						'controller'=> 'Phones',
						'action' 	=> 'index',
					],
					[
						'type' 		=> 'menu',
						'icon' 		=> 'fa fa-fw fa-bars',
						'title'		=> __('Emails'),
						'controller'=> 'Emails',
						'action' 	=> 'index',
					],

					[
						'type' 		=> 'submenu',
						'title'		=> __('Admin'),
						'icon'		=> 'fa fa-fw fa-table',
						'items'		=> [
							[
								'title'		=> __('Counties'),
								'controller'=> 'Counties',
								'action' 	=> 'index',
							],
							[
								'title'		=> __('Cities'),
								'controller'=> 'Cities',
								'action' 	=> 'index',
							],
							[
								'title' 		=> __('Setups'),
								'controller' 	=> 'Setups',
								'action' 		=> 'index',								
							],
						]
					],

				],				
			]		
		]	
	],

];

?>
