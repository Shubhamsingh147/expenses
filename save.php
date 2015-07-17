<?php
if (isset ($_GET['value']))
{
	if ($_GET['name'] == "kaushal") {
		$handle= fopen('kaushal.txt','a');
		fwrite($handle,$_GET['value']."\n");
		fclose($handle);
	}
	else
	{
		$handle= fopen('shubham.txt','a');
		fwrite($handle,$_GET['value']."\n");
		fclose($handle);
	}
}