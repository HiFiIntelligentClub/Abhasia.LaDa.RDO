#!/usr/bin/php
<?php
// © A.A.CheckMaRev assminog@gmail.com tubmulur@yandex.ru first sucsessfull run at Birthday of Gersan Gioev 26.11.2020
require_once('/home/EDRO.SOT/System/0.Functions/0.strNDigit.php');
require_once('/home/EDRO.SetOfTools/System/2.VectorKIIM/0.KIIM.php');

//$socket = stream_socket_server("tcp://hic:8081", $errno, $errstr);
$objKIIM=KIIM::objStart(false , array(
	'_strClass'		=>'Socket',
	'_strMethod'		=>'Start',
	'_strMessage'		=>'',
	'_strVectorPoint'	=>'',
	));
	$socket = stream_socket_server("tcp://192.168.1.198:80", $errno, $errstr);
	KIIM::objFinish($objKIIM, array(
		'_strClass'		=>'Socket',
		'_strMethod'		=>'Start',
		'_strMessage'		=>'',
		'_strVectorPoint'	=>'',
		));
print_r($objKIIM);
//socket_bind($socket, 'hic', 8081);
while ($connect = stream_socket_accept($socket, -1))
	{
	$objKIIM=KIIM::objStart(false , array(
		'_strClass'		=>'Socket',
		'_strMethod'		=>'Iteration',
		'_strMessage'		=>'',
		'_strVectorPoint'	=>'',
		));
	$strBuffer	='';
	$strContentType	='Content-Type: text/html';
	//echo $_strBuf=socket_read($socket, 256, PHP_NORMAL_READ);
	//echo "Connect\n";
	$str		=fread($connect, 512);
	echo date('Y-m-d H:i:s')."\n\n";
	echo 'vvvvvvvvvvvvvvvvvvvvvvvv-fRead-Connect-vvvvvvvvvvvvvvvvvv'."\n";
	echo$str."\n";
	echo '^^^^^^^^^^^^^^^^^^^^^^^^-fRead-Connect-^^^^^^^^^^^^^^^^^^'."\n";
	$arrHeaders	=explode("\n", $str);
	if(isset($arrHeaders[0]))
		{
		$arrRequest	=explode(" ", $arrHeaders[0]);
		echo 'vvvvvvvvvvvvvvvvvvvvvvvv-arrRequest-vvvvvvvvvvvvvvvvvv'."\n";

		print_r($arrRequest);
		echo '^^^^^^^^^^^^^^^^^^^^^^^^-arrRequest-^^^^^^^^^^^^^^^^^^'."\n";
		if(isset($arrRequest[1])&&$arrRequest[1]!="/favicon.ico")
			{
			$strRequest	=$arrRequest[1];
			unset($arrRequest);
			if(сНачОтДоСимвола($strRequest, '.', '?')=='jpg')
				{
				$strContentType		='Content-Type: image/jpeg';
				}
			echo 'vvvvvvvvvvvvvvvvvvvvvvvv-Run-With-Request-vvvvvvvvvvvvvvvvvv'."\n";
			echo '/home/HiFiIntelligentClub.Ru/run.php '.$strRequest."\n";
			echo '^^^^^^^^^^^^^^^^^^^^^^^^-Run-With-Request-^^^^^^^^^^^^^^^^^^'."\n";
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
	    $strBuffer										=str_replace(array("\r", "\n", "\t"), "", $strBuffer);
	    file_put_contents('/home/EDRO.SetOfTools/DjService/Abhasia_debug.txt', $strBuffer);
	    $strBuffer	='<AbhasiaServeWarning style="display:block;overflow:hidden;font-size:x-large;height:20px;line-height:19px;color:red;">Development version. For stable, visit <a href="http://HiFiIntelligentClub.COM">HiFiIntelligentClub.COM</a></AbhasiaServeWarning>'.$strBuffer;
	    $strBufferLen	=strlen($strBuffer);
	    //echo $strBuffer;
	    fwrite($connect, "HTTP/1.1 200 OK\r\n".$strContentType."\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length:".$strBufferLen."\r\nConnection: close\r\n\r\n".$strBuffer);
	    fclose($connect);
	    unset($strBuffer);
	    }
	elseif(isset($arrRequest[1])&&$arrRequest[1]=="/favicon.ico")
	    {
	    $faviconBin	=readfile('/home/HiFiIntelligentClub.Ru/favicon.png');
	    fwrite($connect, "HTTP/1.1 200 OK\r\nContent-Type: image/png\r\nServer-name: Abhasia LaDa.Rdo\r\nContent-Length:".strlen($faviconBin)."\r\nConnection: close\r\n\r\n".$faviconBin);
	    unset($faviconBin);
	    }
	else
	    {
	    }
	}
	KIIM::objFinish($objKIIM, array(
		'_strClass'		=>'Socket',
		'_strMethod'		=>'Iteration',
		'_strMessage'		=>'',
		'_strVectorPoint'	=>'',
		));
    }
?>
