<?php
/*
THIS FILE WILL SERVER AS CONTROLLER.
*/
// CLASS ARE INCLUDED. 
require_once("inc/inc.php");
require_once("class/db.php");
require_once("class/invoices.php");
require_once("class/products.php");
require_once("class/client.php");
require_once("class/invoicelineitems.php");
$db = new db();
$client = new client();

// GET CLIENT LIST FOR DROP-DOWN TO SELECT CLIENT
$listOfClinets = $client->getClientList();

include_once("view.php");

