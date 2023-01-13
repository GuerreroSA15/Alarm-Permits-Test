<?php

//include './includes/header.php';
//$test = $_POST['query'];
//$street_num = $_POST['Street_Num'];
//$street_name = $_POST['Street_Name'];
//$AptUnit = $_POST['AptUnit'];
//$Project = $_POST['Project'];

function dbcall()
{

$street_num = trim($_POST['Street_Num']);
$street_name = trim($_POST['Street_Name']);
$AptUnit = trim($_POST['AptUnit']);
$Project = trim($_POST['Project']);

//$serverName = "ELPASO_NONPROD1-async-supp-db.us.erdb.accela.com,14332"; 
$serverName = "52.232.212.197,14332"; 
$uid = "ERDB_ELPASO_NONPROD1_SUPP_01";   
$pwd = "acc31aK9tlYL04B";  
$databaseName = "ELPASO_NONPROD1";  
 
$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 


$DSN = "sqlsrv:server=tcp:{$serverName}; Database={$databaseName}";

try{
	$db = new PDO($DSN, $uid, $pwd);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt2 = $db->query("select top(10) * FROM B1Permit");

	echo "INSIDE OTHER QUERY <br><\n>";

	While($row2 = $stmt2->fetch(PDO::FETCH_OBJ)){
		echo "test";
	}
} catch (Exception $e) {
	echo $e->getMessage() . "\n";
}
												  



/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $serverName, $connectionInfo);  

// echo "Street Number is: " . $street_num . "<br>";
// echo "Street Name is: " . $street_name . "<br>";
// echo "Apt/Unit is: " . $AptUnit . "<br>";
// echo "Project is: " . $Project . "<br>";

if (!empty($street_num) || !empty($street_name) || !empty($AptUnit) || !empty($Project))
{
	//echo "INSIDE SELECT STATEMENT <br>\n";
	$tsql = "select 
	DISTINCT a.b1_special_text as 'Project', 
	a.b1_alt_id as 'LocalPermit', 
	a.B1_PER_TYPE as 'Description', 
	a.b1_appl_status as 'Status', 
	a.b1_per_id1 as 'B1_PER_ID1', 
	a.b1_per_id2 as 'B1_PER_ID2',
	a.b1_per_id3 as 'B1_PER_ID3',
	b.serv_prov_code as 'SERV_PROV_CODE',
	c.expiration_date as 'ExpirationDate',
	d.b1_hse_nbr_start as 'StreetNumber', 
	d.b1_str_name as 'StreetName',
	d.b1_unit_start  as 'AptUnit',
	f.sd_app_des as 'SD_APP_DES',
	f.sd_app_dd as 'SD_APP_DD' 
	from b1permit a left join bworkdes 
	b on a.serv_prov_code = b.serv_prov_code
	and a.b1_per_id1 = b.b1_per_id1 and a.b1_per_id2 = b.b1_per_id2 and a.b1_per_id3 = b.b1_per_id3 
	left join b1_expiration c on a.serv_prov_code = c.serv_prov_code and a.b1_per_id1 = c.b1_per_id1
	and a.b1_per_id2 = c.b1_per_id2 and a.b1_per_id3 = c.b1_per_id3 
	left join b3addres d on a.serv_prov_code = d.serv_prov_code
	and a.b1_per_id1 = d.b1_per_id1 and a.b1_per_id2 = d.b1_per_id2 and a.b1_per_id3 = d.b1_per_id3 
	left join b3contact e on 
	a.serv_prov_code = e.serv_prov_code and a.b1_per_id1 = e.b1_per_id1 and a.b1_per_id2 = e.b1_per_id2 and a.b1_per_id3 = e.b1_per_id3 
	left join gprocess_history f on a.serv_prov_code = f.serv_prov_code and a.b1_per_id1 = f.b1_per_id1 and a.b1_per_id2 = f.b1_per_id2
	and a.b1_per_id3 = f.b1_per_id3
	and f.sd_app_des = 'Issued'
	WHERE a.b1_per_group = 'Licenses' 
	AND a.b1_per_type = 'Security Alarm'
	AND a.b1_appl_status in ('Active','Issued','Active - About to Expire','About to Expire')
	AND c.expiration_date > DATEADD(day,1,GETDATE())";

	if ($street_num <> "")
	$tsql = $tsql . "and d.b1_hse_nbr_start like '" . $street_num . "' ";
	if ($street_name <> "")
	$tsql = $tsql . "and d.b1_str_name like '%" . $street_name . "%' ";
	if ($AptUnit <> "")
	$tsql = $tsql . "and d.b1_unit_start like '%" . $AptUnit . "%' ";
	if ($Project <> "")
	$tsql = $tsql . "and a.b1_special_text like '%" . $Project . "%' ";

	//echo "CONN is: " .$conn . "<br>\n";
	//echo "Query Statement is: " . $tsql . "<br>\n";
	//AND d.b1_str_name like '%BASSETT%'";

	try{
		echo "BEFORE STATEMENT";
		$stmt = sqlsrv_query($conn, $tsql); 
	}	 

	catch (Exception $e) {
		echo $e->getMessage() . "\n";
	}


		if ( $stmt )  
		{  
			echo "Statement executed.<br>\n";
		}   
		else   
		{  
			echo "Error in statement execution.\n";  
			die( print_r( sqlsrv_errors(), true));  
		}  

	/* Iterate through the result set printing a row of data upon each iteration.*/  

		$num = 0;
}

else
{
	echo "Cannot Leave Fields Blank!!!<br>\n";  
	return;
}?>



<!-- NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW -->
<!--   <div class="pageTitle content">
        <h2>Alarm Permits</h2>
    </div>-->
