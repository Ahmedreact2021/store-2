<?

if(isset($O_id)){$Condition1="UserFromID='$_SESSION[Site_User_ID]'";$Condition2="user_id='$row_msg[User_Id]'";$id=$O_id;$txt_title='«·Ï';$page_title='«·»—Ìœ «·’«œ—';}

if(isset($I_id)){$Condition1="User_Id='$_SESSION[Site_User_ID]'";$Condition2="user_id='$row_msg[UserFromID]'";$id=$I_id;$txt_title='„‰';$page_title='«·»—Ìœ «·Ê«—œ';}


$res_msg=mysql_query("select * from $Table_mailbox where ".$Condition1." and Mail_id='$id'");

if(mysql_num_rows($res_msg)){

$row_msg=mysql_fetch_array($res_msg);

///////////////

if(isset($I_id)){

mysql_query("update $Table_mailbox  set m_reads='1' where User_Id='$_SESSION[Site_User_ID]' and Mail_id='$id' ");

}

///////////////

if(isset($O_id)){$Condition2="user_id='$row_msg[User_Id]'";}

if(isset($I_id)){$Condition2="user_id='$row_msg[UserFromID]'";}

$res_user=mysql_query("select * from $Table_usrs where ".$Condition2."");

$row_user=mysql_fetch_array($res_user);

$user_name=$row_user[UserName];

$user_id=$row_user[user_id];

$user_Gender=$row_user[Gender];

mysql_free_result($res_user);

////////////////

if($_SERVER['REQUEST_METHOD']=="POST" && $sendmsg=="sendmsg"){
$day=date("Y-m-d");
$MailTitle=strip_tags($MailTitle);
$mailBody=strip_tags($mailBody,"\n");
$mailBody=str_replace("\n","<br>",$mailBody);

$res_message=mysql_query("select * from $Table_mailbox where User_Id='$user_id' and UserFromID='$_SESSION[Site_User_ID]' and MailTitle='$Mailtitle' and MailBody='$mailBody' and MailDate='$day' and SmilyeID='$Smiley'");

if(mysql_num_rows($res_message)==0)
{
  
   mysql_query("insert into $Table_mailbox set                                               	  									  User_Id='$user_id',UserFromID='$_SESSION[Site_User_ID]',MailTitle='$Mailtitle',MailBody='$mailBody',MailDate='$day',SmilyeID='$Smiley',m_reads='0'");

mail_msg($id,$email,$Site_mail,$Site_url);

}  

$send='done'; 

}
/*---------------------filter words-------------------*/
   $words=mysql_fetch_array(mysql_query("select txt from $Table_pages where name='disallowwords'")); 
   
     
	   require_once('filter.string.class.php');  
		 
	   $filter = new Filter_String;
	   $words=explode(',',$words[0]);
	   $filter->strings=$words;
	   $filter->text = $row_msg[MailBody];  
	   $MailBody = $filter->filter(); 


	   /*-----*/
 
	   $filter->text = $row_msg[MailTitle];  
	   $MailTitle = $filter->filter();
	    
	   /*-----*/
 
	   $filter->text = $user_name;  
	   $new_user_name = $filter->filter();

	     
   
/*---------------------------------------------*/

if($send=='done'){

 ?>

<br>

<table width="90%"  border="0" align="center" cellpadding="0" cellspacing="2" class="border_site">

<tr>

<td height="30" align="center" bgcolor="#EEF5F9" ><table width="100%"  border="0" cellpadding="0" cellspacing="2">

    <tr>

      <td width="63%" align="right" class="textorange"> „ «—”«· «·—”«·… »‰Ã«Õ </td>

      <td width="37%"><img src="images/do.gif" width="48" height="48"></td>

    </tr>

  </table></td>

</tr>

</table>

<br>

<? }?>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

        <tr>

          <td width="92%" align="right" bgcolor="#187EA6" class="textwhite"> ›«’Ì· «·—”«·… &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>

        </tr>

    </table></td>

  </tr>

  <tr>

    <td align="center" valign="top" class="border_site"><table width="100%"  border="0" cellspacing="2" cellpadding="1">

        <tr align="center">

          <td height="25" colspan="2"  ><table width="100%"  border="0" cellspacing="2" cellpadding="0">

  <tr>

    <td width="85%" align="right" class="textsite" dir="rtl"><span class="textred"> ‰»Ì… :</span> 

		  «–« ﬂ‰   —Ï ›Ì Â–Â «·—”«·… „« ÌŒ· »«·√œ» «Ê «·«Œ·«ﬁ 

		  <br>

		  «Ê «‰ ÌﬂÊ‰ €—÷ «·—”«·…  ﬂÊÌ‰ ’œ«ﬁ«  

		  „‰ ›÷·ﬂ  

		  <a href="?Plink=supervisor" title="«»·€ «·«œ«—…" class="textblack">«»·€ «·«œ«—…</a></td>

    <td width="15%" align="left"><img src="images/alert.png" width="48" height="48"></td>

  </tr>

</table>

</td>

        </tr>

        <tr>

          <td width="92%" align="right"  class="border_site" dir="rtl">
		  <? if($user_id==1) {echo $new_user_name;} ?>
		  <? if($user_id!=1) {?>
		    <a href="?Plink=profile&id=<?=$user_id?>" class="textblack" title="<?=$new_user_name?>"><?=$new_user_name?></a><? }?>
		  </td>

          <td width="8%" height="25" align="center" bgcolor="#187EA6" class="textwhite"><?=$txt_title?></td>

        </tr>

        <tr>

          <td align="right"  class="border_site" dir="rtl"><span class="textblack"><?=$row_msg[MailDate]?></span></td>

          <td height="25" align="center" bgcolor="#187EA6" class="textwhite">«· «—ÌŒ</td>

        </tr>

        <tr>

          <td align="right"  class="border_site" dir="rtl"><span class="textblack"><?=$MailTitle?></span></td>

          <td height="25" align="center" bgcolor="#187EA6" class="textwhite">«·⁄‰Ê«‰</td>

        </tr>

        <tr>

          <td align="right"  class="border_site" dir="rtl"><span class="textblack"><?=$MailBody?></span></td>

          <td height="25" align="center" valign="top" bgcolor="#187EA6" class="textwhite">«·—”«·…</td>

        </tr>

        <tr align="right" bgcolor="#187EA6">

          <td height="25" colspan="2"><table width="100%"  border="0" cellspacing="2" cellpadding="0">

            <tr>

              <!---<td width="3%" align="center"><a href="?Plink=<?=$Plink?>" onClick="return yesorno ('Â· «‰  „ √ﬂœ „‰ Õ–› «·—”«·… ø')"><img src="images/del.gif" alt="Õ–›" width="20" height="17" border="0"></a></td>--->

              <td width="3%" align="center"><a href="?Plink=profile&id=<?=$user_id?>" class="textblack" title="<?=$new_user_name?>"><img src="images/<? if($user_Gender=="female"){echo "sfe";}else{echo "s";}?>male.gif" alt="‘«Âœ «·»Ì«‰«  «·‘Œ’Ì…" width="12" height="16" border="0"></a></td>

              <td width="94%"><a href="javascript:history.back();"><img src="images/back.gif" width="15" height="15" border="0" title="⁄Êœ… «·Ï <?=$page_title?>"></a></td>

            </tr>

          </table></td>

        </tr>

<? if(isset($I_id)){?>

<!----------------------------->
  <? if($user_id!=1) {?>
<tr>

<td colspan="2">

<table width="100%"  border="0" cellpadding="0" cellspacing="0">

<tr>

<td width="92%" align="right" bgcolor="#187EA6" class="textwhite" dir="rtl">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;·«—”«· —œ ⁄·Ï —”«·… <?=$user_name?> </td>

<td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>

</tr>

</table></td>

</tr>

<tr bgcolor="#EEF5F9">

<td colspan="2">

<form action="" method="post" name="Message" style="margin-bottom:0; margin-left:0; margin-right:0; margin-top:0" onSubmit="return astm_Message();">

<table width="358" border="0" align="center" cellpadding="0" cellspacing="2">

  <tr align="center">

    <td width="393" valign="top"><div align="right"> <span class="style8 style6">

        <input name="Mailtitle" type="text" class="textblack"  id="Mailtitle" dir="rtl" value="<?=$MailTitle?>" style="width:392 " size="25" maxlength="100">

    </span> </div></td>

    <td width="107" valign="top" class="textsite">⁄‰Ê«‰ «·—”«·…</td>

  </tr>

  <tr align="center">

    <td colspan="2" valign="top"><textarea name="mailBody" cols="90" rows="12" class="textblack"   id="mailBody" dir="rtl"></textarea></td>

  </tr>

  <tr>

    <td colspan="2" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" dir="ltr">

        <tr align="center">

          <td height="30" colspan="7"><span class="textsite">«Œ «— «» ”«„… „⁄»—… „⁄ «·—”«·… </span></td>

        </tr>

        <tr align="center">

          <td width="14%"><input name="Smiley" type="radio" value="7">

              <img src="smilies/smile%20(7).gif" width="22" height="22"></td>

          <td width="15%"><input name="Smiley" type="radio" value="6">

              <img src="smilies/smile%20(6).gif" width="22" height="18"></td>

          <td width="14%"><input name="Smiley" type="radio" value="5">

              <img src="smilies/smile%20(5).gif" width="21" height="21"></td>

          <td width="16%"><input name="Smiley" type="radio" value="4">

              <img src="smilies/smile%20(4).gif" width="20" height="21"> </td>

          <td width="15%"><input name="Smiley" type="radio" value="3">

              <img src="smilies/smile%20(3).gif" width="19" height="22"> </td>

          <td width="14%"><input name="Smiley" type="radio" value="2">

              <img src="smilies/smile%20(2).gif" width="20" height="20"></td>

          <td width="12%"><input name="Smiley" type="radio" value="1" checked>

              <img src="smilies/smile%20(1).gif" width="20" height="21"></td>

        </tr>

        <tr align="center">

          <td><input name="Smiley" type="radio" value="14">

              <img src="smilies/smile%20(14).gif" width="23" height="20"> </td>

          <td><input name="Smiley" type="radio" value="13">

              <img src="smilies/smile%20(13).gif" width="20" height="21"> </td>

          <td><input name="Smiley" type="radio" value="12">

              <img src="smilies/smile%20(12).gif" width="21" height="22"> </td>

          <td><input name="Smiley" type="radio" value="11">

              <img src="smilies/smile%20(11).gif" width="22" height="20"> </td>

          <td><input name="Smiley" type="radio" value="10">

              <img src="smilies/smile%20(10).gif" width="20" height="20"> </td>

          <td><input name="Smiley" type="radio" value="9">

              <img src="smilies/smile%20(9).gif" width="22" height="22"></td>

          <td><input name="Smiley" type="radio" value="8">

              <img src="smilies/smile%20(8).gif" width="22" height="21"></td>

        </tr>

        <tr align="center">

          <td><input name="Smiley" type="radio" value="21">

              <img src="smilies/smile%20(21).gif" width="17" height="17"></td>

          <td><input name="Smiley" type="radio" value="20">

              <img src="smilies/smile%20(20).gif" width="20" height="20"> </td>

          <td><input name="Smiley" type="radio" value="19">

              <img src="smilies/smile%20(19).gif" width="17" height="17"></td>

          <td><input name="Smiley" type="radio" value="18">

              <img src="smilies/smile%20(18).gif" width="17" height="17"></td>

          <td><input name="Smiley" type="radio" value="17">

              <img src="smilies/smile%20(17).gif" width="17" height="17"> </td>

          <td><input name="Smiley" type="radio" value="16">

              <img src="smilies/smile%20(16).gif" width="17" height="17"></td>

          <td><input name="Smiley" type="radio" value="15">

              <img src="smilies/smile%20(15).gif" width="17" height="17"> </td>

        </tr>

        <tr align="center">

          <td><input name="Smiley" type="radio" value="28">

              <img src="smilies/smile%20(28).gif" width="17" height="17"></td>

          <td><input name="Smiley" type="radio" value="27">

              <img src="smilies/smile%20(27).gif" width="17" height="17"> </td>

          <td><input name="Smiley" type="radio" value="26">

              <img src="smilies/smile%20(26).gif" width="17" height="17"></td>

          <td><input name="Smiley" type="radio" value="25">

              <img src="smilies/smile%20(25).gif" width="17" height="17"> </td>

          <td><input name="Smiley" type="radio" value="24">

              <img src="smilies/smile%20(24).gif" width="17" height="17"> </td>

          <td><input name="Smiley" type="radio" value="23">

              <img src="smilies/smile%20(23).gif" width="17" height="17"> </td>

          <td><input name="Smiley" type="radio" value="22">

              <img src="smilies/smile%20(22).gif" width="17" height="17"></td>

        </tr>

        <tr align="center">

          <td><input name="Smiley" type="radio" value="36">

              <img src="smilies/smile%20(36).gif" width="17" height="17"></td>

          <td><input name="Smiley" type="radio" value="34">

              <img src="smilies/smile%20(34).gif" width="17" height="17"></td>

          <td><input name="Smiley" type="radio" value="33">

              <img src="smilies/smile%20(33).gif" width="23" height="17"> </td>

          <td><input name="Smiley" type="radio" value="32">

              <img src="smilies/smile%20(32).gif" width="23" height="17"> </td>

          <td><input name="Smiley" type="radio" value="31">

              <img src="smilies/smile%20(31).gif" width="17" height="17"> </td>

          <td><input name="Smiley" type="radio" value="30">

              <img src="smilies/smile%20(30).gif" width="17" height="17"> </td>

          <td><input name="Smiley" type="radio" value="29">

              <img src="smilies/smile%20(29).gif" width="17" height="17"> </td>

        </tr>

        <tr align="center">

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td><input name="Smiley" type="radio" value="39">

              <img src="smilies/smile%20(39).gif" width="23" height="20"></td>

          <td><input name="Smiley" type="radio" value="42">

              <img src="smilies/smile%20(42).gif" width="18" height="17"></td>

          <td><input name="Smiley" type="radio" value="41">

              <img src="smilies/smile%20(41).gif" width="17" height="17"> </td>

          <td><input name="Smiley" type="radio" value="40">

              <img src="smilies/smile%20(40).gif" width="17" height="17"></td>

          <td><input name="Smiley" type="radio" value="38">

              <img src="smilies/smile%20(38).gif" width="17" height="17"> </td>

        </tr>

    </table></td>

  </tr>

  <tr align="center" valign="middle">

    <td height="50" colspan="2"><input name="Submit2" type="submit" value="√—”«· «·—”«·Â">

        <input name="sendmsg" type="hidden" id="sendmsg" value="sendmsg"></td>

  </tr>

</table>

</form>

</td>

</tr>
   <? }?>
<!----------------------------->

<? }?>



      </table></td>

  </tr>

</table>

<?

}

mysql_free_result($res_msg);

?>