<? require ("config.php");?>

<link href="style.css" rel="stylesheet" type="text/css">

<body  leftmargin="0" topmargin="0" rightmargin="0">

<?

if ($_SERVER['REQUEST_METHOD']=="POST")

{

$result=mysql_query("select * from $Table_usrs where EMail='$email'");

$row=mysql_fetch_array($result);

$check=$row[user_id];

 if ($check)

 {

$UserNames=$row[UserName];

$PassWords=$row[PassWord];

$From_Email =$Site_mail; 

$headers  = "MIME-Version: 1.0"; 

$headers .= "Content-type: text/html; charset=windows-1256"; 

$headers .= "From: $From_Email"; 

$message ="<html>

<head>

<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>

<title>Untitled Document</title>

<style type='text/css'>

<!--

.style2 {	font-family: Tahoma;

	font-size: 12px;

}

.style4 {color: #FF0000; font-family: Tahoma; font-size: 12px; }

-->

</style>

</head>

<body>

<table width=100% border=0 cellpadding=0 cellspacing=0 dir='rtl'>

<tr>

<td valign=top><div align=center><span class=style2>������ ����� </span><br>

<span class=style2>���� ������ ����� ������� ����� ��� ���� ����� ��� ���  �������</span><br>

<span class=style2>��� �������� ����� ��</span> <span class=style4>: ".$UserNames." </span> <br>

<span class=style2>���� ������</span> <span class=style4>: ".$PassWords." </span> <br>

<span class=style4>�� ����� ���� ��� ����� ��� ���</span> </div>

<div align=center></div>

<div align=right></div></td>

</tr>

</table>

</body>

</html>";



$subject = "���� ������ ������ ��"; 

$to="$email";

@mail($to,$subject,$message,$headers);

$typ="yes";

}

else

{

$typ="no";

}

mysql_free_result($result);

}

?>



<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

        <tr>

          <td width="92%" align="right" bgcolor="#187EA6" class="textwhite">������� ���� ���� &nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td width="8%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>

        </tr>

    </table></td>

  </tr>

  <tr>

    <td align="center" class="border_site"><table width="100%"  border="0" cellpadding="2" cellspacing="0">

      <tr>

        <td align="right" class="textsite">��� ��� �� ���� ���� ������ ������ �� ������ ��������� �� ���� ����� ������ ���������� ����� �� ����� ��� ������� ��� ������� ������� 

		����� ����� �� ������ ����� ���� ����� ������ ��� ����� 

		<br>

            <form name="form1" method="post" action="">

              <table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0" class="border_site">

                <tr>

                  <td>

				  <table width="100%" height="90" border="0" align="center" cellpadding="2" cellspacing="2">

<? if ($typ=="yes")

{

?>

<tr><td align="center" colspan="2" ><span class="textgreen">�� ����� ������� ������ ��� ������ ����� �� ���� </span></td></tr><?

}else{

?>

<tr>

<td colspan="2" class="textred" align="center">

<?

if ($typ=="no")

{

?>

������� ���� ������� ��� ����� <br>

�� ���� ���� �� ������� ��� ����

<?

}

?>

</td>

</tr>

<tr>

<td width="72%" align="center"><div align="right">

<input name="email" type="text" class="textblack" id="email" size="40" style="text-align:center">

</div></td>

<td width="28%" class="textsite" >������ ���������� </td>

</tr>

<tr>

<td colspan="2"><div align="center">

<input name="Submit2" type="submit" class="textblack"  value="������ ���� ����">

</div></td>

</tr>

<? }?>                 



		 </table></td>

                </tr>

              </table>

          </form></td>

      </tr>

    </table></td>

  </tr>

</table>

</body>