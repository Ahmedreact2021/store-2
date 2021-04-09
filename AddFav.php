<? session_start();
require ("config.php");
$result=mysql_query("select * from $Table_fav where User_id_fav='$Id' and user_id='$_SESSION[Site_User_ID]'");
if(mysql_num_rows($result)==0)
{
  mysql_query("insert into $Table_fav set user_id_fav='$Id',user_id='$_SESSION[Site_User_ID]'");
   $done="true";
}
else{$done="false";}
mysql_free_result($result);
?>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" rightmargin="0">
<? if($done=="true"){?>
<br>
<table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0" class="border_site" >
  <tr>
    <td align="center" bgcolor="#EEF5F9" class="scrept"><table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="94%" height="70" align="center" class="textorange">  „  «·√÷«›Â ›Ì ﬁ«∆„Â «·«’œﬁ«¡</td>
          <td width="6%"><img src="images/do.gif" width="48" height="48"></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<br>
<? }elseif($done=="false"){?>
<br>
<table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0" class="border_site">
  <tr>
    <td align="center" bgcolor="#EEF5F9" class="scrept"><table width="99%" height="50"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="94%" height="70" align="center" class="scrept"><span class="textorange">Â–« «·⁄÷Ê „ÊÃÊœ »«·›⁄· ›Ì ﬁ«∆„Â «·«’œﬁ«¡</span></td>
          <td width="6%"><img src="images/stop.gif" width="48" height="48"></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<br>
<? }?>
<meta http-equiv="refresh" content="10;URL=javascript:window.close()">
