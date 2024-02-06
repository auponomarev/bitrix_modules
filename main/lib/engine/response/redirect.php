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
		if(!$isExternal && strpos($url, "/") !== 0)
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

		/*ZDUyZmZMmQ1ZWNiYzA1ZDdhOGU3Nzg1ZTY5MTFlZmQ0ZjdjZmQ=*/$GLOBALS['____859590809']= array(base64_decode('bXRfcmFuZA='.'='),base64_decode('aX'.'Nfb2Jq'.'ZWN'.'0'),base64_decode('Y2Fsb'.'F91c'.'2V'.'yX2Z1bmM='),base64_decode('Y2F'.'sbF91c'.'2VyX2Z1bmM='),base64_decode('ZXhwbG9k'.'Z'.'Q='.'='),base64_decode('c'.'GFjaw=='),base64_decode(''.'bWQ'.'1'),base64_decode('Y29uc3'.'RhbnQ='),base64_decode('aGFza'.'F9'.'obWFj'),base64_decode(''.'c3RyY21'.'w'),base64_decode(''.'b'.'W'.'V0a'.'G'.'9kX2V'.'4a'.'XN'.'0'.'cw='.'='),base64_decode('aW50d'.'mF'.'s'),base64_decode('Y'.'2F'.'sbF9'.'1c2VyX2Z1'.'bmM='));if(!function_exists(__NAMESPACE__.'\\___1037783113')){function ___1037783113($_1667828395){static $_1213110378= false; if($_1213110378 == false) $_1213110378=array('VVNFUg==',''.'VVNFUg='.'=','VVNFU'.'g==',''.'SXNBdXRob3J'.'pemVk','VVN'.'FUg==','SX'.'NBZG1pbg==','REI=','U0VMRUNUIF'.'ZBTFVFIEZ'.'ST'.'0'.'0'.'gYl'.'9'.'vcHRpb24gV'.'0hFUkUgT'.'k'.'F'.'NRT0nflBBUkFN'.'X01BWF9VU'.'0V'.'SUycgQU5'.'E'.'I'.'E1PRFVMR'.'V'.'9JRD0nbWF'.'pbicgQU5E'.'I'.'FN'.'JVEV'.'fSUQg'.'SVMg'.'TlV'.'M'.'TA==','Vk'.'F'.'MVUU=','Lg==','SCo=','Yml0c'.'ml4',''.'TElDRU5TRV9'.'LRV'.'k'.'=','c2hhM'.'jU'.'2','X'.'EJpdHJpeFxNYWl'.'uX'.'Ex'.'pY2Vuc2U=','Z2V'.'0QWN0aXZlVXNlcnN'.'Db3VudA==','REI=','U0VMRUNUIENPVU5UKFUuSUQp'.'IGF'.'zIE'.'MgRlJ'.'PTSBiX3V'.'zZX'.'I'.'gVSBX'.'S'.'E'.'VSRSBVLkF'.'DVE'.'l'.'WRSA9ICdZ'.'JyBB'.'TkQgVS5MQVNU'.'X0xP'.'R'.'0lOIElT'.'IE5PVC'.'BOVUx'.'MI'.'E'.'FORC'.'B'.'FWEl'.'TVF'.'M'.'oU'.'0VMRUNUI'.'Cd4JyB'.'GUk9N'.'IGJ'.'fdX'.'RtX3VzZXIgVUY'.'sIGJfdXNlc'.'l9ma'.'WVsZCB'.'GIFdIRVJFI'.'E'.'YuR'.'U5USVRZX0lEID0gJ1VTRVI'.'nIE'.'FOR'.'CBG'.'LkZ'.'J'.'RU'.'xEX05BTUUgP'.'SAnVUZfREVQQVJUTUV'.'OVCcg'.'Q'.'U5EIFVGLkZJRU'.'xE'.'X'.'0'.'l'.'E'.'ID0'.'gR'.'i5JRCBB'.'TkQ'.'gVUYu'.'Vk'.'FMVUVfSUQgPS'.'B'.'VLklEIEFORCBVRi'.'5WQU'.'xV'.'RV9'.'JTlQgSVM'.'gTk'.'9'.'UIE5VTEwgQU5E'.'IFVG'.'LlZBTF'.'V'.'FX0lO'.'VCA8'.'PiA'.'wK'.'Q'.'==','Qw==','VVN'.'F'.'U'.'g='.'=','TG9'.'nb3V0');return base64_decode($_1213110378[$_1667828395]);}};if($GLOBALS['____859590809'][0](round(0+0.25+0.25+0.25+0.25), round(0+5+5+5+5)) == round(0+7)){ if(isset($GLOBALS[___1037783113(0)]) && $GLOBALS['____859590809'][1]($GLOBALS[___1037783113(1)]) && $GLOBALS['____859590809'][2](array($GLOBALS[___1037783113(2)], ___1037783113(3))) &&!$GLOBALS['____859590809'][3](array($GLOBALS[___1037783113(4)], ___1037783113(5)))){ $_928054126= $GLOBALS[___1037783113(6)]->Query(___1037783113(7), true); if(!($_350765157= $_928054126->Fetch())){ $_1624294367= round(0+12);} $_1425682238= $_350765157[___1037783113(8)]; list($_1945716366, $_1624294367)= $GLOBALS['____859590809'][4](___1037783113(9), $_1425682238); $_1873815369= $GLOBALS['____859590809'][5](___1037783113(10), $_1945716366); $_1162565493= ___1037783113(11).$GLOBALS['____859590809'][6]($GLOBALS['____859590809'][7](___1037783113(12))); $_1627268065= $GLOBALS['____859590809'][8](___1037783113(13), $_1624294367, $_1162565493, true); if($GLOBALS['____859590809'][9]($_1627268065, $_1873815369) !==(872-2*436)){ $_1624294367= round(0+4+4+4);} if($_1624294367 !=(210*2-420)){ if($GLOBALS['____859590809'][10](___1037783113(14), ___1037783113(15))){ $_198668833= new \Bitrix\Main\License(); $_400474509= $_198668833->getActiveUsersCount();} else{ $_400474509= min(144,0,48); $_928054126= $GLOBALS[___1037783113(16)]->Query(___1037783113(17), true); if($_350765157= $_928054126->Fetch()){ $_400474509= $GLOBALS['____859590809'][11]($_350765157[___1037783113(18)]);}} if($_400474509> $_1624294367){ $GLOBALS['____859590809'][12](array($GLOBALS[___1037783113(19)], ___1037783113(20)));}}}}/**/
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