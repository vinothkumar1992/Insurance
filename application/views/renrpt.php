<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title align="left">RENEWAL REPORT</title>
<style>
table, th, td {
	
  border-collapse: collapse;
}


</style>

</head>
<body>
<table style="width:100%">
  <tr>
    <th></th>
    <th></th>
 
  </tr>
  <tr>
    <td align="right"></td>
    <td  align="center">
	<img src="data:image/png;base64,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" width="80"/>
	<h4>
	MYANGKASA EMAS MEDICARE SDN BHD</h2>
	<div>
	(1281203-K)
	</div>
	</td>
   
  </tr>
  
  <tr>
    <td></td>
    <td  align="center">
	<h4>
	RENEWAL REPORT</h2>
	</td>
   
  </tr>
 
</table>

<br>

<TABLE BORDER=1 CELLSPACING=10 CELLPADDING=5px >

<TR HEIGHT=19 >
<TH  BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>DATE</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>POLICY START DATE</FONT></TD>
<TH  BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>POLICY END DATE</FONT></TD>
<TH    BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>MEMBERSHIP TYPE</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>PRIMARY NRIC</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>MEMBERS NAME</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>NRIC NO</FONT></TD>
<TH  BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>DOB</FONT></TD>
<TH    BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>GENDER</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>NATIONALITY</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>RACE</FONT></TD>
<TH  BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>MARITAL STATUS</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>OCCUPATION</FONT></TD>
<TH  BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>ADDRESS</FONT></TD>
<TH  BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>CITY</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>STATE</FONT></TD>
<TH  BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>POSTCODE</FONT></TD>
<TH  BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>MOBILE NO</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>EMAIL</FONT></TD>
<TH   BGCOLOR=#FFFFFF ><FONT style=FONT-SIZE:11pt FACE="Calibri" COLOR=#000000>SUBMISSION DATE</FONT></TD>
</TR>

<?php  foreach($new_row as $row):?> 
  <tr>
   <td><?php
$newDate = date("d-m-Y", strtotime($row['cdate']));  
 echo $newDate; ?></td>
    <td><?php
$newDate = date("d-m-Y", strtotime($row['policy_start_date']));  
 echo $newDate; ?></td>
    <td><?php
$newDate = date("d-m-Y", strtotime($row['policy_end_date']));  
 echo $newDate; ?></td>
             
                <td><?=$row['membership_type'];?></td>
				  <td><?=$row['primary_nirc'];?></td>
                <td><?=$row['members_name'];?></td>
				  <td><?=$row['nric_no'];?></td>
                   <td><?php
$newDate = date("d-m-Y", strtotime($row['date_of_birth']));  
 echo $newDate; ?></td>
				  <td><?=$row['gender'];?></td>
                <td><?=$row['nationality'];?></td>
				  <td><?=$row['race'];?></td>
				    <td><?=$row['marital_status'];?></td>
					 <td><?=$row['occupation'];?></td>
				  <td><?=$row['address1'];?></td>
                <td><?=$row['city'];?></td>
				  <td><?=$row['state'];?></td>
                <td><?=$row['postcode'];?></td>
				  <td><?=$row['mobile_phone_no'];?></td>
                <td><?=$row['email'];?></td>
				  <td><?=$row['submission_date'];?></td>
				    
               
            </tr>
  <?php endforeach;?>

</TABLE>


</body>
</html>