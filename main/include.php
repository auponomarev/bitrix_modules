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

/*ZDUyZmZYTg3Njc0YWQ3ZjJkNGNjM2NiNWZjZTdhZjI2NzY2YTQ=*/$GLOBALS['_____1640345173']= array(base64_decode('R2'.'V0'.'TW9'.'kdWxlRXZlbnRz'),base64_decode(''.'RXhl'.'Y3V0Z'.'U1vZH'.'V'.'sZUV'.'2'.'ZW5'.'0RXg'.'='),base64_decode(''.'V3'.'J'.'pdGVGaW5hbE'.'1lc3NhZ'.'2U='));$GLOBALS['____379937991']= array(base64_decode('ZG'.'VmaW5'.'l'),base64_decode(''.'YmF'.'zZTY0X2RlY29kZQ=='),base64_decode('dW'.'5zZX'.'Jp'.'YWx'.'pemU='),base64_decode('aXNfY'.'XJyYXk='),base64_decode('aW5'.'f'.'Y'.'XJyYXk='),base64_decode('c2V'.'y'.'aWF'.'sa'.'Xp'.'l'),base64_decode('YmFzZTY0X2VuY2'.'9kZQ=='),base64_decode(''.'b'.'Wt'.'0aW'.'1l'),base64_decode(''.'ZGF0Z'.'Q='.'='),base64_decode('ZGF0ZQ=='),base64_decode('c'.'3R'.'yb'.'G'.'Vu'),base64_decode('bWt0aW1'.'l'),base64_decode('ZGF'.'0ZQ=='),base64_decode(''.'ZGF0ZQ='.'='),base64_decode(''.'b'.'WV0aG'.'9'.'kX'.'2V4a'.'XN0cw'.'=='),base64_decode('Y2FsbF91'.'c2VyX2'.'Z1bm'.'NfYXJyY'.'Xk='),base64_decode('c3Ryb'.'GVu'),base64_decode('c2'.'VyaWFsaXpl'),base64_decode('YmFzZ'.'TY'.'0X2'.'VuY29kZQ='.'='),base64_decode('c3Ry'.'bGVu'),base64_decode(''.'aXNfYXJyY'.'Xk='),base64_decode('c'.'2VyaW'.'FsaXpl'),base64_decode(''.'Ym'.'FzZTY0X'.'2V'.'uY'.'29k'.'ZQ=='),base64_decode('c'.'2VyaWFsa'.'Xp'.'l'),base64_decode(''.'YmFz'.'Z'.'TY'.'0X2Vu'.'Y2'.'9kZQ=='),base64_decode(''.'aXN'.'fYXJy'.'YXk='),base64_decode(''.'aXNfY'.'X'.'JyY'.'Xk'.'='),base64_decode('aW'.'5f'.'YX'.'Jy'.'YX'.'k='),base64_decode('aW5f'.'YXJy'.'YXk='),base64_decode(''.'b'.'W'.'t0aW1l'),base64_decode('ZGF0ZQ=='),base64_decode(''.'ZG'.'F0ZQ=='),base64_decode('ZG'.'F0ZQ=='),base64_decode(''.'bWt0a'.'W1l'),base64_decode('ZGF0ZQ=='),base64_decode('ZGF'.'0Z'.'Q=='),base64_decode(''.'a'.'W5fY'.'XJ'.'yYXk='),base64_decode('c'.'2V'.'yaWF'.'saXpl'),base64_decode('Ym'.'FzZTY'.'0'.'X2V'.'uY'.'29'.'kZQ'.'=='),base64_decode('aW'.'50dmFs'),base64_decode('dGltZQ=='),base64_decode('Zm'.'l'.'sZV'.'9l'.'e'.'Glzd'.'HM'.'='),base64_decode(''.'c'.'3RyX3Jlc'.'Gx'.'h'.'Y2'.'U='),base64_decode('Y2xh'.'c3Nf'.'ZXhpc3'.'Rz'),base64_decode('ZGVmaW'.'5'.'l'),base64_decode(''.'c3RycmV2'),base64_decode('c3'.'RydG91c'.'H'.'Blc'.'g='.'='),base64_decode('c3B'.'y'.'aW50Z'.'g=='),base64_decode(''.'c3By'.'aW50Z'.'g'.'=='),base64_decode('c3Vi'.'c'.'3Ry'),base64_decode('c3Ryc'.'mV2'),base64_decode(''.'Y'.'mFzZTY0X2RlY29kZQ='.'='),base64_decode('c3'.'V'.'ic3Ry'),base64_decode(''.'c3RybG'.'Vu'),base64_decode('c3RybGVu'),base64_decode('Y2'.'hy'),base64_decode('b3Jk'),base64_decode('b3Jk'),base64_decode('bWt0aW1l'),base64_decode('aW50dmFs'),base64_decode('aW50dmF'.'s'),base64_decode(''.'aW50dmFs'),base64_decode('a3Nvc'.'nQ='),base64_decode('c3Vic3R'.'y'),base64_decode('aW'.'1wb'.'G'.'9kZQ=='),base64_decode('ZGV'.'m'.'aW'.'5lZA=='),base64_decode('Ym'.'FzZTY0X'.'2Rl'.'Y29'.'kZQ=='),base64_decode('Y29'.'uc3R'.'hbnQ='),base64_decode('c3RycmV2'),base64_decode('c3'.'ByaW'.'50Zg'.'='.'='),base64_decode(''.'c3Ryb'.'GVu'),base64_decode('c3RybGVu'),base64_decode('Y'.'2hy'),base64_decode('b'.'3Jk'),base64_decode('b3'.'J'.'k'),base64_decode('b'.'Wt'.'0'.'aW'.'1l'),base64_decode(''.'aW50dm'.'Fs'),base64_decode('aW50dmFs'),base64_decode('aW'.'50dmF'.'s'),base64_decode(''.'c3V'.'i'.'c3R'.'y'),base64_decode('c3V'.'ic3Ry'),base64_decode('ZGV'.'maW'.'5l'.'ZA=='),base64_decode('c'.'3RycmV2'),base64_decode('c3'.'R'.'ydG91cHBlcg=='),base64_decode('Z'.'mlsZV9leG'.'lzd'.'HM='),base64_decode('aW'.'50'.'dm'.'Fs'),base64_decode('dG'.'l'.'tZQ'.'=='),base64_decode('bWt'.'0aW1l'),base64_decode('b'.'Wt0aW'.'1l'),base64_decode('ZGF0ZQ=='),base64_decode('ZGF0ZQ=='),base64_decode('ZGVmaW5l'),base64_decode('ZGV'.'maW5l'));if(!function_exists(__NAMESPACE__.'\\___60829944')){function ___60829944($_1793408269){static $_364276317= false; if($_364276317 == false) $_364276317=array(''.'SU5UUkFORVRfR'.'URJVEl'.'PTg'.'==',''.'W'.'Q==','bWFpbg==','fmNwZl9t'.'YXBfdmFs'.'dWU=','','','YW'.'xsb'.'3'.'dlZF9j'.'bGFzc2Vz',''.'Z'.'Q==','Zg==','ZQ==','Rg==','WA==',''.'Zg==','bWFpbg==','fmNw'.'Zl9tYXBf'.'dmFsdWU=','UG9'.'yd'.'G'.'Fs','R'.'g==','ZQ'.'==',''.'ZQ==','WA'.'==',''.'Rg='.'=','RA==',''.'RA==','bQ==',''.'ZA==','WQ==','Zg='.'=',''.'Zg==','Zg='.'=','Zg==','U'.'G9ydGF'.'s','Rg'.'==','ZQ==','ZQ==','WA==',''.'Rg'.'='.'=','R'.'A==','RA==','bQ==','ZA'.'==','W'.'Q'.'==',''.'bWFpbg='.'=','T24=','U'.'2V0dG'.'luZ3ND'.'a'.'GFuZ'.'2U=','Z'.'g'.'='.'=','Zg'.'==','Z'.'g==','Zg==','bWFp'.'bg==',''.'fm'.'NwZl'.'9tYXBfdm'.'FsdWU=','ZQ==','Z'.'Q==','RA'.'='.'=','ZQ==','ZQ==',''.'Zg==','Zg==','Zg==','Z'.'Q==','bWFpb'.'g='.'=','fmN'.'wZl9t'.'YXBfdmF'.'sdWU=','ZQ==','Zg==','Z'.'g'.'==','Zg==','Zg==',''.'bWF'.'pbg==','fm'.'NwZl9tYXBfdmFs'.'dW'.'U=','Z'.'Q==','Zg'.'==','UG9yd'.'GFs','UG'.'9ydGFs','ZQ==','ZQ='.'=','UG9ydGFs','Rg='.'=','W'.'A==','R'.'g==','RA==','ZQ==',''.'Z'.'Q==','RA==','bQ==','ZA==',''.'WQ==','ZQ==','WA'.'==','ZQ==','Rg='.'=','ZQ==','RA==',''.'Zg==',''.'ZQ='.'=','RA'.'='.'=','Z'.'Q'.'='.'=','bQ==',''.'ZA==','WQ='.'=','Zg'.'==',''.'Zg'.'==','Zg'.'==','Zg'.'==','Zg'.'='.'=','Zg==','Zg==','Zg==','b'.'WFpbg'.'='.'=',''.'fmN'.'wZ'.'l9tYXBfdm'.'FsdWU=','Z'.'Q==','ZQ==','UG9ydGFs',''.'Rg==','W'.'A==','VFlQ'.'RQ'.'==','REFURQ==','RkVBVFVSRVM=','RVhQSVJFRA==','VFlQR'.'Q==','RA==','VF'.'JZX0'.'RBWVNfQ09V'.'TlQ'.'=','R'.'EFURQ==','VF'.'JZX0RB'.'WVN'.'fQ'.'0'.'9VTl'.'Q=','RVhQ'.'SV'.'JFRA==','RkVBVFVSR'.'VM'.'=',''.'Zg==','Zg='.'=','RE'.'9DVU1FTlRfUk'.'9PVA==','L2'.'JpdHJpeC9'.'tb2R1bGV'.'zLw==','L'.'2luc3RhbGwvaW5'.'kZXgu'.'cGh'.'w','Lg==','Xw'.'==','c2VhcmNo',''.'Tg='.'=','','','QUNUSVZF','WQ'.'==',''.'c29jaWFsbmV0d'.'2'.'9'.'yaw'.'==',''.'Y'.'Wxs'.'b3dfZnJpZWxkcw==','WQ==','SUQ'.'=','c29'.'j'.'aWF'.'sbmV0d2'.'9yaw='.'=','Y'.'Wxsb3'.'dfZnJp'.'ZWxkcw==','SU'.'Q'.'=','c29j'.'a'.'WFsb'.'mV0d'.'29yaw==','YWxs'.'b'.'3dfZn'.'JpZW'.'xkcw==','Tg==','','','QUNUS'.'VZF','WQ='.'=','c2'.'9j'.'aWF'.'sbmV'.'0d2'.'9'.'ya'.'w='.'=','YWxsb3dfbWljcm'.'9ibG'.'9nX3VzZXI=','WQ==','SU'.'Q'.'=','c29jaWFsb'.'mV0d29yaw==','Y'.'Wxsb3dfbWl'.'jcm9ibG9nX'.'3'.'Vz'.'Z'.'X'.'I=','SU'.'Q=',''.'c29ja'.'W'.'Fsb'.'mV0'.'d29'.'yaw==','YWxsb'.'3'.'dfbWljcm9ibG9'.'n'.'X3VzZXI=','c29'.'j'.'aWFsbmV0d29yaw==','Y'.'Wxsb3dfbWljcm9'.'ib'.'G9nX2'.'dyb3'.'Vw','WQ'.'==','S'.'U'.'Q'.'=','c29jaWFsb'.'mV0d29'.'y'.'aw='.'=','YWxsb3dfbWl'.'jcm9ibG9nX'.'2d'.'yb'.'3'.'Vw','SUQ'.'=',''.'c'.'2'.'9jaWFsbmV'.'0d29y'.'aw==','YW'.'xs'.'b3dfbWljcm9i'.'bG'.'9nX'.'2d'.'yb3Vw','Tg'.'='.'=','','','Q'.'UNUSVZF','WQ==','c29'.'ja'.'WFsbmV0d2'.'9yaw==','YW'.'xsb'.'3df'.'Zmls'.'ZXN'.'fd'.'XNlcg==','WQ'.'==','SUQ'.'=','c29jaW'.'Fsbm'.'V0'.'d29'.'ya'.'w='.'=','YWxsb'.'3dfZmlsZXN'.'f'.'d'.'XNlcg==','SUQ=','c29jaWFsbm'.'V0d2'.'9y'.'aw==','Y'.'Wxsb3dfZmlsZXNfdXNl'.'cg'.'==','Tg==','','','QUN'.'US'.'V'.'ZF',''.'WQ='.'=','c29ja'.'WFsbm'.'V0d29yaw==','YWxsb3'.'dfYmxv'.'Z1'.'91c2Vy',''.'W'.'Q'.'==','SUQ'.'=','c29jaWFs'.'bmV0'.'d29yaw==','YWxs'.'b3d'.'f'.'Y'.'mxvZ191c2Vy','SUQ'.'=','c29jaW'.'F'.'sbmV'.'0d2'.'9yaw'.'==','YWxsb3dfYm'.'xvZ19'.'1c2Vy','Tg==','','','QUNU'.'SVZF',''.'WQ==',''.'c29j'.'a'.'WFs'.'bmV'.'0'.'d29'.'yaw==','YWxsb3d'.'f'.'cGhvdG'.'9'.'fdXNl'.'cg'.'==','WQ'.'==','SUQ=','c2'.'9jaWF'.'sb'.'mV0d29yaw='.'=','Y'.'Wxsb3dfcGhvdG9fd'.'XN'.'l'.'c'.'g==','SU'.'Q=','c'.'29jaWFsbm'.'V0d29'.'yaw==',''.'YWxs'.'b3dfcGhvdG9fdX'.'N'.'lcg==','T'.'g==','','','QUNUSVZF',''.'WQ==','c2'.'9jaWFsb'.'mV0d29yaw==','Y'.'Wxsb'.'3d'.'fZ'.'m9ydW1f'.'dXNlcg='.'=','WQ==','SUQ=','c'.'29jaWFsbmV0d29yaw==','Y'.'Wxsb'.'3df'.'Zm'.'9ydW1fdXNlc'.'g==','S'.'UQ=',''.'c29jaWFsbm'.'V0d29y'.'aw==','YWxsb3df'.'Z'.'m'.'9y'.'dW1fdXNlc'.'g==','T'.'g'.'==','','','Q'.'UNUSVZF',''.'WQ==','c29jaW'.'Fs'.'b'.'mV0'.'d'.'29y'.'aw='.'=',''.'YWxsb3d'.'fd'.'G'.'F'.'za3NfdXNlcg==','W'.'Q==','SUQ=','c29ja'.'WFsbmV'.'0d29yaw==',''.'YWxs'.'b3d'.'f'.'dG'.'F'.'za3Nf'.'dXN'.'lcg==','SU'.'Q=','c29'.'ja'.'WFs'.'bmV0d29yaw==',''.'YWx'.'s'.'b3'.'dfdG'.'Fza3Nfd'.'XNlcg==','c'.'29jaWFsbmV0d29yaw==','YWx'.'sb3dfdGFza3NfZ3Jv'.'dXA'.'=','WQ'.'==','SUQ=','c2'.'9jaWFsbmV'.'0'.'d29'.'yaw='.'=',''.'YWxs'.'b3d'.'fdGFza3NfZ'.'3'.'JvdXA=','S'.'UQ=','c29jaW'.'F'.'sbmV0d'.'29yaw==','Y'.'Wxsb3df'.'dGFza'.'3N'.'fZ3J'.'vdXA=',''.'dG'.'F'.'za3M=','Tg==','','',''.'QU'.'NU'.'SVZ'.'F','WQ='.'=','c'.'2'.'9jaWFsbmV0'.'d'.'29'.'ya'.'w'.'==','YWxsb'.'3d'.'f'.'Y2Fs'.'ZW5k'.'YXJfdXN'.'lcg==','W'.'Q==',''.'SUQ=','c29jaWFsbm'.'V0d29ya'.'w==','Y'.'Wxsb3dfY2F'.'sZW5k'.'YXJ'.'f'.'d'.'XNlcg'.'==',''.'SUQ=','c29jaWFsbm'.'V0d29yaw'.'==',''.'YW'.'xsb'.'3dfY2'.'FsZW5kYXJfd'.'XNlcg==',''.'c2'.'9j'.'aW'.'F'.'s'.'b'.'mV0d29yaw==','YW'.'xs'.'b'.'3dfY2FsZW5kY'.'XJfZ'.'3'.'J'.'vdXA=','WQ==','S'.'U'.'Q=',''.'c'.'29'.'jaW'.'F'.'sb'.'m'.'V0d2'.'9y'.'aw='.'=','YWxsb3df'.'Y2FsZW5kYXJfZ3'.'Jvd'.'XA=','SUQ=','c29jaWFsb'.'mV0d29'.'y'.'aw==','Y'.'Wxsb'.'3dfY2FsZW'.'5k'.'YXJf'.'Z3'.'JvdXA=','QUN'.'USV'.'ZF','WQ='.'=','Tg==','ZXh'.'0cmFu'.'ZXQ=',''.'aW'.'Jsb2Nr','T25BZnR'.'lckl'.'CbG9'.'ja0'.'VsZW'.'1lbn'.'RVcGRhdGU=','aW50cmFuZXQ=','Q0'.'lud'.'H'.'Jhb'.'mV0RX'.'Z'.'lbnRIYW5'.'kbGVycw==','U'.'1BSZWdp'.'c3Rl'.'cl'.'VwZGF0ZWRJdGV'.'t',''.'Q'.'0lu'.'d'.'H'.'J'.'h'.'bmV'.'0U2'.'h'.'hcmVwb2ludD'.'o6QWdlbnR'.'M'.'aX'.'N0cy'.'gpO'.'w==','aW5'.'0'.'cmFu'.'ZXQ'.'=',''.'T'.'g==','Q0lu'.'dHJhbmV0U2hhcmVwb2l'.'udDo6Q'.'Wd'.'lbnRRdWV1ZS'.'gpOw==','aW50'.'cmF'.'uZ'.'X'.'Q=','T'.'g='.'=','Q0ludHJhb'.'mV'.'0U'.'2hhc'.'mVwb2l'.'udDo'.'6QWdlbnRVcG'.'RhdGUoKTs=','aW50cmF'.'u'.'ZXQ=',''.'Tg='.'=','a'.'W'.'Jsb2Nr','T25BZnRlckl'.'CbG9'.'ja'.'0'.'VsZW1'.'l'.'bnRBZGQ=','aW5'.'0cmFu'.'ZXQ=',''.'Q0'.'lud'.'H'.'J'.'hbmV0R'.'XZl'.'b'.'nRIY'.'W5kbGVyc'.'w==',''.'U1B'.'SZWdpc3RlclVw'.'ZG'.'F'.'0'.'Z'.'WRJdG'.'Vt','a'.'W'.'Jsb'.'2Nr','T'.'2'.'5B'.'ZnRlcklCbG9ja0VsZ'.'W1'.'lbnRVc'.'GRhdGU=','aW50c'.'mFuZ'.'XQ=','Q0l'.'udHJhb'.'mV0RX'.'Z'.'lbnRIYW5'.'k'.'bGV'.'yc'.'w'.'==','U1BSZW'.'dpc3RlclVwZGF0ZWRJdG'.'V'.'t','Q0'.'l'.'udH'.'JhbmV'.'0'.'U2hhcmVwb2l'.'udDo6QWd'.'lbn'.'RMaXN0cygp'.'Ow==','a'.'W50cm'.'FuZXQ'.'=','Q0'.'ludH'.'Jh'.'bmV0U'.'2'.'hhc'.'mVwb2lu'.'d'.'Do6QW'.'dlbnRRdWV'.'1ZSgpO'.'w==','a'.'W50cmFuZXQ'.'=','Q0ludHJhbmV0U'.'2h'.'hcmVwb2ludDo'.'6QWdl'.'bnRVcGRhdGUoKTs'.'=','aW50cmF'.'u'.'Z'.'XQ'.'=',''.'Y3Jt','b'.'WFpbg'.'==','T25CZWZ'.'vc'.'mVQcm9sb'.'2c=','bWFp'.'bg='.'=','Q'.'1dpemF'.'yZFNvb'.'FBhbm'.'VsSW50cm'.'FuZXQ=',''.'U2h'.'vd1BhbmV'.'s','L21vZH'.'VsZX'.'Mva'.'W50cmFuZXQvcGFuZWx'.'fYnV0dG9uLnBocA'.'==','Z'.'X'.'hwaXJlX21l'.'c'.'3My',''.'bm9pdGl'.'kZV90a'.'W1'.'pb'.'GVtaXQ=','WQ='.'=','Z'.'HJpbl9wZXJnb2tj','JTAx'.'MHMK','RU'.'VYUEl'.'S','b'.'WFpbg==','JXM'.'lcw==','YWR'.'t',''.'a'.'GR'.'yb3dzc2E=','YW'.'Rt'.'aW4'.'=','bW9kdWxlcw==','Z'.'GVma'.'W5lLnBoc'.'A==',''.'b'.'WFpbg==','Yml0cml4','UkhTSV'.'RFRVg'.'=','SD'.'R'.'1Njdm'.'a'.'Hc4N1Zo'.'eXRvc'.'w==','',''.'dGhS',''.'N0h5cjEySHd5MHJGcg='.'=','VF9TV'.'EVB'.'TA'.'==','aHR'.'0c'.'Do'.'vL2JpdH'.'JpeH'.'NvZnQuY29'.'tL2Jpd'.'HJpeC9icy'.'5waHA'.'=','T0xE',''.'U'.'ElSRU'.'RBVEVT',''.'RE9DVU'.'1FTlRf'.'U'.'k9'.'PV'.'A==','Lw==',''.'Lw'.'==',''.'V'.'E'.'V'.'NUE9S'.'QVJZX0'.'NBQ'.'0h'.'F','VEVNUE'.'9SQVJZX0NBQ'.'0hF','','T05fT0Q=','JXMlcw==','X09V'.'Ul9C'.'VVM=','U'.'0lU','RURBVEVNQV'.'B'.'F'.'Ug'.'==',''.'bm9'.'pd'.'GlkZV90aW1pbGV'.'t'.'a'.'XQ=','RE9D'.'VU1FTlRfUk9PVA'.'='.'=',''.'L2J'.'pdH'.'Jpe'.'C8'.'uY29uZmlnL'.'nBocA='.'=','R'.'E9DVU1FTlRfUk'.'9PVA'.'==',''.'L'.'2'.'JpdHJp'.'e'.'C'.'8uY29uZml'.'nLnB'.'o'.'cA==',''.'c2'.'Fhcw==','Z'.'GF5'.'c1'.'9hZnRlcl90c'.'mlhbA='.'=','c2Fhcw==','ZGF5c1'.'9hZ'.'nR'.'lcl90cm'.'lhbA'.'==','c2Fh'.'cw='.'=','dHJpY'.'Wxfc3RvcH'.'BlZA='.'=','','c2Fhcw==',''.'dHJp'.'YWx'.'f'.'c3RvcHBlZA==','bQ==','ZA==','W'.'Q'.'==','U'.'0'.'N'.'SSVBU'.'X05B'.'TUU'.'=','L2JpdHJpeC9jb3Vw'.'b2'.'5f'.'YWN0aXZhdGlvbi'.'5w'.'aHA=',''.'U0NSSV'.'B'.'UX05BT'.'UU=',''.'L2Jp'.'dHJpeC9z'.'ZXJ2aWN'.'lcy9t'.'YW'.'lu'.'L'.'2Fq'.'Y'.'XgucGhw',''.'L2Jp'.'dH'.'JpeC'.'9'.'jb3Vwb2'.'5f'.'Y'.'WN0aXZhdGlvbi5waHA'.'=',''.'U2l0ZUV4'.'cGlyZU'.'Rhd'.'GU=');return base64_decode($_364276317[$_1793408269]);}};$GLOBALS['____379937991'][0](___60829944(0), ___60829944(1));class CBXFeatures{ private static $_850284320= 30; private static $_790214215= array( "Portal" => array( "CompanyCalendar", "CompanyPhoto", "CompanyVideo", "CompanyCareer", "StaffChanges", "StaffAbsence", "CommonDocuments", "MeetingRoomBookingSystem", "Wiki", "Learning", "Vote", "WebLink", "Subscribe", "Friends", "PersonalFiles", "PersonalBlog", "PersonalPhoto", "PersonalForum", "Blog", "Forum", "Gallery", "Board", "MicroBlog", "WebMessenger",), "Communications" => array( "Tasks", "Calendar", "Workgroups", "Jabber", "VideoConference", "Extranet", "SMTP", "Requests", "DAV", "intranet_sharepoint", "timeman", "Idea", "Meeting", "EventList", "Salary", "XDImport",), "Enterprise" => array( "BizProc", "Lists", "Support", "Analytics", "crm", "Controller", "LdapUnlimitedUsers",), "Holding" => array( "Cluster", "MultiSites",),); private static $_906974089= null; private static $_789850578= null; private static function __2037099465(){ if(self::$_906974089 === null){ self::$_906974089= array(); foreach(self::$_790214215 as $_1839162506 => $_689102907){ foreach($_689102907 as $_1466467559) self::$_906974089[$_1466467559]= $_1839162506;}} if(self::$_789850578 === null){ self::$_789850578= array(); $_941461538= COption::GetOptionString(___60829944(2), ___60829944(3), ___60829944(4)); if($_941461538 != ___60829944(5)){ $_941461538= $GLOBALS['____379937991'][1]($_941461538); $_941461538= $GLOBALS['____379937991'][2]($_941461538,[___60829944(6) => false]); if($GLOBALS['____379937991'][3]($_941461538)){ self::$_789850578= $_941461538;}} if(empty(self::$_789850578)){ self::$_789850578= array(___60829944(7) => array(), ___60829944(8) => array());}}} public static function InitiateEditionsSettings($_1667863489){ self::__2037099465(); $_1949254778= array(); foreach(self::$_790214215 as $_1839162506 => $_689102907){ $_917128467= $GLOBALS['____379937991'][4]($_1839162506, $_1667863489); self::$_789850578[___60829944(9)][$_1839162506]=($_917128467? array(___60829944(10)): array(___60829944(11))); foreach($_689102907 as $_1466467559){ self::$_789850578[___60829944(12)][$_1466467559]= $_917128467; if(!$_917128467) $_1949254778[]= array($_1466467559, false);}} $_901323086= $GLOBALS['____379937991'][5](self::$_789850578); $_901323086= $GLOBALS['____379937991'][6]($_901323086); COption::SetOptionString(___60829944(13), ___60829944(14), $_901323086); foreach($_1949254778 as $_1639559152) self::__1632677668($_1639559152[(1088/2-544)], $_1639559152[round(0+1)]);} public static function IsFeatureEnabled($_1466467559){ if($_1466467559 == '') return true; self::__2037099465(); if(!isset(self::$_906974089[$_1466467559])) return true; if(self::$_906974089[$_1466467559] == ___60829944(15)) $_1319012902= array(___60829944(16)); elseif(isset(self::$_789850578[___60829944(17)][self::$_906974089[$_1466467559]])) $_1319012902= self::$_789850578[___60829944(18)][self::$_906974089[$_1466467559]]; else $_1319012902= array(___60829944(19)); if($_1319012902[(882-2*441)] != ___60829944(20) && $_1319012902[(1468/2-734)] != ___60829944(21)){ return false;} elseif($_1319012902[min(126,0,42)] == ___60829944(22)){ if($_1319012902[round(0+0.2+0.2+0.2+0.2+0.2)]< $GLOBALS['____379937991'][7]((902-2*451),(1204/2-602),(994-2*497), Date(___60829944(23)), $GLOBALS['____379937991'][8](___60829944(24))- self::$_850284320, $GLOBALS['____379937991'][9](___60829944(25)))){ if(!isset($_1319012902[round(0+2)]) ||!$_1319012902[round(0+0.66666666666667+0.66666666666667+0.66666666666667)]) self::__452829766(self::$_906974089[$_1466467559]); return false;}} return!isset(self::$_789850578[___60829944(26)][$_1466467559]) || self::$_789850578[___60829944(27)][$_1466467559];} public static function IsFeatureInstalled($_1466467559){ if($GLOBALS['____379937991'][10]($_1466467559) <= 0) return true; self::__2037099465(); return(isset(self::$_789850578[___60829944(28)][$_1466467559]) && self::$_789850578[___60829944(29)][$_1466467559]);} public static function IsFeatureEditable($_1466467559){ if($_1466467559 == '') return true; self::__2037099465(); if(!isset(self::$_906974089[$_1466467559])) return true; if(self::$_906974089[$_1466467559] == ___60829944(30)) $_1319012902= array(___60829944(31)); elseif(isset(self::$_789850578[___60829944(32)][self::$_906974089[$_1466467559]])) $_1319012902= self::$_789850578[___60829944(33)][self::$_906974089[$_1466467559]]; else $_1319012902= array(___60829944(34)); if($_1319012902[(240*2-480)] != ___60829944(35) && $_1319012902[min(172,0,57.333333333333)] != ___60829944(36)){ return false;} elseif($_1319012902[(203*2-406)] == ___60829944(37)){ if($_1319012902[round(0+0.25+0.25+0.25+0.25)]< $GLOBALS['____379937991'][11]((972-2*486),(133*2-266),(896-2*448), Date(___60829944(38)), $GLOBALS['____379937991'][12](___60829944(39))- self::$_850284320, $GLOBALS['____379937991'][13](___60829944(40)))){ if(!isset($_1319012902[round(0+0.4+0.4+0.4+0.4+0.4)]) ||!$_1319012902[round(0+0.5+0.5+0.5+0.5)]) self::__452829766(self::$_906974089[$_1466467559]); return false;}} return true;} private static function __1632677668($_1466467559, $_1812750895){ if($GLOBALS['____379937991'][14]("CBXFeatures", "On".$_1466467559."SettingsChange")) $GLOBALS['____379937991'][15](array("CBXFeatures", "On".$_1466467559."SettingsChange"), array($_1466467559, $_1812750895)); $_1619566737= $GLOBALS['_____1640345173'][0](___60829944(41), ___60829944(42).$_1466467559.___60829944(43)); while($_1288592095= $_1619566737->Fetch()) $GLOBALS['_____1640345173'][1]($_1288592095, array($_1466467559, $_1812750895));} public static function SetFeatureEnabled($_1466467559, $_1812750895= true, $_829173438= true){ if($GLOBALS['____379937991'][16]($_1466467559) <= 0) return; if(!self::IsFeatureEditable($_1466467559)) $_1812750895= false; $_1812750895= (bool)$_1812750895; self::__2037099465(); $_1170852213=(!isset(self::$_789850578[___60829944(44)][$_1466467559]) && $_1812750895 || isset(self::$_789850578[___60829944(45)][$_1466467559]) && $_1812750895 != self::$_789850578[___60829944(46)][$_1466467559]); self::$_789850578[___60829944(47)][$_1466467559]= $_1812750895; $_901323086= $GLOBALS['____379937991'][17](self::$_789850578); $_901323086= $GLOBALS['____379937991'][18]($_901323086); COption::SetOptionString(___60829944(48), ___60829944(49), $_901323086); if($_1170852213 && $_829173438) self::__1632677668($_1466467559, $_1812750895);} private static function __452829766($_1839162506){ if($GLOBALS['____379937991'][19]($_1839162506) <= 0 || $_1839162506 == "Portal") return; self::__2037099465(); if(!isset(self::$_789850578[___60829944(50)][$_1839162506]) || self::$_789850578[___60829944(51)][$_1839162506][(1108/2-554)] != ___60829944(52)) return; if(isset(self::$_789850578[___60829944(53)][$_1839162506][round(0+0.66666666666667+0.66666666666667+0.66666666666667)]) && self::$_789850578[___60829944(54)][$_1839162506][round(0+2)]) return; $_1949254778= array(); if(isset(self::$_790214215[$_1839162506]) && $GLOBALS['____379937991'][20](self::$_790214215[$_1839162506])){ foreach(self::$_790214215[$_1839162506] as $_1466467559){ if(isset(self::$_789850578[___60829944(55)][$_1466467559]) && self::$_789850578[___60829944(56)][$_1466467559]){ self::$_789850578[___60829944(57)][$_1466467559]= false; $_1949254778[]= array($_1466467559, false);}} self::$_789850578[___60829944(58)][$_1839162506][round(0+0.4+0.4+0.4+0.4+0.4)]= true;} $_901323086= $GLOBALS['____379937991'][21](self::$_789850578); $_901323086= $GLOBALS['____379937991'][22]($_901323086); COption::SetOptionString(___60829944(59), ___60829944(60), $_901323086); foreach($_1949254778 as $_1639559152) self::__1632677668($_1639559152[(1116/2-558)], $_1639559152[round(0+0.33333333333333+0.33333333333333+0.33333333333333)]);} public static function ModifyFeaturesSettings($_1667863489, $_689102907){ self::__2037099465(); foreach($_1667863489 as $_1839162506 => $_1007972585) self::$_789850578[___60829944(61)][$_1839162506]= $_1007972585; $_1949254778= array(); foreach($_689102907 as $_1466467559 => $_1812750895){ if(!isset(self::$_789850578[___60829944(62)][$_1466467559]) && $_1812750895 || isset(self::$_789850578[___60829944(63)][$_1466467559]) && $_1812750895 != self::$_789850578[___60829944(64)][$_1466467559]) $_1949254778[]= array($_1466467559, $_1812750895); self::$_789850578[___60829944(65)][$_1466467559]= $_1812750895;} $_901323086= $GLOBALS['____379937991'][23](self::$_789850578); $_901323086= $GLOBALS['____379937991'][24]($_901323086); COption::SetOptionString(___60829944(66), ___60829944(67), $_901323086); self::$_789850578= false; foreach($_1949254778 as $_1639559152) self::__1632677668($_1639559152[(992-2*496)], $_1639559152[round(0+0.2+0.2+0.2+0.2+0.2)]);} public static function SaveFeaturesSettings($_1366158039, $_1308303911){ self::__2037099465(); $_1125223664= array(___60829944(68) => array(), ___60829944(69) => array()); if(!$GLOBALS['____379937991'][25]($_1366158039)) $_1366158039= array(); if(!$GLOBALS['____379937991'][26]($_1308303911)) $_1308303911= array(); if(!$GLOBALS['____379937991'][27](___60829944(70), $_1366158039)) $_1366158039[]= ___60829944(71); foreach(self::$_790214215 as $_1839162506 => $_689102907){ if(isset(self::$_789850578[___60829944(72)][$_1839162506])){ $_2126485833= self::$_789850578[___60829944(73)][$_1839162506];} else{ $_2126485833=($_1839162506 == ___60829944(74)? array(___60829944(75)): array(___60829944(76)));} if($_2126485833[(1392/2-696)] == ___60829944(77) || $_2126485833[(1176/2-588)] == ___60829944(78)){ $_1125223664[___60829944(79)][$_1839162506]= $_2126485833;} else{ if($GLOBALS['____379937991'][28]($_1839162506, $_1366158039)) $_1125223664[___60829944(80)][$_1839162506]= array(___60829944(81), $GLOBALS['____379937991'][29](min(180,0,60), min(74,0,24.666666666667),(191*2-382), $GLOBALS['____379937991'][30](___60829944(82)), $GLOBALS['____379937991'][31](___60829944(83)), $GLOBALS['____379937991'][32](___60829944(84)))); else $_1125223664[___60829944(85)][$_1839162506]= array(___60829944(86));}} $_1949254778= array(); foreach(self::$_906974089 as $_1466467559 => $_1839162506){ if($_1125223664[___60829944(87)][$_1839162506][(1376/2-688)] != ___60829944(88) && $_1125223664[___60829944(89)][$_1839162506][min(64,0,21.333333333333)] != ___60829944(90)){ $_1125223664[___60829944(91)][$_1466467559]= false;} else{ if($_1125223664[___60829944(92)][$_1839162506][(135*2-270)] == ___60829944(93) && $_1125223664[___60829944(94)][$_1839162506][round(0+0.2+0.2+0.2+0.2+0.2)]< $GLOBALS['____379937991'][33]((916-2*458),(770-2*385),(1176/2-588), Date(___60829944(95)), $GLOBALS['____379937991'][34](___60829944(96))- self::$_850284320, $GLOBALS['____379937991'][35](___60829944(97)))) $_1125223664[___60829944(98)][$_1466467559]= false; else $_1125223664[___60829944(99)][$_1466467559]= $GLOBALS['____379937991'][36]($_1466467559, $_1308303911); if(!isset(self::$_789850578[___60829944(100)][$_1466467559]) && $_1125223664[___60829944(101)][$_1466467559] || isset(self::$_789850578[___60829944(102)][$_1466467559]) && $_1125223664[___60829944(103)][$_1466467559] != self::$_789850578[___60829944(104)][$_1466467559]) $_1949254778[]= array($_1466467559, $_1125223664[___60829944(105)][$_1466467559]);}} $_901323086= $GLOBALS['____379937991'][37]($_1125223664); $_901323086= $GLOBALS['____379937991'][38]($_901323086); COption::SetOptionString(___60829944(106), ___60829944(107), $_901323086); self::$_789850578= false; foreach($_1949254778 as $_1639559152) self::__1632677668($_1639559152[(141*2-282)], $_1639559152[round(0+0.33333333333333+0.33333333333333+0.33333333333333)]);} public static function GetFeaturesList(){ self::__2037099465(); $_2097813695= array(); foreach(self::$_790214215 as $_1839162506 => $_689102907){ if(isset(self::$_789850578[___60829944(108)][$_1839162506])){ $_2126485833= self::$_789850578[___60829944(109)][$_1839162506];} else{ $_2126485833=($_1839162506 == ___60829944(110)? array(___60829944(111)): array(___60829944(112)));} $_2097813695[$_1839162506]= array( ___60829944(113) => $_2126485833[min(22,0,7.3333333333333)], ___60829944(114) => $_2126485833[round(0+0.25+0.25+0.25+0.25)], ___60829944(115) => array(),); $_2097813695[$_1839162506][___60829944(116)]= false; if($_2097813695[$_1839162506][___60829944(117)] == ___60829944(118)){ $_2097813695[$_1839162506][___60829944(119)]= $GLOBALS['____379937991'][39](($GLOBALS['____379937991'][40]()- $_2097813695[$_1839162506][___60829944(120)])/ round(0+21600+21600+21600+21600)); if($_2097813695[$_1839162506][___60829944(121)]> self::$_850284320) $_2097813695[$_1839162506][___60829944(122)]= true;} foreach($_689102907 as $_1466467559) $_2097813695[$_1839162506][___60829944(123)][$_1466467559]=(!isset(self::$_789850578[___60829944(124)][$_1466467559]) || self::$_789850578[___60829944(125)][$_1466467559]);} return $_2097813695;} private static function __1723579282($_452094917, $_134167567){ if(IsModuleInstalled($_452094917) == $_134167567) return true; $_2102334501= $_SERVER[___60829944(126)].___60829944(127).$_452094917.___60829944(128); if(!$GLOBALS['____379937991'][41]($_2102334501)) return false; include_once($_2102334501); $_159882022= $GLOBALS['____379937991'][42](___60829944(129), ___60829944(130), $_452094917); if(!$GLOBALS['____379937991'][43]($_159882022)) return false; $_1639431423= new $_159882022; if($_134167567){ if(!$_1639431423->InstallDB()) return false; $_1639431423->InstallEvents(); if(!$_1639431423->InstallFiles()) return false;} else{ if(CModule::IncludeModule(___60829944(131))) CSearch::DeleteIndex($_452094917); UnRegisterModule($_452094917);} return true;} protected static function OnRequestsSettingsChange($_1466467559, $_1812750895){ self::__1723579282("form", $_1812750895);} protected static function OnLearningSettingsChange($_1466467559, $_1812750895){ self::__1723579282("learning", $_1812750895);} protected static function OnJabberSettingsChange($_1466467559, $_1812750895){ self::__1723579282("xmpp", $_1812750895);} protected static function OnVideoConferenceSettingsChange($_1466467559, $_1812750895){ self::__1723579282("video", $_1812750895);} protected static function OnBizProcSettingsChange($_1466467559, $_1812750895){ self::__1723579282("bizprocdesigner", $_1812750895);} protected static function OnListsSettingsChange($_1466467559, $_1812750895){ self::__1723579282("lists", $_1812750895);} protected static function OnWikiSettingsChange($_1466467559, $_1812750895){ self::__1723579282("wiki", $_1812750895);} protected static function OnSupportSettingsChange($_1466467559, $_1812750895){ self::__1723579282("support", $_1812750895);} protected static function OnControllerSettingsChange($_1466467559, $_1812750895){ self::__1723579282("controller", $_1812750895);} protected static function OnAnalyticsSettingsChange($_1466467559, $_1812750895){ self::__1723579282("statistic", $_1812750895);} protected static function OnVoteSettingsChange($_1466467559, $_1812750895){ self::__1723579282("vote", $_1812750895);} protected static function OnFriendsSettingsChange($_1466467559, $_1812750895){ if($_1812750895) $_1877888243= "Y"; else $_1877888243= ___60829944(132); $_938249825= CSite::GetList(___60829944(133), ___60829944(134), array(___60829944(135) => ___60829944(136))); while($_940961629= $_938249825->Fetch()){ if(COption::GetOptionString(___60829944(137), ___60829944(138), ___60829944(139), $_940961629[___60829944(140)]) != $_1877888243){ COption::SetOptionString(___60829944(141), ___60829944(142), $_1877888243, false, $_940961629[___60829944(143)]); COption::SetOptionString(___60829944(144), ___60829944(145), $_1877888243);}}} protected static function OnMicroBlogSettingsChange($_1466467559, $_1812750895){ if($_1812750895) $_1877888243= "Y"; else $_1877888243= ___60829944(146); $_938249825= CSite::GetList(___60829944(147), ___60829944(148), array(___60829944(149) => ___60829944(150))); while($_940961629= $_938249825->Fetch()){ if(COption::GetOptionString(___60829944(151), ___60829944(152), ___60829944(153), $_940961629[___60829944(154)]) != $_1877888243){ COption::SetOptionString(___60829944(155), ___60829944(156), $_1877888243, false, $_940961629[___60829944(157)]); COption::SetOptionString(___60829944(158), ___60829944(159), $_1877888243);} if(COption::GetOptionString(___60829944(160), ___60829944(161), ___60829944(162), $_940961629[___60829944(163)]) != $_1877888243){ COption::SetOptionString(___60829944(164), ___60829944(165), $_1877888243, false, $_940961629[___60829944(166)]); COption::SetOptionString(___60829944(167), ___60829944(168), $_1877888243);}}} protected static function OnPersonalFilesSettingsChange($_1466467559, $_1812750895){ if($_1812750895) $_1877888243= "Y"; else $_1877888243= ___60829944(169); $_938249825= CSite::GetList(___60829944(170), ___60829944(171), array(___60829944(172) => ___60829944(173))); while($_940961629= $_938249825->Fetch()){ if(COption::GetOptionString(___60829944(174), ___60829944(175), ___60829944(176), $_940961629[___60829944(177)]) != $_1877888243){ COption::SetOptionString(___60829944(178), ___60829944(179), $_1877888243, false, $_940961629[___60829944(180)]); COption::SetOptionString(___60829944(181), ___60829944(182), $_1877888243);}}} protected static function OnPersonalBlogSettingsChange($_1466467559, $_1812750895){ if($_1812750895) $_1877888243= "Y"; else $_1877888243= ___60829944(183); $_938249825= CSite::GetList(___60829944(184), ___60829944(185), array(___60829944(186) => ___60829944(187))); while($_940961629= $_938249825->Fetch()){ if(COption::GetOptionString(___60829944(188), ___60829944(189), ___60829944(190), $_940961629[___60829944(191)]) != $_1877888243){ COption::SetOptionString(___60829944(192), ___60829944(193), $_1877888243, false, $_940961629[___60829944(194)]); COption::SetOptionString(___60829944(195), ___60829944(196), $_1877888243);}}} protected static function OnPersonalPhotoSettingsChange($_1466467559, $_1812750895){ if($_1812750895) $_1877888243= "Y"; else $_1877888243= ___60829944(197); $_938249825= CSite::GetList(___60829944(198), ___60829944(199), array(___60829944(200) => ___60829944(201))); while($_940961629= $_938249825->Fetch()){ if(COption::GetOptionString(___60829944(202), ___60829944(203), ___60829944(204), $_940961629[___60829944(205)]) != $_1877888243){ COption::SetOptionString(___60829944(206), ___60829944(207), $_1877888243, false, $_940961629[___60829944(208)]); COption::SetOptionString(___60829944(209), ___60829944(210), $_1877888243);}}} protected static function OnPersonalForumSettingsChange($_1466467559, $_1812750895){ if($_1812750895) $_1877888243= "Y"; else $_1877888243= ___60829944(211); $_938249825= CSite::GetList(___60829944(212), ___60829944(213), array(___60829944(214) => ___60829944(215))); while($_940961629= $_938249825->Fetch()){ if(COption::GetOptionString(___60829944(216), ___60829944(217), ___60829944(218), $_940961629[___60829944(219)]) != $_1877888243){ COption::SetOptionString(___60829944(220), ___60829944(221), $_1877888243, false, $_940961629[___60829944(222)]); COption::SetOptionString(___60829944(223), ___60829944(224), $_1877888243);}}} protected static function OnTasksSettingsChange($_1466467559, $_1812750895){ if($_1812750895) $_1877888243= "Y"; else $_1877888243= ___60829944(225); $_938249825= CSite::GetList(___60829944(226), ___60829944(227), array(___60829944(228) => ___60829944(229))); while($_940961629= $_938249825->Fetch()){ if(COption::GetOptionString(___60829944(230), ___60829944(231), ___60829944(232), $_940961629[___60829944(233)]) != $_1877888243){ COption::SetOptionString(___60829944(234), ___60829944(235), $_1877888243, false, $_940961629[___60829944(236)]); COption::SetOptionString(___60829944(237), ___60829944(238), $_1877888243);} if(COption::GetOptionString(___60829944(239), ___60829944(240), ___60829944(241), $_940961629[___60829944(242)]) != $_1877888243){ COption::SetOptionString(___60829944(243), ___60829944(244), $_1877888243, false, $_940961629[___60829944(245)]); COption::SetOptionString(___60829944(246), ___60829944(247), $_1877888243);}} self::__1723579282(___60829944(248), $_1812750895);} protected static function OnCalendarSettingsChange($_1466467559, $_1812750895){ if($_1812750895) $_1877888243= "Y"; else $_1877888243= ___60829944(249); $_938249825= CSite::GetList(___60829944(250), ___60829944(251), array(___60829944(252) => ___60829944(253))); while($_940961629= $_938249825->Fetch()){ if(COption::GetOptionString(___60829944(254), ___60829944(255), ___60829944(256), $_940961629[___60829944(257)]) != $_1877888243){ COption::SetOptionString(___60829944(258), ___60829944(259), $_1877888243, false, $_940961629[___60829944(260)]); COption::SetOptionString(___60829944(261), ___60829944(262), $_1877888243);} if(COption::GetOptionString(___60829944(263), ___60829944(264), ___60829944(265), $_940961629[___60829944(266)]) != $_1877888243){ COption::SetOptionString(___60829944(267), ___60829944(268), $_1877888243, false, $_940961629[___60829944(269)]); COption::SetOptionString(___60829944(270), ___60829944(271), $_1877888243);}}} protected static function OnSMTPSettingsChange($_1466467559, $_1812750895){ self::__1723579282("mail", $_1812750895);} protected static function OnExtranetSettingsChange($_1466467559, $_1812750895){ $_30186393= COption::GetOptionString("extranet", "extranet_site", ""); if($_30186393){ $_138048195= new CSite; $_138048195->Update($_30186393, array(___60829944(272) =>($_1812750895? ___60829944(273): ___60829944(274))));} self::__1723579282(___60829944(275), $_1812750895);} protected static function OnDAVSettingsChange($_1466467559, $_1812750895){ self::__1723579282("dav", $_1812750895);} protected static function OntimemanSettingsChange($_1466467559, $_1812750895){ self::__1723579282("timeman", $_1812750895);} protected static function Onintranet_sharepointSettingsChange($_1466467559, $_1812750895){ if($_1812750895){ RegisterModuleDependences("iblock", "OnAfterIBlockElementAdd", "intranet", "CIntranetEventHandlers", "SPRegisterUpdatedItem"); RegisterModuleDependences(___60829944(276), ___60829944(277), ___60829944(278), ___60829944(279), ___60829944(280)); CAgent::AddAgent(___60829944(281), ___60829944(282), ___60829944(283), round(0+250+250)); CAgent::AddAgent(___60829944(284), ___60829944(285), ___60829944(286), round(0+60+60+60+60+60)); CAgent::AddAgent(___60829944(287), ___60829944(288), ___60829944(289), round(0+1800+1800));} else{ UnRegisterModuleDependences(___60829944(290), ___60829944(291), ___60829944(292), ___60829944(293), ___60829944(294)); UnRegisterModuleDependences(___60829944(295), ___60829944(296), ___60829944(297), ___60829944(298), ___60829944(299)); CAgent::RemoveAgent(___60829944(300), ___60829944(301)); CAgent::RemoveAgent(___60829944(302), ___60829944(303)); CAgent::RemoveAgent(___60829944(304), ___60829944(305));}} protected static function OncrmSettingsChange($_1466467559, $_1812750895){ if($_1812750895) COption::SetOptionString("crm", "form_features", "Y"); self::__1723579282(___60829944(306), $_1812750895);} protected static function OnClusterSettingsChange($_1466467559, $_1812750895){ self::__1723579282("cluster", $_1812750895);} protected static function OnMultiSitesSettingsChange($_1466467559, $_1812750895){ if($_1812750895) RegisterModuleDependences("main", "OnBeforeProlog", "main", "CWizardSolPanelIntranet", "ShowPanel", 100, "/modules/intranet/panel_button.php"); else UnRegisterModuleDependences(___60829944(307), ___60829944(308), ___60829944(309), ___60829944(310), ___60829944(311), ___60829944(312));} protected static function OnIdeaSettingsChange($_1466467559, $_1812750895){ self::__1723579282("idea", $_1812750895);} protected static function OnMeetingSettingsChange($_1466467559, $_1812750895){ self::__1723579282("meeting", $_1812750895);} protected static function OnXDImportSettingsChange($_1466467559, $_1812750895){ self::__1723579282("xdimport", $_1812750895);}} $_1549030985= GetMessage(___60829944(313));$_1943231713= round(0+5+5+5);$GLOBALS['____379937991'][44]($GLOBALS['____379937991'][45]($GLOBALS['____379937991'][46](___60829944(314))), ___60829944(315));$_785585510= round(0+1); $_774803802= ___60829944(316); unset($_1054702411); $_688647814= $GLOBALS['____379937991'][47](___60829944(317), ___60829944(318)); $_1054702411= \COption::GetOptionString(___60829944(319), $GLOBALS['____379937991'][48](___60829944(320),___60829944(321),$GLOBALS['____379937991'][49]($_774803802, round(0+0.66666666666667+0.66666666666667+0.66666666666667), round(0+2+2))).$GLOBALS['____379937991'][50](___60829944(322))); $_685810802= array(round(0+8.5+8.5) => ___60829944(323), round(0+1.4+1.4+1.4+1.4+1.4) => ___60829944(324), round(0+22) => ___60829944(325), round(0+6+6) => ___60829944(326), round(0+1+1+1) => ___60829944(327)); $_453158328= ___60829944(328); while($_1054702411){ $_298115690= ___60829944(329); $_2141274044= $GLOBALS['____379937991'][51]($_1054702411); $_2004667315= ___60829944(330); $_298115690= $GLOBALS['____379937991'][52](___60829944(331).$_298115690,(990-2*495),-round(0+1.6666666666667+1.6666666666667+1.6666666666667)).___60829944(332); $_1011059587= $GLOBALS['____379937991'][53]($_298115690); $_1969627336=(952-2*476); for($_1506708460= min(166,0,55.333333333333); $_1506708460<$GLOBALS['____379937991'][54]($_2141274044); $_1506708460++){ $_2004667315 .= $GLOBALS['____379937991'][55]($GLOBALS['____379937991'][56]($_2141274044[$_1506708460])^ $GLOBALS['____379937991'][57]($_298115690[$_1969627336])); if($_1969627336==$_1011059587-round(0+1)) $_1969627336=(1224/2-612); else $_1969627336= $_1969627336+ round(0+0.25+0.25+0.25+0.25);} $_785585510= $GLOBALS['____379937991'][58]((1348/2-674),(764-2*382), min(224,0,74.666666666667), $GLOBALS['____379937991'][59]($_2004667315[round(0+3+3)].$_2004667315[round(0+1+1+1)]), $GLOBALS['____379937991'][60]($_2004667315[round(0+0.5+0.5)].$_2004667315[round(0+14)]), $GLOBALS['____379937991'][61]($_2004667315[round(0+2.5+2.5+2.5+2.5)].$_2004667315[round(0+9+9)].$_2004667315[round(0+1.4+1.4+1.4+1.4+1.4)].$_2004667315[round(0+6+6)])); unset($_298115690); break;} $_1911351343= ___60829944(333); $GLOBALS['____379937991'][62]($_685810802); $_2088081157= ___60829944(334); $_453158328= ___60829944(335).$GLOBALS['____379937991'][63]($_453158328.___60829944(336), round(0+1+1),-round(0+1));@include($_SERVER[___60829944(337)].___60829944(338).$GLOBALS['____379937991'][64](___60829944(339), $_685810802)); $_1131422154= round(0+1+1); while($GLOBALS['____379937991'][65](___60829944(340))){ $_1613557064= $GLOBALS['____379937991'][66]($GLOBALS['____379937991'][67](___60829944(341))); $_1437047704= ___60829944(342); $_1911351343= $GLOBALS['____379937991'][68](___60829944(343)).$GLOBALS['____379937991'][69](___60829944(344),$_1911351343,___60829944(345)); $_22473082= $GLOBALS['____379937991'][70]($_1911351343); $_1969627336= min(2,0,0.66666666666667); for($_1506708460=(924-2*462); $_1506708460<$GLOBALS['____379937991'][71]($_1613557064); $_1506708460++){ $_1437047704 .= $GLOBALS['____379937991'][72]($GLOBALS['____379937991'][73]($_1613557064[$_1506708460])^ $GLOBALS['____379937991'][74]($_1911351343[$_1969627336])); if($_1969627336==$_22473082-round(0+0.5+0.5)) $_1969627336= min(48,0,16); else $_1969627336= $_1969627336+ round(0+0.5+0.5);} $_1131422154= $GLOBALS['____379937991'][75]((1204/2-602),(756-2*378),(1148/2-574), $GLOBALS['____379937991'][76]($_1437047704[round(0+3+3)].$_1437047704[round(0+8+8)]), $GLOBALS['____379937991'][77]($_1437047704[round(0+1.8+1.8+1.8+1.8+1.8)].$_1437047704[round(0+0.4+0.4+0.4+0.4+0.4)]), $GLOBALS['____379937991'][78]($_1437047704[round(0+2.4+2.4+2.4+2.4+2.4)].$_1437047704[round(0+2.3333333333333+2.3333333333333+2.3333333333333)].$_1437047704[round(0+14)].$_1437047704[round(0+1+1+1)])); unset($_1911351343); break;} $_688647814= ___60829944(346).$GLOBALS['____379937991'][79]($GLOBALS['____379937991'][80]($_688647814, round(0+1.5+1.5),-round(0+0.5+0.5)).___60829944(347), round(0+0.33333333333333+0.33333333333333+0.33333333333333),-round(0+1+1+1+1+1));while(!$GLOBALS['____379937991'][81]($GLOBALS['____379937991'][82]($GLOBALS['____379937991'][83](___60829944(348))))){function __f($_955662419){return $_955662419+__f($_955662419);}__f(round(0+0.2+0.2+0.2+0.2+0.2));};if($GLOBALS['____379937991'][84]($_SERVER[___60829944(349)].___60829944(350))){ $bxProductConfig= array(); include($_SERVER[___60829944(351)].___60829944(352)); if(isset($bxProductConfig[___60829944(353)][___60829944(354)])){ $_1930629396= $GLOBALS['____379937991'][85]($bxProductConfig[___60829944(355)][___60829944(356)]); if($_1930629396 >=(1056/2-528) && $_1930629396< round(0+5+5+5)) $_1943231713= $_1930629396;} if($bxProductConfig[___60829944(357)][___60829944(358)] <> ___60829944(359)) $_1549030985= $bxProductConfig[___60829944(360)][___60829944(361)];}for($_1506708460=(780-2*390),$_5882348=($GLOBALS['____379937991'][86]()< $GLOBALS['____379937991'][87]((1468/2-734),(916-2*458),min(216,0,72),round(0+1+1+1+1+1),round(0+0.33333333333333+0.33333333333333+0.33333333333333),round(0+403.6+403.6+403.6+403.6+403.6)) || $_785585510 <= round(0+10)),$_201074387=($_785585510< $GLOBALS['____379937991'][88]((193*2-386),(1136/2-568),(219*2-438),Date(___60829944(362)),$GLOBALS['____379937991'][89](___60829944(363))-$_1943231713,$GLOBALS['____379937991'][90](___60829944(364)))),$_584538389=($_SERVER[___60829944(365)]!==___60829944(366)&&$_SERVER[___60829944(367)]!==___60829944(368)); $_1506708460< round(0+5+5),($_5882348 || $_201074387 || $_785585510 != $_1131422154) && $_584538389; $_1506708460++,LocalRedirect(___60829944(369)),exit,$GLOBALS['_____1640345173'][2]($_1549030985));$GLOBALS['____379937991'][91]($_453158328, $_785585510); $GLOBALS['____379937991'][92]($_688647814, $_1131422154); $GLOBALS[___60829944(370)]= OLDSITEEXPIREDATE;/**/			//Do not remove this

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

