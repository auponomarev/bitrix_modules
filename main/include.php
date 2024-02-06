<?php

/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2023 Bitrix
 */

use Bitrix\Main;
use Bitrix\Main\Session\Legacy\HealerEarlySessionStart;

require_once(__DIR__."/start.php");

$application = Main\HttpApplication::getInstance();
$application->initializeExtendedKernel([
	"get" => $_GET,
	"post" => $_POST,
	"files" => $_FILES,
	"cookie" => $_COOKIE,
	"server" => $_SERVER,
	"env" => $_ENV
]);

if (class_exists('\Dev\Main\Migrator\ModuleUpdater'))
{
	\Dev\Main\Migrator\ModuleUpdater::checkUpdates('main', __DIR__);
}

if (defined('SITE_ID'))
{
	define('LANG', SITE_ID);
}

$context = $application->getContext();
$context->initializeCulture(defined('LANG') ? LANG : null, defined('LANGUAGE_ID') ? LANGUAGE_ID : null);

// needs to be after culture initialization
$application->start();

// constants for compatibility
$culture = $context->getCulture();
define('SITE_CHARSET', $culture->getCharset());
define('FORMAT_DATE', $culture->getFormatDate());
define('FORMAT_DATETIME', $culture->getFormatDatetime());
define('LANG_CHARSET', SITE_CHARSET);

$site = $context->getSiteObject();
if (!defined('LANG'))
{
	define('LANG', ($site ? $site->getLid() : $context->getLanguage()));
}
define('SITE_DIR', ($site ? $site->getDir() : ''));
if (!defined('SITE_SERVER_NAME'))
{
	define('SITE_SERVER_NAME', ($site ? $site->getServerName() : ''));
}
define('LANG_DIR', SITE_DIR);

if (!defined('LANGUAGE_ID'))
{
	define('LANGUAGE_ID', $context->getLanguage());
}
define('LANG_ADMIN_LID', LANGUAGE_ID);

if (!defined('SITE_ID'))
{
	define('SITE_ID', LANG);
}

/** @global $lang */
$lang = $context->getLanguage();

//define global application object
$GLOBALS["APPLICATION"] = new CMain;

if (!defined("POST_FORM_ACTION_URI"))
{
	define("POST_FORM_ACTION_URI", htmlspecialcharsbx(GetRequestUri()));
}

$GLOBALS["MESS"] = [];
$GLOBALS["ALL_LANG_FILES"] = [];
IncludeModuleLangFile(__DIR__."/tools.php");
IncludeModuleLangFile(__FILE__);

error_reporting(COption::GetOptionInt("main", "error_reporting", E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR | E_PARSE) & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING & ~E_NOTICE);

if (!defined("BX_COMP_MANAGED_CACHE") && COption::GetOptionString("main", "component_managed_cache_on", "Y") <> "N")
{
	define("BX_COMP_MANAGED_CACHE", true);
}

// global functions
require_once(__DIR__."/filter_tools.php");

