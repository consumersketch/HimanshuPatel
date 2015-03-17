<!--
/*
THIS FILE WILL SERVER AS VIEW.
*/
-->
<html>
<head>

<!-- BELOW FILE WAS DOWNLOADED -->
<script type="text/javascript" src= "js/jquery-1.11.2.js"></script>
<script type="text/javascript" src= "js/index.js"></script>
</head>
<body>

<form>

<labe> Select type Of  Data </lable>
<select name="data_to_fetch" id="data_to_fetch" onchange="" >
<option value="LAST_MON">Last Month to Date </option>
<option value="THIS_MON">  This Month</option>
<option value="THIS_YEAR"> This Year</option>
<option value="LAST_YEAR"> Last Year</option>
</select>

<labe> Select Client </lable>
<select name="client" id="client" onchange="" >

<?php
// HERE WE ARE PROCESSING ALL RECORDS WHICH WE GET FROM AGAX CALL
foreach($listOfClinets as $client)
{
?>
<option value="<?php  echo $client['client_id']; ?>"><?php  echo $client['client_name']; ?></option>
<?php
}
?>
</select>
<table id="dataValues">
<thead>
<tr>
<td>
Invoice Num
</td>
<td>
Invoice Date
</td>
<td>
Invoice Product
</td>
<td>
Qty
</td>
<td>
Price
</td>
<td>
Total
</td>

</tr>
</thead>
<tbody  id="dataValuesBody">

</tbody>




</table>
<input type="button" name="get_data" id="get_data" value=" Submit"  onclick="getTableData();"/>
</form>
</body>



