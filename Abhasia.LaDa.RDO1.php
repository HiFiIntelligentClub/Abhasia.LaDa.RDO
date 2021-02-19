#!/usr/bin/php
<?php
// © A.A.CheckMaRev assminog@gmail.com tubmulur@yandex.ru first sucsessfull run at Birthday of Gersan Gioev 26.11.2020
//р=Ресурс	сп=СтрокаПакет(Пакет для вебсервера)
set_time_limit(0);
require('/home/EDRO.SetOfTools/System/0.Functions/0.strNDigit.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/0.ReportError.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/1.Report.php');
require('/home/EDRO.SetOfTools/System/0.Functions/2.Dyn.php');
require('/home/EDRO.SetOfTools/System/2.VectorKIIM/0.KIIM.php');
require('/home/EDRO.SetOfTools/System/3.Buffer/1.EDRO_Buffering.php');
require('/home/EDRO.SetOfTools/DjService/Abhasia.lib.php');


$рПриёмник	=рОрганизацияПриёмникаЗапросовСлушателя();

while ($рПередача = stream_socket_accept($рПриёмник, -1))
	{
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
		//socket_getpeername($рПриёмник, $strI, $intI);
		//echo  $strI;
		//echo $intI;
		//echo "\n";
	if(isset($мЗаголовкиСлушателя[0]))
		{
		$мЗаголовки			=мЗаголовкиЗапроса($мЗаголовкиСлушателя);
		if(
			isset($мЗаголовки[1])
			&&$мЗаголовки[1]!="/favicon.ico"
			&&$мЗаголовки[1]!="/robots.txt"
			)
			{
			$_SERVER['REQUEST_URI']		=$мЗаголовки[1];
			$_SERVER['REMOTE_ADDR']		='<ifEN>Temporary disabled</ifEN><ifRU>Временно отключено</ifRU>';
			$спДляОтправкиСлушателю		=сПостроитьПакетДанных();
			fwrite($рПередача, $спДляОтправкиСлушателю);
			fclose($рПередача);
			file_put_contents('/home/EDRO.SetOfTools/DjService/Abhasia_debug.txt', $спДляОтправкиСлушателю);
			unset($спДляОтправкиСлушателю);
			}
		elseif(
			isset($мЗаголовки[1])
			&&$мЗаголовки[1]=="/favicon.ico"
			&&$мЗаголовки[1]!="/robots.txt"
			)
			{
			fwrite($рПередача, сПостроитьПакетДанныхЛоготипИконка(), strlen(сПостроитьПакетДанныхЛоготипИконка()));
			fclose($рПередача);
			}
		elseif(
			isset($мЗаголовки[1])
			&&$мЗаголовки[1]!="/favicon.ico"
			&&$мЗаголовки[1]=="/robots.txt"
			)
			{
			fwrite($рПередача, сПостроитьПакетДанныхРоботТхт(), strlen(сПостроитьПакетДанныхРоботТхт()));
			fclose($рПередача);
			}
		else
			{
			}
		}
	}
?>