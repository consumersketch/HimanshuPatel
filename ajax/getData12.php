<?php
require_once("inc/inc.php");
require_once("class/db.php");
require_once("class/invoices.php");
require_once("class/products.php");
require_once("class/client.php");
require_once("class/invoicelineitems.php");
$db = new db();
$client = new client();


$invoices = new invoices();





	// dataStr = 'client=' + client + '&val=' + val;
	
		$clientId = $_POST['client'];
		$val = $_POST['val'];
		
	switch($val)
	{
	case 'LAST_MON':
		
	  $lastMonthData = $invoices->getLastMonthData($clientId );	
	 $dataToSendBack =  $lastMonthData;
		break;
	case 'THIS_MON':
		$thisMonthData = $invoices->getThisMonthData($clientId );	
	 $dataToSendBack =  $thisMonthData;
		break;
	case 'THIS_YEAR':
		$thisYearData = $invoices->getThisYearData($clientId );
	 $dataToSendBack =  $thisYearData;
		break;
	case 'LAST_YEAR':
	// getLastYearData
			$lastYearData = $invoices->getLastYearData($clientId );
	 $dataToSendBack =  $lastYearData;
		break;
	
	}
	
	echo json_encode($dataToSendBack);