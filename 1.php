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
//				VVVVVVREMEBERVVVVV
//////////////////////////_ПредпусковаяПроверка()
set_time_limit(0);

require('/home/EDRO.SetOfTools/System/0.Functions/0.Functions.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/0.ReportError.php');
require('/home/EDRO.SetOfTools/System/1.Reporter/1.Report.php');
require('/home/EDRO.SetOfTools/System/0.Functions/2.Dyn.php');
//require('/home/EDRO.SetOfTools/System/2.VectorKIIM/0.KIIM.php');
require('/home/EDRO.SetOfTools/System/3.RAM/0.EDRO_Objects.php');
//Armada or array? "ar" prefix.:)
//FC10 FFFFFCCCCC. 5F - is the mp3 stream divider in to audio frames in lame 100. +5C is winter temperature in Sochi, 
//so to make frames of content without interception with mp3 Lame3.100 we use CCCCC. Also. CC the fly, was sterialized by Soviet scientists.
//EDRO is the "Perfect Object".
//КИМ in latin is KIIM Иcкуственный Интеллект Кирилл и Мефодий (). 

			/*_\\KIIM//__Start_____*/
			/*__\\  //___Checkpiont*/
			/*___\\//____Finish___ */
			/*____\/ECTOR <-->_____*/
	//if finish than compete if the result EXIST! Filosophy


EDRO_Абхазия::VoId();

class EDRO_Абхазия
	{
	private $сЖурналРасположение	='/home/ЕДРО:ПОЛИМЕР/о2о.БазаДанных/HiFiIntelligentClub/Журнал';
	private $ч0КИМШаг		=0;
	private $rRadio;
	//private $rTransmission; //Dj Feel the transmission. -> Transmission controller.
	//private $mEventParams;
	private $arRAM		=array();
	private $мКИМ		=array();
	private $oEDRO;
	public function __construct()
		{
		//1.Load library
		//2.Buffering load
		//3.Create OS socket
		//4.Make socket accessible and "Beat the cream"
		//4.1.
		//4.2.
				$this->_КИМ('Start');
				$this->_ПредпусковаяПроверка();
				$this->_СтартЖурнала();
		$this->arRAM	=$this->mReadStatic();
				$this->_КИМ('End');
		$int0Attempts	= 0;
		while(true)
			{
			$this->rRadio	= $this->rOrganiseListenersRadioRequests();
/*x1*/			$oEDRO		= Event::_V($this->мКИМ, $this->rRadio);
/*x2*/			while($oEDRO->arrEvent['rRadio'])
				{
				}
			_Report('Lost radio concrette!!!! AttemptsFromZero: '.$int0Attempts);
			$int0Attempts++;
			}
/*x3*/		_Report('>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Exiting forever circle');
		}
	public function _КИМ($strDirection='Start')
		{
		$this->мКИМ[$this->ч0КИМШаг][$strDirection][__CLASS__]			=__FUNCTION__;
		switch($strDirection)
			{
			case 'Start':

				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTime'] 		=сТекущееВремяСтемп();
				$this->мКИМ[$this->ч0КИМШаг][$strDirection]['strTimeDelta']	=0;

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
	private function mReadStatic()
		{
		$this->_КИМ('Start');
		$м	=array();
		$м['strFaviconBin']		=file_get_contents('/home/HiFiIntelligentClub.Ru/favicon.png');
		$м['strJPGLogo']		=file_get_contents('/home/HiFiIntelligentClub.Ru/Hfic_Samin.jpg');
		$м['strRobotsTxt']		=file_get_contents('/home/HiFiIntelligentClub.Ru/robots.txt');
		$this->_КИМ('End');
		return $м;
		}
//	private function _CheckStart()
//		{
//		}
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
	private function rOrganiseListenersRadioRequests()
		{
		$this->_КИМ('Start');
		//$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://hifiintelligentclub.ru:80", $errno, $errstr);
		//$рПриёмникЗапросовСлушателя	=stream_socket_server("tcp://127.0.0.1:8080", $errno, $errstr);
		$rListenersRadioRequests	=stream_socket_server("tcp://".strDomain().":80", $errno, $errstr);
		if($rListenersRadioRequests===FALSE)
			{
			usleep(100000);
			$this->rOrganiseListenersRadioRequests();
			_Report('rOrganiseListenersRadioRequests() failed. Restarting after 0,1 s. delay.');
			}
		$this->_КИМ('End');
		return $rListenersRadioRequests;
		}
	protected function сПостроитьПакетДанныхЛоготипКартинка($strJPG)
		{
		//$strJPG		=file_get_contents('/home/HiFiIntelligentClub.Ru/Hfic_Samin.jpg');
		return 			"HTTP/1.1 200 OK\r\nContent-Type: image/ico\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".strlen($strJPG)."\r\nConnection: close\r\n\r\n".$strJPG;
		}
	protected function сПостроитьПакетДанныхЛоготипИконка($faviconBin)
		{
		//$faviconBin		=file_get_contents('/home/HiFiIntelligentClub.Ru/favicon.png');
		return			"HTTP/1.1 200 OK\r\nContent-Type: image/ico\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".strlen($faviconBin)."\r\nConnection: close\r\n\r\n".$faviconBin;
		}
	protected function сПостроитьПакетДанныхРоботТхт($robotsTxt)
		{
		//$robotsTxt		=file_get_contents('/home/HiFiIntelligentClub.Ru/robots.txt');
		 return			"HTTP/1.1 200 OK\r\nContent-Type: text/plain\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length: ".strlen($robotsTxt)."\r\nConnection: close\r\n\r\n".$robotsTxt;
		}
	protected function сПостроитьПакетДанных($_objKIIM, $objEDRO)
		{
		$strContentType		='Content-Type: text/html';
		$strNextDate		=date(DATE_RFC822, mktime(0, 0, 0, date("m")  , date("d"), date("Y")+1));
		// "set-cookie: username=aaa13; expires=friday,31-dec-99 23:59:59 gmt; path=/win/internet/html/; domain=citforum.ru;nn";

		//echo $objEDRO->arrDesign['strTemplate']."\n"; 
	
		require			$this->arrDesign['strTemplate'];
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
	private function _WriteLog()
		{
		}
	private function _ПредпусковаяПроверка()
		{
		exec('ps -C 1.php| grep 1.php -c', $output);
		if(
			isset($output[0])&&
			$output[0]==1
				)
			{
			}
		else
			{
			_Report('_ПредпусковаяПроверка() failed.');
			exit; //Here comes the unsuccessfull run 
			}
		}
	public static function VoId()
		{
		$oEDRO= new EDRO_Абхазия();
		$oEDRO->_WriteLog();
		}
	}
?>