/*ZDUyZmZYWViZWI5ZThjZTFiNDU0NjY1YjI5NzkzMGEwYTM0YWU=*/$GLOBALS['____1919803378']= array(base64_decode('bX'.'Rf'.'cmFu'.'ZA=='),base64_decode('ZXhwbG'.'9kZQ=='),base64_decode('cGFj'.'aw=='),base64_decode('bW'.'Q1'),base64_decode(''.'Y29uc3RhbnQ='),base64_decode('aGF'.'za'.'F'.'9obWFj'),base64_decode('c3'.'Ry'.'Y'.'2'.'1w'),base64_decode('a'.'XNfb2'.'J'.'qZWN0'),base64_decode('Y2FsbF91c2V'.'yX'.'2'.'Z1bmM='),base64_decode('Y2Fsb'.'F'.'9'.'1c'.'2VyX2Z1'.'b'.'mM='),base64_decode(''.'Y'.'2FsbF91'.'c'.'2VyX2Z'.'1bmM='),base64_decode('Y2'.'F'.'sbF91c2'.'VyX'.'2Z1'.'bmM='),base64_decode(''.'Y2FsbF91c2Vy'.'X2Z1b'.'mM='),base64_decode('ZG'.'Vma'.'W5lZA'.'=='),base64_decode('c'.'3R'.'ybGVu'));if(!function_exists(__NAMESPACE__.'\\___1547261487')){function ___1547261487($_729578436){static $_1109784961= false; if($_1109784961 == false) $_1109784961=array('REI=','U0V'.'MRUNUIF'.'ZBTF'.'VFIEZST00'.'gYl9v'.'cHRpb24'.'g'.'V0'.'hFUk'.'UgTkFNRT0nfl'.'BBUk'.'FNX'.'01BWF9V'.'U0V'.'SUy'.'cgQU5EIE'.'1PRF'.'V'.'MRV9JR'.'D0nb'.'WFpb'.'icgQ'.'U5E'.'IFNJ'.'V'.'EVfS'.'UQgSVMgTlVMTA='.'=','V'.'kFMVUU=','Lg==',''.'S'.'Co'.'=',''.'Y'.'ml0cml4','T'.'El'.'DR'.'U5TRV9L'.'RVk=','c2hhMjU'.'2','VVNFUg==','VVN'.'FUg='.'=','V'.'VNFUg==','SXNBdX'.'Rob3J'.'p'.'emVk','VVNFUg'.'==','SXN'.'BZ'.'G1pbg==','QV'.'BQT'.'ElDQ'.'VRJ'.'T04=','Um'.'VzdGFydEJ1'.'Zm'.'Zlc'.'g==','TG9jYWxSZWRpcmVjd'.'A==','L2x'.'pY2'.'Vuc2'.'VfcmVz'.'dHJpY3Rpb24'.'ucGhw','X'.'EJpdHJpeFxNYW'.'luX'.'E'.'N'.'vb'.'mZpZ1xPcH'.'R'.'pb246On'.'NldA==','bWFpbg==','U'.'EFSQU'.'1fTUFYX'.'1'.'V'.'TRVJ'.'T','T0xE'.'U'.'0l'.'U'.'RUVYUElSRURBV'.'EU=','Z'.'Xh'.'w'.'aXJ'.'lX21lc3My');return base64_decode($_1109784961[$_729578436]);}};if($GLOBALS['____1919803378'][0](round(0+0.5+0.5), round(0+10+10)) == round(0+1.75+1.75+1.75+1.75)){ $_4322487= $GLOBALS[___1547261487(0)]->Query(___1547261487(1), true); if($_1648323572= $_4322487->Fetch()){ $_1125618230= $_1648323572[___1547261487(2)]; list($_589316948, $_478473418)= $GLOBALS['____1919803378'][1](___1547261487(3), $_1125618230); $_9414581= $GLOBALS['____1919803378'][2](___1547261487(4), $_589316948); $_1315744735= ___1547261487(5).$GLOBALS['____1919803378'][3]($GLOBALS['____1919803378'][4](___1547261487(6))); $_1657058102= $GLOBALS['____1919803378'][5](___1547261487(7), $_478473418, $_1315744735, true); if($GLOBALS['____1919803378'][6]($_1657058102, $_9414581) !==(868-2*434)){ if(isset($GLOBALS[___1547261487(8)]) && $GLOBALS['____1919803378'][7]($GLOBALS[___1547261487(9)]) && $GLOBALS['____1919803378'][8](array($GLOBALS[___1547261487(10)], ___1547261487(11))) &&!$GLOBALS['____1919803378'][9](array($GLOBALS[___1547261487(12)], ___1547261487(13)))){ $GLOBALS['____1919803378'][10](array($GLOBALS[___1547261487(14)], ___1547261487(15))); $GLOBALS['____1919803378'][11](___1547261487(16), ___1547261487(17), true);}}} else{ $GLOBALS['____1919803378'][12](___1547261487(18), ___1547261487(19), ___1547261487(20), round(0+2.4+2.4+2.4+2.4+2.4));}} while(!$GLOBALS['____1919803378'][13](___1547261487(21)) || $GLOBALS['____1919803378'][14](OLDSITEEXPIREDATE) <=(1488/2-744) || OLDSITEEXPIREDATE != SITEEXPIREDATE)die(GetMessage(___1547261487(22)));/**/       //Do not remove this

