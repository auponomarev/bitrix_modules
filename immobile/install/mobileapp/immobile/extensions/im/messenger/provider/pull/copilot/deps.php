<?php

return [
	'extensions' => [
		'im:messenger/provider/pull/lib',
		'type',
		'loc',
		'utils/object',
		'im:messenger/core',
		'im:messenger/const',
		'im:messenger/lib/converter',
		'im:messenger/lib/element',
		'im:messenger/lib/helper',
		'im:messenger/lib/logger',
		'im:messenger/lib/params',
		'im:messenger/lib/counters',
		'im:messenger/lib/notifier',
		'im:messenger/lib/emitter',
		'im:messenger/lib/uuid-manager',
		'im:messenger/cache/share-dialog',
		'im:messenger/provider/service/sync',
		'im:chat/utils',
		'im:chat/messengercommon',
	],
	'bundle' => [
		'./src/dialog',
		'./src/message',
		'./src/file',
		'./src/user',
	],
];