<style>
	tr[data-href]{
		cursor: pointer;
	}
</style>


    <div class="content">
	<div class="row justify-content-center">

		<table id="example" class="ui celled table" >
            <thead>
                <tr>
                    <th>Street Number</th>
                    <th>Street Name</th>
                    <th>Apt/Unit</th>
                    <th>Status</th>
                    <th>Issued Date</th>
                    <th>Name</th>
                    <th>Local Permit#</th>
                    <th>Expiration Date</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
<!-- NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW -->

<?php
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))  
     {  
		$num += 1;
?>

		<tr>
			<td> <?php echo $row[9] ?> </td>
			<td> <?php echo $row[10] ?> </td>
			<td> <?php echo $row[11] ?> </td>
			<td> <?php echo $row[3] ?> </td>
			<td> <?php echo $row[13]->format('Y-m-d H:i:s') ?> </td>
			<td> <?php echo $row[0] ?> </td>
			<td> <?php echo $row[1] ?> </td>
			<td> <?php echo $row[8]->format('Y-m-d H:i:s') ?> </td>
			<td> <?php echo $row[2] ?> </td>
		</tr>

<!--
		<tr>
			<td> <a style='color:black' href="index1.php?id=<?php echo $row[4]?>&id2=<?php echo $row[5]?>&id3=<?php echo $row[6]?>&id4=<?php echo $row[7]?>"> <?php echo $row[9] ?> </a></td>
			<td> <a style='color:black' href="index1.php?id=<?php echo $row[4]?>&id2=<?php echo $row[5]?>&id3=<?php echo $row[6]?>&id4=<?php echo $row[7]?>"> <?php echo $row[10] ?> </a></td>
			<td> <a style='color:black' href="index1.php?id=<?php echo $row[4]?>&id2=<?php echo $row[5]?>&id3=<?php echo $row[6]?>&id4=<?php echo $row[7]?>"> <?php echo $row[11] ?> </a></td>
			<td> <a style='color:black' href="index1.php?id=<?php echo $row[4]?>&id2=<?php echo $row[5]?>&id3=<?php echo $row[6]?>&id4=<?php echo $row[7]?>"> <?php echo $row[3] ?> </a></td>
			<td> <a style='color:black' href="index1.php?id=<?php echo $row[4]?>&id2=<?php echo $row[5]?>&id3=<?php echo $row[6]?>&id4=<?php echo $row[7]?>"> <?php echo $row[13]->format('Y-m-d H:i:s') ?> </a></td>
			<td> <a style='color:black' href="index1.php?id=<?php echo $row[4]?>&id2=<?php echo $row[5]?>&id3=<?php echo $row[6]?>&id4=<?php echo $row[7]?>"> <?php echo $row[0] ?> </a></td>
			<td> <a style='color:black' href="index1.php?id=<?php echo $row[4]?>&id2=<?php echo $row[5]?>&id3=<?php echo $row[6]?>&id4=<?php echo $row[7]?>"> <?php echo $row[1] ?> </a></td>
			<td> <a style='color:black' href="index1.php?id=<?php echo $row[4]?>&id2=<?php echo $row[5]?>&id3=<?php echo $row[6]?>&id4=<?php echo $row[7]?>"> <?php echo $row[8]->format('Y-m-d H:i:s') ?> </a></td>
			<td> <a style='color:black' href="index1.php?id=<?php echo $row[4]?>&id2=<?php echo $row[5]?>&id3=<?php echo $row[6]?>&id4=<?php echo $row[7]?>"> <?php echo $row[2] ?> </a></td>
		</tr>
	 -->

<!--
		// echo "<tr>";
		// echo "<td>" . $row[9] . "</td>";
		// echo "<td>" . $row[10] . "</td>";
		// echo "<td>" . $row[11] . "</td>";
		// echo "<td>" . $row[3] . "</td>";
		// echo "<td>" . $row[13]->format('Y-m-d H:i:s') . "</td>";
		// echo "<td>" . $row[0] . "</td>";
		// echo "<td>" . $row[1] . "</td>";
		// echo "<td>" . $row[8]->format('Y-m-d H:i:s') . "</td>";
		// echo "<td>" . $row[2] . "</td>";
		// echo "</tr>";

//		echo "<tr data-href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>";
		echo "<tr>";
		echo "<td> <a style='color:black' href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>" . $row[9] . "</td>";
		echo "<td> <a style='color:black' href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>" . $row[10] . "</td>";
		echo "<td> <a style='color:black' href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>" . $row[11] . "</td>";
		echo "<td> <a style='color:black' href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>" . $row[3] . "</td>";
		echo "<td> <a style='color:black' href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>" . $row[13]->format('Y-m-d H:i:s') . "</td>";
		echo "<td> <a style='color:black' href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>" . $row[0] . "</td>";
		echo "<td> <a style='color:black' href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>" . $row[1] . "</td>";
		echo "<td> <a style='color:black' href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>" . $row[8]->format('Y-m-d H:i:s') . "</td>";
		echo "<td> <a style='color:black' href='index1.php?id=". $row[4] . "&id2=" . $row[5] . "&id3=" . $row[6] . "&id4=" . $row[7] ."'>" . $row[2] . "</td>";
		echo "</tr>";-->
     <?php } ?>  

			</tbody>
		</table>	
	</div>
	</div> 

<?php	 

//echo "Number of Employees Processed: $num<br>" ;
//echo phpinfo();

     /* Free statement and connection resources. */  
     sqlsrv_free_stmt( $stmt);  
     sqlsrv_close( $conn);  
}	 
?>