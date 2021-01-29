#!/usr/bin/php
<?php
// © A.A.CheckMaRev assminog@gmail.com tubmulur@yandex.ru first sucsessfull run at Birthday of Gersan Gioev 26.11.2020
//р=Ресурс	сп=СтрокаПакет(Пакет для вебсервера)
require_once('/home/EDRO.SetOfTools/System/0.Functions/0.strNDigit.php');
// require_once('/home/EDRO.SetOfTools/System/0.Functions/1.RequestsFilter.php'); -Transform
require_once('/home/EDRO.SetOfTools/System/1.Reporter/0.ReportError.php');
require_once('/home/EDRO.SetOfTools/System/1.Reporter/1.Report.php');
require_once('/home/EDRO.SetOfTools/System/0.Functions/2.Dyn.php');
require_once('/home/EDRO.SetOfTools/System/2.VectorKIIM/0.KIIM.php');
//require_once('/home/EDRO.SetOfTools/System/5.Templates/0.strKIIM.Template.php');
require_once('/home/EDRO.SetOfTools/System/3.Buffer/1.EDRO_Buffering.php');
require_once('/home/EDRO.SetOfTools/DjService/Abhasia.lib.php');


$рПриёмник	=рОрганизацияПриёмникаЗапросовСлушателя();

while ($рПередача = stream_socket_accept($рПриёмник, -1))
	{
	//$objKIIM=KIIM::objStart($objKIIM, array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'=>'stream_socket_accept','_strVectorPoint'=>'',));
	//$_SERVER['REQUEST_URI']		='/';
	$мЗаголовкиСлушателя		=мЧтениеЗапросаИзБраузераСлушателя($рПередача);
	$мЗаголовкиСлушателяПеременные	=мЗаголовкиВПеременные($мЗаголовкиСлушателя);
	print_r($мЗаголовкиСлушателяПеременные);
	$_SERVER['HTTP_USER_AGENT']	=$мЗаголовкиСлушателяПеременные['User-Agent'];
	$_SERVER['SERVER_NAME']		=$мЗаголовкиСлушателяПеременные['Host'];
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
		$мЗаголовки			=мЗаголовкиЗапроса($мЗаголовкиСлушателя);
		if(
			isset($мЗаголовки[1])
			&&$мЗаголовки[1]!="/favicon.ico"
			&&$мЗаголовки[1]!="/robots.txt"
			)
			{
			$_SERVER['REQUEST_URI']		=$мЗаголовки[1];

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
			fwrite($рПередача, сПостроитьПакетДанныхЛоготипИконка());
			fclose($рПередача);
			}
		elseif(
			isset($мЗаголовки[1])
			&&$мЗаголовки[1]!="/favicon.ico"
			&&$мЗаголовки[1]=="/robots.txt"
			)
			{
			fwrite($рПередача, сПостроитьПакетДанныхРоботТхт());
			fclose($рПередача);
			}
		else
			{
			}
		}
	}
?>
