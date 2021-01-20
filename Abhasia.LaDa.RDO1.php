#!/usr/bin/php
<?php
// © A.A.CheckMaRev assminog@gmail.com tubmulur@yandex.ru first sucsessfull run at Birthday of Gersan Gioev 26.11.2020
$_SERVER['REQUEST_URI']		='/';
$_SERVER['SERVER_NAME']		='HiFiIntelligentClub.Ru';
$_SERVER['HTTP_USER_AGENT']	='Abhasia LaDa.RDo';
require_once('/home/EDRO.SetOfTools/System/0.Functions/0.strNDigit.php');
// require_once('/home/EDRO.SetOfTools/System/0.Functions/1.RequestsFilter.php'); -Transform
require_once('/home/EDRO.SetOfTools/System/1.Reporter/0.ReportError.php');
require_once('/home/EDRO.SetOfTools/System/1.Reporter/1.Report.php');
require_once('/home/EDRO.SetOfTools/System/2.VectorKIIM/0.KIIM.php');
//require_once('/home/EDRO.SetOfTools/System/5.Templates/0.strKIIM.Template.php');
require_once('/home/EDRO.SetOfTools/System/3.Buffer/1.EDRO_Buffering.php');

function рОрганизацияПриёмникаЗапросовСлушателя()
	{
	$objKIIM=KIIM::objStart(false , array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'	=>'stream_socket_server','_strVectorPoint'=>'',));

	$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://hifiintelligentclub.ru:80", $errno, $errstr);

	KIIM::objFinish($objKIIM, array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'=>'stream_socket_server','_strVectorPoint'=>'',));
	return $рПриёмникЗапросовСлушателя;
	}
function мЗапросИзБраузераСлушателя($_lnConnect)
	{
	$strConnect		=fread($_lnConnect, 512);
	$arrHeaders		=explode("\n", $strConnect);
	return $arrHeaders;
	}
function мЗаголовкиВПеременные($_мЗапрос)
	{
	$_мЗапрос	=array();
	foreach($_мЗапрос as $сЗапрос)
		{
		$мЗапрос[]	=explode(":" , $сЗапрос);
		}
	return $мЗапрос;
	}
function мЗаголовкиЗапроса($_мЗаголовки)
	{
	$мЗаголовки	=explode(" ", $_мЗаголовки[0]);
	return $мЗаголовки;
	}
function фЛоготипИконка()
	{
	$faviconBin			=readfile('/home/HiFiIntelligentClub.Ru/favicon.png');
	fwrite($connect, "HTTP/1.1 200 OK\r\nContent-Type: image/png\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length:".strlen($faviconBin)."\r\nConnection: close\r\n\r\n".$faviconBin);
	unset($faviconBin);
	}
function фПостроитьПакетДанных()
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
	fwrite($connect,$strBuffer);
	fclose($connect);
	unset($strBuffer);
	}
	
$рПриёмник	=рОрганизацияПриёмникаЗапросовСлушателя();

//$strBufferServerNotice		='<h1>Сервер Абхазия.LaDa,RDo</h1><AbhasiaServeWarning style="display:block;overflow:hidden;font-size:x-large;height:20px;line-height:19px;color:red;">Development version. For stable, visit <a href="http://HiFiIntelligentClub.COM">HiFiIntelligentClub.COM</a></AbhasiaServeWarning>';
while ($рПриём = stream_socket_accept($рПриёмник, -1))
	{$objKIIM=KIIM::objStart($objKIIM, array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'=>'stream_socket_accept','_strVectorPoint'=>'',));

	$мЗаголовкиСлушателя	=мЗапросИзБраузераСлушателя($рПриём);

	if(isset($мЗаголовкиСлушателя[0]))
		{
		$мЗаголовки		=мЗаголовкиЗапроса($_мЗаголовки);

		if(isset($мЗаголовки[1])&&$мЗаголовки[1]!="/favicon.ico")
			{
			фПостроитьПакетДанных();
			}
		elseif(isset($arrRequest[1])&&$arrRequest[1]=="/favicon.ico")
			{
			фПостроитьПакетДанныхЛоготипИконка();
			}
		else
			{
			}
		}
	}
?>
//
//$strBuffer;
//exit;
//print_r($arrRequest);
//echo '^^^^^^^^^^^^^^^^^^^^^^^^-arrRequest-^^^^^^^^^^^^^^^^^^'."\n";
//if(isset($arrRequest[1])&&$arrRequest[1]!="/favicon.ico")
//	{
//	$strRequest	=$arrRequest[1];
//	unset($arrRequest);
//	if(сНачОтДоСимвола($strRequest, '.', '?')=='jpg')

//		{
//		$strContentType		='Content-Type: image/jpeg';
//		}
//echo 'vvvvvvvvvvvvvvvvvvvvvvvv-Run-With-Request-vvvvvvvvvvvvvvvvvv'."\n";
//echo '/home/HiFiIntelligentClub.Ru/run.php '.$strRequest."\n";
//echo '^^^^^^^^^^^^^^^^^^^^^^^^-Run-With-Request-^^^^^^^^^^^^^^^^^^'."\n";
//exec('/home/HiFiIntelligentClub.Ru/run.php '.$strRequest, $arrOut);
//unset($strRequest);
//	}
//echo $strBuffer		=file_get_contents('/home/HiFiIntelligentClub.Ru/index.php ');
//$strBuffer	='<!doctype html>';
//$strBuffer		.='<html xml:lang="RU">';
//$strBuffer		.='<head>';
//$strBuffer			.='<meta http-equiv="Content-type"	content="text/html; charset=utf-8"/>';
//$strBuffer			.='<meta name="viewport"		content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>';
//$strBuffer		.='</head>';
//$strBuffer		.='<body>';
//$strBuffer		.=$strBufferServerNotice;
//$arrRequest	=explode(" ", $arrHeaders[0]);	//print_r($arrRequest);	//echo 'vvvvvvvvvvvvvvvvvvvvvvvv-arrRequest-vvvvvvvvvvvvvvvvvv'."\n";
//$strBuffer		=FileRead::strGetDesignHTML($objKIIM, $objEDRO->arrDesign['strTemplate'], $objEDRO); //
//echo date('Y-m-d H:i:s')."\n\n";//echo 'vvvvvvvvvvvvvvvvvvvvvvvv-fRead-Connect-vvvvvvvvvvvvvvvvvv'."\n";//echo $str."\n";//echo '^^^^^^^^^^^^^^^^^^^^^^^^-fRead-Connect-^^^^^^^^^^^^^^^^^^'."\n";
//print_r($objEDRO);
//$strBuffer		='';
//echo $_strBuf=socket_read($socket, 256, PHP_NORMAL_READ);
//echo "Connect\n";