<?
$MESS['TM_SCHEDULE_CREATE_TITLE'] = 'Создание рабочего графика';
$MESS['TM_SCHEDULE_EDIT_TITLE'] = 'Редактирование рабочего графика';
$MESS['TM_SCHEDULE_READ_TITLE'] = 'Просмотр рабочего графика';
$MESS['TIMEMAN_SCHEDULE_EDIT_DEFAULT_TITLE'] = 'Введите название графика';
$MESS['TIMEMAN_SCHEDULE_EDIT_SCHEDULE_TYPE_TITLE'] = 'График работы';
$MESS['TM_SCHEDULE_EDIT_SHIFT_PLAN_BTN_TITLE'] = 'Распределить смены';
$MESS['TIMEMAN_SCHEDULE_EDIT_NAME_TITLE'] = 'Название графика';
$MESS['TIMEMAN_SCHEDULE_EDIT_REPORT_PERIOD_TITLE'] = 'Отчетный период';
$MESS['TIMEMAN_SCHEDULE_EDIT_REPORT_PERIOD_START_WEEK_DAY_TITLE'] = 'Начало недели';
$MESS['TIMEMAN_SCHEDULE_EDIT_USERS_TITLE'] = 'Применить настройки к сотрудникам';
$MESS['TIMEMAN_SCHEDULE_EDIT_EXCLUDE_USERS_TITLE'] = 'Исключения';
$MESS['TIMEMAN_SCHEDULE_EDIT_EXCLUDE_USERS_SUB_TITLE'] = 'График применяется ко всем сотрудникам, за исключением выбранных ниже';
$MESS['TIMEMAN_SCHEDULE_EDIT_WORK_TIME_TITLE'] = 'Рабочее время';
$MESS['TIMEMAN_SCHEDULE_EDIT_WORK_DAYS_TITLE'] = 'Рабочие дни';
$MESS['TIMEMAN_SCHEDULE_EDIT_HOLIDAYS_TITLE'] = 'Выходные и праздничные дни';
$MESS['TIMEMAN_SCHEDULE_EDIT_HOLIDAYS_1_QUARTER'] = 'Первый квартал';
$MESS['TIMEMAN_SCHEDULE_EDIT_HOLIDAYS_2_QUARTER'] = 'Второй квартал';
$MESS['TIMEMAN_SCHEDULE_EDIT_HOLIDAYS_3_QUARTER'] = 'Третий квартал';
$MESS['TIMEMAN_SCHEDULE_EDIT_HOLIDAYS_4_QUARTER'] = 'Четвертый квартал';
$MESS['TIMEMAN_SCHEDULE_EDIT_BREAK_DURATION_TITLE'] = 'Перерыв';
$MESS['TIMEMAN_SCHEDULE_EDIT_ADD_WORK_TIME_TITLE'] = 'добавить время';
$MESS['TIMEMAN_SCHEDULE_EDIT_ADD_WORK_SHIFT_TITLE'] = 'добавить смену';
$MESS['TIMEMAN_SHIFT_EDIT_DEFAULT_NAME'] = 'Смена';
$MESS['TIMEMAN_SCHEDULE_FOR_ALL_USERS_WARNING'] = 'График#SCHEDULE_NAME#уже назначен на всех сотрудников';
$MESS['TIMEMAN_SCHEDULE_EDIT_ALREADY_ASSIGNED_FEMALE_WARNING'] = '#ASSIGNMENT_NAME# уже привязана к графику#SCHEDULE_NAME#';
$MESS['TIMEMAN_SCHEDULE_EDIT_ALREADY_ASSIGNED_MALE_WARNING'] = '#ASSIGNMENT_NAME# уже привязан к графику#SCHEDULE_NAME#';
$MESS['TIMEMAN_SCHEDULE_EDIT_ALREADY_ASSIGNED_DEPARTMENT_WARNING'] = '#ASSIGNMENT_NAME# уже привязан к графику#SCHEDULE_NAME#';
$MESS['TIMEMAN_SCHEDULE_EDIT_DEPARTMENT_WILL_BE_EXCLUDED'] = 'При сохранении, отдел будет перепривязан к данному графику.';
$MESS['TIMEMAN_SHIFT_EDIT_DEFAULT_SHIFT_NAME'] = 'Название смены';
$MESS['TIMEMAN_SHIFT_EDIT_SHIFT_DURATION_TITLE'] = 'Длительность';
$MESS['TIMEMAN_SHIFT_EDIT_POPUP_PICK_TIME_TITLE'] = 'Выбрать время';
$MESS['TIMEMAN_SHIFT_EDIT_POPUP_WORK_TIME_TITLE'] = 'Рабочее время';
$MESS['TIMEMAN_SHIFT_EDIT_BTN_SET_TITLE'] = 'Установить';
$MESS['TIMEMAN_EDIT_BTN_CANCEL_TITLE'] = 'Отменить';
$MESS['TIMEMAN_EDIT_BTN_SAVE_TITLE'] = 'Сохранить';
$MESS['TM_SCHEDULE_SAVE_CONFIRM_YES'] = $MESS['TIMEMAN_EDIT_BTN_SAVE_TITLE'];
$MESS['TIMEMAN_SHIFT_EDIT_BTN_CANCEL_TITLE'] = 'Закрыть';
$MESS['TIMEMAN_SCHEDULE_EDIT_ERROR_NO_VIOLATION_CONTROL'] = 'У свободного графика не контролируются никакие нарушения';
$MESS['TIMEMAN_SCHEDULE_EDIT_ERROR_SCHEDULE_NOT_FOUND'] = 'График не найден.';
$MESS['TIMEMAN_SCHEDULE_EDIT_ERROR_SCHEDULE_READ_ACCESS_DENIED'] = 'Недостаточно прав для просмотра графика.';
$MESS['TIMEMAN_SCHEDULE_EDIT_ERROR_SCHEDULE_CREATE_ACCESS_DENIED'] = 'Недостаточно прав для создание графика.';

