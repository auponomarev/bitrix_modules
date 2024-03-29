/**
 * @module crm/receive-payment/steps/send-message/instruction
 */
jn.define('crm/receive-payment/steps/send-message/instruction', (require, exports, module) => {
	const { Loc } = require('loc');
	const AppTheme = require('apptheme');
	const { PureComponent } = require('layout/pure-component');

	/**
	 * @class Instruction
	 */
	class Instruction extends PureComponent
	{
		constructor(props)
		{
			super(props);
			this.state = {
				isEditing: false,
			};
		}

		render()
		{
			return Text({
				text: Loc.getMessage(this.state.isEditing ? 'M_RP_SM_INSTRUCTION_EDITING' : 'M_RP_SM_INSTRUCTION_READ_ONLY'),
				style: {
					marginTop: 12,
					color: AppTheme.colors.base2,
					fontSize: 14,
					marginLeft: 16,
					marginRight: 16,
					opacity: 0.55,
				},
			});
		}
	}

	module.exports = { Instruction };
});
