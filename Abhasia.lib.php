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

function фЛоготипИконка($_рПередача)
	{
	$faviconBin			=readfile('/home/HiFiIntelligentClub.Ru/favicon.png');
	fwrite($_рПередача, "HTTP/1.1 200 OK\r\nContent-Type: image/ico\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length:".strlen($faviconBin)."\r\nConnection: close\r\n\r\n".$faviconBin);
	unset($faviconBin);
	}
function фПостроитьПакетДанных($objKIIM, $_рПередача)
	{
	$strContentType		='Content-Type: text/html';
	$objEDRO		=new Event($objKIIM);
	require_once		$objEDRO->arrDesign['strTemplate'];
	$strBuffer		=str_replace(array("\r\n\r\n", "\n\n"), "", $str);
	if($objEDRO->arrEvent['bIzDynamic'])
		{
		}
	else
		{
		$strBuffer		.='</body>';
		$strBuffer		.='</html>';
		}
	$strBufferLen		=strlen($strBuffer);
	$strBuffer		= "HTTP/1.1 200 OK\r\n".$strContentType."\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length:".$strBufferLen."\r\nConnection: close\r\n\r\n".$strBuffer;
	unset($arrOut);
	unset($strOut);

	file_put_contents('/home/EDRO.SetOfTools/DjService/Abhasia_debug.txt', $strBuffer);

	KIIM::objFinish($objKIIM, array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'=>'stream_socket_accept','_strVectorPoint'=>'',));
	fwrite($_рПередача, $strBuffer);
	fclose($_рПередача);
	unset($strBuffer);
	}
?>