/*ZDUyZmZMTQ3NTRkNzc3ZjdiZDQ2Nzk4ZmZiM2U0MjBlNzUzOTU=*/$GLOBALS['_____1617710820']= array(base64_decode('R'.'2V0TW9kdWx'.'lRXZlbn'.'Rz'),base64_decode('RXhlY3V0'.'ZU1v'.'ZH'.'VsZU'.'V2'.'ZW50'.'R'.'Xg='));$GLOBALS['____136593470']= array(base64_decode('ZGV'.'ma'.'W5l'),base64_decode('Y'.'m'.'FzZ'.'T'.'Y0X2RlY29k'.'ZQ=='),base64_decode('d'.'W5z'.'ZXJpYWxpemU'.'='),base64_decode('aXNfYX'.'JyYX'.'k='),base64_decode('aW5fYXJyYXk='),base64_decode(''.'c2VyaWFsaXp'.'l'),base64_decode('YmFzZT'.'Y'.'0X2VuY2'.'9'.'kZQ='.'='),base64_decode('b'.'W'.'t0a'.'W1l'),base64_decode('ZGF'.'0Z'.'Q=='),base64_decode('ZG'.'F0ZQ='.'='),base64_decode(''.'c3'.'RybGVu'),base64_decode('bWt0'.'aW1l'),base64_decode('ZGF0ZQ=='),base64_decode('Z'.'GF'.'0'.'ZQ=='),base64_decode('bWV0'.'aG9kX2V4a'.'XN0cw=='),base64_decode('Y2F'.'s'.'bF91c2Vy'.'X2'.'Z1bmN'.'fY'.'XJy'.'Y'.'Xk='),base64_decode('c3'.'R'.'ybGV'.'u'),base64_decode('c2V'.'y'.'aWFsaXpl'),base64_decode('YmFzZ'.'TY0X2VuY29kZQ=='),base64_decode('c3Ryb'.'GVu'),base64_decode('aXNfYXJyYXk='),base64_decode('c'.'2V'.'y'.'aW'.'FsaXpl'),base64_decode(''.'YmFz'.'ZTY0X2V'.'uY29'.'kZQ=='),base64_decode('c2'.'VyaWFs'.'aXpl'),base64_decode('YmF'.'zZTY0X2VuY29'.'kZQ=='),base64_decode('aXNfYX'.'J'.'yYXk='),base64_decode('aXN'.'fYXJ'.'yYX'.'k='),base64_decode('aW5fYXJyYXk='),base64_decode(''.'a'.'W5fYXJyYXk='),base64_decode('bWt0a'.'W1l'),base64_decode('ZGF'.'0ZQ=='),base64_decode('ZGF0ZQ=='),base64_decode('ZGF0ZQ=='),base64_decode('bW'.'t0aW1l'),base64_decode('Z'.'GF0ZQ='.'='),base64_decode('ZGF0'.'ZQ=='),base64_decode('aW5'.'fY'.'XJyYXk='),base64_decode(''.'c2Vya'.'W'.'FsaXp'.'l'),base64_decode('YmFzZTY0X'.'2Vu'.'Y2'.'9'.'kZ'.'Q'.'=='),base64_decode(''.'aW5'.'0'.'d'.'mFs'),base64_decode('dG'.'ltZQ'.'=='),base64_decode('Zm'.'lsZV9leGlzd'.'H'.'M='),base64_decode('c'.'3'.'RyX3JlcG'.'xhY2U'.'='),base64_decode('Y2xh'.'c3'.'NfZXhpc3Rz'),base64_decode(''.'Z'.'GVm'.'aW5l'));if(!function_exists(__NAMESPACE__.'\\___1954422099')){function ___1954422099($_1740977749){static $_147071883= false; if($_147071883 == false) $_147071883=array(''.'S'.'U5UUk'.'FORV'.'RfRURJV'.'ElPT'.'g==','W'.'Q='.'=',''.'bWFpb'.'g==','fmNwZl9t'.'YXBfdmFsdW'.'U=','','','Y'.'Wx'.'s'.'b3dlZ'.'F9j'.'b'.'GFzc2Vz','ZQ==','Zg='.'=','ZQ='.'=','Rg==','WA==','Zg==','bWFpb'.'g='.'=','fm'.'N'.'wZl'.'9t'.'YXBfd'.'mFsdWU=','UG'.'9ydGFs','Rg==','ZQ='.'=','ZQ==','W'.'A==',''.'Rg'.'==','RA==',''.'R'.'A==','bQ'.'==',''.'ZA==',''.'W'.'Q==','Zg'.'==','Zg='.'=','Zg='.'=',''.'Zg='.'=','UG9'.'y'.'dG'.'Fs','R'.'g==','ZQ'.'==','ZQ==','WA==','Rg==','RA==','R'.'A==','bQ==','ZA==','WQ'.'==',''.'bWFpbg'.'==','T24=','U2'.'V0dGl'.'uZ3ND'.'a'.'GFuZ'.'2U=','Zg==','Zg==',''.'Z'.'g==','Zg==','bWFpbg'.'='.'=','fmNwZl9t'.'Y'.'XBfdmF'.'s'.'dWU=','ZQ'.'==',''.'ZQ==','RA='.'=','ZQ'.'==','ZQ==','Zg==',''.'Zg==','Zg==','Z'.'Q==',''.'b'.'WFpb'.'g'.'='.'=',''.'fmNwZ'.'l9tYXB'.'fdmFsdW'.'U=','ZQ==','Zg'.'==','Z'.'g==','Z'.'g'.'==','Zg==','bWFpbg==','fmNwZl9tY'.'XBfdmFsdWU=',''.'ZQ==','Zg='.'=','UG9ydGF'.'s','UG9ydG'.'F'.'s','ZQ==','ZQ==','UG'.'9yd'.'GFs','Rg==',''.'WA==',''.'Rg='.'=','R'.'A==','ZQ==','ZQ==','RA==','bQ==','Z'.'A==','WQ==','ZQ==','WA='.'=','ZQ==','Rg==','ZQ'.'==','RA==','Zg='.'=','ZQ='.'=','RA='.'=','ZQ'.'==','bQ==','ZA==','WQ'.'==','Zg==',''.'Zg='.'=','Z'.'g==','Zg==','Zg'.'='.'=','Zg='.'=','Zg==','Zg'.'==','bWFpbg==',''.'fmNwZl9tYXBfdmF'.'sd'.'WU=','ZQ'.'==','ZQ==','U'.'G9ydG'.'Fs','Rg='.'=','WA==','VF'.'lQRQ==','REFURQ==','R'.'kV'.'B'.'VFVS'.'RVM=',''.'RV'.'hQ'.'SVJF'.'RA==','VFlQRQ'.'==','RA==','V'.'FJZ'.'X'.'0R'.'BWVN'.'fQ09VTlQ=',''.'R'.'EFURQ='.'=','VF'.'JZX0RB'.'W'.'VNfQ09'.'VTlQ=',''.'R'.'VhQSVJ'.'FRA==','RkVBVFVS'.'R'.'VM=',''.'Zg'.'==','Zg'.'==','R'.'E9DVU1FTlR'.'f'.'Uk9PVA==','L2JpdH'.'J'.'p'.'e'.'C9'.'t'.'b'.'2R1b'.'GV'.'zL'.'w==','L2luc3R'.'hbGwv'.'aW5kZXguc'.'G'.'hw','Lg='.'=','Xw==','c2VhcmNo','Tg==','','','QU'.'N'.'USV'.'ZF','WQ'.'==','c29jaWFsbmV'.'0d2'.'9yaw='.'=','YWxsb3'.'dfZ'.'nJpZ'.'Wxkcw='.'=',''.'WQ==',''.'SUQ'.'=','c2'.'9jaWFsbmV0d29yaw==','YWxsb3'.'d'.'fZ'.'nJpZ'.'Wxkc'.'w'.'==',''.'SUQ=','c2'.'9ja'.'WFsbm'.'V'.'0d29yaw==',''.'YWxsb'.'3dfZnJpZ'.'Wxkcw'.'==','Tg==','','','QUNUSVZF','W'.'Q==','c2'.'9j'.'a'.'W'.'Fsbm'.'V0d29yaw='.'=','YWxsb3df'.'bWljc'.'m9ibG9nX3'.'Vz'.'ZXI=','WQ==','SU'.'Q=','c29j'.'aWFsbmV'.'0d29yaw==','YW'.'xsb3df'.'bWlj'.'cm9i'.'b'.'G9n'.'X3VzZ'.'XI=',''.'SUQ=','c29jaWF'.'sbmV0d29yaw==','YWxs'.'b3dfbW'.'ljcm'.'9ib'.'G9nX3VzZ'.'X'.'I=','c29jaWFsbm'.'V'.'0d29'.'ya'.'w==',''.'YWxs'.'b3df'.'b'.'Wljcm9ib'.'G'.'9nX'.'2dyb'.'3Vw',''.'W'.'Q='.'=','S'.'UQ=','c29jaWFsbmV0d2'.'9'.'ya'.'w'.'==','YW'.'xsb3'.'dfbWl'.'jcm9i'.'bG'.'9nX2dyb3Vw',''.'SUQ=','c29jaWFsbmV'.'0d2'.'9yaw==',''.'YWxsb'.'3dfbWlj'.'cm'.'9ibG9'.'nX'.'2dy'.'b'.'3Vw','Tg'.'==','','','QUN'.'US'.'VZF','W'.'Q==','c29ja'.'WFsbm'.'V0'.'d29yaw==','YWx'.'sb'.'3'.'dfZmlsZXN'.'fdXNlcg='.'=',''.'WQ==','SUQ=','c2'.'9jaWFsbmV0d29'.'yaw==','Y'.'Wxsb3'.'d'.'fZmlsZX'.'N'.'fd'.'XNlcg==','SU'.'Q'.'=','c29jaWFsbmV0d29yaw==',''.'YWxs'.'b'.'3dfZm'.'lsZX'.'Nf'.'dXNlcg==','T'.'g==','','','QUNUSVZF','WQ==',''.'c29jaWFsbmV0d29'.'yaw'.'==','Y'.'Wx'.'sb3dfYmx'.'vZ19'.'1c2V'.'y','W'.'Q==','S'.'UQ=',''.'c2'.'9jaWFsbmV0d29'.'yaw==','YWx'.'s'.'b3'.'dfYmx'.'vZ19'.'1c2Vy','S'.'U'.'Q=','c29jaW'.'FsbmV0d29yaw'.'==','YWxs'.'b3'.'dfY'.'mxvZ1'.'91c'.'2Vy','T'.'g==','','',''.'QUNUSVZF',''.'WQ==','c29jaW'.'F'.'s'.'bmV0d'.'29'.'yaw'.'==','YWxsb3'.'dfcGhvdG9fdXN'.'lcg==','WQ'.'==','SU'.'Q=',''.'c29jaWFsbm'.'V0d29yaw'.'==','YWxsb3dfcGhvdG9'.'f'.'d'.'X'.'Nlc'.'g==','SUQ=','c29j'.'aWFsbmV0d29'.'y'.'aw='.'=',''.'Y'.'Wxsb3dfc'.'G'.'hvdG9fdX'.'N'.'l'.'cg==','T'.'g==','','','QUN'.'USV'.'ZF','WQ='.'=','c'.'29j'.'a'.'WFsb'.'m'.'V0d2'.'9yaw==',''.'Y'.'Wxs'.'b3dfZm9y'.'d'.'W1fdXNlcg'.'==','WQ'.'==','SUQ=','c'.'29jaWFsbmV0'.'d2'.'9yaw==','YWxsb3'.'dfZm9ydW'.'1fdXNlcg==','SUQ=','c2'.'9j'.'aWFsbm'.'V0'.'d'.'29yaw==','YWxsb3d'.'fZm9ydW1fd'.'XNl'.'cg==','Tg==','','','QUNUS'.'VZ'.'F','WQ==','c29jaWFsb'.'mV'.'0d29y'.'aw==','YWxsb3dfdGFza'.'3NfdX'.'Nlcg==','W'.'Q==','SUQ=','c2'.'9j'.'aWFsbmV0d2'.'9yaw==','YWxsb3dfdGFz'.'a'.'3NfdXNlcg'.'='.'=','SUQ=','c2'.'9'.'ja'.'W'.'FsbmV0d29yaw==','YWx'.'sb3dfdGFza3'.'NfdX'.'Nlcg==','c29'.'jaWFsbm'.'V0'.'d2'.'9'.'y'.'aw==','Y'.'Wxsb3d'.'fd'.'GFza'.'3NfZ'.'3'.'JvdXA'.'=',''.'WQ==','SUQ=','c29jaW'.'Fsbm'.'V0d2'.'9yaw==','YWxsb'.'3dfdG'.'Fza3NfZ3'.'JvdX'.'A=',''.'SUQ=','c'.'29jaW'.'Fs'.'bm'.'V'.'0d2'.'9y'.'aw'.'='.'=','YW'.'xsb3d'.'fdGFza3'.'NfZ3'.'Jvd'.'XA'.'=','dGF'.'za3'.'M=','Tg==','','',''.'Q'.'U'.'NUSVZF','WQ==','c29jaWFsbmV0d2'.'9ya'.'w==','YWxsb'.'3dfY'.'2F'.'sZW5kYXJfdX'.'Nlc'.'g='.'=','W'.'Q='.'=','SU'.'Q=',''.'c29jaWFsbmV0d29y'.'aw==','Y'.'Wxsb3'.'df'.'Y2F'.'sZW5kYXJ'.'fdXN'.'l'.'cg==','SUQ=',''.'c29j'.'aW'.'Fsb'.'mV0'.'d29ya'.'w==','YWxsb3dfY2FsZW5'.'kYX'.'JfdXNlcg==','c29ja'.'WFs'.'b'.'mV0d29ya'.'w==','YWxsb3'.'dfY2F'.'sZW'.'5k'.'YXJfZ3JvdXA=','WQ==','SU'.'Q=','c29jaWFs'.'bm'.'V0d29yaw==',''.'YWxsb3d'.'fY2FsZ'.'W5kY'.'XJfZ'.'3J'.'vdX'.'A=','SUQ=','c'.'29jaW'.'F'.'sbm'.'V0d29yaw='.'=','YWxsb'.'3'.'dfY2'.'FsZW5k'.'YXJfZ'.'3JvdXA=',''.'QUN'.'USVZF','WQ==','Tg'.'='.'=','Z'.'Xh0cm'.'Fu'.'ZXQ=',''.'aW'.'Jsb2Nr','T'.'25BZnRlcklC'.'b'.'G9ja0VsZW'.'1lbn'.'RV'.'cGRhdGU=','aW50'.'cmFu'.'Z'.'XQ=','Q0'.'ludHJh'.'bmV0'.'RXZ'.'lbnRI'.'YW5kbGVycw'.'==','U1B'.'S'.'ZWdpc'.'3Rlcl'.'VwZGF0Z'.'WRJ'.'dGV'.'t','Q0ludHJhbmV0U2'.'hh'.'cmVwb2ludDo6QWd'.'lbnRMaXN0cygp'.'Ow==',''.'aW5'.'0cmFuZXQ'.'=','Tg==',''.'Q0ludHJ'.'hbmV0U'.'2hhcmVwb2ludDo6QWdl'.'bn'.'RRdWV1'.'ZSgpOw==','aW5'.'0'.'c'.'mFu'.'Z'.'XQ=','T'.'g==','Q0'.'l'.'udHJhbmV0U2hhcmVwb2'.'l'.'u'.'d'.'Do'.'6'.'QWd'.'lb'.'n'.'RVcGRhdGUo'.'KT'.'s=',''.'aW5'.'0cmFu'.'Z'.'XQ=',''.'T'.'g==','aWJsb2Nr','T'.'25BZn'.'R'.'lcklC'.'bG'.'9ja0VsZW1lbnR'.'BZGQ=',''.'aW50cmF'.'uZXQ=','Q0'.'ludHJ'.'h'.'bmV0R'.'XZlbnR'.'IY'.'W5kbG'.'Vycw==','U1BS'.'ZWdpc3Rlc'.'l'.'V'.'wZ'.'GF0Z'.'WRJdGV'.'t','aWJsb2Nr','T25BZnR'.'lckl'.'CbG9ja'.'0VsZ'.'W1lbnRV'.'cG'.'RhdGU=','aW50cmFuZXQ'.'=','Q'.'0ludHJ'.'hbm'.'V'.'0RXZlb'.'nRIYW'.'5'.'kbG'.'Vycw==','U1BSZW'.'dpc3'.'RlclVwZGF0ZWRJdGVt','Q'.'0'.'l'.'udH'.'JhbmV'.'0U2hhcmVwb'.'2ludDo6'.'QWdl'.'bnRMaX'.'N0cygpOw==','aW50cmF'.'uZX'.'Q'.'=','Q0ludH'.'J'.'hbmV0U2'.'hhcm'.'Vwb2'.'l'.'udDo'.'6Q'.'Wd'.'lbnRRdWV1ZSg'.'p'.'Ow'.'==','aW'.'50cmFuZXQ=','Q0'.'l'.'udHJhb'.'mV0U2hhcmVwb'.'2ludDo6QWdlbnR'.'VcGR'.'hd'.'GUoKTs=',''.'aW50c'.'mFuZXQ=','Y3Jt','bWFpb'.'g==',''.'T25CZWZvcmVQ'.'cm9'.'sb2c=',''.'bWF'.'pb'.'g==','Q'.'1dpe'.'mFyZFNv'.'bFBhb'.'mVsSW50cmFu'.'ZXQ=',''.'U2hvd'.'1BhbmVs',''.'L21vZH'.'VsZX'.'M'.'v'.'aW50cmFuZXQ'.'vcGFuZW'.'xfYnV0d'.'G9uLnBocA==','RU5D'.'T0RF','WQ==');return base64_decode($_147071883[$_1740977749]);}};$GLOBALS['____136593470'][0](___1954422099(0), ___1954422099(1));class CBXFeatures{ private static $_443748546= 30; private static $_262797167= array( "Portal" => array( "CompanyCalendar", "CompanyPhoto", "CompanyVideo", "CompanyCareer", "StaffChanges", "StaffAbsence", "CommonDocuments", "MeetingRoomBookingSystem", "Wiki", "Learning", "Vote", "WebLink", "Subscribe", "Friends", "PersonalFiles", "PersonalBlog", "PersonalPhoto", "PersonalForum", "Blog", "Forum", "Gallery", "Board", "MicroBlog", "WebMessenger",), "Communications" => array( "Tasks", "Calendar", "Workgroups", "Jabber", "VideoConference", "Extranet", "SMTP", "Requests", "DAV", "intranet_sharepoint", "timeman", "Idea", "Meeting", "EventList", "Salary", "XDImport",), "Enterprise" => array( "BizProc", "Lists", "Support", "Analytics", "crm", "Controller", "LdapUnlimitedUsers",), "Holding" => array( "Cluster", "MultiSites",),); private static $_2129135583= null; private static $_1446415359= null; private static function __1891434822(){ if(self::$_2129135583 === null){ self::$_2129135583= array(); foreach(self::$_262797167 as $_1731711038 => $_1125745703){ foreach($_1125745703 as $_38637257) self::$_2129135583[$_38637257]= $_1731711038;}} if(self::$_1446415359 === null){ self::$_1446415359= array(); $_1748040516= COption::GetOptionString(___1954422099(2), ___1954422099(3), ___1954422099(4)); if($_1748040516 != ___1954422099(5)){ $_1748040516= $GLOBALS['____136593470'][1]($_1748040516); $_1748040516= $GLOBALS['____136593470'][2]($_1748040516,[___1954422099(6) => false]); if($GLOBALS['____136593470'][3]($_1748040516)){ self::$_1446415359= $_1748040516;}} if(empty(self::$_1446415359)){ self::$_1446415359= array(___1954422099(7) => array(), ___1954422099(8) => array());}}} public static function InitiateEditionsSettings($_731740680){ self::__1891434822(); $_657327009= array(); foreach(self::$_262797167 as $_1731711038 => $_1125745703){ $_617634722= $GLOBALS['____136593470'][4]($_1731711038, $_731740680); self::$_1446415359[___1954422099(9)][$_1731711038]=($_617634722? array(___1954422099(10)): array(___1954422099(11))); foreach($_1125745703 as $_38637257){ self::$_1446415359[___1954422099(12)][$_38637257]= $_617634722; if(!$_617634722) $_657327009[]= array($_38637257, false);}} $_1925915385= $GLOBALS['____136593470'][5](self::$_1446415359); $_1925915385= $GLOBALS['____136593470'][6]($_1925915385); COption::SetOptionString(___1954422099(13), ___1954422099(14), $_1925915385); foreach($_657327009 as $_875361084) self::__1710371264($_875361084[(172*2-344)], $_875361084[round(0+1)]);} public static function IsFeatureEnabled($_38637257){ if($_38637257 == '') return true; self::__1891434822(); if(!isset(self::$_2129135583[$_38637257])) return true; if(self::$_2129135583[$_38637257] == ___1954422099(15)) $_664425081= array(___1954422099(16)); elseif(isset(self::$_1446415359[___1954422099(17)][self::$_2129135583[$_38637257]])) $_664425081= self::$_1446415359[___1954422099(18)][self::$_2129135583[$_38637257]]; else $_664425081= array(___1954422099(19)); if($_664425081[(834-2*417)] != ___1954422099(20) && $_664425081[(1024/2-512)] != ___1954422099(21)){ return false;} elseif($_664425081[(1468/2-734)] == ___1954422099(22)){ if($_664425081[round(0+0.2+0.2+0.2+0.2+0.2)]< $GLOBALS['____136593470'][7]((1312/2-656), min(174,0,58),(946-2*473), Date(___1954422099(23)), $GLOBALS['____136593470'][8](___1954422099(24))- self::$_443748546, $GLOBALS['____136593470'][9](___1954422099(25)))){ if(!isset($_664425081[round(0+0.66666666666667+0.66666666666667+0.66666666666667)]) ||!$_664425081[round(0+2)]) self::__130780785(self::$_2129135583[$_38637257]); return false;}} return!isset(self::$_1446415359[___1954422099(26)][$_38637257]) || self::$_1446415359[___1954422099(27)][$_38637257];} public static function IsFeatureInstalled($_38637257){ if($GLOBALS['____136593470'][10]($_38637257) <= 0) return true; self::__1891434822(); return(isset(self::$_1446415359[___1954422099(28)][$_38637257]) && self::$_1446415359[___1954422099(29)][$_38637257]);} public static function IsFeatureEditable($_38637257){ if($_38637257 == '') return true; self::__1891434822(); if(!isset(self::$_2129135583[$_38637257])) return true; if(self::$_2129135583[$_38637257] == ___1954422099(30)) $_664425081= array(___1954422099(31)); elseif(isset(self::$_1446415359[___1954422099(32)][self::$_2129135583[$_38637257]])) $_664425081= self::$_1446415359[___1954422099(33)][self::$_2129135583[$_38637257]]; else $_664425081= array(___1954422099(34)); if($_664425081[(187*2-374)] != ___1954422099(35) && $_664425081[min(70,0,23.333333333333)] != ___1954422099(36)){ return false;} elseif($_664425081[min(42,0,14)] == ___1954422099(37)){ if($_664425081[round(0+0.5+0.5)]< $GLOBALS['____136593470'][11](min(240,0,80),(190*2-380),(1468/2-734), Date(___1954422099(38)), $GLOBALS['____136593470'][12](___1954422099(39))- self::$_443748546, $GLOBALS['____136593470'][13](___1954422099(40)))){ if(!isset($_664425081[round(0+0.5+0.5+0.5+0.5)]) ||!$_664425081[round(0+2)]) self::__130780785(self::$_2129135583[$_38637257]); return false;}} return true;} private static function __1710371264($_38637257, $_80612035){ if($GLOBALS['____136593470'][14]("CBXFeatures", "On".$_38637257."SettingsChange")) $GLOBALS['____136593470'][15](array("CBXFeatures", "On".$_38637257."SettingsChange"), array($_38637257, $_80612035)); $_123750082= $GLOBALS['_____1617710820'][0](___1954422099(41), ___1954422099(42).$_38637257.___1954422099(43)); while($_870695355= $_123750082->Fetch()) $GLOBALS['_____1617710820'][1]($_870695355, array($_38637257, $_80612035));} public static function SetFeatureEnabled($_38637257, $_80612035= true, $_712524748= true){ if($GLOBALS['____136593470'][16]($_38637257) <= 0) return; if(!self::IsFeatureEditable($_38637257)) $_80612035= false; $_80612035= (bool)$_80612035; self::__1891434822(); $_1814396812=(!isset(self::$_1446415359[___1954422099(44)][$_38637257]) && $_80612035 || isset(self::$_1446415359[___1954422099(45)][$_38637257]) && $_80612035 != self::$_1446415359[___1954422099(46)][$_38637257]); self::$_1446415359[___1954422099(47)][$_38637257]= $_80612035; $_1925915385= $GLOBALS['____136593470'][17](self::$_1446415359); $_1925915385= $GLOBALS['____136593470'][18]($_1925915385); COption::SetOptionString(___1954422099(48), ___1954422099(49), $_1925915385); if($_1814396812 && $_712524748) self::__1710371264($_38637257, $_80612035);} private static function __130780785($_1731711038){ if($GLOBALS['____136593470'][19]($_1731711038) <= 0 || $_1731711038 == "Portal") return; self::__1891434822(); if(!isset(self::$_1446415359[___1954422099(50)][$_1731711038]) || self::$_1446415359[___1954422099(51)][$_1731711038][(161*2-322)] != ___1954422099(52)) return; if(isset(self::$_1446415359[___1954422099(53)][$_1731711038][round(0+0.5+0.5+0.5+0.5)]) && self::$_1446415359[___1954422099(54)][$_1731711038][round(0+0.5+0.5+0.5+0.5)]) return; $_657327009= array(); if(isset(self::$_262797167[$_1731711038]) && $GLOBALS['____136593470'][20](self::$_262797167[$_1731711038])){ foreach(self::$_262797167[$_1731711038] as $_38637257){ if(isset(self::$_1446415359[___1954422099(55)][$_38637257]) && self::$_1446415359[___1954422099(56)][$_38637257]){ self::$_1446415359[___1954422099(57)][$_38637257]= false; $_657327009[]= array($_38637257, false);}} self::$_1446415359[___1954422099(58)][$_1731711038][round(0+0.4+0.4+0.4+0.4+0.4)]= true;} $_1925915385= $GLOBALS['____136593470'][21](self::$_1446415359); $_1925915385= $GLOBALS['____136593470'][22]($_1925915385); COption::SetOptionString(___1954422099(59), ___1954422099(60), $_1925915385); foreach($_657327009 as $_875361084) self::__1710371264($_875361084[min(120,0,40)], $_875361084[round(0+1)]);} public static function ModifyFeaturesSettings($_731740680, $_1125745703){ self::__1891434822(); foreach($_731740680 as $_1731711038 => $_842511005) self::$_1446415359[___1954422099(61)][$_1731711038]= $_842511005; $_657327009= array(); foreach($_1125745703 as $_38637257 => $_80612035){ if(!isset(self::$_1446415359[___1954422099(62)][$_38637257]) && $_80612035 || isset(self::$_1446415359[___1954422099(63)][$_38637257]) && $_80612035 != self::$_1446415359[___1954422099(64)][$_38637257]) $_657327009[]= array($_38637257, $_80612035); self::$_1446415359[___1954422099(65)][$_38637257]= $_80612035;} $_1925915385= $GLOBALS['____136593470'][23](self::$_1446415359); $_1925915385= $GLOBALS['____136593470'][24]($_1925915385); COption::SetOptionString(___1954422099(66), ___1954422099(67), $_1925915385); self::$_1446415359= false; foreach($_657327009 as $_875361084) self::__1710371264($_875361084[(1124/2-562)], $_875361084[round(0+0.5+0.5)]);} public static function SaveFeaturesSettings($_2105677659, $_310016649){ self::__1891434822(); $_1277293896= array(___1954422099(68) => array(), ___1954422099(69) => array()); if(!$GLOBALS['____136593470'][25]($_2105677659)) $_2105677659= array(); if(!$GLOBALS['____136593470'][26]($_310016649)) $_310016649= array(); if(!$GLOBALS['____136593470'][27](___1954422099(70), $_2105677659)) $_2105677659[]= ___1954422099(71); foreach(self::$_262797167 as $_1731711038 => $_1125745703){ if(isset(self::$_1446415359[___1954422099(72)][$_1731711038])){ $_306364367= self::$_1446415359[___1954422099(73)][$_1731711038];} else{ $_306364367=($_1731711038 == ___1954422099(74)? array(___1954422099(75)): array(___1954422099(76)));} if($_306364367[(183*2-366)] == ___1954422099(77) || $_306364367[(1372/2-686)] == ___1954422099(78)){ $_1277293896[___1954422099(79)][$_1731711038]= $_306364367;} else{ if($GLOBALS['____136593470'][28]($_1731711038, $_2105677659)) $_1277293896[___1954422099(80)][$_1731711038]= array(___1954422099(81), $GLOBALS['____136593470'][29]((1376/2-688),(1096/2-548),(978-2*489), $GLOBALS['____136593470'][30](___1954422099(82)), $GLOBALS['____136593470'][31](___1954422099(83)), $GLOBALS['____136593470'][32](___1954422099(84)))); else $_1277293896[___1954422099(85)][$_1731711038]= array(___1954422099(86));}} $_657327009= array(); foreach(self::$_2129135583 as $_38637257 => $_1731711038){ if($_1277293896[___1954422099(87)][$_1731711038][(204*2-408)] != ___1954422099(88) && $_1277293896[___1954422099(89)][$_1731711038][(138*2-276)] != ___1954422099(90)){ $_1277293896[___1954422099(91)][$_38637257]= false;} else{ if($_1277293896[___1954422099(92)][$_1731711038][(998-2*499)] == ___1954422099(93) && $_1277293896[___1954422099(94)][$_1731711038][round(0+0.25+0.25+0.25+0.25)]< $GLOBALS['____136593470'][33]((1260/2-630),(1164/2-582),(842-2*421), Date(___1954422099(95)), $GLOBALS['____136593470'][34](___1954422099(96))- self::$_443748546, $GLOBALS['____136593470'][35](___1954422099(97)))) $_1277293896[___1954422099(98)][$_38637257]= false; else $_1277293896[___1954422099(99)][$_38637257]= $GLOBALS['____136593470'][36]($_38637257, $_310016649); if(!isset(self::$_1446415359[___1954422099(100)][$_38637257]) && $_1277293896[___1954422099(101)][$_38637257] || isset(self::$_1446415359[___1954422099(102)][$_38637257]) && $_1277293896[___1954422099(103)][$_38637257] != self::$_1446415359[___1954422099(104)][$_38637257]) $_657327009[]= array($_38637257, $_1277293896[___1954422099(105)][$_38637257]);}} $_1925915385= $GLOBALS['____136593470'][37]($_1277293896); $_1925915385= $GLOBALS['____136593470'][38]($_1925915385); COption::SetOptionString(___1954422099(106), ___1954422099(107), $_1925915385); self::$_1446415359= false; foreach($_657327009 as $_875361084) self::__1710371264($_875361084[(1196/2-598)], $_875361084[round(0+0.25+0.25+0.25+0.25)]);} public static function GetFeaturesList(){ self::__1891434822(); $_1903143172= array(); foreach(self::$_262797167 as $_1731711038 => $_1125745703){ if(isset(self::$_1446415359[___1954422099(108)][$_1731711038])){ $_306364367= self::$_1446415359[___1954422099(109)][$_1731711038];} else{ $_306364367=($_1731711038 == ___1954422099(110)? array(___1954422099(111)): array(___1954422099(112)));} $_1903143172[$_1731711038]= array( ___1954422099(113) => $_306364367[min(142,0,47.333333333333)], ___1954422099(114) => $_306364367[round(0+0.25+0.25+0.25+0.25)], ___1954422099(115) => array(),); $_1903143172[$_1731711038][___1954422099(116)]= false; if($_1903143172[$_1731711038][___1954422099(117)] == ___1954422099(118)){ $_1903143172[$_1731711038][___1954422099(119)]= $GLOBALS['____136593470'][39](($GLOBALS['____136593470'][40]()- $_1903143172[$_1731711038][___1954422099(120)])/ round(0+86400)); if($_1903143172[$_1731711038][___1954422099(121)]> self::$_443748546) $_1903143172[$_1731711038][___1954422099(122)]= true;} foreach($_1125745703 as $_38637257) $_1903143172[$_1731711038][___1954422099(123)][$_38637257]=(!isset(self::$_1446415359[___1954422099(124)][$_38637257]) || self::$_1446415359[___1954422099(125)][$_38637257]);} return $_1903143172;} private static function __1389168006($_991590107, $_1488002587){ if(IsModuleInstalled($_991590107) == $_1488002587) return true; $_44991943= $_SERVER[___1954422099(126)].___1954422099(127).$_991590107.___1954422099(128); if(!$GLOBALS['____136593470'][41]($_44991943)) return false; include_once($_44991943); $_2115763011= $GLOBALS['____136593470'][42](___1954422099(129), ___1954422099(130), $_991590107); if(!$GLOBALS['____136593470'][43]($_2115763011)) return false; $_918438329= new $_2115763011; if($_1488002587){ if(!$_918438329->InstallDB()) return false; $_918438329->InstallEvents(); if(!$_918438329->InstallFiles()) return false;} else{ if(CModule::IncludeModule(___1954422099(131))) CSearch::DeleteIndex($_991590107); UnRegisterModule($_991590107);} return true;} protected static function OnRequestsSettingsChange($_38637257, $_80612035){ self::__1389168006("form", $_80612035);} protected static function OnLearningSettingsChange($_38637257, $_80612035){ self::__1389168006("learning", $_80612035);} protected static function OnJabberSettingsChange($_38637257, $_80612035){ self::__1389168006("xmpp", $_80612035);} protected static function OnVideoConferenceSettingsChange($_38637257, $_80612035){ self::__1389168006("video", $_80612035);} protected static function OnBizProcSettingsChange($_38637257, $_80612035){ self::__1389168006("bizprocdesigner", $_80612035);} protected static function OnListsSettingsChange($_38637257, $_80612035){ self::__1389168006("lists", $_80612035);} protected static function OnWikiSettingsChange($_38637257, $_80612035){ self::__1389168006("wiki", $_80612035);} protected static function OnSupportSettingsChange($_38637257, $_80612035){ self::__1389168006("support", $_80612035);} protected static function OnControllerSettingsChange($_38637257, $_80612035){ self::__1389168006("controller", $_80612035);} protected static function OnAnalyticsSettingsChange($_38637257, $_80612035){ self::__1389168006("statistic", $_80612035);} protected static function OnVoteSettingsChange($_38637257, $_80612035){ self::__1389168006("vote", $_80612035);} protected static function OnFriendsSettingsChange($_38637257, $_80612035){ if($_80612035) $_56238936= "Y"; else $_56238936= ___1954422099(132); $_441912775= CSite::GetList(___1954422099(133), ___1954422099(134), array(___1954422099(135) => ___1954422099(136))); while($_1238828959= $_441912775->Fetch()){ if(COption::GetOptionString(___1954422099(137), ___1954422099(138), ___1954422099(139), $_1238828959[___1954422099(140)]) != $_56238936){ COption::SetOptionString(___1954422099(141), ___1954422099(142), $_56238936, false, $_1238828959[___1954422099(143)]); COption::SetOptionString(___1954422099(144), ___1954422099(145), $_56238936);}}} protected static function OnMicroBlogSettingsChange($_38637257, $_80612035){ if($_80612035) $_56238936= "Y"; else $_56238936= ___1954422099(146); $_441912775= CSite::GetList(___1954422099(147), ___1954422099(148), array(___1954422099(149) => ___1954422099(150))); while($_1238828959= $_441912775->Fetch()){ if(COption::GetOptionString(___1954422099(151), ___1954422099(152), ___1954422099(153), $_1238828959[___1954422099(154)]) != $_56238936){ COption::SetOptionString(___1954422099(155), ___1954422099(156), $_56238936, false, $_1238828959[___1954422099(157)]); COption::SetOptionString(___1954422099(158), ___1954422099(159), $_56238936);} if(COption::GetOptionString(___1954422099(160), ___1954422099(161), ___1954422099(162), $_1238828959[___1954422099(163)]) != $_56238936){ COption::SetOptionString(___1954422099(164), ___1954422099(165), $_56238936, false, $_1238828959[___1954422099(166)]); COption::SetOptionString(___1954422099(167), ___1954422099(168), $_56238936);}}} protected static function OnPersonalFilesSettingsChange($_38637257, $_80612035){ if($_80612035) $_56238936= "Y"; else $_56238936= ___1954422099(169); $_441912775= CSite::GetList(___1954422099(170), ___1954422099(171), array(___1954422099(172) => ___1954422099(173))); while($_1238828959= $_441912775->Fetch()){ if(COption::GetOptionString(___1954422099(174), ___1954422099(175), ___1954422099(176), $_1238828959[___1954422099(177)]) != $_56238936){ COption::SetOptionString(___1954422099(178), ___1954422099(179), $_56238936, false, $_1238828959[___1954422099(180)]); COption::SetOptionString(___1954422099(181), ___1954422099(182), $_56238936);}}} protected static function OnPersonalBlogSettingsChange($_38637257, $_80612035){ if($_80612035) $_56238936= "Y"; else $_56238936= ___1954422099(183); $_441912775= CSite::GetList(___1954422099(184), ___1954422099(185), array(___1954422099(186) => ___1954422099(187))); while($_1238828959= $_441912775->Fetch()){ if(COption::GetOptionString(___1954422099(188), ___1954422099(189), ___1954422099(190), $_1238828959[___1954422099(191)]) != $_56238936){ COption::SetOptionString(___1954422099(192), ___1954422099(193), $_56238936, false, $_1238828959[___1954422099(194)]); COption::SetOptionString(___1954422099(195), ___1954422099(196), $_56238936);}}} protected static function OnPersonalPhotoSettingsChange($_38637257, $_80612035){ if($_80612035) $_56238936= "Y"; else $_56238936= ___1954422099(197); $_441912775= CSite::GetList(___1954422099(198), ___1954422099(199), array(___1954422099(200) => ___1954422099(201))); while($_1238828959= $_441912775->Fetch()){ if(COption::GetOptionString(___1954422099(202), ___1954422099(203), ___1954422099(204), $_1238828959[___1954422099(205)]) != $_56238936){ COption::SetOptionString(___1954422099(206), ___1954422099(207), $_56238936, false, $_1238828959[___1954422099(208)]); COption::SetOptionString(___1954422099(209), ___1954422099(210), $_56238936);}}} protected static function OnPersonalForumSettingsChange($_38637257, $_80612035){ if($_80612035) $_56238936= "Y"; else $_56238936= ___1954422099(211); $_441912775= CSite::GetList(___1954422099(212), ___1954422099(213), array(___1954422099(214) => ___1954422099(215))); while($_1238828959= $_441912775->Fetch()){ if(COption::GetOptionString(___1954422099(216), ___1954422099(217), ___1954422099(218), $_1238828959[___1954422099(219)]) != $_56238936){ COption::SetOptionString(___1954422099(220), ___1954422099(221), $_56238936, false, $_1238828959[___1954422099(222)]); COption::SetOptionString(___1954422099(223), ___1954422099(224), $_56238936);}}} protected static function OnTasksSettingsChange($_38637257, $_80612035){ if($_80612035) $_56238936= "Y"; else $_56238936= ___1954422099(225); $_441912775= CSite::GetList(___1954422099(226), ___1954422099(227), array(___1954422099(228) => ___1954422099(229))); while($_1238828959= $_441912775->Fetch()){ if(COption::GetOptionString(___1954422099(230), ___1954422099(231), ___1954422099(232), $_1238828959[___1954422099(233)]) != $_56238936){ COption::SetOptionString(___1954422099(234), ___1954422099(235), $_56238936, false, $_1238828959[___1954422099(236)]); COption::SetOptionString(___1954422099(237), ___1954422099(238), $_56238936);} if(COption::GetOptionString(___1954422099(239), ___1954422099(240), ___1954422099(241), $_1238828959[___1954422099(242)]) != $_56238936){ COption::SetOptionString(___1954422099(243), ___1954422099(244), $_56238936, false, $_1238828959[___1954422099(245)]); COption::SetOptionString(___1954422099(246), ___1954422099(247), $_56238936);}} self::__1389168006(___1954422099(248), $_80612035);} protected static function OnCalendarSettingsChange($_38637257, $_80612035){ if($_80612035) $_56238936= "Y"; else $_56238936= ___1954422099(249); $_441912775= CSite::GetList(___1954422099(250), ___1954422099(251), array(___1954422099(252) => ___1954422099(253))); while($_1238828959= $_441912775->Fetch()){ if(COption::GetOptionString(___1954422099(254), ___1954422099(255), ___1954422099(256), $_1238828959[___1954422099(257)]) != $_56238936){ COption::SetOptionString(___1954422099(258), ___1954422099(259), $_56238936, false, $_1238828959[___1954422099(260)]); COption::SetOptionString(___1954422099(261), ___1954422099(262), $_56238936);} if(COption::GetOptionString(___1954422099(263), ___1954422099(264), ___1954422099(265), $_1238828959[___1954422099(266)]) != $_56238936){ COption::SetOptionString(___1954422099(267), ___1954422099(268), $_56238936, false, $_1238828959[___1954422099(269)]); COption::SetOptionString(___1954422099(270), ___1954422099(271), $_56238936);}}} protected static function OnSMTPSettingsChange($_38637257, $_80612035){ self::__1389168006("mail", $_80612035);} protected static function OnExtranetSettingsChange($_38637257, $_80612035){ $_1436127967= COption::GetOptionString("extranet", "extranet_site", ""); if($_1436127967){ $_1455775759= new CSite; $_1455775759->Update($_1436127967, array(___1954422099(272) =>($_80612035? ___1954422099(273): ___1954422099(274))));} self::__1389168006(___1954422099(275), $_80612035);} protected static function OnDAVSettingsChange($_38637257, $_80612035){ self::__1389168006("dav", $_80612035);} protected static function OntimemanSettingsChange($_38637257, $_80612035){ self::__1389168006("timeman", $_80612035);} protected static function Onintranet_sharepointSettingsChange($_38637257, $_80612035){ if($_80612035){ RegisterModuleDependences("iblock", "OnAfterIBlockElementAdd", "intranet", "CIntranetEventHandlers", "SPRegisterUpdatedItem"); RegisterModuleDependences(___1954422099(276), ___1954422099(277), ___1954422099(278), ___1954422099(279), ___1954422099(280)); CAgent::AddAgent(___1954422099(281), ___1954422099(282), ___1954422099(283), round(0+125+125+125+125)); CAgent::AddAgent(___1954422099(284), ___1954422099(285), ___1954422099(286), round(0+100+100+100)); CAgent::AddAgent(___1954422099(287), ___1954422099(288), ___1954422099(289), round(0+720+720+720+720+720));} else{ UnRegisterModuleDependences(___1954422099(290), ___1954422099(291), ___1954422099(292), ___1954422099(293), ___1954422099(294)); UnRegisterModuleDependences(___1954422099(295), ___1954422099(296), ___1954422099(297), ___1954422099(298), ___1954422099(299)); CAgent::RemoveAgent(___1954422099(300), ___1954422099(301)); CAgent::RemoveAgent(___1954422099(302), ___1954422099(303)); CAgent::RemoveAgent(___1954422099(304), ___1954422099(305));}} protected static function OncrmSettingsChange($_38637257, $_80612035){ if($_80612035) COption::SetOptionString("crm", "form_features", "Y"); self::__1389168006(___1954422099(306), $_80612035);} protected static function OnClusterSettingsChange($_38637257, $_80612035){ self::__1389168006("cluster", $_80612035);} protected static function OnMultiSitesSettingsChange($_38637257, $_80612035){ if($_80612035) RegisterModuleDependences("main", "OnBeforeProlog", "main", "CWizardSolPanelIntranet", "ShowPanel", 100, "/modules/intranet/panel_button.php"); else UnRegisterModuleDependences(___1954422099(307), ___1954422099(308), ___1954422099(309), ___1954422099(310), ___1954422099(311), ___1954422099(312));} protected static function OnIdeaSettingsChange($_38637257, $_80612035){ self::__1389168006("idea", $_80612035);} protected static function OnMeetingSettingsChange($_38637257, $_80612035){ self::__1389168006("meeting", $_80612035);} protected static function OnXDImportSettingsChange($_38637257, $_80612035){ self::__1389168006("xdimport", $_80612035);}} $GLOBALS['____136593470'][44](___1954422099(313), ___1954422099(314));/**/			//Do not remove this