$MESS['TIMEMAN_SCHEDULE_EDIT_HINT_EXACT_START_END_DAY'] = 'Сотрудник должен приступить к работе не позже указанного времени начала и завершить рабочий день не раньше указанного времени завершения. В случае нарушения поступит уведомление указанным ниже людям.
<br><br>Пример: руководитель указал максимальное время начала дня - 9:00 и минимальное завершения рабочего дня - 18:00. Сотрудник начал рабочий день в 9:01 или позже – начальнику придет уведомление о нарушении рабочего времени. Такое же уведомление поступит, если сотрудник закроет рабочий день раньше 18:00.';
$MESS['TIMEMAN_SCHEDULE_EDIT_HINT_RELATIVE_START_END_DAY'] = 'Сотрудник может начинать и заканчивать рабочий день в указанный интервал. В случае нарушения - направляется уведомление указанным ниже людям.
<br><br>Пример: руководитель указал интервал начала рабочего дня с 8:00 до 10:00 и завершение рабочего дня с 17:00 до 19:00. Если сотрудник начнет рабочий день раньше 8:00 или позже 10:00 и завершит раньше 17:00 или позже 19:00, начальник получит уведомление о нарушении распорядка.';
$MESS['TIMEMAN_SCHEDULE_EDIT_HINT_OFFSET_START_END_DAY'] = 'Для сотрудника устанавливается количество минут на опоздание или на уход с работы раньше окончания рабочего дня, которое не будет считаться нарушением распорядка. 
<br><br>Пример: Руководитель установил в настройках рабочего времени
<br><br>понедельник-пятница с 9:00 до 18:00 
<br>суббота с 10:00 до 15:00
<br><br>и указал максимальное опоздание 15 минут. Уведомление о нарушении поступит, если сотрудник начнет рабочий день позже 9:15 по будням или позже 10:15 в субботу. По такому же принципу, сотрудник может уйти с работы раньше на указанное время без нареканий.';

