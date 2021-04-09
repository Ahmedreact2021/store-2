<? session_start();?>

<link href="<?=$path?>style.css" rel="stylesheet" type="text/css">

<?

if($_SERVER['REQUEST_METHOD']=="POST" && $increase=="astm")
{
$res_increase_balance=mysql_query(" select * from $Table_card where cardid='$Card' and userid='0' and enable='true'");

$rs= check($uname,$passw,$Table_usrs);
if($rs!=0)
{

if(mysql_num_rows($res_increase_balance)<>0)
{
    $val= Remainder($rs,$Table_card);
	

$row_increase_balance=mysql_fetch_array($res_increase_balance);
$card_valid=$row_increase_balance[valid];
if($val[0]>0)
$card_valid=$card_valid+$val[0];

/////////////////// today date

$card_date= date("Y-m-d");

/////////////////////// new card end_time

$card_end=date("Y-m-d",mktime(date("G"),date("i"),date("s"),date("m"),date("d")+$card_valid,date("Y")));

  mysql_query("update $Table_card set userid='$rs',start='$card_date',end='$card_end', valid=$card_valid where cardid='$Card'");

  mysql_query("update $Table_usrs set balance='$card_valid' where user_id='$rs'");
  
mysql_query("update $Table_card set valid='$val[0]' , enable='false' where id='$val[1]'");
  
  $start_date=substr($card_date,8,2)."-".substr($card_date,5,2)."-".substr($card_date,0,4);
  $end_date=substr($card_end,8,2)."-".substr($card_end,5,2)."-".substr($card_end,0,4);

  $_SESSION[Site_User_Card]=$card_valid;

$increase_baland="Done";

}
else
{
$increase_baland="Error";
}
}
else
{
$inc="bad";
}
mysql_free_result($res_increase_balance);
}
/////////////*---------------charge with CASHU---------------*///////////////////
if($_SERVER['REQUEST_METHOD']=="POST" && $txt1=="zaogaty" )
 { 
 

///////////select last id 
$res_last=mysql_query("select max(id) as astm_last_id from $Table_card");
$row_last=mysql_fetch_array($res_last);
$last_old_card=$row_last[astm_last_id];
mysql_free_result($res_last);
////////////////// insert new ids



$rs= check($_POST['txt2'],$_POST['txt3'],$Table_usrs);





     mysql_query("insert into $Table_card set package ='CASH U',userid='$rs'");
	 
	 
 
 
 
 
 
 
 
	//////////// to make card_id 
	$dbrusult=mysql_query("select * from $Table_card where id > '$last_old_card'");
	while ($row=mysql_fetch_array($dbrusult))
	{
	$no=$row[id];
    $t1 =md5(md5(md5("$no")));
    $tn1=substr($t1,1,1);
    $tn2=substr($t1,4,3);
	$tn3=substr($t1,8,3);
	$tn4=substr($t1,11,3);
	
	 $card_id=$tn1.$tn4.$no."U".$tn3.$tn2.$tn1;
	

     //////////////SELECT CASH U TIME /////////////////////////	

	     if($_POST['txt4']=='1'){$TIME=mysql_fetch_array(mysql_query("select CashU_Time1 from $Table_setting where sid='1'"));}
	 elseif($_POST['txt4']=='2'){$TIME=mysql_fetch_array(mysql_query("select CashU_Time2 from $Table_setting where sid='1'"));}
	 elseif($_POST['txt4']=='3'){$TIME=mysql_fetch_array(mysql_query("select CashU_Time3 from $Table_setting where sid='1'"));}
	 	 /*-------------increase cashu card-------------------*/
	 $val= Remainder($rs,$Table_card);
	 
	 if($val[0]>0)
     $TIME[0]=$TIME[0]+$val[0];
	 /*---------------------------------------------------*/

	$start=date("Y-m-d");
      $end= date( "Y-m-d", strtotime( "$start +$TIME[0] days" ) );
	///////////////// update card_id on db 
	mysql_query("update $Table_card set cardid='$card_id',valid='$TIME[0]',enable='true',start='$start',end='$end' where id='$no'");
    mysql_query("update $Table_usrs set balance='$TIME[0]' where user_id='$rs'");
	
	
	
	
	mysql_query("update $Table_card set valid='$val[0]' , enable='false' where userid='$val[1]'");
	
		$card_valid=$TIME[0];
		$start_date=$start;
		$end_date=$end;
		

	$increase_baland="Done";
		


	} // end while
    mysql_free_result($dbrusult);
}