require_once(__DIR__."/autoload.php");

// Component 2.0 template engines
$GLOBALS['arCustomTemplateEngines'] = [];

// User fields manager
$GLOBALS['USER_FIELD_MANAGER'] = new CUserTypeManager;

// todo: remove global
$GLOBALS['BX_MENU_CUSTOM'] = CMenuCustom::getInstance();

if (file_exists(($_fname = __DIR__."/classes/general/update_db_updater.php")))
{
	$US_HOST_PROCESS_MAIN = false;
	include($_fname);
}

if (file_exists(($_fname = $_SERVER["DOCUMENT_ROOT"]."/bitrix/init.php")))
{
	include_once($_fname);
}

if (($_fname = getLocalPath("php_interface/init.php", BX_PERSONAL_ROOT)) !== false)
{
	include_once($_SERVER["DOCUMENT_ROOT"].$_fname);
}

if (($_fname = getLocalPath("php_interface/".SITE_ID."/init.php", BX_PERSONAL_ROOT)) !== false)
{
	include_once($_SERVER["DOCUMENT_ROOT"].$_fname);
}

//global var, is used somewhere
$GLOBALS["sDocPath"] = $GLOBALS["APPLICATION"]->GetCurPage();

if ((!(defined("STATISTIC_ONLY") && STATISTIC_ONLY && mb_substr($GLOBALS["APPLICATION"]->GetCurPage(), 0, mb_strlen(BX_ROOT."/admin/")) != BX_ROOT."/admin/")) && COption::GetOptionString("main", "include_charset", "Y")=="Y" && LANG_CHARSET <> '')
{
	header("Content-Type: text/html; charset=".LANG_CHARSET);
}

