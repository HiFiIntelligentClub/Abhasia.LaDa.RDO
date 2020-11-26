#!/usr/bin/php
<?php
// © A.A.CheckMaRev assminog@gmail.com tubmulur@yandex.ru
require_once('/home/EDRO.SOT/System/0.Functions/0.strNDigit.php');

$socket = stream_socket_server("tcp://127.0.0.1:8080", $errno, $errstr);
while ($connect = stream_socket_accept($socket, -1))
	{
	$strBuffer	='';
	$strContentType	='Content-Type: text/html';
	//echo $_strBuf=socket_read($socket, 256, PHP_NORMAL_READ);
	//echo "Connect\n";
	$str=fread($connect, 256);
	$arrHeaders	=explode("\n", $str);
	if(isset($arrHeaders[0]))
		{
		$arrRequest	=explode(" ", $arrHeaders[0]);
		if(isset($arrRequest[1])&&$arrRequest[1]!="/favicon.ico")
			{
			$strRequest	=$arrRequest[1];
			if(сНачОтДоСимвола($strRequest, '.', '?')=='jpg')
				{
				$strContentType		='Content-Type: image/jpeg';
				}
			//echo '/home/HiFiIntelligentClub.Ru/run.php '.$strRequest;
			exec('/home/HiFiIntelligentClub.Ru/run.php '.$strRequest, $arrOut);
			foreach($arrOut as $strOut)
				{
				$strBuffer	.=$strOut;
				}
			//echo $strBuffer;
			fwrite($connect, "HTTP/1.1 200 OK\r\n".$strContentType."\r\nServer-name: Abhasia\r\nConnection: close\r\n\r\n".$strBuffer);
			fclose($connect);
			unset($strBuffer);
			}
		elseif(isset($arrRequest[1])&&$arrRequest[1]=="/favicon.ico")
			{
			//rite($connect, "HTTP/1.1 200 OK\r\nContent-Type: text/html\r\nServer-name: Abhasia\r\nConnection: close\r\n\r\nHello on Abhasia web server. Saint-Petersbourg, Admiralteyskiy Paradise District. Life UP.");
			}
		else
			{
			}
		}
	//echo "\n";
	
	}
?>