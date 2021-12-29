<?php

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

    'about' =>[
        'controller' => 'main',
        'action' => 'about',
    ],

    'price' =>[
        'controller' => 'main',
        'action' => 'price',
    ],

    'haircut/{id:\d+}' =>[
        'controller' => 'main',
        'action' => 'haircut',
    ],

    'gallery' =>[
        'controller' => 'main',
        'action' => 'gallery',
    ],

    'home' =>[
        'controller' => 'main',
        'action' => 'index',
    ],

    'haircuts' =>[
        'controller' => 'main',
        'action' => 'haircuts',
    ],

	'login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'register' => [
		'controller' => 'account',
		'action' => 'register',
	],

	'account/confirm/{token:\w+}' => [
		'controller' => 'account',
		'action' => 'confirm',
	],

	'profile' => [
        'controller' => 'account',
        'action' => 'profile',
    ],

    'profile/change' => [
        'controller' => 'account',
        'action' => 'change',
    ],

	'logout' => [
		'controller' => 'account',
		'action' => 'logout',
	],

	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],

    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],

    'admin/panel' => [
        'controller' => 'admin',
        'action' => 'panel',
    ],

    'admin/addhaircuts' => [
        'controller' => 'admin',
        'action' => 'addhaircuts',
    ],

    'admin/deletehaircut/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'deletehaircut',
    ],

    'admin/edithaircut/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edithaircut',
    ],

    'admin/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
    ],



];