if (COption::GetOptionString("main", "set_p3p_header", "Y")=="Y")
{
	header("P3P: policyref=\"/bitrix/p3p.xml\", CP=\"NON DSP COR CUR ADM DEV PSA PSD OUR UNR BUS UNI COM NAV INT DEM STA\"");
}

$license = $application->getLicense();
header("X-Powered-CMS: Bitrix Site Manager (" . ($license->isDemoKey() ? "DEMO" : $license->getPublicHashKey()) . ")");

if (COption::GetOptionString("main", "update_devsrv", "") == "Y")
{
	header("X-DevSrv-CMS: Bitrix");
}

//agents
if (COption::GetOptionString("main", "check_agents", "Y") == "Y")
{
	$application->addBackgroundJob(["CAgent", "CheckAgents"], [], \Bitrix\Main\Application::JOB_PRIORITY_LOW);
}

//send email events
if (COption::GetOptionString("main", "check_events", "Y") !== "N")
{
	$application->addBackgroundJob(['\Bitrix\Main\Mail\EventManager', 'checkEvents'], [], \Bitrix\Main\Application::JOB_PRIORITY_LOW-1);
}

$healerOfEarlySessionStart = new HealerEarlySessionStart();
$healerOfEarlySessionStart->process($application->getKernelSession());

