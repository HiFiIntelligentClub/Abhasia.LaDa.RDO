#!/usr/bin/php
<?php
// © A.A.CheckMaRev assminog@gmail.com tubmulur@yandex.ru 2021
//р=Ресурс	сп=СтрокаПакет(Пакет для вебсервера)
//Вдохновлённый коммуникацией с Алексеем Семёновым, по-настольгировав по былым временам ИТМО,
//постеснялся оставлять недоинтегрированную структуру и витая мыслями где-то там, 
//доделал интеграл, получив 1 абстрактный класс EDRO, и интерфейс EDRO-ЕДРО, переписываю уже целый день,
//очень боюсь критики от спеца.. Надеюсь успею к утру :). Хорошего дня.
//
//          .                         .             .                           .                      .
// .            .         Е  .                        .                           .                               .
//                        Д
//      .               EDRO              .              .                            .                                     .
//                        О:ПОЛИМЕР
//			    EDRO.SOT													
//																	
//																	
//																	
set_time_limit(0);
$сТекущееВремяСтемпСтарт	=сТекущееВремяСтемп();
$сРасположениеСчётчикВход	='/home/EDRO.o2o/Countup/Вход.plmr';
$сРасположениеСчётчикВходИстор	='/home/EDRO.o2o/Countup/History/Вход.plmr';
$ч0СчётчикВход			=file_get_contents($сРасположениеСчётчикВход);
				 file_put_contents($сРасположениеСчётчикВход, ($ч0СчётчикВход+1));
				 file_put_contents($сРасположениеСчётчикВходИстор,"\n=====\n".'	Start:		'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
require('/home/EDRO.SetOfTools/System/0.Functions/0.strNDigit.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/0.ReportError.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/1.Report.php');
require('/home/EDRO.SetOfTools/System/0.Functions/2.Dyn.php');
require('/home/EDRO.SetOfTools/System/2.VectorKIIM/0.KIIM.php');
require('/home/EDRO.SetOfTools/System/3.Buffer/1.EDRO_Buffering.php');
require('/home/EDRO.SetOfTools/DjService/Abhasia.lib.php');

class Абхазия
	{
	private $рПриёмник;
	public function __construct()
		{
		//:Buffering load
		//:Init Абхазия responser
		//:Construct EDRO
		//....
		//$рПриёмник	=рОрганизацияПриёмникаЗапросовСлушателя();






































		file_put_contents('x.txt', '	FinishLoad:		'.date("Y-m-d H:i:s")."\n", FILE_APPEND);

		while ($рПередача = stream_socket_accept($рПриёмник, -1))
			{file_put_contents('x.txt', '	StartLIVE:			'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
	
			$objEDRO	=new Event($objKIIM);

			if(isset($мЗаголовкиСлушателя[0]))
				{file_put_contents('x.txt', "\n".$_SERVER['strListener'].'	AfterReadListener:				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);

				$мЗаголовки			=мЗаголовкиЗапроса($мЗаголовкиСлушателя);
				$сРасширение			=mb_strtolower(сКонцДоСимвола($мЗаголовки[1], '.'));
	    		if(
				isset($мЗаголовки[1])
				&&$мЗаголовки[1]!="/favicon.ico"
				&&$мЗаголовки[1]!="/robots.txt"
				&&($сРасширение=="jpg")
					)
		/* J 	*/	{file_put_contents('x.txt', $_SERVER['strListener'].'	Before image     :				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
		/* P	*/	
		/* G	*/	_ЗагрузитьОтветСлушателю($objKIIM, $strJPGLogo);
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
		/* T	*/	$спДляОтправкиСлушателю		=сПостроитьПакетДанных($objKIIM, $objEDRO);
			
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
	private function _Буфферизация()
		{
		$objKIIM=KIIM::objStart($objKIIM, array('_strClass'=>__CLASS__,'_strMethod'=>__FUNCTION__,'_strMessage'=>'','_strVectorPoint'=>''));
		$faviconBin		=file_get_contents('/home/HiFiIntelligentClub.Ru/favicon.png');
		$strJPGLogo		=file_get_contents('/home/HiFiIntelligentClub.Ru/Hfic_Samin.jpg');
		$robotsTxt		=file_get_contents('/home/HiFiIntelligentClub.Ru/robots.txt');
		KIIM::objFinish($objKIIM, array('_strClass'=> __CLASS__, '_strMethod'=>__FUNCTION__, '_strMessage'=>'','_strVectorPoint'=>''));
		}
	private function _
		{
		}
	private function _ОрганизацияПриёмникаЗапросовСлушателя()
		{
		$objKIIM=KIIM::objStart(false , array('_strClass'=>__CLASS__,'_strMethod'=>__FUNCTION__,'_strMessage'	=>'','_strVectorPoint'=>''));

		//$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://hifiintelligentclub.ru:80", $errno, $errstr);
		//$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://127.0.0.1:8080", $errno, $errstr);
		$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://".strDomain().":80", $errno, $errstr);

		KIIM::objFinish($objKIIM, array('_strClass'=>__CLASS__,'_strMethod'=>__FUNCTION__,'_strMessage'=>'','_strVectorPoint'=>''));
		}
	private function мЧтениеЗапросаИзБраузераСлушателя($_рПередача)
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
	private function мЗаголовкиЗапроса($_мЗаголовки)
		{
		$мЗаголовки	=array();
		if(isset($_мЗаголовки[0]))
			{
			$мЗаголовки	=explode(" ", $_мЗаголовки[0]);
			}
		return $мЗаголовки;
		}
	private function мЗаголовкиВПеременные($_мЗапрос)
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
		if(!isset($мЗапрос['User-Agent']))
			{
			$мЗапрос['User-Agent']		='BOT';
			}
		if(!isset($мЗапрос['Host']))
			{
			$мЗапрос['Host']		='BOT';
			}
		if(!isset($мЗапрос['Accept-Language']))
			{
			$мЗапрос['Accept-Language']	='BOT';
			}
		if(!isset($мЗапрос['Accept-Encoding']))
			{
			$мЗапрос['Accept-Encoding']	='BOT';
			}
		return $мЗапрос;
		}
	private function сПостроитьПакетДанныхЛоготипКартинка($strJPG)
		{
		//Content-Type: text/plain\r\n
		//Content-Type: image/ico\r\n
		//$strJPG		=file_get_contents('/home/HiFiIntelligentClub.Ru/Hfic_Samin.jpg');
		return 			"HTTP/1.1 200 OK\r\nContent-Type: image/ico\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".strlen($strJPG)."\r\nConnection: close\r\n\r\n".$strJPG;
		}
	private function сПостроитьПакетДанных($_objKIIM, $objEDRO)
		{
		$strContentType		='Content-Type: text/html';
		$strNextDate		=date(DATE_RFC822, mktime(0, 0, 0, date("m")  , date("d"), date("Y")+1));
		// "set-cookie: username=aaa13; expires=friday,31-dec-99 23:59:59 gmt; path=/win/internet/html/; domain=citforum.ru;nn";

		echo $objEDRO->arrDesign['strTemplate']."\n"; 

		require			$objEDRO->arrDesign['strTemplate'];
		$strBuffer		=str_replace("\r\n\r\n", "", $str);
		unset($str);
		if($objEDRO->arrEvent['bIzDynamic'])
			{
			}
		else
			{
			$strBuffer		.='</body>';
			$strBuffer		.='</html>';
			}
		return 	    		"HTTP/1.1 200 OK\r\n".$strContentType."\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".strlen($strBuffer)."\r\n".$strCookie."\r\nConnection: close\r\n\r\n".$strBuffer;
		}
	}

















?>