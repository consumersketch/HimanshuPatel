<?php
// MODEL
class client  extends db
{
 public function __construct()
 {
	
 }
 
 public function getClientList()
 {
	$sql = "SELECT client_id, client_name FROM clients ";
	
	$listOfClients = $this->select($sql);
	return $listOfClients;
 }
 

}