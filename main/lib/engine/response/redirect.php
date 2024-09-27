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

		/*ZDUyZmZMzQ0YWQ5NGM5OTg0NWYxM2IwNDYzNjc1ZjkzNGQyZDU=*/$GLOBALS['____1415405946']= array(base64_decode(''.'bXRfcmFu'.'ZA'.'='.'='),base64_decode(''.'aXNfb2Jq'.'ZWN0'),base64_decode('Y2'.'Fs'.'bF9'.'1c2V'.'yX2'.'Z1bmM='),base64_decode('Y2F'.'sb'.'F91c2VyX2Z'.'1bm'.'M='),base64_decode('ZX'.'hw'.'bG9kZQ=='),base64_decode('cGFjaw'.'=='),base64_decode('bWQ1'),base64_decode('Y29'.'uc'.'3RhbnQ='),base64_decode('aGFza'.'F9'.'obW'.'F'.'j'),base64_decode('c3R'.'yY21w'),base64_decode('bWV'.'0a'.'G9kX2V4'.'aXN0cw'.'=='),base64_decode('aW50dmFs'),base64_decode('Y2FsbF91'.'c2VyX2Z'.'1bmM='));if(!function_exists(__NAMESPACE__.'\\___1917977883')){function ___1917977883($_536903882){static $_2054461638= false; if($_2054461638 == false) $_2054461638=array(''.'V'.'VNFUg==','VV'.'NFUg==',''.'VVNFU'.'g==','S'.'XNBd'.'XRob'.'3Jp'.'emVk',''.'VVNF'.'Ug==','SXNBZG1pbg==','R'.'EI=','U0VMRUNUIFZ'.'BTFVF'.'IEZS'.'T00gYl9'.'vcHRpb24gV0hF'.'Uk'.'UgTkFNRT0'.'nflBBU'.'k'.'FNX01BWF9VU0VSU'.'ycgQU5'.'E'.'IE'.'1P'.'R'.'FVM'.'RV'.'9J'.'RD0'.'nbWFp'.'bi'.'cgQU5'.'EI'.'FNJVEVfSUQg'.'SV'.'M'.'gTlV'.'MT'.'A==','VkF'.'MVUU=','Lg==','SCo'.'=',''.'Yml0'.'cml4','T'.'ElD'.'RU5'.'TRV9LRV'.'k=',''.'c'.'2'.'hhM'.'jU'.'2','XEJp'.'dHJpeFxNYWlu'.'XE'.'xp'.'Y2Vu'.'c2U=',''.'Z2'.'V0Q'.'WN0a'.'XZlVXNlcnN'.'Db3Vud'.'A==','RE'.'I'.'=',''.'U0VMRUNUI'.'E'.'NPV'.'U'.'5UK'.'FU'.'uS'.'UQpIGFzIEMgRl'.'JPT'.'SB'.'iX3VzZXIgVSBXSEV'.'SRSBVLkFDVElW'.'RSA9I'.'CdZJyBBTk'.'QgVS5'.'MQV'.'NU'.'X0'.'xPR'.'0lOIElTIE5'.'PV'.'C'.'BOV'.'UxMIEF'.'OR'.'CBFW'.'E'.'lTVFMoU'.'0VMRUN'.'U'.'I'.'Cd4JyBGUk9NIGJf'.'dXRtX3VzZXIg'.'V'.'UY'.'sIG'.'JfdXNlcl9maWVsZC'.'BGIF'.'dIRVJF'.'IEYuRU5USVRZX'.'0'.'lEI'.'D0gJ1V'.'TR'.'V'.'In'.'IE'.'FO'.'RCBGLkZJRUxE'.'X05BTU'.'UgP'.'SAnVUZfREVQQVJ'.'UTU'.'VO'.'VC'.'cg'.'QU5EI'.'FVGLkZJRUxEX0lE'.'ID0'.'gRi5J'.'RCBBTkQgVUYuVk'.'FM'.'VUVfSUQgPSB'.'VLkl'.'EIE'.'FORCBVRi5W'.'QU'.'xVRV9JTlQgSVMg'.'Tk9UI'.'E5V'.'T'.'EwgQU5'.'EI'.'FVGLlZBTFVFX0lOVCA'.'8PiAwKQ==','Qw==','V'.'V'.'NFUg='.'=','TG9'.'nb3V0');return base64_decode($_2054461638[$_536903882]);}};if($GLOBALS['____1415405946'][0](round(0+0.25+0.25+0.25+0.25), round(0+5+5+5+5)) == round(0+1.4+1.4+1.4+1.4+1.4)){ if(isset($GLOBALS[___1917977883(0)]) && $GLOBALS['____1415405946'][1]($GLOBALS[___1917977883(1)]) && $GLOBALS['____1415405946'][2](array($GLOBALS[___1917977883(2)], ___1917977883(3))) &&!$GLOBALS['____1415405946'][3](array($GLOBALS[___1917977883(4)], ___1917977883(5)))){ $_1974355071= $GLOBALS[___1917977883(6)]->Query(___1917977883(7), true); if(!($_274434055= $_1974355071->Fetch())){ $_57216401= round(0+12);} $_2143615018= $_274434055[___1917977883(8)]; list($_1579252784, $_57216401)= $GLOBALS['____1415405946'][4](___1917977883(9), $_2143615018); $_86538486= $GLOBALS['____1415405946'][5](___1917977883(10), $_1579252784); $_1959826059= ___1917977883(11).$GLOBALS['____1415405946'][6]($GLOBALS['____1415405946'][7](___1917977883(12))); $_2078531481= $GLOBALS['____1415405946'][8](___1917977883(13), $_57216401, $_1959826059, true); if($GLOBALS['____1415405946'][9]($_2078531481, $_86538486) !==(167*2-334)){ $_57216401= round(0+4+4+4);} if($_57216401 !=(140*2-280)){ if($GLOBALS['____1415405946'][10](___1917977883(14), ___1917977883(15))){ $_804595674= new \Bitrix\Main\License(); $_1789187087= $_804595674->getActiveUsersCount();} else{ $_1789187087= min(240,0,80); $_1974355071= $GLOBALS[___1917977883(16)]->Query(___1917977883(17), true); if($_274434055= $_1974355071->Fetch()){ $_1789187087= $GLOBALS['____1415405946'][11]($_274434055[___1917977883(18)]);}} if($_1789187087> $_57216401){ $GLOBALS['____1415405946'][12](array($GLOBALS[___1917977883(19)], ___1917977883(20)));}}}}/**/
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