








<?






function mail_msg($ID,$email,$Site_mail,$Site_url)

{





//////////////////////////////////////send mail for new message///////////////////////////





$From_Email = $Site_mail; 

$headers  = "MIME-Version: 1.0  \r\n "; 
 
$headers .= "Content-type: text/html; charset=windows-1256 \r\n "; 

$headers .= "From: $From_Email \r\n "; 

$message ="<html>

<head>

<title>����� �����</title>

<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>

</head>

<body>

<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>

<tr>

<td><table width='100%'  border='0' cellpadding='0' cellspacing='0'>

<tr>

<td width='92%' align='right' bgcolor='#187EA6'  style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#ffffff;text-decoration:none;'>����� ����� &nbsp;&nbsp;&nbsp;&nbsp;</td>

<td width='3%' height='25' align='center' bgcolor='#61B1D2'  style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#ffffff;text-decoration:none;'>&raquo;</td>

</tr>

</table></td>

</tr>

<tr>

<td align='center'  style='border-color:#187EA6; border-style:solid; border-width:1' height='80'><table width='100%'  border='0' align='center' cellpadding='0' cellspacing='2' dir='ltr'>

<tr>

<td width='74%' align='right' valign='top' class='style1' dir='rtl'>

<a href='$Site_url' style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#187EA6;text-decoration:none;text-decoration:none' target='_blank'> ��� ����� $_SESSION[Site_User] <br>

������ ����� ���� �� ��� ���� ����� ��� ��� <br>

������� ������ ��� ������� <br>

���� ��������������� </a> </td>

</tr>

</table></td>

</tr>

</table>

</body>

</html>";

$subject = "����� ����� ����� ��� ���� �����"; 

$to=$email;

@mail($to,$subject,$message,$headers);

////////////////////////////////////////////////// end code ///////////////////////////////////////////

} // end function



function mail_active($userid,$name,$username,$pass,$EMail,$Site_mail,$Site_url)

{



$active=(($userid*63)*29)/13;

$nothing=(($userid*29)*54)/20;

//////////////////////// send email to the user to active his account

$From_Email = $Site_mail; 

$headers  = "MIME-Version: 1.0 \r\n "; 

$headers .= "Content-type: text/html; charset=windows-1256 \r\n "; 

$headers .= "From: $From_Email \r\n "; 

$message ="<html>

<head>

<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>

<title>����� ��������</title>

</head>

<body>

<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>

<tr>

<td><table width='100%'  border='0' cellpadding='0' cellspacing='0'>

<tr>

<td width='92%' align='right' bgcolor='#187EA6'  style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#ffffff;text-decoration:none;'>����� �������&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td width='3%' height='25' align='center' bgcolor='#61B1D2'  style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#ffffff;text-decoration:none;'>&raquo;</td>

</tr>

</table></td>

</tr>

<tr>

<td align='center'  style='border-color:#187EA6; border-style:solid; border-width:1' height='150'><table width='100%'  border='0' align='center' cellpadding='0' cellspacing='2' dir='ltr'>

<tr>

<td width='74%' align='right' valign='top' class='style1' dir='rtl'>

<a href='$Site_url/?Plink=activation&active=$active&id=$nothing' style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#187EA6;text-decoration:none;text-decoration:none' target='_blank'> 

����� �� ��

<span style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#FF0000;text-decoration:none;text-decoration:none'>$name </span>

<br>

���� ���� ���� ��� ������

<span style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#FF0000;text-decoration:none;text-decoration:none'>zaogaty.com </span>

<br>

����� ������ ������� ���� �������

<br>

��� �������� 

<span style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#FF0000;text-decoration:none;text-decoration:none'>$username </span >

<br>

���� ����

<span style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#FF0000;text-decoration:none;text-decoration:none'>$pass </span>

<br>

<center><b>

������ ������ ���� ����� ���������

</b></center>

</a>

<br></td>

</tr>

</table></td>

</tr>

</table>

</body>

</html>";

$subject ="����� ��������"; 

$to=$EMail;

@mail($to,$subject,$message,$header); 

///////////////////////////////////////////////// end active email

} // end function









function mail_admin($EMail,$Site_mail,$Site_url,$title,$body)

{

$active=(($userid*63)*29)/13;

$nothing=(($userid*29)*54)/20;

//////////////////////// send email from the admin

$From_Email = $Site_mail; 

$headers  = "MIME-Version: 1.0"; 

$headers .= "Content-type: text/html; charset=windows-1256"; 

$headers .= "From: $From_Email"; 

$message ="<html>

<head>

<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>

<title>����� ������</title>

</head>

<body>

<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>

<tr>

<td><table width='100%'  border='0' cellpadding='0' cellspacing='0'>

<tr>

<td width='92%' align='right' bgcolor='#187EA6'  style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#ffffff;text-decoration:none;'>����� ������&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td width='3%' height='25' align='center' bgcolor='#61B1D2'  style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#ffffff;text-decoration:none;'>&raquo;</td>

</tr>

</table></td>

</tr>

<tr>

<td align='center'  style='border-color:#187EA6; border-style:solid; border-width:1' height='150'><table width='100%'  border='0' align='center' cellpadding='0' cellspacing='2' dir='ltr'>

<tr>

<td width='74%' align='center' valign='top' class='style1' dir='rtl'>

<a href='$Site_url' style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#187EA6;text-decoration:none;text-decoration:none' target='_blank'> 

���� ����� ������

<span style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#FF0000;text-decoration:none;text-decoration:none'>$Site_url </span>

<br>

������ ������� ���� ��

<br>

������ ������� �������

<br>

<span style='FONT-FAMILY: Tahoma; FONT-SIZE: 12px;color:#000000;text-decoration:none;text-decoration:none'>

$body

</span>

<br>

����� ������ ���� ��� 

</a>

<br></td>

</tr>

</table></td>

</tr>

</table>

</body>

</html>";

$subject =$title; 

$to=$EMail;

@mail($to,$subject,$message,$header); 

///////////////////////////////////////////////// end sending email

} // end function

?>