$kernelSession = $application->getKernelSession();
$kernelSession->start();
$application->getSessionLocalStorageManager()->setUniqueId($kernelSession->getId());

foreach (GetModuleEvents("main", "OnPageStart", true) as $arEvent)
{
	ExecuteModuleEventEx($arEvent);
}

//define global user object
$GLOBALS["USER"] = new CUser;

//session control from group policy
$arPolicy = $GLOBALS["USER"]->GetSecurityPolicy();
$currTime = time();
if (
	(
		//IP address changed
		$kernelSession['SESS_IP']
		&& $arPolicy["SESSION_IP_MASK"] <> ''
		&& (
			(ip2long($arPolicy["SESSION_IP_MASK"]) & ip2long($kernelSession['SESS_IP']))
			!=
			(ip2long($arPolicy["SESSION_IP_MASK"]) & ip2long($_SERVER['REMOTE_ADDR']))
		)
	)
	||
	(
		//session timeout
		$arPolicy["SESSION_TIMEOUT"]>0
		&& $kernelSession['SESS_TIME']>0
		&& $currTime-$arPolicy["SESSION_TIMEOUT"]*60 > $kernelSession['SESS_TIME']
	)
	||
	(
		//signed session
		isset($kernelSession["BX_SESSION_SIGN"])
		&& $kernelSession["BX_SESSION_SIGN"] <> bitrix_sess_sign()
	)
	||
	(
		//session manually expired, e.g. in $User->LoginHitByHash
		isSessionExpired()
	)
)
{
	$compositeSessionManager = $application->getCompositeSessionManager();
	$compositeSessionManager->destroy();

	$application->getSession()->setId(Main\Security\Random::getString(32));
	$compositeSessionManager->start();

	$GLOBALS["USER"] = new CUser;
}
$kernelSession['SESS_IP'] = $_SERVER['REMOTE_ADDR'] ?? null;
if (empty($kernelSession['SESS_TIME']))
{
	$kernelSession['SESS_TIME'] = $currTime;
}
elseif (($currTime - $kernelSession['SESS_TIME']) > 60)
{
	$kernelSession['SESS_TIME'] = $currTime;
}
if (!isset($kernelSession["BX_SESSION_SIGN"]))
{
	$kernelSession["BX_SESSION_SIGN"] = bitrix_sess_sign();
}

