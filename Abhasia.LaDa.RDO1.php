#!/usr/bin/php
<?php
// © A.A.CheckMaRev assminog@gmail.com tubmulur@yandex.ru first sucsessfull run at Birthday of Gersan Gioev 26.11.2020
//р=Ресурс	сп=СтрокаПакет(Пакет для вебсервера)
set_time_limit(0);
file_put_contents('x.txt',"\n=====\n".'	Start:		'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
require('/home/EDRO.SetOfTools/System/0.Functions/0.strNDigit.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/0.ReportError.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/1.Report.php');
require('/home/EDRO.SetOfTools/System/0.Functions/2.Dyn.php');
require('/home/EDRO.SetOfTools/System/2.VectorKIIM/0.KIIM.php');
require('/home/EDRO.SetOfTools/System/3.Buffer/1.EDRO_Buffering.php');
require('/home/EDRO.SetOfTools/DjService/Abhasia.lib.php');
/*Буфферинг */
$faviconBin		=file_get_contents('/home/HiFiIntelligentClub.Ru/favicon.png');
$strJPG			=file_get_contents('/home/HiFiIntelligentClub.Ru/Hfic_Samin.jpg');
$robotsTxt		=file_get_contents('/home/HiFiIntelligentClub.Ru/robots.txt');
/*Буфферинг */
$рПриёмник	=рОрганизацияПриёмникаЗапросовСлушателя();
file_put_contents('x.txt', '	FinishLoad:		'.date("Y-m-d H:i:s")."\n", FILE_APPEND);

while ($рПередача = stream_socket_accept($рПриёмник, -1))
	{
	file_put_contents('x.txt', '	StartLIVE:			'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
	//$objKIIM=KIIM::objStart($objKIIM, array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'=>'stream_socket_accept','_strVectorPoint'=>'',));
	//$_SERVER['REQUEST_URI']		='/';
	$мЗаголовкиСлушателя		=мЧтениеЗапросаИзБраузераСлушателя($рПередача);
	$мЗаголовкиСлушателяПеременные	=мЗаголовкиВПеременные($мЗаголовкиСлушателя);
	//print_r($мЗаголовкиСлушателяПеременные);
	$_SERVER['HTTP_USER_AGENT']	=$мЗаголовкиСлушателяПеременные['User-Agent'];
	$_SERVER['SERVER_NAME']		=$мЗаголовкиСлушателяПеременные['Host'];
	$_SERVER['Accept-Language']	=$мЗаголовкиСлушателяПеременные['Accept-Language'];
	$_SERVER['Accept-Encoding']	=$мЗаголовкиСлушателяПеременные['Accept-Encoding'];
	if(isset($мЗаголовкиСлушателяПеременные['Cookie'])&&strpos($мЗаголовкиСлушателяПеременные['Cookie'],'strListener=')!==FALSE)
		{
		$_SERVER['strListener']		=str_replace('strListener=', '', trim($мЗаголовкиСлушателяПеременные['Cookie']));
		}
	else
		{
		$_SERVER['strListener']		='';
		}
	if(isset($мЗаголовкиСлушателя[0]))
		{
		file_put_contents('x.txt', "\n".$_SERVER['strListener'].'	AfterReadListener:				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
		$мЗаголовки			=мЗаголовкиЗапроса($мЗаголовкиСлушателя);
		$сРасширение			=mb_strtolower(сКонцДоСимвола($мЗаголовки[1], '.'));
		if(
			isset($мЗаголовки[1])
			&&$мЗаголовки[1]!="/favicon.ico"
			&&$мЗаголовки[1]!="/robots.txt"
			&&($сРасширение=="jpg")
				)
			{
	/* J 	*/	file_put_contents('x.txt', $_SERVER['strListener'].'	Before push page:				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);

	/* P	*/	$сЛогоКартинка			=сПостроитьПакетДанныхЛоготипКартинка($strJPG);
			fwrite($рПередача, $сЛогоКартинка, strlen($сЛогоКартинка));
	/* G	*/	fclose($рПередача);

			file_put_contents('x.txt', $_SERVER['strListener'].'	After push page:				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
			unset($спДляОтправкиСлушателю);	
			}
		elseif(
			isset($мЗаголовки[1])
			&&$мЗаголовки[1]!="/favicon.ico"
			&&$мЗаголовки[1]!="/robots.txt"
			&&($сРасширение!="jpg")
				)
			{
	/* H	*/	file_put_contents('x.txt', $_SERVER['strListener'].'	Before push page:				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);

			$_SERVER['REQUEST_URI']		=$мЗаголовки[1];
			$_SERVER['REMOTE_ADDR']		='<ifEN>Temporary disabled</ifEN><ifRU>Временно отключено</ifRU>';
	/* T	*/	$спДляОтправкиСлушателю				=сПостроитьПакетДанных();
			//fwrite($рПередача, $спДляОтправкиСлушателю);
	/* M	*/		
			//file_put_contents('/home/EDRO.SetOfTools/DjService/Abhasia_debug.txt', $спДляОтправкиСлушателю);
			fwrite($рПередача, $спДляОтправкиСлушателю, strlen($спДляОтправкиСлушателю));
	/* L	*/	fclose($рПередача);

			file_put_contents('x.txt', $_SERVER['strListener'].'	After push page:				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
			unset($спДляОтправкиСлушателю);
			}
		elseif(
			isset($мЗаголовки[1])
	/* Ф	*/	&&$мЗаголовки[1]=="/favicon.ico"
			&&$мЗаголовки[1]!="/robots.txt"
	/* А 	*/	&&($сРасширение!="jpg")
				)
			{
	/* В	*/	file_put_contents('x.txt', '	Before push fav:'.date("Y-m-d H:i:s")."\n", FILE_APPEND);

	/* И	*/	$strICO						=сПостроитьПакетДанныхЛоготипИконка($faviconBin);
			fwrite($рПередача, $strICO, strlen($strICO));
	/* К	*/	fclose($рПередача);

	/* О	*/	file_put_contents('x.txt', '	After push fav:'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
			unset($strICO);
			}
		elseif(
			isset($мЗаголовки[1])
	/* Р	*/	&&$мЗаголовки[1]!="/favicon.ico"
			&&$мЗаголовки[1]=="/robots.txt"
			&&($сРасширение!="jpg")
	/* О 	*/		)
			{
	/* Б	*/	file_put_contents('x.txt', $_SERVER['strListener'].'	Before push robots:				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);

			$сРоботы					=сПостроитьПакетДанныхРоботТхт($robotsTxt);
	/* О	*/	fwrite($рПередача, $сРоботы, strlen($сРоботы));
			fclose($рПередача);
	/* Т	*/	
			file_put_contents('x.txt', $_SERVER['strListener'].'	After push robots:				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
	/* Ы	*/	unset($сРоботы);
			}
		else
			{
			_Report(date("Y-m-d H:i:s").' Абхазия MAIN ELSE');
			}
		}
	}
?>