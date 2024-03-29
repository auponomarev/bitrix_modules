/**
 * @module crm/entity-tab/type/traits/exclude-item
 */
jn.define('crm/entity-tab/type/traits/exclude-item', (require, exports, module) => {
	const { Alert } = require('alert');
	const { Loc } = require('loc');

	function excludeItem(action, itemId)
	{
		return new Promise((resolve, reject) => {
			Alert.confirm(
				Loc.getMessage('M_CRM_ENTITY_TAB_ACTION_EXCLUDE'),
				Loc.getMessage('M_CRM_ENTITY_TAB_ACTION_EXCLUDE_CONFIRMATION'),
				[
					{
						text: Loc.getMessage('M_CRM_ENTITY_TAB_ACTION_EXCLUDE_CONFIRMATION_OK'),
						type: 'destructive',
						onPress: () => {
							BX.ajax.runComponentAction('bitrix:crm.kanban', 'excludeEntity', {
								mode: 'ajax',
								data: {
									entityType: this.getName(),
									ids: [itemId],
								},
							}).then(() => {
								resolve({
									action: 'delete',
									id: itemId,
								});
							}).catch(({ errors }) => {
								console.error(errors);
								reject();
							});
						},
					},
					{
						type: 'cancel',
						onPress: reject,
					},
				],
			);
		});
	}

	module.exports = { excludeItem };
});