//session control from security module
if (
	(COption::GetOptionString("main", "use_session_id_ttl", "N") == "Y")
	&& (COption::GetOptionInt("main", "session_id_ttl", 0) > 0)
	&& !defined("BX_SESSION_ID_CHANGE")
)
{
	if (!isset($kernelSession['SESS_ID_TIME']))
	{
		$kernelSession['SESS_ID_TIME'] = $currTime;
	}
	elseif (($kernelSession['SESS_ID_TIME'] + COption::GetOptionInt("main", "session_id_ttl")) < $kernelSession['SESS_TIME'])
	{
		$compositeSessionManager = $application->getCompositeSessionManager();
		$compositeSessionManager->regenerateId();

		$kernelSession['SESS_ID_TIME'] = $currTime;
	}
}

define("BX_STARTED", true);

if (isset($kernelSession['BX_ADMIN_LOAD_AUTH']))
{
	define('ADMIN_SECTION_LOAD_AUTH', 1);
	unset($kernelSession['BX_ADMIN_LOAD_AUTH']);
}

$bRsaError = false;
$USER_LID = false;

if (!defined("NOT_CHECK_PERMISSIONS") || NOT_CHECK_PERMISSIONS!==true)
{
	$doLogout = isset($_REQUEST["logout"]) && (strtolower($_REQUEST["logout"]) == "yes");

	if ($doLogout && $GLOBALS["USER"]->IsAuthorized())
	{
		$secureLogout = (\Bitrix\Main\Config\Option::get("main", "secure_logout", "N") == "Y");

		if (!$secureLogout || check_bitrix_sessid())
		{
			$GLOBALS["USER"]->Logout();
			LocalRedirect($GLOBALS["APPLICATION"]->GetCurPageParam('', array('logout', 'sessid')));
		}
	}

	// authorize by cookies
	if (!$GLOBALS["USER"]->IsAuthorized())
	{
		$GLOBALS["USER"]->LoginByCookies();
	}

	$arAuthResult = false;

	//http basic and digest authorization
	if (($httpAuth = $GLOBALS["USER"]->LoginByHttpAuth()) !== null)
	{
		$arAuthResult = $httpAuth;
		$GLOBALS["APPLICATION"]->SetAuthResult($arAuthResult);
	}

	//Authorize user from authorization html form
	//Only POST is accepted
	if (isset($_POST["AUTH_FORM"]) && $_POST["AUTH_FORM"] <> '')
	{
		if (COption::GetOptionString('main', 'use_encrypted_auth', 'N') == 'Y')
		{
			//possible encrypted user password
			$sec = new CRsaSecurity();
			if (($arKeys = $sec->LoadKeys()))
			{
				$sec->SetKeys($arKeys);
				$errno = $sec->AcceptFromForm(['USER_PASSWORD', 'USER_CONFIRM_PASSWORD', 'USER_CURRENT_PASSWORD']);
				if ($errno == CRsaSecurity::ERROR_SESS_CHECK)
				{
					$arAuthResult = array("MESSAGE"=>GetMessage("main_include_decode_pass_sess"), "TYPE"=>"ERROR");
				}
				elseif ($errno < 0)
				{
					$arAuthResult = array("MESSAGE"=>GetMessage("main_include_decode_pass_err", array("#ERRCODE#"=>$errno)), "TYPE"=>"ERROR");
				}

				if ($errno < 0)
				{
					$bRsaError = true;
				}
			}
		}

		if (!$bRsaError)
		{
			if (!defined("ADMIN_SECTION") || ADMIN_SECTION !== true)
			{
				$USER_LID = SITE_ID;
			}

			$_POST["TYPE"] = $_POST["TYPE"] ?? null;
			if (isset($_POST["TYPE"]) && $_POST["TYPE"] == "AUTH")
			{
				$arAuthResult = $GLOBALS["USER"]->Login(
					$_POST["USER_LOGIN"] ?? '',
					$_POST["USER_PASSWORD"] ?? '',
					$_POST["USER_REMEMBER"] ?? ''
				);
			}
			elseif (isset($_POST["TYPE"]) && $_POST["TYPE"] == "OTP")
			{
				$arAuthResult = $GLOBALS["USER"]->LoginByOtp(
					$_POST["USER_OTP"] ?? '',
					$_POST["OTP_REMEMBER"] ?? '',
					$_POST["captcha_word"] ?? '',
					$_POST["captcha_sid"] ?? ''
				);
			}
			elseif (isset($_POST["TYPE"]) && $_POST["TYPE"] == "SEND_PWD")
			{
				$arAuthResult = CUser::SendPassword(
					$_POST["USER_LOGIN"] ?? '',
					$_POST["USER_EMAIL"] ?? '',
					$USER_LID,
					$_POST["captcha_word"] ?? '',
					$_POST["captcha_sid"] ?? '',
					$_POST["USER_PHONE_NUMBER"] ?? ''
				);
			}
			elseif (isset($_POST["TYPE"]) && $_POST["TYPE"] == "CHANGE_PWD")
			{
				$arAuthResult = $GLOBALS["USER"]->ChangePassword(
					$_POST["USER_LOGIN"] ?? '',
					$_POST["USER_CHECKWORD"] ?? '',
					$_POST["USER_PASSWORD"] ?? '',
					$_POST["USER_CONFIRM_PASSWORD"] ?? '',
					$USER_LID,
					$_POST["captcha_word"] ?? '',
					$_POST["captcha_sid"] ?? '',
					true,
					$_POST["USER_PHONE_NUMBER"] ?? '',
					$_POST["USER_CURRENT_PASSWORD"] ?? ''
				);
			}

			if ($_POST["TYPE"] == "AUTH" || $_POST["TYPE"] == "OTP")
			{
				//special login form in the control panel
				if ($arAuthResult === true && defined('ADMIN_SECTION') && ADMIN_SECTION === true)
				{
					//store cookies for next hit (see CMain::GetSpreadCookieHTML())
					$GLOBALS["APPLICATION"]->StoreCookies();
					$kernelSession['BX_ADMIN_LOAD_AUTH'] = true;

					// die() follows
					CMain::FinalActions('<script type="text/javascript">window.onload=function(){(window.BX || window.parent.BX).AUTHAGENT.setAuthResult(false);};</script>');
				}
			}
		}
		$GLOBALS["APPLICATION"]->SetAuthResult($arAuthResult);
	}
	elseif (!$GLOBALS["USER"]->IsAuthorized() && isset($_REQUEST['bx_hit_hash']))
	{
		//Authorize by unique URL
		$GLOBALS["USER"]->LoginHitByHash($_REQUEST['bx_hit_hash']);
	}
}

