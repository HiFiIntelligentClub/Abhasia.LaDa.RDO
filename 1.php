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

require('/home/EDRO.SetOfTools/System/0.Functions/0.Functions.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/0.ReportError.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/1.Report.php');
require('/home/EDRO.SetOfTools/System/0.Functions/2.Dyn.php');
//require('/home/EDRO.SetOfTools/System/2.VectorKIIM/0.KIIM.php');
require('/home/EDRO.SetOfTools/System/3.Buffer/1.EDRO_Buffering.php');

Абхазия::VoId();

class Абхазия
	{
	private $сЖурналРасположение	='/home/ЕДРО:ПОЛИМЕР/о2о.БазаДанных/HiFiIntelligentClub/Журнал';
	private $ч0КИМШаг	=0;
	private $рПриёмник;
	private $рПередача;
	private $мЗаголовки;
	private $мБуффер	=array();
	private $мКИМ		=array();
	private $objEDRO;
	public function __construct()
		{
		//1.Load library
		//2.Buffering load
		//3.Create OS socket
		//4.Make socket accessible and "Beat the cream"
		//4.1.
		//4.2.
				$this->_КИМ('Start');
				$this->_СтартЖурнала();
		$мБуффер	=$this->мБуфферизация();
				$this->_КИМ('End');

		$this->рПриёмник	=$this->рОрганизацияПриёмникаЗапросовСлушателя();
//$this->рПередача  =stream_socket_accept($this->рПриёмник, -1)
	/*E->*/	while(Event::Init())
			{
			//$this->objEDRO			=new Event();
			}
		}
	public function _КИМ($strDirection='Start')
		{
		$this->мКИМ[$this->ч0КИМШаг][$strDirection][__CLASS__]			=__FUNCTION__;
		switch($strDirection)
			{
			case 'Start':

				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTime'] 			=сТекущееВремяСтемп();
				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDelta']		=0;

				$ч0ПредШаг	=(($this->ч0КИМШаг-1)>0)?$this->ч0КИМШаг-1:$this->ч0КИМШаг;

				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDeltaAll']= 
					($this->мКИМ[$this->ч0КИМШаг]['Start']['strTime']-$this->мКИМ[$ч0ПредШаг]['End']['strTime']);

				$str	=$this->ч0КИМШаг.' '.$strDirection.' '.__CLASS__.' '.__FUNCTION__.' '.$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDeltaAll'];
			break;
			case 'End':
				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTime'] 		=сТекущееВремяСтемп();
				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDelta']= 
					($this->мКИМ[$this->ч0КИМШаг]['End']['strTime']-
						$this->мКИМ[$this->ч0КИМШаг]['Start']['strTime']);

				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDeltaAll']= 
					($this->мКИМ[$this->ч0КИМШаг]['End']['strTime']-
						$this->мКИМ[0]['Start']['strTime']);
				$str	=$this->ч0КИМШаг.' '.$strDirection.' '.__CLASS__.' '.__FUNCTION__.' '.$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDelta'];
				$this->ч0КИМШаг++;
			break;
			}
		if(file_put_contents($this->сЖурналРасположение.'/КИМ/КИМ.txt', $str."\n", FILE_APPEND)===FALSE)
			{
			_Report('Не могу записать: '.$this->сЖурналРасположение.'/КИМ/КИМ.txt');
			}
		}
	private function мБуфферизация()
		{
		$this->_КИМ('Start');
		$м	=array();
		$м['strFaviconBin']		=file_get_contents('/home/HiFiIntelligentClub.Ru/favicon.png');
		$м['strJPGLogo']		=file_get_contents('/home/HiFiIntelligentClub.Ru/Hfic_Samin.jpg');
		$м['strRobotsTxt']		=file_get_contents('/home/HiFiIntelligentClub.Ru/robots.txt');
		$this->_КИМ('End');
		return $м;
		}
	public function _СтартЖурнала()
		{
		$this->_КИМ('Start');
		$сРасположениеСчётчикВход	=$this->сЖурналРасположение.'/CountUp/Вход.plmr';
		$сРасположениеСчётчикВходИстор	=$this->сЖурналРасположение.'/CountUp/History/Вход.plmr';
		
		$ч0СчётчикВход			=file_get_contents($сРасположениеСчётчикВход); сТекущееВремяСтемп();
						 file_put_contents($сРасположениеСчётчикВход, ($ч0СчётчикВход+1));
						 /*DEBUG*/ file_put_contents($сРасположениеСчётчикВходИстор,"\n=====\n".'	Start:		'.date("Y-m-d H:i:s").сТекущееВремяСтемп()."\n", FILE_APPEND);
		$this->_КИМ('End');
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
	public static function VoId()
		{
		$оАбхазия= new Абхазия();
		}
	public static function logFile()
		{
		$оАбхазия= new Абхазия();
		/**/
		}
	}
?>