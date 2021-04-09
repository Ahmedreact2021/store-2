<? //session_start();?>
<link href="style.css" rel="stylesheet" type="text/css">
<script src="astm.js"></script>
<SCRIPT LANGUAGE="JavaScript">


function MYFOTO (img){
  foto1= new Image();
  foto1.src=(img);
  Controlla(img);
}
function Controlla(img){
  if((foto1.width!=0)&&(foto1.height!=0)){
    viewFoto(img);
  }
  else{
    funzione="Controlla('"+img+"')";
    intervallo=setTimeout(funzione,20);
  }
}
function viewFoto(img){
  largh=foto1.width+20;
  altez=foto1.height+20;
  stringa="width="+largh+",height="+altez;
  finestra=window.open(img,"",stringa);
}
</SCRIPT>
<?

/////////////////

$user_prof=mysql_query("select * from $Table_usrs where user_id='$id' and login='true'");

if(mysql_num_rows($user_prof)<>0){

$row_user_prof=mysql_fetch_array($user_prof);
 /*---------------------filter words----------*/
/*/
$words=mysql_fetch_array(mysql_query("select txt from $Table_pages where name='disallowwords'")); 
	 		require_once('filter.string.class.php');/*/  
		 /*/
	   $filter = new Filter_String;
	   $words=explode(',',$words[0]);
	   $filter->strings=$words;  
	/*/
	
       /*------*/
	  /*/ 
	   $filter->text = $row_user_prof[UserName]; 
	   $UserName = $filter->filter(); 
	    /*------*/
	  /*/ 
	   $filter->text = $row_user_prof[Name];  
	   $Name = $filter->filter();  
	   /*------*/
	  /*/ 
	   $filter->text = $row_user_prof[personal];  
	   $personal = $filter->filter();
	   /*------*/
	  /*/ 
	   $filter->text = $row_user_prof[wife];  
	   $wife = $filter->filter();
	      
   
/*---------------------------------------------*/ 
$email=$row_user_prof[EMail];	  

if($row_user_prof[Gender]=="female"){$user_kind='«·⁄÷Ê…';$empty="·„  –ﬂ—"; }else{$user_kind='«·⁄÷Ê';$empty="·„ Ì–ﬂ—"; }

////////////////

if($_SERVER['REQUEST_METHOD']=="POST" && $sendmsg=="sendmsg" ){
if($_POST["vercode"] == $_SESSION["vercod"] && $_POST["vercode"]!="")
{
	$day=date("Y-m-d");
	
	$MailTitle=strip_tags($MailTitle);
	
	$mailBody=strip_tags($mailBody,"\n");
	
	$mailBody=str_replace("\n","<br>",$mailBody);
	
	$res_message=mysql_query("select * from $Table_mailbox where User_Id='$id' and UserFromID='$_SESSION[Site_User_ID]' and MailTitle='$Mailtitle' and MailBody='$mailBody' and MailDate='$day' and SmilyeID='$Smiley'");
	
	$res=mysql_fetch_array( mysql_query("select Nationalty_id from $Table_usrs where User_Id='$_SESSION[Site_User_ID]'"));
	
	$allow_send=false;
	if(mysql_num_rows($res_message)==0)
		{
		  $contries=explode(',',$row_user_prof[wife_Nationalty]);
		  for($i=0;$i<count($contries);$i++)
		  {
		 	 if($res[0]==$contries[$i])
			 {
				 $allow_send=true;
				 break;
			 }
			 
		  }
		
		if($allow_send==false)
		{
			$IsPremium=mysql_fetch_array(mysql_query("select balance from $Table_setting where sid='1'"));
			if($IsPremium[balance]=='0')
			  {mysql_query("insert into $Table_mailbox set User_Id='$id',UserFromID='$_SESSION[Site_User_ID]',MailTitle='$Mailtitle',MailBody='$mailBody',MailDate='$day',SmilyeID='$Smiley',m_reads='0'");
		
		mail_msg($id,$email,$Site_mail,$Site_url);
		$send='done';}
		else{
			
		  if($_SESSION[Site_User_Card]!=0  )
 			 {
		mysql_query("insert into $Table_mailbox set User_Id='$id',UserFromID='$_SESSION[Site_User_ID]',MailTitle='$Mailtitle',MailBody='$mailBody',MailDate='$day',SmilyeID='$Smiley',m_reads='0'");
		
		mail_msg($id,$email,$Site_mail,$Site_url);
		$send='done';
		
		     }
			 else
			 {
			 
               $datenow=date('Y-m-d');
                 $MessageCountToday=mysql_fetch_array(mysql_query("select count(*) from $Table_mailbox where UserFromID='$_SESSION[Site_User_ID]'                                      and MailDate='$datenow'"));
				 $Gender=mysql_fetch_array( mysql_query("select Gender from $Table_usrs where user_id='$_SESSION[Site_User_ID]'"));
				 $MaleCountMessage=mysql_fetch_array(mysql_query("select male_freesendmessage from $Table_setting where sid='1'"));
				 $FemaleCountMessage=mysql_fetch_array(mysql_query("select female_freesendmessage from $Table_setting where sid='1'"));
				 if($Gender[0]=='male'){
				                         if($MessageCountToday[0]>=$MaleCountMessage[0])
										 {?><script language="javascript">alert("⁄–—« ·« Ì„ﬂ‰ﬂ «—”«· «·„“Ìœ „‰ «·—”«∆· Õ Ï Ì „ ‘Õ‰ «·—’Ìœ");</script><? }
										 else{mysql_query("insert into $Table_mailbox set User_Id='$id',UserFromID='$_SESSION[Site_User_ID]',MailTitle='$Mailtitle',MailBody='$mailBody',MailDate='$day',SmilyeID='$Smiley',m_reads='0'");
		
		mail_msg($id,$email,$Site_mail,$Site_url);
		$send='done';}
										 
									   }
				 elseif($Gender[0]=='female')
				                       {
				                         if($MessageCountToday[0]>=$FemaleCountMessage[0])
										 {?><script language="javascript">alert("⁄–—« ·« Ì„ﬂ‰ﬂ «—”«· «·„“Ìœ „‰ «·—”«∆· Õ Ï Ì „ ‘Õ‰ «·—’Ìœ");</script><? } 
										 else {mysql_query("insert into $Table_mailbox set User_Id='$id',UserFromID='$_SESSION[Site_User_ID]',MailTitle='$Mailtitle',MailBody='$mailBody',MailDate='$day',SmilyeID='$Smiley',m_reads='0'");
		
		mail_msg($id,$email,$Site_mail,$Site_url);
		$send='done'; }

									   }
				 
				 
			 }
			 
			}
		}
		
	}  
	
	

}
else
{?> 
	<table width="90%"  border="0" align="center" cellpadding="0" cellspacing="2" class="border_site">
	
	<tr>
	
	<td height="30" align="center" bgcolor="#EEF5F9" ><table width="100%"  border="0" cellpadding="0" cellspacing="2">
	
		<tr>
	
		  <td width="63%" align="right" class="textorange">«·—Ã«¡ «·⁄Êœ… Êﬂ «»… —„“ «· «ﬂÌœ »‘ﬂ· ’ÕÌÕ</td>
	
		  <td width="37%"><img src="images/do.gif" width="48" height="48"></td>
	
		</tr>
	
	  </table></td>
	
	</tr>
	
	</table><? }
}
?>
<? if($allow_send==true){?>

<br>

<table width="90%"  border="0" align="center" cellpadding="0" cellspacing="2" class="border_site">

<tr>

<td height="30" align="center" bgcolor="#EEF5F9" ><table width="100%"  border="0" cellpadding="0" cellspacing="2">

    <tr>
<? $con=mysql_fetch_array( mysql_query("select co_name from $Table_country where co_id='$res[0]'")); ?>

      <td width="63%" align="right" class="textorange">Â–« «·⁄÷Ê ·« Ì—€» »«” ﬁ»«· «·—”«∆· „‰ «·Ã‰”Ì… <? echo $con[0]; ?></td>

      <td width="37%"><img src="images/do.gif" width="48" height="48"></td>

    </tr>

  </table></td>

</tr>

</table>

<br>

<? }?>



<? if($send=='done'){?>

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



<table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" valign="top">

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="2"  >

<tr align="center" bgcolor="#EEF5F9">

<? $image="'"."../$row_user_prof[image]"."'" ?>
<td  class="textred"><? if($row_user_prof[allow_img]==1 && $row_user_prof[image]!='false'){?><A href="javascript:MYFOTO('<? echo $row_user_prof[image];?>')"><IMG src="<? echo $row_user_prof[image];?>" border="0" width="120" height="100" title="«÷€ÿ ⁄·Ï «·’Ê—… · ŸÂ— »«·ÕÃ„ «·ÿ»Ì⁄Ì"></A><? }else{if($row_user_prof[Gender]=='male'){?><IMG src="images/img_male.gif" border="0" width="120" height="100"<? }else{?><IMG src="images/img_female.gif" border="0" width="120" height="100"<? } }?></td>


 <td height="30" colspan="2"  class="textred" dir="rtl">»Ì«‰«  &nbsp;<?=$user_kind;?> &nbsp;

<span class="textblack"><?=$UserName?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? if($row_user_prof[online]=="true"){?><img src="images/online.gif" border="0" title="„ Ê«Ãœ »«·„Êﬁ⁄"><? }?></span>

</td>


</tr>

<tr align="center" valign="middle" bgcolor="#EEF5F9" height="100">

<td  colspan="2" class="textsite" dir="rtl">

«‰« ≈”„Ì <span class="textblack"><? if(!empty($row_user_prof[Name])){echo $Name;}else{echo $empty;}?></span> &nbsp;°&nbsp;

<span class="textblack"><? if($row_user_prof[Gender]=="female"){echo "«‰ÀÏ";}else{echo "–ﬂ—";}?></span>&nbsp;°&nbsp;

Ê⁄„—Ì  <span class="textblack"><?=$row_user_prof[Age]?></span>&nbsp;°&nbsp;

ÊÃ‰”Ì Ï 

<span class="textblack">

<?

$nation=mysql_query("select * from $Table_country where co_id='$row_user_prof[Nationalty_id]'");

$row_nation=mysql_fetch_array($nation);

echo $row_nation[co_name];

mysql_free_result($nation);

?></span>&nbsp;°&nbsp;

Ê√ﬁÌ„ ›Ì œÊ·…

<span class="textblack">

<?

$country=mysql_query("select * from $Table_country where co_id='$row_user_prof[Country_id]'");

$country_row=mysql_fetch_array($country);

echo $country_row[co_name];

mysql_free_result($country);

?></span>&nbsp;°&nbsp;

ÊÕ«· Ì «·≈Ã „«⁄Ì… 

<span class="textblack"><? if(!empty($row_user_prof[MaritalStatus])){echo $row_user_prof[MaritalStatus];}else{echo $empty;}?></span>&nbsp;°&nbsp;

Ê„Â‰ Ì ÂÏ 

<span class="textblack"><? if(!empty($row_user_prof[Profession])){echo $row_user_prof[Profession];}else{echo $empty;}?></span>&nbsp;°&nbsp;

Ê „ƒÂ·Ì «·⁄„·Ì ÂÊ

<span class="textblack"><? if(!empty($row_user_prof[Education])){echo $row_user_prof[Education];}else{echo $empty;}?></span>

</td>

</tr>

<tr align="center" valign="middle" bgcolor="#EEF5F9">

  <td height="30" colspan="2"><span class="textsite"><span class="textred">«„« ⁄‰ „Ê«’›« Ï «·‘Œ’Ì… ›ÂÏ ﬂ«· «·Ï</span>  </span></td>

</tr>

<tr align="center" valign="middle" bgcolor="#EEF5F9" height="100">

  <td height="25" colspan="2" dir="rtl"><span class="textsite">«‰« œÌ«‰ Ï <span class="textblack">

    <? if(!empty($row_user_prof[Religion])){echo $row_user_prof[Religion];}else{echo $empty;}?>

  </span>&nbsp;°&nbsp; « ﬂ·„ «··€… <span class="textblack">

  <? if(!empty($row_user_prof[Language])){echo $row_user_prof[Language];}else{echo $empty;}?>

  </span>&nbsp;°&nbsp; Ê“‰Ï <span class="textblack">

  <? if(!empty($row_user_prof[Weight])){echo $row_user_prof[Weight];}else{echo $empty;}?>

  </span>&nbsp;°&nbsp; ÊÿÊ·Ï <span class="textblack">

  <? if(!empty($row_user_prof[Height])){echo $row_user_prof[Height];}else{echo $empty;}?>

  </span>&nbsp;°&nbsp; ÊÃ”„Ï <span class="textblack">

  <? if(!empty($row_user_prof[Build])){echo $row_user_prof[Build];}else{echo $empty;}?>

  </span>&nbsp;°&nbsp; Ê·Ê‰ ⁄ÌÊ‰Ï <span class="textblack">

  <? if(!empty($row_user_prof[EyeColor])){echo $row_user_prof[EyeColor];}else{echo $empty;}?>

  </span>&nbsp;°&nbsp; Ê·Ê‰ ‘⁄—Ï <span class="textblack">

  <? if(!empty($row_user_prof[HairColor])){echo $row_user_prof[HairColor];}else{echo $empty;}?>

  </span>  </span></td>

</tr>

<tr align="center" bgcolor="#EEF5F9">

  <td height="30" colspan="2" valign="top"><span class="textsite"><span class="textred">„Ê«’›«  «Œ—Ï ⁄‰Ï</span>  </span></td>

</tr>

<tr align="center" valign="middle" bgcolor="#EEF5F9">

  <td height="76" colspan="2" dir="rtl"><span class="textsite"><span class="textblack">

    <? if(!empty($row_user_prof[personal])){echo $personal;}else{echo $empty;}?>

  </span></span></td>

</tr>

<tr align="center" valign="middle" bgcolor="#EEF5F9">

  <td height="30" colspan="2"><span class="textsite"><span class="textred">«·„Ê«’›«  «· Ï «—€»  Ê«ÃœÂ« ›Ï ‘—Ìﬂ «·ÕÌ«…</span>  </span></td>

</tr>

<tr align="center" valign="middle" bgcolor="#EEF5F9">

  <td height="78" colspan="2" dir="rtl"><span class="textsite"><span class="textblack">

    <? if(!empty($row_user_prof[wife])){echo $wife;}else{echo $empty;}?>

  </span></span></td>

  </tr>

<tr bgcolor="#EEF5F9">

<td width="50%" align="right"><table width="100%"  border="0" cellspacing="0" cellpadding="2">

  <tr>
   

   
    <td align="right"><span style="cursor:pointer" class="textheader" title="«÷› <?=$UserName?> «·Ï ﬁ«∆„… «·«’œﬁ«¡" class="textheader" <? if(empty($_SESSION[Site_User_ID]) || empty($_SESSION[Site_User]) /*|| empty($_SESSION[Site_User_Card]) */){?> onClick="EC('astm_send',this);" <? }else{?> onClick="open('AddFav.php?Id=<?=$row_user_prof[user_id];?>&type=AddFav','k','screenX=1000,screenY=1000,toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=1,width=300,height=120')"<? }?>>÷› «·Ï «·ﬁ«∆„…</span></td>

    <td align="left"><img src="images/add.gif" width="40" height="35"></td>

  </tr>

</table></td>

<td width="50%" height="45" align="left" bgcolor="#EEF5F9" class="textheader"><table width="100%"  border="0" cellspacing="2" cellpadding="0">

  <tr>

    <td width="50%" align="right" ><span style="cursor:pointer" class="textheader" title="«—”· —”«·… Œ«’…" onclick="EC('astm_send',this);">«—”· —”«·… Œ«’… </span></td>

    <td width="50%" align="left"><img src="images/send.gif" width="40" height="35"></td>

  </tr>

</table></td>

</tr>


<tr >
 <? if(isset($_SESSION[Site_User_ID])){?>
 <td colspan="2" align="center"> 
 
 <span style="cursor:pointer" class="textheader" title=" ’ÊÌ  ·«Ìﬁ«› «·⁄÷Ê<?=$UserName?>" class="textheader"  onClick="open('stopuser.php?UserName=<?=$UserName?>&type=stopuser','k','screenX=1000,screenY=1000,toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=1,width=300,height=120')" >  ’ÊÌ  ·«Ìﬁ«› Â–« «·⁄÷Ê »”»»</span><img src="images/alert.png" width="40" height="35"></td>
<? }?></tr>


<tr bgcolor="#EEF5F9">

  <td colspan="2" align="right" valign="top" id='astm_send' style="display:none;">



<? if(empty($_SESSION[Site_User_ID]) || empty($_SESSION[Site_User])){include("Alert_1.php"); /*}elseif(empty($_SESSION[Site_User_Card])){include("Alert_2.php"); */}else{?>
 
<form action="" method="post" name="Message" style="margin-bottom:0; margin-left:0; margin-right:0; margin-top:0" onSubmit="return astm_Message();">

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="2" class="border_site">

<tr align="center" valign="middle" bgcolor="#EEF5F9">

<td height="30" colspan="2" class="textheader">«—”· —”«·… Œ«’… </td>

</tr>

<tr bgcolor="#EEF5F9">

<td colspan="2" align="right" valign="top" bgcolor="#EEF5F9"><table width="358" border="0" align="center" cellpadding="0" cellspacing="2">

<tr align="center">

<td width="393" valign="top"><div align="right"> <span class="style8 style6">

<input name="Mailtitle" type="text" class="textblack"  id="Mailtitle" dir="rtl" value="<?=$Mailtitle?>" style="width:392 " size="25" maxlength="100">

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

<td height="50" colspan="2">
<table width="347" >
  <tr>
    <td width="92" align="center" style="width:50" ><img src="captcha.php"></td>
			  <td width="239" align="left" class="textsite"><input type="text" name="vercode" style="width:65" >	Ì—ÃÏ «œŒ«· —„“ «· «ﬂÌœ ›Ì «·„—»⁄ </td>
  </tr>
</table>

<input name="Submit2" type="submit" value="√—”«· «·—”«·Â">

<input name="sendmsg" type="hidden" id="sendmsg" value="sendmsg"></td>

</tr>

</table></td>

</tr>

</table>

</form>

<? }?> 

  

  </td>

  </tr>

</table>

    </td>
    
    <td class="sizeadv600_160" valign="middle" align="right" ><? adv(all_pages,'images/160_600.jpg');?></td>

  </tr>

</table>

<? };mysql_free_result($user_prof);?>