//logout or re-authorize the user if something importand has changed
$GLOBALS["USER"]->CheckAuthActions();

//magic short URI
if (defined("BX_CHECK_SHORT_URI") && BX_CHECK_SHORT_URI && CBXShortUri::CheckUri())
{
	//local redirect inside
	die();
}

//application password scope control
if (($applicationID = $GLOBALS["USER"]->getContext()->getApplicationId()) !== null)
{
	$appManager = Main\Authentication\ApplicationManager::getInstance();
	if ($appManager->checkScope($applicationID) !== true)
	{
		$event = new Main\Event("main", "onApplicationScopeError", Array('APPLICATION_ID' => $applicationID));
		$event->send();

		$context->getResponse()->setStatus("403 Forbidden");
		$application->end();
	}
}

//define the site template
if (!defined("ADMIN_SECTION") || ADMIN_SECTION !== true)
{
	$siteTemplate = "";
	if (isset($_REQUEST["bitrix_preview_site_template"]) && is_string($_REQUEST["bitrix_preview_site_template"]) && $_REQUEST["bitrix_preview_site_template"] <> "" && $GLOBALS["USER"]->CanDoOperation('view_other_settings'))
	{
		//preview of site template
		$signer = new Bitrix\Main\Security\Sign\Signer();
		try
		{
			//protected by a sign
			$requestTemplate = $signer->unsign($_REQUEST["bitrix_preview_site_template"], "template_preview".bitrix_sessid());

			$aTemplates = CSiteTemplate::GetByID($requestTemplate);
			if ($template = $aTemplates->Fetch())
			{
				$siteTemplate = $template["ID"];

				//preview of unsaved template
				if (isset($_GET['bx_template_preview_mode']) && $_GET['bx_template_preview_mode'] == 'Y' && $GLOBALS["USER"]->CanDoOperation('edit_other_settings'))
				{
					define("SITE_TEMPLATE_PREVIEW_MODE", true);
				}
			}
		}
		catch(\Bitrix\Main\Security\Sign\BadSignatureException $e)
		{
		}
	}
	if ($siteTemplate == "")
	{
		$siteTemplate = CSite::GetCurTemplate();
	}

	if (!defined('SITE_TEMPLATE_ID'))
	{
		define("SITE_TEMPLATE_ID", $siteTemplate);
	}

	define("SITE_TEMPLATE_PATH", getLocalPath('templates/'.SITE_TEMPLATE_ID, BX_PERSONAL_ROOT));
}
else
{
	// prevents undefined constants
	if (!defined('SITE_TEMPLATE_ID'))
	{
		define('SITE_TEMPLATE_ID', '.default');
	}

	define('SITE_TEMPLATE_PATH', '/bitrix/templates/.default');
}

//magic parameters: show page creation time
if (isset($_GET["show_page_exec_time"]))
{
	if ($_GET["show_page_exec_time"]=="Y" || $_GET["show_page_exec_time"]=="N")
	{
		$kernelSession["SESS_SHOW_TIME_EXEC"] = $_GET["show_page_exec_time"];
	}
}

//magic parameters: show included file processing time
if (isset($_GET["show_include_exec_time"]))
{
	if ($_GET["show_include_exec_time"]=="Y" || $_GET["show_include_exec_time"]=="N")
	{
		$kernelSession["SESS_SHOW_INCLUDE_TIME_EXEC"] = $_GET["show_include_exec_time"];
	}
}

//magic parameters: show include areas
if (isset($_GET["bitrix_include_areas"]) && $_GET["bitrix_include_areas"] <> "")
{
	$GLOBALS["APPLICATION"]->SetShowIncludeAreas($_GET["bitrix_include_areas"]=="Y");
}