?>

<? if(!empty($_SESSION[Site_User_Card]) && $increase<>"astm"){?>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

        <tr>

          
		  <td width="50%" align="right" bgcolor="#187EA6" class="textwhite">»Ì«‰«  —’ÌœÏ &nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>

        </tr>

    </table></td>

  </tr>

  <tr>

    <td class="border_site">

<? 

$res_user_balance=mysql_query("select * from $Table_usrs where user_id ='$_SESSION[Site_User_ID]'");

$row_user_balance=mysql_fetch_array($res_user_balance);



$res_card_balance=mysql_query(" select * from $Table_card where userid='$_SESSION[Site_User_ID]' and enable='true'");

$row_card_balance=mysql_fetch_array($res_card_balance);

?>

<table width="100%"  border="0" cellspacing="2" cellpadding="0">

<tr>
<td rowspan="5"  align="right" class="textblack" dir="rtl">
   <form method="post" action=""><table border="1">
       <tr><td width="50%" align="center" class="textsite">«Âœ«¡ «Ì«„ (ﬂ· ÌÊ„ ÌÕ”» »ÌÊ„Ì‰)</td></tr>
	   <tr><td align="center" class="textsite">«”„ «·⁄÷Ê&nbsp;<input type="text" name="name"/></td></tr>
	   <tr><td align="center" class="textsite">⁄œœ «·«Ì‹«„&nbsp;<input type="text" name="days"/></td></tr>
	   <tr><td align="center" class="textsite"><input type="submit" value="«—”«·" /></td></tr>
   </table></form>
   <? 
   /*----------------«Âœ«¡ «Ì«„-----------------------*/
   
   
   $res_user=mysql_query("select * from $Table_usrs where UserName ='$name'");
    if(mysql_num_rows($res_user)==0 && $name!="")
	   {?><script language="javascript">alert("«·—Ã«¡ «· «ﬂœ „‰ «”„ «·⁄÷Ê")</script> <? }
	else 
	{  
	   if($row_card_balance['valid']<(2*$days) && $days!="")
	      {?><script language="javascript">alert("«·—’Ìœ €Ì— ﬂ«›Ì")</script> <? }
	   else
		{
		    $days=(2*$days);
			$end=($row_card_balance['end']);
		    $newend= date( "Y-m-d", strtotime( "$end -$days days" ) );
		     mysql_query("update $Table_card set end='$newend' where userid='$_SESSION[Site_User_ID]' and enable='true'");
			 
			 $days=($days/2);
			$res=mysql_query("select max(end) from $Table_card where userid =(select user_id from $Table_usrs where UserName ='$name')");
			$row=mysql_fetch_row($res);
			$new=date( "Y-m-d", strtotime( "$row[0] +$days days" ) );
			mysql_query("update $Table_card set end='$new',enable='true' where end='$row[0]' and userid =(select user_id from $Table_usrs where                          UserName ='$name')");
			/*------------------------------------------------message-----------------------------*/
					/*----------to----------*/
					
					$torow=mysql_fetch_row(mysql_query("select EMail from $Table_usrs where UserName ='$name'"));
					$to=$toquery[0];
					/*-------------sub------*/
					$sub=" „ “Ì«œ… —’Ìœﬂ ›Ì „Êﬁ⁄ “ÊÃ Ì";
					/*-------------message--------*/
					$fromuser=mysql_fetch_row(mysql_query("select UserName from $Table_usrs where user_id='$_SESSION[Site_User_ID]'"));
					$user=$fromuser[0];
					$msg="ﬁ«„ «·⁄÷Ê".$user."»‘Õ‰ —’Ìœﬂ »„ﬁœ«—".$days."„‰ —’ÌœÂ «·Œ«’";
					/*---------------header-----------*/
					
					$header="info@zaogaty.com";
					
					@mail($to,$sub,$msg,$header);
					
		}
	
	}
   /*-------------------------------------------------*/
    ?>
</td> 

<td  align="right" class="textblack" dir="rtl"><?=$row_user_balance[register_time]?></td>

<td  height="25" class="textsite"> «—ÌŒ «· ”ÃÌ· </td>

</tr>

<tr>

<td align="right" class="textblack"  dir="rtl"><?=date("d-m-Y",$_SESSION[Site_User_Laston_time])?></td>

<td height="25" class="textsite">«Œ— œŒÊ· ··„Êﬁ⁄ </td>

</tr>

<tr>

<td align="right" class="textblack"  dir="rtl"><?=substr($row_card_balance[start],8,2)."-".substr($row_card_balance[start],5,2)."-".substr($row_card_balance[start],0,4);?></td>

<td height="25" class="textsite"> «—ÌŒ ‘Õ‰ «·—’Ìœ </td>

</tr>

<tr>

<td align="right" class="textblack"  dir="rtl"><?=substr($row_card_balance['end'],8,2)."-".substr($row_card_balance['end'],5,2)."-".substr($row_card_balance['end'],0,4);?></td>

<td height="25" class="textsite"> «—ÌŒ ‰Â«Ì… «·—’Ìœ </td>

</tr>

<tr>

<td align="right" class="textblack"  dir="rtl"><?=$row_card_balance['valid'];?> ÌÊ„</td>

<td height="25" class="textsite">«·—’Ìœ «·Õ«·Ï </td>

</tr>

</table>

<? 

mysql_free_result($res_card_balance);

mysql_free_result($res_user_balance);?>

</td>

  </tr>

</table>

<? }else{?>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

        <tr>

          <td width="92%" align="right" bgcolor="#187EA6" class="textwhite">‘Õ‰ —’ÌœÏ &nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>

        </tr>

    </table></td>

  </tr>

  <tr>

    <td height="130" class="border_site" align="center">

<? if($increase_baland=="Done"){?>

<span class="textred">„»—Êﬂ</span>

<span class="textsite">  „ ‘Õ‰ «·—’Ìœ »‰Ã«Õ </span><br> 

<span class="textsite" dir="rtl">„œ… «·‘Õ‰</span><span class="textblack" dir="rtl"><?=$card_valid?></span><br>
<?
if ($val[0]>0)
echo "<span  class=\"textblack\" dir=\"ltr\">$val[0] day</span><span class=\"textsite\" dir=\"rtl\"> you have past  in youer  accont</span><br>";

?>
<span class="textsite" dir="rtl"> «—ÌŒ »œ«Ì… «·‘Õ‰ </span><span class="textblack" dir="rtl">
<? echo $start_date;?></span><br>

<span class="textsite" dir="rtl"> «—ÌŒ «·‰Â«Ì… </span><span class="textblack" dir="rtl">
<? echo $end_date;?></span><br>


<? 
unset($_SESSION[Site_User_Card]);
}else
{
if(isset($txt2))
{

$rs= check($_POST['txt2'],$_POST['txt3'],$Table_usrs);
if($rs!=0)
{
$Price=mysql_fetch_array(mysql_query("select CashU_Price1,CashU_Price2,CashU_Price3 from $Table_setting where sid='1'"));
$Time=mysql_fetch_array(mysql_query("select CashU_Time1,CashU_Time2,CashU_Time3 from $Table_setting where sid='1'"));

if(isset($_POST['cashu']) and $_POST['cashu']!="")
{
?>

<table>
	<tr>
		<td align="center">
		<? echo "«·⁄—÷ «·«Ê· &nbsp;"."&nbsp;$Time[0]&nbsp;"." ÌÊ„ »”⁄—"."&nbsp;$Price[0]&nbsp;"."œÊ·«— ›ﬁÿ";?>
			<form action="https://www.cashu.com/cgi-bin/pcashu.cgi" method="post" >
			<input type="hidden" name="merchant_id" value="nobalaa">
			<? $token = md5("nobalaa:"."$Price[0]".":usd:nobalaa");?>
			<input type="hidden" name="token" value="<?=$token?>">
			<input type="hidden" name="servicesName" value="zaogaty">
			<input type="hidden" name="display_text" value="zaogaty website register">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="amount" value="<?=$Price[0]?>">
			<input type="hidden" name="language" value="ar">
			<input type="hidden" name="txt1" value="zaogaty">
            <input type="hidden" name="txt2" value="<?=$_POST['txt2']?>">
            <input type="hidden" name="txt3" value="<?=$_POST['txt3']?>">
            <input type="hidden" name="txt4" value="1">
			<input type="hidden" name="session_id" value="<?=$_SESSION[Site_User_ID]?>">
			<input type="hidden" name="test_mode" value="0">
			<input type="submit" value="«‘ —«ﬂ »«·⁄—÷ «·«Ê·" />
			</form>

		</td>
	</tr>
	
	<tr>
		<td align="center">
		<? echo "«·⁄—÷ «·À«‰Ì&nbsp;"."&nbsp;$Time[1]&nbsp;"." ÌÊ„ »”⁄—"."&nbsp;$Price[1]&nbsp;"."œÊ·«— ›ﬁÿ";?>
			<form action="https://www.cashu.com/cgi-bin/pcashu.cgi" method="post" >
			<input type="hidden" name="merchant_id" value="nobalaa">
			<? $token = md5("nobalaa:"."$Price[1]".":usd:nobalaa");?>
			<input type="hidden" name="token" value="<?=$token?>">
			<input type="hidden" name="servicesName" value="zaogaty">
			<input type="hidden" name="display_text" value="zaogaty website register">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="amount" value="<?=$Price[1]?>">
			<input type="hidden" name="language" value="ar">
			<input type="hidden" name="txt1" value="zaogaty">
            <input type="hidden" name="txt2" value="<?=$_POST['txt2']?>">
            <input type="hidden" name="txt3" value="<?=$_POST['txt3']?>">
            <input type="hidden" name="txt4" value="2">
			<input type="hidden" name="session_id" value="<?=$_SESSION[Site_User_ID]?>">
			<input type="hidden" name="test_mode" value="0">
			<input type="submit" value="«‘ —«ﬂ »«·⁄—÷ «·À«‰Ì" />
			</form>
			
			
		</td>
	</tr>
	</br>
	<tr>
		<td align="center">
		<? echo "«·⁄—÷ «·À«·À&nbsp;"."&nbsp;$Time[2]&nbsp;"." ÌÊ„ »”⁄—"."&nbsp;$Price[2]&nbsp;"."œÊ·«— ›ﬁÿ";?>
		   <form action="https://www.cashu.com/cgi-bin/pcashu.cgi" method="post" >
			<input type="hidden" name="merchant_id" value="nobalaa">
			<? $token = md5("nobalaa:"."$Price[2]".":usd:nobalaa");?>
			<input type="hidden" name="token" value="<?=$token?>">
			<input type="hidden" name="servicesName" value="zaogaty">
			<input type="hidden" name="display_text" value="zaogaty website register">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="amount" value="<?=$Price[2]?>">
			<input type="hidden" name="language" value="ar">
			<input type="hidden" name="txt1" value="zaogaty">
            <input type="hidden" name="txt2" value="<?=$_POST['txt2']?>">
            <input type="hidden" name="txt3" value="<?=$_POST['txt3']?>">
            <input type="hidden" name="txt4" value="3">
			<input type="hidden" name="session_id" value="<?=$_SESSION[Site_User_ID]?>">
			<input type="hidden" name="test_mode" value="0">
			<input type="submit" value="«‘ —«ﬂ »«·⁄—÷ «·À«·À" />
			</form>
		</td>
	</tr>
</table>
<?
} 
elseif(isset($_POST['flixpay']) and $_POST['flixpay']!="")
	{?>
    <table>
	<tr>
		<td align="center">
		  <? echo "«·⁄—÷ «·«Ê· &nbsp;"."&nbsp;$Time[0]&nbsp;"." ÌÊ„ »”⁄—"."&nbsp;$Price[0]&nbsp;"."œÊ·«— ›ﬁÿ";?>
            <form action="http://www.flixpay.com/process.htm" method="post" >
            <input type=hidden name=member value="nobalaa">
            <input type=hidden name=action value="payment">
            <input type=hidden name=product value="zaogaty">
            <input type=hidden name=price value="<?=$Price[0]?>">
            <input type=hidden name=quantity value="1">
            <input type=hidden name=period value="1">
            <input type=hidden name=trial value="1">
            <input type=hidden name=setup value="0">
            <input type=hidden name=tax value="0">
            <input type=hidden name=shipping value="0">
            <input type=hidden name=ureturn value="http://www.zaogaty.com/?Plink=balance">
            <input type=hidden name=unotify value="http://www.zaogaty.com/?Plink=balance">
            <input type=hidden name=ucancel value="http://www.zaogaty.com/?Plink=balance">
            <input type=hidden name=comments value="<?=base64_encode($_POST['txt2']."::".$_POST['txt3'])?>">
            <input type="image" src="<?=$path?>images/flixpay.gif" >
			</form>

		</td>
	</tr>
	  
	<? }

}
else {if($txt1!="zaogaty")echo "<a href='?Plink=balance'>ÌÊÃœ Œÿ« ›Ì «”„ «·„” Œœ„ «Ê ﬂ·„… «·„—Ê— Ì—ÃÏ «·÷€ÿ Â‰« ··⁄Êœ… Êﬂ «» Â« »‘ﬂ· ’ÕÌÕ</a>";}
}
else{
?>

<form action="" name="form_balance" method="post" onSubmit="return astm_balance();">

<table width="100%"  border="0" cellspacing="2" cellpadding="0">

<tr align="center">

<td height="50" colspan="3" class="textblack"> Ì„ﬂ‰ﬂ «” Œœ«„ Œœ„«  „Êﬁ⁄ “ÊÃ Ì »⁄œ ‘Õ‰ —’Ìœﬂ »ÿ«ﬁ… “ÊÃ Ì «·„ÊÃÊœ… „‰ Œ·«· 

<a href="?Plink=agent" title="«÷€ÿ Â‰« ·„⁄—›… «·„“Ìœ ⁄‰ Êﬂ·«¡ „Êﬁ⁄ “ÊÃ Ì " class="textsite"> Êﬂ·«∆‰‹« </a> <br>

›ﬁÿ ﬁ„ »Ê÷⁄ «·—ﬁ„ «·”—Ï  «·„ÊÃÊœ »«·»ÿ«ﬁ… «·Œ«’… »ﬂ Ê«÷€ÿ ‘Õ‰ «·Õ”«»</td>

</tr>

<? if($increase_baland=="Error"){?>

<tr align="center">

<td height="25" colspan="3" class="textred">„‰ ›÷·ﬂ  √ﬂœ „‰ —ﬁ„ «·»ÿ«ﬁ… „—… «Œ—Ï</td>

</tr>

<? }?>
<? if($inc=="bad"){?>

<tr align="center">

<td height="25" colspan="3" class="textred"> bad user name and password</td>

</tr>

<? }?>

<tr>
<td width="27%" align="right">
<input name="Card" type="text" class="textblack" id="Card" style="text-align:center; width:190 " value="<?=$Card?>"></td>
<td width="34%" height="25" class="textblack">—ﬁ‹‹„ «·»‹‹ÿ«ﬁ…</td>
</tr>
<tr>
<td width="27%" align="right">
<input name="uname" type="text" class="textblack" id="Card" style="text-align:center; width:190 " value="<?=$uname?>"></td>
<td width="34%" height="25" class="textblack">«”„ «·„” Œœ„</td>
</tr>
<tr>
<td width="27%" align="right">
<input name="passw" type="password" class="textblack" id="Card" style="text-align:center; width:190 " value="<?=$passw?>"></td>
<td width="34%" height="25" class="textblack">ﬂ‹·‹„… «·‹‹”‹—</td>
</tr>
<tr>

<td width="39%" align="right">
<input name="increase" type="hidden" id="increase" value="astm">

<input name="Submit" type="image" value="Submit" src="<?=$path?>images/balance.gif" alt="‘Õ‰ «·—’Ìœ"></td>
</tr>
</form>
<tr><td height="50" colspan="3" class="textblack" align="center">---------------------------------------------</td></tr>


<form action="" method="post" >

<tr>
<td height="50" colspan="3" class="textblack" align="center">
CASH U «Ê „‰ Œ·«· ‘Õ‰ —’Ìœﬂ ⁄‰ ÿ—Ìﬁ »ÿ«ﬁ…
</td></tr>
<tr>
<td width="27%" align="right">
<input type="hidden" name="cashu" value="cashu" />
<input name="txt2" type="text" class="textblack" id="txt2" style="text-align:center; width:190 " value="<?=$txt2?>" ></td>
<td width="34%" height="25" class="textblack">«”„ «·„” Œœ„</td>
</tr>
<tr>
<td width="27%" align="right">
<input name="txt3" type="password" class="textblack" id="txt3" style="text-align:center; width:190 " value="<?=$txt3?>"></td>
<td width="34%" height="25" class="textblack">ﬂ‹·‹„… «·‹‹”‹—</td>
</tr>
<br />
<tr><td height="50" colspan="3" class="textblack" align="center">
<input type="submit" value="«·œ›⁄ ⁄‰ ÿ—Ìﬁ ﬂ«‘ ÌÊ!"  >
</form>



</td>
</tr>
<tr><td height="50" colspan="3" class="textblack" align="center">---------------------------------------------</td></tr>


<form action="" method="post" >

<tr>
<td height="50" colspan="3" class="textblack" align="center">
FlixPay.com «Ê „‰ Œ·«· ‘Õ‰ —’Ìœﬂ ⁄‰ ÿ—Ìﬁ 
</td></tr>
<tr>
<td width="27%" align="right">
<input type="hidden" name="flixpay" value="flixpay" />
<input name="txt2" type="text" class="textblack" id="txt2" style="text-align:center; width:190 " value="<?=$txt2?>" ></td>
<td width="34%" height="25" class="textblack">«”„ «·„” Œœ„</td>
</tr>
<tr>
<td width="27%" align="right">
<input name="txt3" type="password" class="textblack" id="txt3" style="text-align:center; width:190 " value="<?=$txt3?>"></td>
<td width="34%" height="25" class="textblack">ﬂ‹·‹„… «·‹‹”‹—</td>
</tr>
<br />
<tr><td height="50" colspan="3" class="textblack" align="center">
<input type="image" src="<?=$path?>images/flixpay.gif" >
</form>



</td>
</tr>
</table>







<? }}?>



</td>

  </tr>

</table>

<? }
  function  check($un,$pa,$tab)
     {   
	 if($un!=""&$pa!="")
	 {
     $res=mysql_query(" select * from  $tab where UserName='$un' and PassWord='$pa' ")or die ( mysql_error());
	 
     $row=mysql_fetch_array($res);
	 if($row[UserName]!="" && $row[PassWord]!="")
	 {
     $re=$row[user_id];
	 //echo  $re;
	 }
      else
      $re=0;
	  }
	  else
	   $re=0;
	  return $re;
	 }
	 function  Remainder($ui,$tab)
	 {
		 $res_card=mysql_query(" select * from $tab where userid='$ui' and enable='true'");
		 $row_card=mysql_fetch_array($res_card);
		 $daynow=date("Y-m-d");
	
		$end=$row_card['end'];
		$i=$row_card[id];
			
		$day = strtotime($end) - strtotime($daynow);
			
		$valid=ceil ($day / (60*60*24));
		return  array($valid,$i);
	 }
 

  ?>