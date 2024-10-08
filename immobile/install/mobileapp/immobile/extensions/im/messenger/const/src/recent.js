/**
 * @module im/messenger/const/recent
 */
jn.define('im/messenger/const/recent', (require, exports, module) => {
	const ChatTypes = Object.freeze({
		chat: 'chat',
		open: 'open',
		user: 'user',
		notification: 'notification',
	});

	const MessageStatus = Object.freeze({
		received: 'received',
		delivered: 'delivered',
		error: 'error',
	});

	const SubTitleIconType = Object.freeze({
		reply: 'reply',
		wait: 'wait',
		error: 'error',
	});

	module.exports = {
		ChatTypes,
		MessageStatus,
		SubTitleIconType,
	};
});
