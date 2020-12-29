#!/usr/bin/php
<?php
// © A.A.CheckMaRev assminog@gmail.com tubmulur@yandex.ru first sucsessfull run at Birthday of Gersan Gioev 26.11.2020
require_once('/home/EDRO.SOT/System/0.Functions/0.strNDigit.php');

$socket = stream_socket_server("tcp://hic:8081", $errno, $errstr);
//socket_bind($socket, 'hic', 8081);
while ($connect = stream_socket_accept($socket, -1))
    {
    $strBuffer	='';
    $strContentType	='Content-Type: text/html';
    //echo $_strBuf=socket_read($socket, 256, PHP_NORMAL_READ);
    //echo "Connect\n";
    $str=fread($connect, 512);
    echo$str;
    $arrHeaders	=explode("\n", $str);
    if(isset($arrHeaders[0]))
	{
	$arrRequest	=explode(" ", $arrHeaders[0]);
	print_r($arrRequest);
	if(isset($arrRequest[1])&&$arrRequest[1]!="/favicon.ico")
	    {
	    $strRequest	=$arrRequest[1];
	    unset($arrRequest);
	    if(сНачОтДоСимвола($strRequest, '.', '?')=='jpg')
		{
		$strContentType		='Content-Type: image/jpeg';
		}
	    //echo '/home/HiFiIntelligentClub.Ru/run.php '.$strRequest;
	    exec('/home/HiFiIntelligentClub.Ru/run.php '.$strRequest, $arrOut);
	    unset($strRequest);
	    //echo $strBuffer		=file_get_contents('/home/HiFiIntelligentClub.Ru/index.php ');
	    $strOut='';
	    foreach($arrOut as $strOut)
	    	{
	    	$strBuffer	.=$strOut;
	    	}
	    unset($arrOut);
	    unset($strOut);
	    $strBufferLen	=strlen($strBuffer);
	    //echo $strBuffer;
	    fwrite($connect, "HTTP/1.1 200 OK\r\n".$strContentType."\r\nServer-name: Abhasia\r\nContent-Length:".$strBufferLen."\r\nConnection: close\r\n\r\n".$strBuffer);
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
