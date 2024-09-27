{"version":3,"file":"script.map.js","names":["this","BX","Sign","exports","main_popup","ui_notification","sign_tour","main_core","sign_document","_templateObject","_templateObject2","_templateObject3","_templateObject4","_templateObject5","_templateObject6","_templateObject7","_templateObject8","_templateObject9","_templateObject10","_templateObject11","_templateObject12","_templateObject13","_templateObject14","_templateObject15","_templateObject16","ownKeys","object","enumerableOnly","keys","Object","getOwnPropertySymbols","symbols","filter","sym","getOwnPropertyDescriptor","enumerable","push","apply","_objectSpread","target","i","arguments","length","source","forEach","key","babelHelpers","defineProperty","getOwnPropertyDescriptors","defineProperties","Preview","options","_this","classCallCheck","containerTag","document","querySelector","imageCollection","items","blockCollection","blocks","imageTotal","Type","isBoolean","readonly","buildPreview","documentHash","interval","setInterval","Backend","controller","command","postData","then","result","layout","isArray","clearInterval","createClass","value","getBottomContainer","bottomContainer","Tag","render","taggedTemplateLiteral","Dom","clean","append","buildImage","buildNavigation","buildZoom","drawBlock","blockData","text","content","Text","encode","base64","src","style","concat","drawBlocks","pageNumber","_this2","map","block","parseInt","position","page","tag","data","isPlainObject","top","left","width","height","setTimeout","toConsumableArray","querySelectorAll","remove","imageTagContainer","appendChild","buildImageTag","_this3","preview","imageIndex","imageTag","path","name","onload","Master","unLockContent","imageTagWrapper","onPrevClick","btnNextTag","classList","btnPrevTag","add","navigationTag","onNextClick","bind","Loc","getMessage","innerHTML","removeClass","addClass","onZoomClick","console","log","adjustZoomStatus","zoomValue","defaultZoomValue","currentZoomValue","setProperty","zoomLayout","innerText","minus","plus","zoomPlus","zoomMinus","container","onRemoveClick","buildRemoveButton","_classStaticPrivateFieldSpecGet","receiver","classConstructor","descriptor","_classCheckPrivateStaticAccess","_classCheckPrivateStaticFieldDescriptor","_classApplyDescriptorGet","action","undefined","TypeError","get","call","_classStaticPrivateMethodGet","method","EntityEditor","Reflection","namespace","nextStepHandler","attrInputFileSingle","attrInputFileMulti","attrItemsFileElements","inputFileSingleNode","inputFileMultiNode","itemFileElements","checkedInput","activeElementItem","onChangeFileInput","inputNode","onchange","unLockNavigation","lockNavigation","_loop","addEventListener","checked","loadFileHandler","attrSelector","actionButton","inputFile","inputFileMulti","form","closest","node","e","getAttribute","files","errorBlock","getElementById","display","window","scrollTo","behavior","nextStepButton","lockContent","submit","click","preventDefault","selectBlankHandler","radios","radio","loadCrmEntityEditor","userData","_getNextStepBtn","onNextBtnClickAtPartnerStep","adjustLockNavigation","_getPreviousStepBtn","addCustomEvent","onPreviewFirstImageIsLoadedInPartnerStep","reloadCrmElementsList","initiatorName","loader","Loader","show","ajax","runAction","id","entityTypeId","guid","stageId","categoryId","params","ENABLE_PAGE_TITLE_CONTROLS","ENABLE_MODE_TOGGLE","IS_EMBEDDED","forceDefaultConfig","enableSingleSectionCombining","response","_response$data","destroy","_loadedElementsInPartnerStep","crmItemEditor","btn","title","html","Runtime","editor","getEditor","myCompanyField","getControlById","myCompanySection","hasCompanies","switchControlMode","UI","EntityEditorMode","view","enableToggling","isRequired","switchToSingleEditMode_prev","switchToSingleEditMode","getMode","edit","clientSection","contactsField","hasContacts","_addContactButton","_contactSearchBoxes","_isRequired","layout_prev","error","hideErrors","showError","message","trim","checkFilledContacts","Crm","getDefault","save","errors","Notification","Center","notify","join","entityData","CONTACT_ID","documentId","openEditor","documentEditorUrl","customData","showInfoHelperSlider","code","currentSlider","SidePanel","Instance","getTopSlider","infoHelper","InfoHelper","getSlider","close","saveTitle","cancelButton","newTitleContainer","newTitleWrapper","inputWrapper","editButton","editorWrapper","ev","toLowerCase","stopPropagation","newTitle","buttonNext","buttonPrev","buttonClick","button","disabled","contentNode","isSaveAllowed","Number","contactsCount","filledContactsCount","_contactInfos","editorUrl","formElement","open","bxSignEditorAllSaved","events","onClose","event","getData","location","reload","denyAction","cacheable","allowChangeHistory","initMuteCheckbox","checkboxes","closestSelector","attrName","checkbox","Event","toToggle","element","hidden","initCommunicationsSelector","containers","attrMemberIdName","attrMemberUrlName","communications","smsAllowed","smsNotAllowedCallback","Array","from","memberId","memberUrl","communicationsLocal","menuManager","menuId","input","span","menuItems","openItemFunc","communication","onclick","type","setAttribute","parentNode","MenuManager","getMenuById","create","bindElement","guide","Guide","steps","autoSave","simpleMode","startOnce","showPreview","link","errorsContainer","util","htmlspecialchars","href","linkStart","linkEnd","replace","_top$BX","_top$BX$CRM","_top$BX$CRM$Kanban","_top$BX$CRM$Kanban$Gr","_top$BX$CRM$Kanban$Gr2","_top$BX2","_top$BX2$Main","_top$BX2$Main$gridMan","_top$BX2$Main$gridMan2","_top$BX2$Main$gridMan3","CRM","Kanban","Grid","getInstance","Main","gridManager","instance","stopImmediatePropagation","writable","Component","Tour"],"sources":["script.js"],"mappings":"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"}