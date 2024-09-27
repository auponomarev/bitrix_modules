;(function() {
	'use strict';

	BX.namespace('BX.Bizproc.WorkflowStartComponent');

	var Component = function(node, config)
	{
		this.node = node;
		this.config = config || {};
	};

	Component.prototype =
	{
		init: function()
		{
			this.replaceControls();
		},

		replaceControls: function()
		{
			var userControls = this.node.querySelectorAll('.bizproc-modern-type-control-wrapper-user');
			for (var i = 0; i < userControls.length; ++i)
			{
				this.replaceUserControl(userControls[i]);
			}
			var fileControls = this.node.querySelectorAll('.bizproc-modern-type-control-wrapper-file');
			for (i = 0; i < fileControls.length; ++i)
			{
				this.replaceFileControl(fileControls[i]);
			}
		},

		replaceUserControl: function(controlWrapperNode)
		{
			var config = {};
			var input = controlWrapperNode.querySelector('.bizproc-modern-type-control');

			config.valueInputName = input.name;
			config.multiple = BX.hasClass(input, 'bizproc-modern-type-control-multiple');
			config.required = BX.hasClass(input, 'bizproc-modern-type-control-required');
			
			BX.cleanNode(controlWrapperNode);
			
			new Destination(this, controlWrapperNode, config);
		},

		replaceFileControl: function(controlWrapperNode)
		{
			var input = controlWrapperNode.querySelector('.bizproc-modern-type-control');
			var isMultiple = BX.hasClass(input, 'bizproc-modern-type-control-multiple');
			var inputName = isMultiple ? input.name.replace('[n0]', '[]') : input.name;

			BX.cleanNode(controlWrapperNode);

			controlWrapperNode.appendChild(this.createFileControlNode(inputName));

			if (isMultiple)
			{
				var cloneButton = BX.create('span', {
					attrs: {
						className: 'webform-small-button webform-small-button-accept bizproc-modern-type-control-file-clone-button'
					},
					text: BX.message('BP_WS_CONTROL_CLONE'),
					events: {
						click: this.cloneFileControl.bind(this, controlWrapperNode, inputName)
					}
				});

				controlWrapperNode.appendChild(cloneButton);
			}
		},

		createFileControlNode: function(inputName)
		{
			var input = BX.create('input', {
				props: {
					type: 'file',
					name: inputName
				}
			});

			var buttonWrapper = BX.create('span', {
				attrs: {
					className: 'bizproc-modern-type-control-button'
				},
				children: [BX.create('span', {
					attrs: {
						className: 'webform-small-button'
					},
					text: BX.message('BP_WS_FILE_CHOOSE')
				}), input]
			});

			var label = BX.create('span', {
				attrs: {
					className: 'bizproc-modern-type-control-file-value-name'
				}
			});

			BX.bind(input, 'change', function()
				{
					label.textContent = this.parseFileLabel(input.value);
				}.bind(this)
			);

			return BX.create('div', {
				children: [buttonWrapper, label],
				attrs: {
					className: 'bizproc-modern-type-control-file-replaced'
				}
			})
		},

		cloneFileControl: function(controlWrapperNode, inputName)
		{
			controlWrapperNode.insertBefore(
				this.createFileControlNode(inputName),
				controlWrapperNode.lastChild
			);
		},

		parseFileLabel: function(str)
		{
			var i;
			if (str.lastIndexOf('\\'))
			{
				i = str.lastIndexOf('\\')+1;
			}
			else
			{
				i = str.lastIndexOf('/')+1;
			}
			return str.slice(i);
		},

		getAjaxUrl: function()
		{
			return this.config.ajaxUrl || '/bitrix/components/bitrix/bizproc.workflow.start/ajax.php';
		}
	};

	// -> Destination
	var Destination = function(component, container, config)
	{
		var me = this;

		this.container = container;
		this.itemsNode = BX.create('span');
		this.inputBoxNode = BX.create('span', {
			attrs: {
				className: 'feed-add-destination-input-box'
			}
		});
		this.inputNode = BX.create('input', {
			props: {
				type: 'text'
			},
			attrs: {
				className: 'feed-add-destination-inp'
			}
		});

		this.inputBoxNode.appendChild(this.inputNode);

		this.tagNode = BX.create('a', {
			attrs: {
				className: 'feed-add-destination-link'
			}
		});

		BX.addClass(container, 'bizproc-modern-destination');

		container.appendChild(this.itemsNode);
		container.appendChild(this.inputBoxNode);
		container.appendChild(this.tagNode);

		this.component = component;

		this.data = null;
		this.dialogId = BX.util.getRandomString(7);
		this.createValueNode(config.valueInputName || '');
		this.selected = config.selected ? BX.clone(config.selected) : [];
		this.selectOne = !config.multiple;
		this.required = config.required || false;

		BX.bind(this.tagNode, 'focus', function(e) {
			me.openDialog({bByFocusEvent: true});
			return BX.PreventDefault(e);
		});
		BX.bind(this.container, 'click', function(e) {
			me.openDialog();
			return BX.PreventDefault(e);
		});

		this.addItems(this.selected);

		this.tagNode.innerHTML = (
			this.selected.length <= 0
				? BX.message('BP_WS_DESTINATION_CHOOSE')
				: BX.message('BP_WS_DESTINATION_EDIT')
		);
	};

	Destination.prototype = {
		getData: function(next)
		{
			var me = this;

			if (me.ajaxProgress)
				return;

			me.ajaxProgress = true;
			BX.ajax({
				method: 'POST',
				dataType: 'json',
				url: me.component.getAjaxUrl(),
				data: {
					ajax_action: 'get_destination_data',
					sessid: BX.bitrix_sessid(),
					site: BX.message('SITE_ID')
				},
				onsuccess: function (response)
				{
					me.data = response.data || {};
					me.ajaxProgress = false;
					me.initDialog(next);
				}
			});
		},
		initDialog: function(next)
		{
			var i, me = this, data = this.data;

			if (!data)
			{
				me.getData(next);
				return;
			}

			var itemsSelected = {};
			for (i = 0; i < me.selected.length; ++i)
			{
				itemsSelected[me.selected[i].id] = me.selected[i].entityType
			}

			var items = {
				users : data.USERS || {},
				department : data.DEPARTMENT || {},
				departmentRelation : data.DEPARTMENT_RELATION || {}
			};
			var itemsLast =  {
				users: data.LAST.USERS || {}
			};

			if (!items["departmentRelation"])
			{
				items["departmentRelation"] = BX.SocNetLogDestination.buildDepartmentRelation(items["department"]);
			}

			if (!me.inited)
			{
				me.inited = true;
				var destinationInput = me.inputNode;
				destinationInput.id = me.dialogId + 'input';

				var destinationInputBox = me.inputBoxNode;
				destinationInputBox.id = me.dialogId + 'input-box';

				var tagNode = this.tagNode;
				tagNode.id = this.dialogId + 'tag';

				var itemsNode = me.itemsNode;

				BX.SocNetLogDestination.init({
					name : me.dialogId,
					searchInput : destinationInput,
					extranetUser :  false,
					bindMainPopup : {node: me.container, offsetTop: '5px', offsetLeft: '15px'},
					bindSearchPopup : {node: me.container, offsetTop : '5px', offsetLeft: '15px'},
					departmentSelectDisable: true,
					sendAjaxSearch: true,
					callback : {
						select : function(item, type, search, bUndeleted)
						{
							me.addItem(item, type);
							if (me.selectOne)
								BX.SocNetLogDestination.closeDialog();
						},
						unSelect : function (item)
						{
							if (me.selectOne)
								return;
							me.unsetValue(item.entityId);
							BX.SocNetLogDestination.BXfpUnSelectCallback.call({
								formName: me.dialogId,
								inputContainerName: itemsNode,
								inputName: destinationInput.id,
								tagInputName: tagNode.id,
								tagLink1: BX.message('BP_WS_DESTINATION_CHOOSE'),
								tagLink2: BX.message('BP_WS_DESTINATION_EDIT')
							}, item)
						},
						openDialog : BX.delegate(BX.SocNetLogDestination.BXfpOpenDialogCallback, {
							inputBoxName: destinationInputBox.id,
							inputName: destinationInput.id,
							tagInputName: tagNode.id
						}),
						closeDialog : BX.delegate(BX.SocNetLogDestination.BXfpCloseDialogCallback, {
							inputBoxName: destinationInputBox.id,
							inputName: destinationInput.id,
							tagInputName: tagNode.id
						}),
						openSearch : BX.delegate(BX.SocNetLogDestination.BXfpOpenDialogCallback, {
							inputBoxName: destinationInputBox.id,
							inputName: destinationInput.id,
							tagInputName: tagNode.id
						}),
						closeSearch : BX.delegate(BX.SocNetLogDestination.BXfpCloseSearchCallback, {
							inputBoxName: destinationInputBox.id,
							inputName: destinationInput.id,
							tagInputName: tagNode.id
						})
					},
					items : items,
					itemsLast : itemsLast,
					itemsSelected : itemsSelected,
					useClientDatabase: false,
					destSort: data.DEST_SORT || {},
					allowAddUser: false
				});

				BX.bind(destinationInput, 'keyup', BX.delegate(BX.SocNetLogDestination.BXfpSearch, {
					formName: me.dialogId,
					inputName: destinationInput.id,
					tagInputName: tagNode.id
				}));
				BX.bind(destinationInput, 'keydown', BX.delegate(BX.SocNetLogDestination.BXfpSearchBefore, {
					formName: me.dialogId,
					inputName: destinationInput.id
				}));

				BX.SocNetLogDestination.BXfpSetLinkName({
					formName: me.dialogId,
					tagInputName: tagNode.id,
					tagLink1: BX.message('BP_WS_DESTINATION_CHOOSE'),
					tagLink2: BX.message('BP_WS_DESTINATION_EDIT')
				});
			}
			next();
		},
		addItem: function(item, type)
		{
			var me = this;
			var destinationInput = this.inputNode;
			var tagNode = this.tagNode;
			var items = this.itemsNode;

			if (!BX.findChild(items, { attr : { 'data-id' : item.id }}, false, false))
			{
				if (me.selectOne && me.inited)
				{
					var toRemove = [];
					for (var i = 0; i < items.childNodes.length; ++i)
					{
						toRemove.push({
							itemId: items.childNodes[i].getAttribute('data-id'),
							itemType: items.childNodes[i].getAttribute('data-type')
						})
					}

					me.initDialog(function() {
						for (var i = 0; i < toRemove.length; ++i)
						{
							BX.SocNetLogDestination.deleteItem(toRemove[i].itemId, toRemove[i].itemType, me.dialogId);
						}
					});

					BX.cleanNode(items);
					me.cleanValue();
				}

				var container = this.createItemNode({
					text: item.name,
					deleteEvents: {
						click: function(e) {
							if (me.selectOne && me.required)
							{
								me.openDialog();
							}
							else
							{
								me.initDialog(function() {
									BX.SocNetLogDestination.deleteItem(item.id, type, me.dialogId);
									BX.remove(container);
									me.unsetValue(item.entityId);
								});
							}
							BX.PreventDefault(e);
						}
					}
				});

				this.setValue(item.entityId);

				container.setAttribute('data-id', item.id);
				container.setAttribute('data-type', type);

				items.appendChild(container);

				if (!item.entityType)
					item.entityType = type;
			}

			destinationInput.value = '';
			tagNode.innerHTML = BX.message('BP_WS_DESTINATION_EDIT');
		},
		addItems: function(items)
		{
			for(var i = 0; i < items.length; ++i)
			{
				this.addItem(items[i], items[i].entityType)
			}
		},
		openDialog: function(params)
		{
			var me = this;
			this.initDialog(function()
			{
				BX.SocNetLogDestination.openDialog(me.dialogId, params);
			})
		},
		destroy: function()
		{
			if (this.inited)
			{
				if (BX.SocNetLogDestination.isOpenDialog())
				{
					BX.SocNetLogDestination.closeDialog();
				}
				BX.SocNetLogDestination.closeSearch();
			}
		},
		createItemNode: function(options)
		{
			return BX.create('span', {
				attrs: {
					className: 'bizproc-modern-destination-item'
				},
				children: [
					BX.create('span', {
						attrs: {
							className: 'bizproc-modern-destination-name'
						},
						html: options.text || ''
					}),
					BX.create('span', {
						attrs: {
							className: 'bizproc-modern-destination-delete'
						},
						events: options.deleteEvents
					})
				]
			});
		},
		createValueNode: function(valueInputName)
		{
			this.valueNode = BX.create('input', {
				props: {
					type: 'hidden',
					name: valueInputName
				}
			});

			this.container.appendChild(this.valueNode);
		},
		setValue: function(value)
		{
			if (/^\d+$/.test(value))
				value = '['+ value +']';

			if (this.selectOne)
				this.valueNode.value = value;
			else
			{
				var i, newVal = [], pairs = this.valueNode.value.split(';');
				for (i = 0; i < pairs.length; ++i)
				{
					if (!pairs[i] || value == pairs[i])
						continue;
					newVal.push(pairs[i]);
				}
				newVal.push(value);
				this.valueNode.value = newVal.join(';');
			}

		},
		unsetValue: function(value)
		{
			if (/^\d+$/.test(value))
				value = '['+ value +']';

			if (this.selectOne)
				this.valueNode.value = '';
			else
			{
				var i, newVal = [], pairs = this.valueNode.value.split(';');
				for (i = 0; i < pairs.length; ++i)
				{
					if (!pairs[i] || value == pairs[i])
						continue;
					newVal.push(pairs[i]);
				}
				this.valueNode.value = newVal.join(';');
			}
		},
		cleanValue: function()
		{
			this.valueNode.value = '';
		}
	};
	// <- Destination

	BX.Bizproc.WorkflowStartComponent = Component;
})();