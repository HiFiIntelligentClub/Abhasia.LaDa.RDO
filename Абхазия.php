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

Абхазия::VoId();

class Абхазия
	{
	private $сЖурнал;
	private $мКИМ		=array();
	private $ч0КИМШаг	=0;
	private $рПриёмник;
	private $objEDRO;
	private $мЗаголовки;
	private $рПередача;
	private $мБуффер	=array();
	public function __construct()
		{
		//1.Load library
		//2.Buffering load
		//3.Create OS socket
		//4.Make socket accessible and "Beat the cream"
		//4.1.
		//4.2.
					
					$this->сСтартЖурнала();
					$this->мБуфферизация();

		$this->рПриёмник	=рОрганизацияПриёмникаЗапросовСлушателя();

		while($this->рПередача = stream_socket_accept($this->рПриёмник, -1))
			{

			$this->objEDRO	=new Event();
exit;
			if(isset($this->мЗаголовкиСлушателя[0]))
				{

				$this->мЗаголовки		=$this->мЗаголовкиЗапроса($мЗаголовкиСлушателя);
				$this->сРасширение		=mb_strtolower(сКонцДоСимвола($this->мЗаголовки[1], '.'));
			if(
				isset($this->мЗаголовки[1])
				&&$this->мЗаголовки[1]!="/favicon.ico"
				&&$this->мЗаголовки[1]!="/robots.txt"
				&&($this->сРасширение=="jpg")
					)
		/* J 	*/	{/*DEBUG*/file_put_contents('x.txt', $_SERVER['strListener'].'	Before image     :				'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
		/* P	*/	
		/* G	*/	_ЗагрузитьОтветСлушателю($strJPGLogo);
				}
			elseif(
				isset($this->мЗаголовки[1])
				&&$this->мЗаголовки[1]!="/favicon.ico"
				&&$this->мЗаголовки[1]!="/robots.txt"
				&&($this->сРасширение!="jpg")
    					)
				{
		/* H	*/	$_SERVER['REQUEST_URI']		=$this->мЗаголовки[1];
				$_SERVER['REMOTE_ADDR']		='<ifEN>Temporary disabled</ifEN><ifRU>Временно отключено</ifRU>';
		/* T	*/	$спДляОтправкиСлушателю		=сПостроитьПакетДанных($this->objEDRO);
		/* M	*/	fwrite($рПередача, $спДляОтправкиСлушателю, strlen($спДляОтправкиСлушателю));
		/* L	*/	fclose($рПередача);
				unset($спДляОтправкиСлушателю);
				}
			elseif(
				isset($this->мЗаголовки[1])
		/* Ф	*/	&&$this->мЗаголовки[1]=="/favicon.ico"
        			&&$this->мЗаголовки[1]!="/robots.txt"
		/* А 	*/	&&($this->сРасширение!="jpg")
					)
				{
		/* В	*/	$strICO				=сПостроитьПакетДанныхЛоготипИконка($faviconBin);
		/* И	*/	fwrite($this->рПередача, $strICO, strlen($strICO));
		/* К	*/	fclose($this->рПередача);
				unset($strICO);
				}
			elseif(
				isset($this->мЗаголовки[1])
		/* Р	*/	&&$this->мЗаголовки[1]!="/favicon.ico"
				&&$this->мЗаголовки[1]=="/robots.txt"
				&&($this->сРасширение!="jpg")
		/* О 	*/		)
				{
		/* Б	*/	$сРоботы			=сПостроитьПакетДанныхРоботТхт($robotsTxt);
		/* О	*/	fwrite($this->рПередача, $сРоботы, strlen($сРоботы));
		/* Т	*/	fclose($this->рПередача);
		/* Ы	*/	unset($сРоботы);
				}
			else
				{
				_Report(date("Y-m-d H:i:s").' Абхазия MAIN ELSE');
				}
			}
		}


	private function рОрганизацияПриёмникаЗапросовСлушателя()
		{
		$this->_КИМ('Start');
		//$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://hifiintelligentclub.ru:80", $errno, $errstr);
		//$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://127.0.0.1:8080", $errno, $errstr);
		$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://".strDomain().":80", $errno, $errstr);
		$this->_КИМ('End');
		return $рПриёмникЗапросовСлушателя;
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
	private function сПостроитьПакетДанных()
		{
		$this->_КИМ('Start');
		$strContentType		='Content-Type: text/html';
		$strNextDate		=date(DATE_RFC822, mktime(0, 0, 0, date("m")  , date("d"), date("Y")+1));
		// "set-cookie: username=aaa13; expires=friday,31-dec-99 23:59:59 gmt; path=/win/internet/html/; domain=citforum.ru;nn";

		/*$this->objEDRO->arrDesign['strTemplate']."\n"; */

		require			$this->objEDRO->arrDesign['strTemplate'];
		$strBuffer		=str_replace("\r\n\r\n", "", $str);
		unset($str);
		if($this->objEDRO->arrEvent['bIzDynamic'])
			{
			}
		else
			{
			$strBuffer		.='</body>';
			$strBuffer		.='</html>';
			}
		$this->_КИМ('End');
		return"HTTP/1.1 200 OK\r\n".$strContentType."\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".strlen($strBuffer)."\r\n".$strCookie."\r\nConnection: close\r\n\r\n".$strBuffer;
		}
	public static function сСтартЖурнала()
		{
		$this->_КИМ('Start');
		$сРасположениеСчётчикВход	='/home/EDRO.o2o/Countup/Вход.plmr';
		$сРасположениеСчётчикВходИстор	='/home/EDRO.o2o/Countup/History/Вход.plmr';
		$ч0СчётчикВход			=file_get_contents($сРасположениеСчётчикВход);
						 file_put_contents($сРасположениеСчётчикВход, ($ч0СчётчикВход+1));
						 /*DEBUG*/file_put_contents($сРасположениеСчётчикВходИстор,"\n=====\n".'	Start:		'.date("Y-m-d H:i:s")."\n", FILE_APPEND);
		$this->_КИМ('End');
		}
	private function мБуфферизация()
		{
		$this->_КИМ('Start');
		require('/home/EDRO.SetOfTools/System/0.Functions/0.strNDigit.php');
		require('/home/EDRO.SetOfTools/System/1.Reporter/0.ReportError.php');
		require('/home/EDRO.SetOfTools/System/1.Reporter/1.Report.php');
		require('/home/EDRO.SetOfTools/System/0.Functions/2.Dyn.php');
		//require('/home/EDRO.SetOfTools/System/2.VectorKIIM/0.KIIM.php');
		require('/home/EDRO.SetOfTools/System/3.Buffer/1.EDRO_Buffering.php');
		$this->_КИМ('End');
		$this->_КИМ('Start');
		$м	=array();
		$м['strFaviconBin']		=file_get_contents('/home/HiFiIntelligentClub.Ru/favicon.png');
		$м['strJPGLogo']		=file_get_contents('/home/HiFiIntelligentClub.Ru/Hfic_Samin.jpg');
		$м['strRobotsTxt']		=file_get_contents('/home/HiFiIntelligentClub.Ru/robots.txt');
		$this->_КИМ('End');
		return $м;
		}
	public function _КИМ($strDirection='Start')
		{
		$this->мКИМ[$this->ч0КИМШаг][$strDirection][__CLASS__]			=__FUNCTION__;
		switch($strDirection)
			{
			case 'Start':
				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTime'] 			=сТекущееВремяСтемп();
				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDelta']		=0;
				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDeltaAll']= 
					($this->мКИМ[$this->ч0КИМШаг]['Start']['strTime']-
						$this->мКИМ[(($this->ч0КИМШаг-1)>0)?$this->ч0КИМШаг-1:$this->ч0КИМШаг]['End']['strTime']);
			break;
			case 'End':
				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTime'] 		=сТекущееВремяСтемп();
				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDelta']= 
					($this->мКИМ[$this->ч0КИМШаг]['End']['strTime']-
						$this->мКИМ[$this->ч0КИМШаг]['Start']['strTime']);

				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDeltaAll']= 
					($this->мКИМ[$this->ч0КИМШаг]['End']['strTime']-
						$this->мКИМ[0]['Start']['strTime']);

				$this->ч0КИМШаг++;
			break;
			}
		}
	public static function VoId()
		{
		$оАбхазия= new Абхазия();
		}
	}

?>