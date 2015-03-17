<?php
// MODEL - THIS SERVES FOR DB INTERACTIONS
class db 
{
 public function __construct()
 {
	$con = mysql_connect(HOST,USER, PWD ) or die(mysql_error());
	$db_selection = mysql_select_db(DBNAME) or die(mysql_error());
 }
 public function select($sql)
 {
	$result = mysql_query($sql) or die(mysql_error());
	$returnVal = array();
	if(count($result) > 0)
	{
		while($row = mysql_fetch_assoc($result))
		{
			$returnVal[] = $row;
		
		}
	}
	
	return $returnVal;
	
	
	
 
 }
 
 function getScaler($sql)
 {
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result) OR die(mysql_error());
	
	return $row[0];
 }
 

}