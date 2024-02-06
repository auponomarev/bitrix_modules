{"version":3,"file":"script.map.js","names":["exports","main_core","biconnector_apacheSupersetDashboardManager","main_core_events","ui_dialogs_messagebox","biconnector_apacheSupersetAnalytics","_templateObject","_createForOfIteratorHelper","o","allowArrayLike","it","Symbol","iterator","Array","isArray","_unsupportedIterableToArray","length","i","F","s","n","done","value","e","_e","f","TypeError","normalCompletion","didErr","err","call","step","next","_e2","minLen","_arrayLikeToArray","Object","prototype","toString","slice","constructor","name","from","test","arr","len","arr2","_classPrivateMethodInitSpec","obj","privateSet","_checkPrivateRedeclaration","add","_classPrivateFieldInitSpec","privateMap","set","privateCollection","has","_classPrivateMethodGet","receiver","fn","_dashboardManager","WeakMap","_grid","_subscribeToEvents","WeakSet","SupersetDashboardGridManager","props","_BX$Main$gridManager$","babelHelpers","classCallCheck","this","writable","classPrivateFieldSet","DashboardManager","BX","Main","gridManager","getById","gridId","instance","_subscribeToEvents2","createClass","key","onUpdatedDashboardBatchStatus","dashboardList","_iterator","_step","dashboard","updateDashboardStatus","id","status","getGrid","classPrivateFieldGet","showLoginPopup","params","openedFrom","arguments","undefined","grid","type","tableFade","processEditDashboard","dashboardId","editLink","editUrl","tableUnfade","popupType","ApacheSupersetAnalytics","sendAnalytics","c_sub_section","c_element","toLowerCase","p1","buildAppIdForAnalyticRequest","appId","p2","onUserCredentialsLoaded","restartDashboardLoad","_this","row","getRows","btn","node","querySelector","Type","isDomNode","isDisabled","getAttribute","setAttribute","Dom","addClass","restartDashboardImport","then","response","_response$data","dashboardIds","data","restartedDashboardIds","_iterator2","_step2","restartedDashboardId","setDashboardStatusReady","label","getElementsByClassName","removeClass","innerText","Loc","getMessage","labelWrapper","reloadBtn","DASHBOARD_STATUS_READY","remove","DASHBOARD_STATUS_LOAD","DASHBOARD_STATUS_FAILED","createdReloadBtn","createReloadBtn","append","Tag","render","taggedTemplateLiteral","duplicateDashboard","analyticInfo","gridRealtime","getRealtime","newDashboard","addRow","prepend","columns","actions","counterTotalTextContainer","getCounterTotal","textContent","UI","Hint","init","Notification","Center","notify","content","_response$errors$","errors","isStringFilled","message","Text","encode","exportDashboard","deleteDashboard","_this2","MessageBox","confirm","messageBox","button","setWaiting","reload","close","_response$errors$2","createEmptyDashboard","BIConnector","_this3","EventEmitter","subscribe","bind","event","_event$getCompatData","getCompatData","_event$getCompatData2","slicedToArray","sliderEvent","getEventId","eventArgs","getData","Reflection","namespace","window","Event","Dialogs"],"sources":["script.js"],"mappings":"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"}