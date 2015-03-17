<?php
// MODEL
class invoices  extends db
{
 public function __construct()
 {
	
 }
 
 function getLastMonthData($clientId)
 {
	
	$sql = " SELECT date_sub( NOW( ) , INTERVAL 1 MONTH )  ";
	$myVal = $this->getScaler($sql);
	list($lastMonthYr, $lastMonth) = explode('-', $myVal);
	$firstDateOfLastMonth = "$lastMonthYr-$lastMonth-01";
	
	$sql = " SELECT  NOW( )    ";
	$myVal1 = $this->getScaler($sql);
	
	list($monthYr, $month) = explode('-', $myVal1);
	$firstDateOfMonth = "$monthYr-$month-01";
	
	// Here invoice_date >= $firstDateOfLastMonth - as we want to inclide this date value data
	// Here  invoice_date < $firstDateOfMonth - as we do NOT want to inclide this date value data
	
	// WITH client_id LIKE IS USED AS THERE ARE DIFF DATA TYPES IN CLILD TABLE
	$sql = "SELECT invoices.client_id 
				, invoice_date
				,invoices.invoice_num
				, products.product_id, product_description , qty, price , (qty * price) AS total
			FROM invoices , invoicelineitems , products
			WHERE  invoice_date >= '$firstDateOfLastMonth'  AND   invoice_date < '$firstDateOfMonth' 
			AND invoices.client_id LIKE  '$clientId-%'
			
                  AND    invoices.invoice_num =  invoicelineitems.invoice_num
	              AND invoicelineitems.product_id = products.product_id ";
	
	

	 $data = $this->select($sql);
	return $data;
	
 }
 
 function getThisMonthData($clientId)
 {
	
	$sql = " SELECT  NOW( )    ";
	
	
	$myVal = $this->getScaler($sql);
	
	list($year, $mon) = explode('-', $myVal);
	
	
	$firstDateOfMonth = "$year-$mon-01";
	
	

	// WITH client_id LIKE IS USED AS THERE ARE DIFF DATA TYPES IN CLILD TABLE
	
	$sql = "SELECT invoices.client_id 
				, invoice_date
				,invoices.invoice_num
				, products.product_id , product_description , qty, price , (qty * price) AS total FROM invoices , invoicelineitems , products
	WHERE invoice_date >= '$firstDateOfMonth'   AND invoices.client_id LIKE  '$clientId-%'
	and    invoices.invoice_num =  invoicelineitems.invoice_num
	and invoicelineitems.product_id = products.product_id
	";
	
	
	
	$data = $this->select($sql);
	return $data;
	
	
 }
 
 function getThisYearData($clientId)
 {
	
	$sql = " SELECT YEAR( now( ) )  ";
	$year = $this->getScaler($sql);
	
	
	// select data for this year

	// only comparision with 'year' will work
	// As this tables are MyISAM, we can not use JOINs
// WITH client_id LIKE IS USED AS THERE ARE DIFF DATA TYPES IN CLILD TABLE
	$sql = "SELECT invoices.client_id 
				, invoice_date
				,invoices.invoice_num
				, products.product_id , product_description , qty, price , (qty * price) AS total FROM invoices , invoicelineitems , products
	WHERE invoice_date >= '$year'    
	AND invoices.client_id LIKE  '$clientId-%'
	and    invoices.invoice_num =  invoicelineitems.invoice_num
	and invoicelineitems.product_id = products.product_id
	";	
	$data = $this->select($sql);
	
	return $data;
	
	
 }
 
 function getLastYearData($clientId)
 {
 
	
	$sql = " SELECT date_sub( NOW( ) , INTERVAL 1 YEAR )   ";
	
	$lastYear = $this->getScaler($sql);
	list($lastYear) = explode('-', $lastYear);
	
	$firstDateOfLastYear = "$lastYear-01-01";
	

	$sql = " SELECT  NOW( )     ";
	$thisYear = $this->getScaler($sql);
	
	list($thisYear) = explode('-', $thisYear);
$firstDateOfThisYear = "$thisYear-01-01";
	
	// invoice_date >=  '$firstDateOfLastYear' = AS we want data from very first day of last year
	// invoice_date <  '$firstDateOfThisYear' = As we NOT want this date data
	// WITH client_id LIKE IS USED AS THERE ARE DIFF DATA TYPES IN CLILD TABLE

	

	
	$sql = "SELECT invoices.client_id 
				, invoice_date
				,invoices.invoice_num
				, products.product_id , product_description , qty, price , (qty * price) AS total FROM invoices , invoicelineitems , products
	WHERE invoice_date >= '$firstDateOfLastYear'  and  invoice_date < '$firstDateOfThisYear'  AND invoices.client_id LIKE  '$clientId-%'
	and    invoices.invoice_num =  invoicelineitems.invoice_num
	and invoicelineitems.product_id = products.product_id
	";
	
	
	$data = $this->select($sql);
	
	return $data;
	
 }
 
 
 
}

