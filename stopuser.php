<? session_start();?>
<link href="style.css" rel="stylesheet" type="text/css">
<?
if($_SERVER['REQUEST_METHOD']=="POST")
{
	require ("config.php");
	
	$result=mysql_query("select voted_user from $Table_vote where voted_user='$UserName' and voter_user=(select UserName from $Table_usrs where        user_id='$_SESSION[Site_User_ID]')");
	if(mysql_num_rows($result)==0)
	{
	 
		 mysql_query("insert into $Table_vote set voter_user=(select UserName from $Table_usrs where                  user_id='$_SESSION[Site_User_ID]'),voted_user='$UserName',reason='$txt'");
		$done="true";
		$CountVote=mysql_fetch_array(mysql_query("select count(voted_user) from $Table_vote where voted_user ='$UserName'"));
		
		if($CountVote[0] >= 3)
		{
			mysql_query("update $Table_usrs set login='block' where UserName='$UserName'");
		}
	
	}
	else{$done="false";}
	//mysql_free_result($result);

 if($done=="true"){?>
<br>
<table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0" class="border_site" >
  <tr>
    <td align="center" bgcolor="#EEF5F9" class="scrept"><table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="94%" height="70" align="center" class="textorange">  г «б ’жн  Џбм «нё«Ё «бЏ÷ж</td>
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
          <td width="94%" height="70" align="center" class="scrept"><span class="textorange">е–« «бЏ÷ж  г «б ’жн  Џбне гд ё»б</span></td>
          <td width="6%"><img src="images/stop.gif" width="48" height="48"></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<br>
<? }}?>
<!--<meta http-equiv="refresh" content="URL=javascript:window.close()">-->

  <form action="" method="post"><tr>
    <td align="center" bgcolor="#EEF5F9" class="scrept"><table width="99%" height="50"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="94%" height="70" align="center" class="scrept"><span class="textorange">«б—ћ«Ѕ «ѕќ«б «б”»»</span></td>
          
        </tr><tr><td><input name="txt" type="text">
		
		<input value=" ’жн " type="submit" ></td></tr>
		
    </table></td>
  </tr>
  </form>