$MESS['TIMEMAN_SCHEDULE_EDIT_HINT_EDIT_DAY'] = 'Укажите, на какой промежуток времени сотрудник может самостоятельно отредактировать свой текущий рабочий день. Если он отредактирует на больший срок, зафиксируется нарушение и указанным ниже сотрудникам придет уведомление.';
$MESS['TIMEMAN_SCHEDULE_EDIT_HINT_MIN_DAY_DURATION'] = 'В случае если сотрудник отработал меньше указанного количества часов в день – указанные ниже люди получат уведомление о нарушении.';
$MESS['TIMEMAN_SCHEDULE_HOURS_LACK_FOR_PERIOD_HINT'] = 'Укажите, сколько часов допустимо не доработать за выбранный в данном графике отчетный период. Если часов будет больше, зафиксируется нарушение и указанные ниже люди получат уведомление.';
$MESS["TIMEMAN_SCHEDULE_EDIT_CALENDAR_DAYS_HOLIDAY"] = "праздничных";
$MESS["TIMEMAN_SCHEDULE_EDIT_CALENDAR_DAYS_WEEKEND"] = "выходных";
$MESS["TIMEMAN_SCHEDULE_EDIT_CALENDAR_TEMPLATES"] = "использовать календарь";
$MESS["TIMEMAN_SCHEDULE_EDIT_CALENDAR_MANAGE"] = "управление";
$MESS["TIMEMAN_SCHEDULE_EDIT_CALENDAR_ADD_RUS_HOLIDAYS_HINT"] = "Единожды скопировать даты праздников в этом году на календарь графика";
$MESS["TIMEMAN_SCHEDULE_EDIT_CALENDAR_RUS_HOLIDAYS_HINT"] = "Праздники будут автоматически обновляться каждый год в соответствии с производственным календарем страны";
$MESS["TIMEMAN_SCHEDULE_EDIT_CALENDAR_HOLIDAYS_TEMPLATE_HINT"] = "Использовать праздники с календаря данного графика";
$MESS["TIMEMAN_SCHEDULE_EDIT_CALENDAR_CLEAR_HOLIDAYS"] = "Удалить все праздники";

$MESS["TM_SCHEDULE_VIOLATION_CONTROL_TIME_TITLE"] = "Контроль рабочего времени";
$MESS["TM_SCHEDULE_VIOLATION_CONTROLLED_TITLE"] = "Контролировать";
$MESS["TM_SCHEDULE_VIOLATIONS_USER_TITLE_PERSONAL"] = "Индивидуальные нарушения для сотрудника #NAME# по графику \"#SCHEDULE_NAME#\"";
$MESS["TM_SCHEDULE_VIOLATIONS_DEPARTMENT_TITLE_PERSONAL"] = "Индивидуальные нарушения для отдела \"#NAME#\" по графику \"#SCHEDULE_NAME#\"";
$MESS["TM_SCHEDULE_VIOLATION_CONTROL_RECORD_TITLE"] = "Учет нарушений рабочего графика";
$MESS["TM_SCHEDULE_VIOLATION_START_END_BLOCK_TITLE"] = "Начало и завершение дня";
$MESS["TM_SCHEDULE_VIOLATION_EXACT_TIME_BLOCK_TITLE"] = "строгое";
$MESS["TM_SCHEDULE_VIOLATION_OFFSET_TIME_BLOCK_TITLE"] = "гибкое";
$MESS["TM_SCHEDULE_VIOLATION_RELATIVE_TIME_BLOCK_TITLE"] = "интервальное";
$MESS["TM_SCHEDULE_VIOLATION_MAX_EXACT_START_TITLE"] = "Макс. время начала";
$MESS["TIMEMAN_SCHEDULE_EDIT_NAME_DEFAULT_FIXED"] = "Фиксированный график";
$MESS["TIMEMAN_SCHEDULE_EDIT_NAME_DEFAULT_FLEXTIME"] = "Свободный график";
$MESS["TIMEMAN_SCHEDULE_EDIT_NAME_DEFAULT_SHIFT"] = "Сменный график";
$MESS["TM_SCHEDULE_VIOLATION_MAX_OFFSET_START_LINK_TITLE"] = "Макс. опоздание";
$MESS["TM_SCHEDULE_VIOLATION_MIN_END_START_TITLE"] = "Мин. время завершения";
$MESS["TM_SCHEDULE_VIOLATION_MIN_OFFSET_END_LINK_TITLE"] = "Ранний уход с работы";
$MESS["TM_SCHEDULE_VIOLATION_START_TIME_TITLE"] = "Время начала";
$MESS["TM_SCHEDULE_VIOLATION_END_TIME_TITLE"] = "Время завершения";
$MESS["TM_SCHEDULE_VIOLATION_NOTIFICATION_TO_TITLE"] = "Кому отправить уведомление";
$MESS["TM_SCHEDULE_VIOLATION_HOURS_PER_DAY_BLOCK_TITLE"] = "Количество рабочих часов в день";
$MESS["TM_SCHEDULE_VIOLATION_EDIT_WORKTIME_BLOCK_TITLE"] = "Допустимое редактирование рабочего дня сотрудником";
$MESS["TM_SCHEDULE_VIOLATION_MIN_DAY_DURATION_TITLE"] = "Мин. продолжительность рабочего дня";
$MESS["TM_SCHEDULE_VIOLATION_CHANGE_DAY_DURATION_TITLE"] = "Допустимый промежуток изменения";
$MESS["TM_SCHEDULE_VIOLATION_HOURS_LACK_FOR_PERIOD_BLOCK_TITLE"] = "Допустимая недоработка за отчетный период";
$MESS["TM_SCHEDULE_VIOLATION_HOURS_COUNT_TITLE"] = "Количество рабочих часов";
$MESS["TM_SCHEDULE_VIOLATION_SHIFT_MISSED"] = "Невыход на смену";
$MESS["TM_SCHEDULE_VIOLATION_SHIFT_BLOCK_DELAY"] = "На сколько можно опоздать на смену";
$MESS["TM_SCHEDULE_VIOLATION_SHIFT_DELAY_ALLOWED"] = "Допустимый промежуток";

