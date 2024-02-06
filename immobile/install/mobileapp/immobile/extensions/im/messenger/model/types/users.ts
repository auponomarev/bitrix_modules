export type UsersModelState = {
	id: number,
	name: string,
	firstName: string,
	lastName: string,
	avatar: string,
	color: string,
	workPosition: string,
	gender: 'M' | 'F',
	extranet: boolean,
	network: boolean,
	bot: boolean,
	botData: {
		appId?: string | null,
		code?: string,
		isHidden?: boolean,
		isSupportOpenline?: boolean,
		type?: string,
	},
	connector: boolean,
	externalAuthId: string,
	status: string,
	idle: boolean,
	lastActivityDate: false | string,
	mobileLastDate: false | string,
	isOnline: boolean,
	isMobileOnline: boolean,
	birthday: string,
	isBirthday: boolean,
	absent: string,
	isAbsent: boolean,
	departments: Array<string>,
	departmentName: string,
	phones: {
		workPhone: string,
		personalMobile: string,
		personalPhone: string,
		innerPhone: string,
	}
};

export type UsersModelActions =
	'usersModel/setState'
	| 'usersModel/set'
	| 'usersModel/update'
	| 'usersModel/delete'
	| 'usersModel/merge'
	| 'usersModel/addShort'
	| 'usersModel/setFromLocalDatabase'

export type UsersModelMutation =
	'usersModel/set'
	| 'usersModel/setState'
	| 'usersModel/delete'
	| 'usersModel/merge'