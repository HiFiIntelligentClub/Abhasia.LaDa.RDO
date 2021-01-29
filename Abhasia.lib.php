<?php

function рОрганизацияПриёмникаЗапросовСлушателя()
	{
	$objKIIM=KIIM::objStart(false , array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'	=>'stream_socket_server','_strVectorPoint'=>'',));

	//$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://hifiintelligentclub.ru:80", $errno, $errstr);
	//$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://127.0.0.1:8080", $errno, $errstr);
	$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://".strDomain().":80", $errno, $errstr);

	KIIM::objFinish($objKIIM, array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'=>'stream_socket_server','_strVectorPoint'=>'',));
	return $рПриёмникЗапросовСлушателя;
	}
function мЧтениеЗапросаИзБраузераСлушателя($_рПередача)
	{
	$сПередача		=fread($_рПередача, 512);
	if(!empty($сПередача))
		{
		$мПередача		=explode("\n", $сПередача);
		}
	else
		{
		_Report('fread($_рПередача, 512) empty.');
		}
	return $мПередача;
	}
function мЗаголовкиЗапроса($_мЗаголовки)
	{
	$мЗаголовки	=array();
	if(isset($_мЗаголовки[0]))
		{
		$мЗаголовки	=explode(" ", $_мЗаголовки[0]);
		}
	return $мЗаголовки;
	}
function мЗаголовкиВПеременные($_мЗапрос)
	{
	if(is_array($_мЗапрос))
		{
		foreach($_мЗапрос as $сЗапрос)
			{
			$мТекущаяСтрока	=explode(":" , $сЗапрос);
			if(isset($мТекущаяСтрока[0])&&isset($мТекущаяСтрока[1]))
				{
				$мЗапрос[$мТекущаяСтрока[0]]	=$мТекущаяСтрока[1];
				}
			elseif(isset($мТекущаяСтрока[0])&&!isset($мТекущаяСтрока[1]))
				{
				$мЗапрос['strRequest']		=$мТекущаяСтрока[0];
				}
			else
				{
				}
			}
		}
	return $мЗапрос;
	}
function сПостроитьПакетДанныхЛоготипИконка()
	{
	$faviconBin		=readfile('/home/HiFiIntelligentClub.Ru/favicon.png');
	$спИконка 		="HTTP/1.1 200 OK\r\nContent-Type: image/ico\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".strlen($faviconBin)."\r\nConnection: close\r\n\r\n".$faviconBin;
	return $спИконка;
	}
function сПостроитьПакетДанныхРоботТхт()
	{
	$robotsTxt		=readfile('/home/HiFiIntelligentClub.Ru/robots.txt');
	$robotsTxt 		="HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".strlen($robotsTxt)."\r\nConnection: close\r\n\r\n".$robotsTxt;
	return $robotsTxt;
	}
function сПостроитьПакетДанных()
	{
	$strContentType		='Content-Type: text/html';
	$strNextDate		=date(DATE_RFC822, mktime(0, 0, 0, date("m")  , date("d"), date("Y")+1));
	// "set-cookie: username=aaa13; expires=friday,31-dec-99 23:59:59 gmt; path=/win/internet/html/; domain=citforum.ru;nn";

	$objEDRO		=new Event(array());

	$strCookie		='set-cookie: strListener='.$objEDRO->arrReality['strListenerId'].'; expires='.$strNextDate.'; path=/; domain='.strDomain().';';

	require			$objEDRO->arrDesign['strTemplate'];
	$strBuffer		=str_replace(array("\r\n\r\n", "\n\n"), "", $str);
	unset($str);
	if($objEDRO->arrEvent['bIzDynamic'])
		{
		}
	else
		{
		$strBuffer		.='</body>';
		$strBuffer		.='</html>';
		}
	$strBuffer		="HTTP/1.1 200 OK\r\n".$strContentType."\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".strlen($strBuffer)."\r\n".$strCookie."\r\nConnection: close\r\n\r\n".$strBuffer;
	return $strBuffer;
	}
?>