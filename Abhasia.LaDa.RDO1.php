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
require_once('/home/EDRO.SetOfTools/DjService/Abhasia.lib.php');

$рПриёмник	=рОрганизацияПриёмникаЗапросовСлушателя();

while ($рПередача = stream_socket_accept($рПриёмник, -1))
	{
	$objKIIM=KIIM::objStart($objKIIM, array('_strClass'=>'Socket','_strMethod'=>'Start','_strMessage'=>'stream_socket_accept','_strVectorPoint'=>'',));
	$мЗаголовкиСлушателя	=мЧтениеЗапросаИзБраузераСлушателя($рПередача);

	if(isset($мЗаголовкиСлушателя[0]))
		{
		$мЗаголовки		=мЗаголовкиЗапроса($мЗаголовкиСлушателя);
		if(isset($мЗаголовки[1])&&$мЗаголовки[1]!="/favicon.ico")
			{
			$objEDRO		=new Event($objKIIM);
			фПостроитьПакетДанных($objKIIM, $рПередача);
			}
		elseif(isset($arrRequest[1])&&$arrRequest[1]=="/favicon.ico")
			{
			фПостроитьПакетДанныхЛоготипИконка($рПередача);
			}
		else
			{
			}
		}
	}
?>
