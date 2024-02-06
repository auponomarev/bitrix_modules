{"version":3,"file":"control-button.bundle.map.js","names":["this","BX","exports","main_core","main_popup","im_public_iframe","_templateObject","_templateObject2","ownKeys","object","enumerableOnly","keys","Object","getOwnPropertySymbols","symbols","filter","sym","getOwnPropertyDescriptor","enumerable","push","apply","_objectSpread","target","i","arguments","length","source","forEach","key","babelHelpers","defineProperty","getOwnPropertyDescriptors","defineProperties","ControlButton","params","undefined","classCallCheck","container","Type","isDomNode","entityType","entityId","items","mainItem","entityData","analyticsLabelParam","analyticsLabel","contextBx","window","top","sliderId","concat","Math","floor","random","isVideoCallEnabled","Reflection","getClass","Call","Util","isWebRTCSupported","chatLockCounter","isPlainObject","entity","buttonClassName","renderButton","subscribeEvents","createClass","value","destroy","Event","EventEmitter","unsubscribe","onCalendarSave","onPostSave","subscribe","bind","event","BaseEvent","data","getData","postEntityType","toUpperCase","sourceEntityType","sourceEntityId","sourceEntityData","responseData","entryId","addEntityComment","_event$getCompatData","getCompatData","_event$getCompatData2","slicedToArray","sliderEvent","getEventId","originatorSliderId","successPostId","isChatButton","onClickValue","openChat","startVideoCall","buttonTitle","Loc","getMessage","buttonClass","button","Tag","render","taggedTemplateLiteral","showMenu","Dom","append","showLoader","addClass","hideLoader","removeClass","getAvailableItems","_this","Promise","resolve","reject","availableItems","sessionStorage","getItem","ajax","runAction","then","response","setItem","_this2","item","indexOf","menuItems","text","className","onclick","popupMenu","close","openTaskSlider","openCalendarSlider","openPostSlider","Menu","bindElement","offsetLeft","offsetTop","show","_this3","Messenger","parseInt","errors","code","showHintPopup","message","_this4","_this5","users","isArrayLike","userIds","map","userId","id","Calendar","SliderLoader","participantsEntityList","entryName","name","entryDescription","desc","_this6","SidePanel","Instance","open","link","requestMethod","requestParams","_this7","POST_TITLE","title","POST_MESSAGE","destTo","Popup","Text","getRandom","content","zIndex","angle","closeIcon","autoHide","darkMode","overlay","maxWidth","events","onAfterPopupShow","setTimeout","Intranet","Main","v2","Lib"],"sources":["control-button.bundle.js"],"mappings":"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"}