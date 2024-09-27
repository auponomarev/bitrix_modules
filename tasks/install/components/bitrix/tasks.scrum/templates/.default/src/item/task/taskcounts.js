import {Dom, Tag, Text, Type} from 'main.core';

type TaskCounter = {
	color: string,
	value: number
}

type Params = {
	itemId: number|string,
	attachedFilesCount: number,
	checkListComplete: number,
	checkListAll: number,
	taskCounters: TaskCounter
}

export class TaskCounts
{
	constructor(params: Params)
	{
		this.setItemId(params.itemId);
		this.setAttachedFilesCount(params.attachedFilesCount);
		this.setCheckListComplete(params.checkListComplete);
		this.setCheckListAll(params.checkListAll);
		this.setTaskCounters(params.taskCounters);
	}

	setItemId(itemId: number|string)
	{
		this.itemId = (
			Type.isInteger(itemId) ? parseInt(itemId, 10) :
				(Type.isString(itemId) && itemId) ? itemId : Text.getRandom()
		);
	}

	setAttachedFilesCount(count: number)
	{
		this.attachedFilesCount = (Type.isInteger(count) ? parseInt(count, 10) : 0);
	}

	getAttachedFilesCount(): number
	{
		return this.attachedFilesCount;
	}

	setCheckListComplete(count: number)
	{
		this.checkListComplete = (Type.isInteger(count) ? parseInt(count, 10) : 0);
	}

	getCheckListComplete(): number
	{
		return this.checkListComplete;
	}

	setCheckListAll(count: number)
	{
		this.checkListAll = (Type.isInteger(count) ? parseInt(count, 10) : 0);
	}

	getCheckListAll(): number
	{
		return this.checkListAll;
	}

	setTaskCounters(taskCounter: TaskCounter)
	{
		if (Type.isUndefined(taskCounter))
		{
			taskCounter = {
				color: '',
				value: 0
			};
		}

		this.taskCounter = taskCounter;
	}

	getTaskCounters(): TaskCounter
	{
		return this.taskCounter;
	}

	renderIndicators(): ?HTMLElement|string
	{
		this.indicatorsNodeId = 'tasks-scrum-item-indicators-' + this.itemId;

		return Tag.render`
			<span id="${this.indicatorsNodeId}" class="task-title-indicators">
				<div class="task-attachment-counter ui-label ui-label-sm ui-label-light">
					<span class="ui-label-inner">${this.attachedFilesCount}</span>
				</div>
				<div class='task-checklist-counter ui-label ui-label-sm ui-label-light'>
					<span class='ui-label-inner'>${this.checkListComplete}/${this.checkListAll}</span>
				</div>
				<div class='task-comments-counter'>
					<div class='ui-counter ${this.taskCounter.color}'>
						<div class='ui-counter-inner'>${this.taskCounter.value}</div>
					</div>
				</div>
			</span>
		`;
	}

	onAfterAppend()
	{
		this.indicatorsNode = document.getElementById(this.indicatorsNodeId);

		this.attachmentNode = this.indicatorsNode.querySelector('.task-attachment-counter');
		this.checklistNode = this.indicatorsNode.querySelector('.task-checklist-counter');
		this.commentsNode = this.indicatorsNode.querySelector('.task-comments-counter');

		this.updateVisibility();
	}

	//todo update all object data and render
	updateIndicators(data: Object)
	{
		if (!this.indicatorsNode)
		{
			return;
		}

		if (data.attachedFilesCount)
		{
			this.attachedFilesCount = parseInt(data.attachedFilesCount, 10);
			this.attachmentNode.firstElementChild.textContent = this.attachedFilesCount;
		}
		if (data.checkListComplete)
		{
			this.checkListComplete = parseInt(data.checkListComplete, 10);
			this.checklistNode.firstElementChild.textContent = this.checkListComplete + '/' + this.checkListAll;
		}
		if (data.checkListAll)
		{
			this.checkListAll = parseInt(data.checkListAll, 10);
			this.checklistNode.firstElementChild.textContent = this.checkListComplete + '/' + this.checkListAll;
		}

		if (data.taskCounter)
		{
			this.setTaskCounters(data.taskCounter);

			const commentCounter = this.commentsNode.querySelector('.ui-counter');
			const innerCommentCounter = this.commentsNode.querySelector('.ui-counter-inner');

			commentCounter.className = `ui-counter ${Text.encode(this.taskCounter.color)}`;
			innerCommentCounter.textContent = parseInt(this.taskCounter.value, 10);
		}

		this.updateVisibility();
	}

	updateVisibility()
	{
		if (this.attachedFilesCount > 0)
		{
			this.showNode(this.attachmentNode);
		}
		else
		{
			this.hideNode(this.attachmentNode);
		}

		if (this.checkListAll > 0)
		{
			this.showNode(this.checklistNode);
		}
		else
		{
			this.hideNode(this.checklistNode);
		}

		if (this.taskCounter.value > 0)
		{
			this.showNode(this.commentsNode);
		}
		else
		{
			this.hideNode(this.commentsNode);
		}
	}

	showNode(node)
	{
		Dom.style(node, 'display', 'inline-flex');
	}

	hideNode(node)
	{
		Dom.style(node, 'display', 'none');
	}
}