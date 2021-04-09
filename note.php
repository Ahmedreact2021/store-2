<? session_start();

require("config.php");

$date=$d." / ".$m." / ".$y;



if($_SERVER['REQUEST_METHOD']=="POST"){



if($add=="add"){

$time=time();

$note=str_replace("\n","<br>",$calendar);

mysql_query("insert into $Table_calendar set userid='$_SESSION[Site_User_ID]',date='$date',note='$note',time='$time' ");

$done="done";

}



if($edit=="edit"){

$note=str_replace("\n","<br>",$calendar);

mysql_query("update $Table_calendar set note='$note' where userid='$_SESSION[Site_User_ID]' and date='$date'");

$done="done";

}





}



$res=mysql_query(" select * from $Table_calendar where userid='$_SESSION[Site_User_ID]' and date='$date'");

$row=mysql_fetch_array($res);

$result_note=$row[id];

$note=$row[note];

mysql_free_result($res);

?>

<link href="style.css" rel="stylesheet" type="text/css">

<script src="astm.js"></script>



<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

<tr>

<td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

<tr>

<td width="92%" align="right" bgcolor="#187EA6" class="textwhite"> <? if($result_note){?>ÊÚÏíá ÍÏË ÈÊÇÑíÎ<? }else{?>ÊÓÌíá ÍÏË ÈÊÇÑíÎ <? }?>&nbsp;<?=$date?>&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td width="8%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>

</tr>

</table></td>

</tr>

<tr>

<td height="273" align="center" valign="middle" class="border_site">



<? if($done=="done"){?>

<span class="textheader">Êã ÇÖÇİÉ ÇáÍÏË ÈäÌÇÍ</span>

<meta http-equiv="refresh" content="5;URL=javascript:window.close()">

<? }else{?>

<form action="" method="post" name="formcalender" style="margin-bottom:0; margin-left:0; margin-right:0; margin-top:0 " onSubmit="return astm_calendar();">

<table width="100%"  border="0" cellspacing="2" cellpadding="0"  class='border'>

<tr>

<td align="center" dir="rtl">

<? $note=str_replace("<br>","\n",$note);?>

<textarea name="calendar" cols="54" rows="15" class="textblack" id="calendar"><?=$note?></textarea></td>

</tr>

<tr>

<td height="30" align="center"><? if($result_note){?>

<input name="Submit" type="image" value="ÇÍİÙ ÇáÊÚÏíá" src="images/notee.gif" alt="ÊÚÏíá ÈíÇäÇÊ ÍÏË">

<input name="edit" type="hidden" id="edit" value="edit">

<? }else{?>

<input name="add" type="hidden" id="add" value="add">

<input name="Submit" type="image" value="ÇÖİ ÍÏË ÌÏíÏ" src="images/notea.gif" alt="ÊÓÌíá ÍÏË ÌÏíÏ">

<? }?>

</td>

</tr>

</table>

</form>

<? }?>

</td>

</tr>

</table> 

