<?php 
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
										<th>الاسم</th>
										<th>رقم المحمول</th>
											<th>البريد إلكتروني</th>
											<th>العمر</th>
											<th>الجنس</th>
											<th>فصيلة الدم</th>
											<th>العنوان</th>
											<th>رسالة </th>
											<th>تاريخ النشر </th>
										</tr>
									</thead>

<?php 
$filename="Donor list";
$sql = "SELECT * from  tblblooddonars ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$complainNumber= $result->FullName.'</td> 
<td>'.	$MobileNumber= $result->MobileNumber.'</td> 
<td>'.$EmailId= $result->EmailId.'</td> 
<td>'.$Gender= $result->Gender.'</td> 
<td>'.$Age= $result->Age.'</td> 
 <td>'.$BloodGroup=$result->BloodGroup.'</td>	
  <td>'.$BloodGroup=$result->Address.'</td>	 
   <td>'.$BloodGroup=$result->Message.'</td>	
  <td>'.$BloodGroup=$result->PostingDate.'</td>	 					
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php } ?>