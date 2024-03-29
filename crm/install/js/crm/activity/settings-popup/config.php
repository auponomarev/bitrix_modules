<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

return [
	'css' => 'dist/settings-popup.bundle.css',
	'js' => 'dist/settings-popup.bundle.js',
	'rel' => [
		'main.popup',
		'ui.buttons',
		'ui.notification',
		'main.date',
		'calendar.planner',
		'crm.datetime',
		'crm.activity.settings-popup',
		'main.core',
		'crm.timeline.tools',
		'ui.vue3',
		'ui.design-tokens',
	],
	'skip_core' => false,
];
