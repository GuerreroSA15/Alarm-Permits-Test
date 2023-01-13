<?php
	include './includes/header.php';
  $id = $_GET["id"];
  $id2 = $_GET["id2"];
  $id3 = $_GET["id3"];
  $Prov_Code = $_GET["id4"];


  $serverName = "ELPASO_NONPROD1-async-supp-db.us.erdb.accela.com,14332"; 
  $uid = "ERDB_ELPASO_NONPROD1_SUPP_01";   
  $pwd = "acc31aK9tlYL04B";  
  $databaseName = "ELPASO_NONPROD1";  
   
  $connectionInfo = array( "UID"=>$uid,                            
                           "PWD"=>$pwd,                            
                           "Database"=>$databaseName); 
               
  /* Connect using SQL Server Authentication. */  
  $conn = sqlsrv_connect( $serverName, $connectionInfo); 

  $sql = "select 
  isnull(D.B1_CONTACT_NBR,'') as 'B1_CONTACT_NBR', 
  isnull(D.B1_FLAG,'') as 'Primary', 
  isnull(D.B1_CONTACT_TYPE,'') as 'Type', 
  ltrim(rtrim(isnull(D.B1_TITLE,'')+' '+isnull(D.B1_FNAME,'')+' '+isnull(D.B1_MNAME,'')+' '+isnull(D.B1_LNAME,''))) as 'FullName', 
  isnull(D.B1_PHONE1,'') as 'Phone1', 
  isnull(D.B1_PHONE2,'') as 'Phone2', 
  isnull(D.B1_FAX,'') as 'Fax1', 
  isnull(D.B1_EMAIL,'') as 'Email1', 
  isnull(D.B1_ADDRESS1,'') as 'Address1', 
  ltrim(rtrim(isnull(D.B1_ADDRESS2,'')+' '+ isnull(D.B1_ADDRESS3,''))) as 'Address2' , 
  isnull(D.B1_CITY,'') as 'City', 
  isnull(D.B1_STATE,'') as 'State', 
  isnull(D.B1_ZIP,'') as 'Zip' 
  from B3CONTACT D 
  where D.B1_PER_ID1 = '" . $id . "' and D.B1_PER_ID2 = '" . $id2 . "' and D.B1_PER_ID3 = '" . $id3 . "' ";
  if ($Prov_Code <> "")
	$sql = $sql . "and D.SERV_PROV_CODE LIKE '%" . $Prov_Code . "%' ";

  //echo $sql;

  $stmt = sqlsrv_query( $conn, $sql);  
  $num = 0;
?>

<div class="content">
	<div class="row justify-content-center">

		<table class="ui celled table" >
            <thead>
                <tr>
                    <th>Primary Role</th>
                    <th>Role Type</th>
                    <th>Full Name</th>
                    <th>Phone1</th>
                    <th>Phone2</th>
                    <th>Email1</th>
                    <th>Address1</th>
                    <th>Address2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                </tr>
            </thead>
            <tbody>
<!-- NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW NEW -->
<?php
    while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC))  
     {  
        $num += 1;
        echo "<tr>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td>" . $row[7] . "</td>";
        echo "<td>" . $row[8] . "</td>";
        echo "<td>" . $row[9] . "</td>";
        echo "<td>" . $row[10] . "</td>";
        echo "<td>" . $row[11] . "</td>";
        echo "<td>" . $row[12] . "</td>";
        echo "</tr>";
     }  
?>
			</tbody>
		</table>	
	</div>
	</div> 

<?php
  include './includes/footer.php';
?>