//magic sound
if ($GLOBALS["USER"]->IsAuthorized())
{
	$cookie_prefix = COption::GetOptionString('main', 'cookie_name', 'BITRIX_SM');
	if (!isset($_COOKIE[$cookie_prefix.'_SOUND_LOGIN_PLAYED']))
	{
		$GLOBALS["APPLICATION"]->set_cookie('SOUND_LOGIN_PLAYED', 'Y', 0);
	}
}

//magic cache
\Bitrix\Main\Composite\Engine::shouldBeEnabled();

// should be before proactive filter on OnBeforeProlog
$userPassword = $_POST["USER_PASSWORD"] ?? null;
$userConfirmPassword = $_POST["USER_CONFIRM_PASSWORD"] ?? null;

foreach(GetModuleEvents("main", "OnBeforeProlog", true) as $arEvent)
{
	ExecuteModuleEventEx($arEvent);
}

if (!defined("NOT_CHECK_PERMISSIONS") || NOT_CHECK_PERMISSIONS !== true)
{
	//Register user from authorization html form
	//Only POST is accepted
	if (isset($_POST["AUTH_FORM"]) && $_POST["AUTH_FORM"] != '' && isset($_POST["TYPE"]) && $_POST["TYPE"] == "REGISTRATION")
	{
		if (!$bRsaError)
		{
			if (COption::GetOptionString("main", "new_user_registration", "N") == "Y" && (!defined("ADMIN_SECTION") || ADMIN_SECTION !== true))
			{
				$arAuthResult = $GLOBALS["USER"]->Register(
					$_POST["USER_LOGIN"] ?? '',
					$_POST["USER_NAME"] ?? '',
					$_POST["USER_LAST_NAME"] ?? '',
					$userPassword,
					$userConfirmPassword,
					$_POST["USER_EMAIL"] ?? '',
					$USER_LID,
					$_POST["captcha_word"] ?? '',
					$_POST["captcha_sid"] ?? '',
					false,
					$_POST["USER_PHONE_NUMBER"] ?? ''
				);

				$GLOBALS["APPLICATION"]->SetAuthResult($arAuthResult);
			}
		}
	}
}

if ((!defined("NOT_CHECK_PERMISSIONS") || NOT_CHECK_PERMISSIONS!==true) && (!defined("NOT_CHECK_FILE_PERMISSIONS") || NOT_CHECK_FILE_PERMISSIONS!==true))
{
	$real_path = $context->getRequest()->getScriptFile();

	if (!$GLOBALS["USER"]->CanDoFileOperation('fm_view_file', array(SITE_ID, $real_path)) || (defined("NEED_AUTH") && NEED_AUTH && !$GLOBALS["USER"]->IsAuthorized()))
	{
		if ($GLOBALS["USER"]->IsAuthorized() && $arAuthResult["MESSAGE"] == '')
		{
			$arAuthResult = array("MESSAGE"=>GetMessage("ACCESS_DENIED").' '.GetMessage("ACCESS_DENIED_FILE", array("#FILE#"=>$real_path)), "TYPE"=>"ERROR");

			if (COption::GetOptionString("main", "event_log_permissions_fail", "N") === "Y")
			{
				CEventLog::Log("SECURITY", "USER_PERMISSIONS_FAIL", "main", $GLOBALS["USER"]->GetID(), $real_path);
			}
		}

		if (defined("ADMIN_SECTION") && ADMIN_SECTION === true)
		{
			if (isset($_REQUEST["mode"]) && ($_REQUEST["mode"] === "list" || $_REQUEST["mode"] === "settings"))
			{
				echo "<script>top.location='".$GLOBALS["APPLICATION"]->GetCurPage()."?".DeleteParam(array("mode"))."';</script>";
				die();
			}
			elseif (isset($_REQUEST["mode"]) && $_REQUEST["mode"] === "frame")
			{
				echo "<script type=\"text/javascript\">
					var w = (opener? opener.window:parent.window);
					w.location.href='".$GLOBALS["APPLICATION"]->GetCurPage()."?".DeleteParam(array("mode"))."';
				</script>";
				die();
			}
			elseif (defined("MOBILE_APP_ADMIN") && MOBILE_APP_ADMIN === true)
			{
				echo json_encode(Array("status"=>"failed"));
				die();
			}
		}

		/** @noinspection PhpUndefinedVariableInspection */
		$GLOBALS["APPLICATION"]->AuthForm($arAuthResult);
	}
}

/*ZDUyZmZNDUwZDc0ZGNiM2EzNmIxMThkNjU0M2MxOWUyMjg1NmQ=*/$GLOBALS['____658354820']= array(base64_decode(''.'bXRfcmFuZA='.'='),base64_decode('ZXhwbG9kZQ='.'='),base64_decode(''.'cGFja'.'w=='),base64_decode('bWQ1'),base64_decode('Y29uc'.'3Rhbn'.'Q'.'='),base64_decode('a'.'GFzaF9'.'ob'.'W'.'Fj'),base64_decode(''.'c'.'3RyY21w'),base64_decode(''.'aXN'.'fb'.'2JqZWN0'),base64_decode('Y2'.'FsbF91'.'c2VyX2'.'Z'.'1b'.'mM'.'='),base64_decode('Y2Fsb'.'F'.'91'.'c2VyX2'.'Z'.'1bmM='),base64_decode('Y2FsbF91c2Vy'.'X2Z'.'1bmM='),base64_decode('Y2'.'F'.'sbF91c2VyX2Z1'.'bmM='),base64_decode(''.'Y'.'2Fs'.'bF'.'91c'.'2'.'VyX'.'2Z1bmM'.'='));if(!function_exists(__NAMESPACE__.'\\___1338437531')){function ___1338437531($_1059302035){static $_552718780= false; if($_552718780 == false) $_552718780=array('REI=','U0'.'VMRUNU'.'IF'.'ZBTFVFIE'.'Z'.'ST'.'00gYl9vcHR'.'pb24'.'g'.'V0hF'.'UkUgTkFNR'.'T0nflBBUkFNX01BWF9VU0VSUy'.'c'.'gQU5EIE1PRFVMR'.'V9'.'JRD0nbWFpbicgQU5EIFNJVEVfSUQgSV'.'MgTlVMTA==','VkFMVUU=','Lg==','SC'.'o=','Ym'.'l'.'0cml4','TEl'.'DRU5TRV9LRV'.'k=',''.'c2hh'.'Mj'.'U'.'2','VVNFUg==','VVN'.'FUg==',''.'VVNFUg'.'==','SXNBdX'.'Rob3'.'JpemVk','VVNF'.'U'.'g'.'==','S'.'XNBZG1pbg==',''.'QVBQTE'.'lDQVRJT'.'04=','Um'.'VzdGF'.'ydEJ1ZmZ'.'lcg'.'='.'=','T'.'G9'.'jYWxSZW'.'Rp'.'cmVjdA==','L2xpY2Vuc2Vf'.'c'.'mVz'.'dHJp'.'Y3Rp'.'b24ucGhw','XEJ'.'pd'.'H'.'JpeFxN'.'Y'.'Wl'.'u'.'XE'.'NvbmZpZ1'.'xPcHR'.'pb24'.'6OnNldA==',''.'bWFp'.'bg==',''.'UEFSQ'.'U1fTU'.'FYX1VTR'.'VJT');return base64_decode($_552718780[$_1059302035]);}};if($GLOBALS['____658354820'][0](round(0+0.2+0.2+0.2+0.2+0.2), round(0+6.6666666666667+6.6666666666667+6.6666666666667)) == round(0+3.5+3.5)){ $_966666154= $GLOBALS[___1338437531(0)]->Query(___1338437531(1), true); if($_1663027917= $_966666154->Fetch()){ $_1235438659= $_1663027917[___1338437531(2)]; list($_1469756848, $_587347442)= $GLOBALS['____658354820'][1](___1338437531(3), $_1235438659); $_288013524= $GLOBALS['____658354820'][2](___1338437531(4), $_1469756848); $_83719339= ___1338437531(5).$GLOBALS['____658354820'][3]($GLOBALS['____658354820'][4](___1338437531(6))); $_810225893= $GLOBALS['____658354820'][5](___1338437531(7), $_587347442, $_83719339, true); if($GLOBALS['____658354820'][6]($_810225893, $_288013524) !==(1072/2-536)){ if(isset($GLOBALS[___1338437531(8)]) && $GLOBALS['____658354820'][7]($GLOBALS[___1338437531(9)]) && $GLOBALS['____658354820'][8](array($GLOBALS[___1338437531(10)], ___1338437531(11))) &&!$GLOBALS['____658354820'][9](array($GLOBALS[___1338437531(12)], ___1338437531(13)))){ $GLOBALS['____658354820'][10](array($GLOBALS[___1338437531(14)], ___1338437531(15))); $GLOBALS['____658354820'][11](___1338437531(16), ___1338437531(17), true);}}} else{ $GLOBALS['____658354820'][12](___1338437531(18), ___1338437531(19), ___1338437531(20), round(0+2.4+2.4+2.4+2.4+2.4));}}/**/       //Do not remove this

