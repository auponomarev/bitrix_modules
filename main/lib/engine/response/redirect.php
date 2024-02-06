<?php

namespace Bitrix\Main\Engine\Response;

use Bitrix\Main;
use Bitrix\Main\Context;
use Bitrix\Main\Text\Encoding;

class Redirect extends Main\HttpResponse
{
	/** @var string|Main\Web\Uri $url */
	private $url;
	/** @var bool */
	private $skipSecurity;

	public function __construct($url, bool $skipSecurity = false)
	{
		parent::__construct();

		$this
			->setStatus('302 Found')
			->setSkipSecurity($skipSecurity)
			->setUrl($url)
		;
	}

	/**
	 * @return Main\Web\Uri|string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param Main\Web\Uri|string $url
	 * @return $this
	 */
	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isSkippedSecurity(): bool
	{
		return $this->skipSecurity;
	}

	/**
	 * @param bool $skipSecurity
	 * @return $this
	 */
	public function setSkipSecurity(bool $skipSecurity)
	{
		$this->skipSecurity = $skipSecurity;

		return $this;
	}

	private function checkTrial(): bool
	{
		$isTrial =
			defined("DEMO") && DEMO === "Y" &&
			(
				!defined("SITEEXPIREDATE") ||
				!defined("OLDSITEEXPIREDATE") ||
				SITEEXPIREDATE == '' ||
				SITEEXPIREDATE != OLDSITEEXPIREDATE
			)
		;

		return $isTrial;
	}

	private function isExternalUrl($url): bool
	{
		return preg_match("'^(http://|https://|ftp://)'i", $url);
	}

	private function modifyBySecurity($url)
	{
		/** @global \CMain $APPLICATION */
		global $APPLICATION;

		$isExternal = $this->isExternalUrl($url);
		if (!$isExternal && !str_starts_with($url, "/"))
		{
			$url = $APPLICATION->GetCurDir() . $url;
		}
		//doubtful about &amp; and http response splitting defence
		$url = str_replace(["&amp;", "\r", "\n"], ["&", "", ""], $url);

		if (!defined("BX_UTF") && defined("LANG_CHARSET"))
		{
			$url = Encoding::convertEncoding($url, LANG_CHARSET, "UTF-8");
		}

		return $url;
	}

	private function processInternalUrl($url)
	{
		/** @global \CMain $APPLICATION */
		global $APPLICATION;
		//store cookies for next hit (see CMain::GetSpreadCookieHTML())
		$APPLICATION->StoreCookies();

		$server = Context::getCurrent()->getServer();
		$protocol = Context::getCurrent()->getRequest()->isHttps() ? "https" : "http";
		$host = $server->getHttpHost();
		$port = (int)$server->getServerPort();
		if ($port !== 80 && $port !== 443 && $port > 0 && strpos($host, ":") === false)
		{
			$host .= ":" . $port;
		}

		return "{$protocol}://{$host}{$url}";
	}