$MESS["TIMEMAN_SCHEDULE_EDIT_REPORT_RESTRICTIONS_TITLE"] = "Ограничения";
$MESS['TIMEMAN_SCHEDULE_EDIT_HINT_RESTRICTION_MAX_START_OFFSET'] = 'Например, у сотрудника смена начинается в 9:00 и можно начать смену раньше на один час. В таком случае сотрудник должен выйти на смену не ранее 8:00.';
$MESS["TIMEMAN_SCHEDULE_EDIT_WORKTIME_RESTRICTION_MAX_START_OFFSET"] = "На сколько раньше можно начать смену";
$MESS["TIMEMAN_SCHEDULE_EDIT_REPORT_ALLOWED_DEVICES_TITLE"] = "Разрешить открывать и закрывать рабочий день";
$MESS["TIMEMAN_SCHEDULE_EDIT_REPORT_ALLOW_BROWSER"] = "в браузере";
$MESS["TIMEMAN_SCHEDULE_EDIT_REPORT_ALLOW_B24_TIME"] = "через Bitrix24.Time";
$MESS["TIMEMAN_SCHEDULE_EDIT_REPORT_ALLOW_MOBILE_APP"] = "в мобильном приложении";
$MESS["TIMEMAN_SCHEDULE_EDIT_REPORT_RECORD_LOCATION"] = "учитывать местоположение";
$MESS["TIMEMAN_SCHEDULE_EDIT_REPORT_DO_NOT_RECORD_LOCATION"] = "не учитывать местоположение";
$MESS["TIMEMAN_SCHEDULE_EDIT_MON"] = "Пн";
$MESS["TIMEMAN_SCHEDULE_EDIT_TUE"] = "Вт";
$MESS["TIMEMAN_SCHEDULE_EDIT_WED"] = "Ср";
$MESS["TIMEMAN_SCHEDULE_EDIT_THU"] = "Чт";
$MESS["TIMEMAN_SCHEDULE_EDIT_FRI"] = "Пт";
$MESS["TIMEMAN_SCHEDULE_EDIT_SAT"] = "Сб";
$MESS["TIMEMAN_SCHEDULE_EDIT_SUN"] = "Вс";
$MESS["TIMEMAN_SHIFT_EDIT_POPUP_FORMAT_HOUR"] = "ч";
$MESS["TIMEMAN_SHIFT_EDIT_POPUP_FORMAT_MINUTE"] = "м";
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_OTHER_TITLE'] = 'Праздники других стран';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_OF_COUNTRIES_TITLE'] = 'Праздники разных стран';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_RU'] = 'Праздники России';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_UA'] = 'Праздники Украины';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_BY'] = 'Праздники Беларуси';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_KZ'] = 'Праздники Казахстана';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_USA'] = 'Праздники США';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_DE'] = 'Праздники Германии';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_BR'] = 'Праздники Бразилии';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_IN'] = 'Праздники Индии';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_VN'] = 'Праздники Вьетнама';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_MX'] = 'Праздники Мексики';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_FR'] = 'Праздники Франции';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_ID'] = 'Праздники Индонезии';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_PL'] = 'Праздники Польши';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_SINGLE_TITLE_JP'] = 'Праздники Японии';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_RU'] = 'Россия';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_UA'] = 'Украина';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_BY'] = 'Беларусь';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_KZ'] = 'Казахстан';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_USA'] = 'США';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_DE'] = 'Германия';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_BR'] = 'Бразилия';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_IN'] = 'Индия';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_VN'] = 'Вьетнам';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_MX'] = 'Мексика';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_FR'] = 'Франция';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_ID'] = 'Индонезия';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_PL'] = 'Польша';
$MESS['TIMEMAN_SCHEDULE_EDIT_SYSTEM_CALENDAR_HOLIDAYS_LIST_TITLE_JP'] = 'Япония';