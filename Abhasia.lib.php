<?php
function рОрганизацияПриёмникаЗапросовСлушателя()
	{
	$objKIIM=KIIM::objStart(false , array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'	=>'stream_socket_server','_strVectorPoint'=>'',));

	$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://hifiintelligentclub.ru:80", $errno, $errstr);

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
			$мЗапрос[]	=explode(":" , $сЗапрос);
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
function сПостроитьПакетДанных()
	{
	$strContentType		='Content-Type: text/html';
	$objEDRO		=new Event(array());
	//require_once		$objEDRO->arrDesign['strTemplate'];
	$str			='123';
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
	$strBufferLen		=strlen($strBuffer);
	$strBuffer		="HTTP/1.1 200 OK\r\n".$strContentType."\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".$strBufferLen."\r\nConnection: close\r\n\r\n".$strBuffer;
	return $strBuffer;
	}
?>