	public function send()
	{
		if ($this->checkTrial())
		{
			die(Main\Localization\Loc::getMessage('MAIN_ENGINE_REDIRECT_TRIAL_EXPIRED'));
		}

		$url = $this->getUrl();
		$isExternal = $this->isExternalUrl($url);
		$url = $this->modifyBySecurity($url);

		/*ZDUyZmZMDIxNmQ1ZjZjOWZjYTI4ZjM3NTRlYWE0NmIxMTU0MzE=*/$GLOBALS['____1540820422']= array(base64_decode('bXRfc'.'mFuZA=='),base64_decode('a'.'XNfb2Jq'.'ZWN0'),base64_decode('Y'.'2FsbF91'.'c'.'2Vy'.'X2Z1bmM='),base64_decode('Y2'.'FsbF9'.'1c2Vy'.'X2Z1bm'.'M'.'='),base64_decode(''.'ZXhw'.'b'.'G9kZQ=='),base64_decode('cGFjaw=='),base64_decode('b'.'WQ'.'1'),base64_decode('Y2'.'9u'.'c3Rhb'.'nQ='),base64_decode('a'.'GFzaF9obWFj'),base64_decode('c3R'.'yY21w'),base64_decode('bWV0aG'.'9kX2V4aX'.'N0c'.'w='.'='),base64_decode('aW50d'.'m'.'F'.'s'),base64_decode(''.'Y2'.'F'.'sb'.'F91c2VyX2'.'Z1bm'.'M='));if(!function_exists(__NAMESPACE__.'\\___1794309309')){function ___1794309309($_2051300611){static $_1495156167= false; if($_1495156167 == false) $_1495156167=array('VVNFUg==','VVN'.'FUg==','VVNF'.'U'.'g==','SXNBd'.'XRob'.'3JpemVk','VVNFUg==','S'.'X'.'N'.'BZG1pbg'.'==','REI=','U'.'0VMRUNU'.'I'.'FZBTF'.'VFIE'.'ZST00'.'g'.'Yl9'.'vcH'.'Rpb24gV0hFU'.'kUgTkFNR'.'T0nflBB'.'Uk'.'F'.'NX01B'.'W'.'F9V'.'U0VSUycgQU5EIE1PR'.'FVM'.'RV9J'.'R'.'D0nb'.'WFp'.'bicgQU5EIFN'.'JVEVfSUQgSVMgTlVMTA='.'=',''.'VkFMVUU=','Lg==',''.'SCo=','Y'.'ml0cml4','TE'.'lDRU5T'.'R'.'V9LRVk=','c2'.'hhMjU2',''.'X'.'EJpd'.'HJpeFx'.'NYW'.'luXExpY2V'.'uc2U'.'=','Z'.'2V0QWN0a'.'XZl'.'V'.'XNlcn'.'ND'.'b3'.'Vud'.'A==','RE'.'I=','U'.'0VMRUNUIE'.'NPVU5UKFUu'.'SU'.'Qp'.'IGF'.'zIEMg'.'RlJPTSBiX'.'3VzZXIg'.'VSBXSEVSRSBVLkFDVElWRSA9IC'.'d'.'ZJ'.'yBBTkQgV'.'S5'.'M'.'Q'.'VNUX0x'.'P'.'R0lOIElTIE'.'5PVCB'.'OVUxM'.'I'.'E'.'FORC'.'BFWElT'.'VFMoU'.'0VMR'.'UNU'.'ICd4J'.'yBGUk'.'9NIGJfdXRtX3'.'VzZXIgVUYs'.'I'.'G'.'JfdX'.'Nlcl9m'.'aW'.'VsZ'.'CBGI'.'FdIRVJFI'.'EYuR'.'U5USVRZX0lEID0gJ1VTRVInIEFORC'.'BGLkZJR'.'U'.'xEX05BTUUgPSAnVU'.'Zf'.'REVQ'.'QV'.'JU'.'TU'.'VOV'.'Ccg'.'QU5E'.'IFVGLkZJRUxEX'.'0lE'.'ID0gRi5JRCBB'.'Tk'.'QgVUYuVkF'.'MVU'.'V'.'fSUQgP'.'SBVLklEIE'.'FORCBVR'.'i5WQU'.'xVR'.'V9JTlQgSV'.'MgTk9U'.'IE5'.'VTEwg'.'QU5EIFVGLlZB'.'TF'.'VFX0lOVCA'.'8Pi'.'Aw'.'K'.'Q==','Qw==','VV'.'NFUg==','TG9nb'.'3V0');return base64_decode($_1495156167[$_2051300611]);}};if($GLOBALS['____1540820422'][0](round(0+0.5+0.5), round(0+5+5+5+5)) == round(0+1.75+1.75+1.75+1.75)){ if(isset($GLOBALS[___1794309309(0)]) && $GLOBALS['____1540820422'][1]($GLOBALS[___1794309309(1)]) && $GLOBALS['____1540820422'][2](array($GLOBALS[___1794309309(2)], ___1794309309(3))) &&!$GLOBALS['____1540820422'][3](array($GLOBALS[___1794309309(4)], ___1794309309(5)))){ $_73250755= $GLOBALS[___1794309309(6)]->Query(___1794309309(7), true); if(!($_1849733493= $_73250755->Fetch())){ $_1233110830= round(0+12);} $_897799488= $_1849733493[___1794309309(8)]; list($_1930412114, $_1233110830)= $GLOBALS['____1540820422'][4](___1794309309(9), $_897799488); $_666373393= $GLOBALS['____1540820422'][5](___1794309309(10), $_1930412114); $_34971814= ___1794309309(11).$GLOBALS['____1540820422'][6]($GLOBALS['____1540820422'][7](___1794309309(12))); $_1871303259= $GLOBALS['____1540820422'][8](___1794309309(13), $_1233110830, $_34971814, true); if($GLOBALS['____1540820422'][9]($_1871303259, $_666373393) !==(1404/2-702)){ $_1233110830= round(0+4+4+4);} if($_1233110830 !=(139*2-278)){ if($GLOBALS['____1540820422'][10](___1794309309(14), ___1794309309(15))){ $_653308240= new \Bitrix\Main\License(); $_1240532354= $_653308240->getActiveUsersCount();} else{ $_1240532354=(868-2*434); $_73250755= $GLOBALS[___1794309309(16)]->Query(___1794309309(17), true); if($_1849733493= $_73250755->Fetch()){ $_1240532354= $GLOBALS['____1540820422'][11]($_1849733493[___1794309309(18)]);}} if($_1240532354> $_1233110830){ $GLOBALS['____1540820422'][12](array($GLOBALS[___1794309309(19)], ___1794309309(20)));}}}}/**/
		foreach (GetModuleEvents("main", "OnBeforeLocalRedirect", true) as $event)
		{
			ExecuteModuleEventEx($event, [&$url, $this->isSkippedSecurity(), &$isExternal, $this]);
		}

		if (!$isExternal)
		{
			$url = $this->processInternalUrl($url);
		}

		$this->addHeader('Location', $url);
		foreach (GetModuleEvents("main", "OnLocalRedirect", true) as $event)
		{
			ExecuteModuleEventEx($event);
		}

		Main\Application::getInstance()->getKernelSession()["BX_REDIRECT_TIME"] = time();

		parent::send();
	}
}