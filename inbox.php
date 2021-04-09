<?

if(empty($_SESSION[Site_User_ID]) || empty($_SESSION[Site_User])){include("Alert_1.php");
}else{



if($_SERVER['REQUEST_METHOD']=="POST"){

	if($dell=="del_msg")

	{

		for($i=0;$i<= count($c);$i++)

		{

		mysql_query("delete from  $Table_mailbox  where Mail_id='$c[$i]'");

		} // end for

	}  // end if

}



$res_box=mysql_query("select * from $Table_mailbox where User_Id='$_SESSION[Site_User_ID]' order by Mail_id desc");

$num = mysql_num_rows($res_box);

///////////////////////////////

$pp= 20;

if(!$_GET["pageno"])

{

$pageno = 0;

$prev = "<font><< Previous $pp</font>";

}

else

{

$pageno = $_GET["pageno"];

}

$a = $pageno * $pp;

$b = $a + $pp - $pageno * $pp;

$pagenos = $num / $pp;

$pagenoplus = $pageno + 1;

$pagenomin = $pageno - 1;

if($pageno + 1 < $pagenos OR $pagenoplus=="$pagenos")

{

$next = "<a href='?Plink=$Plink&pageno=$pagenoplus' title='«· «·Ì $pp >>' dir='rtl' class='textwhite'>ª</a>";

}

if($pageno - 1 < $pagenos AND $pageno)

{

$prev = "<a href='?Plink=$Plink&pageno=$pagenomin' title='<< «·”«»ﬁ $pp' dir='ltr' class='textwhite'>ª</a>";

}

else

{

$prev = "<font color='#EEF5F9' class='textwhite' dir='ltr'>ª</font>";

}

if($pagenoplus > $pagenos)

{

$next = "<font color='#EEF5F9' class='textwhite' dir=rtl>ª</font>";

}

function pageno_records($pageno,$pagenos,$Plink){

?>

<link href="style.css" rel="stylesheet" type="text/css">



<table align="center" width="50%">

<tr>

<?

if ($pagenos>9){$toppagenos=9; $dotz="...";}

else {$toppagenos=$pagenos;} 

for ($i=0; $i <= $toppagenos;$i++){ 

$maa=$i+1;

if($i!=$pageno){ 

echo"<td align=center dir=rtl onMouseOver=bgColor='#DEECF3'  onMouseOut=bgColor='' style=' border-bottom: 1px solid #EEF5F9; border-right: 1px solid #EEF5F9; border-left: 1px solid #EEF5F9;border-top: 1px solid #EEF5F9'><a class=textwhite href=\"?Plink=$Plink&pageno=$i\">$maa</a></td>"; 

} 

else 

{ 

echo "<td  align=center dir=rtl class=textwhite  style=' border-bottom: 1px solid #EEF5F9; border-right: 1px solid #EEF5F9; border-left: 1px solid #EEF5F9;border-top: 1px solid #EEF5F9'>$maa</td>"; 

}

}

?>

<td><? $dotz?></td>

</tr>

</table>

<?

} // function

$res_box=mysql_query("select * from $Table_mailbox where User_Id='$_SESSION[Site_User_ID]' order by Mail_id desc LIMIT $a,$b");

///////////////////////////////////////////

?>

<form action="" name="theForm" method="post" style="margin-bottom:0; margin-left:0; margin-right:0; margin-top:0"> 

<table width="100%"  border="0" cellpadding="0" cellspacing="2" class="border_site">

  <tr align="center" >

    <td height="25" colspan="6"  class="textwhite">

	

	<table width="100%"  border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="92%" align="right" bgcolor="#187EA6" class="textwhite" dir="rtl">&nbsp;&nbsp;&nbsp;«·»—œ «·Ê«—œ  (&nbsp;<?=$num?>&nbsp;)</td>

        <td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>

      </tr>

    </table>

    </td>

  </tr>

  <? if($num<>0){?>  


  <tr align="center" bgcolor="#187EA6" class="textwhite">

    <td width="7%">Õ–›</td>

    <td width="7%">«·Õ«·…</td>

    <td width="13%"> «—ÌŒ «·—”«·… </td>

    <td width="23%">„‰</td>

    <td height="25" colspan="2">«·⁄‰Ê«‰</td>

  </tr>

<? 

while($row_box=mysql_fetch_array($res_box)){

$res_send=mysql_query("select * from $Table_usrs where user_id='$row_box[UserFromID]'");

$row_send=mysql_fetch_array($res_send);

if($row_box[m_reads]<>"0"){$bg_msg="#EEF5F9";}else{$bg_msg="#DEECF3";}
/*---------------------filter words-------------------*/
   $words=mysql_fetch_array(mysql_query("select txt from $Table_pages where name='disallowwords'")); 
     
	   require_once('filter.string.class.php') ;   
	   $words=explode(',',$words[0]);
		
	   $filter = new Filter_String;  
	 
        $filter->strings=$words;
	   
	   $filter->text = $row_box[MailTitle];  
	   $MailTitle = $filter->filter();  
	   /*-------------------------------*/

?>

<tr align="center" bgcolor="<?=$bg_msg?>" onMouseMove="bgColor='#EEF5F9'" onMouseOut="bgColor='<?=$bg_msg?>'">

<td  class="textblack"   dir="rtl"><input name="c[]" type="checkbox" id="c[]" value="<?=$row_box[Mail_id]?>"></td>

<td  class="textblack"    dir="rtl"><img src="images/<? if($row_box[m_reads]=="0"){echo "mail.gif";$alt_msg='·„ Ì „ › Õ «·—”«·… Õ Ï «·«‰';}else{echo "opmail.gif";$alt_msg=' „ ﬁ—√Â «·—”«·…';}?>" alt="<?=$alt_msg?>"></td>

<td  class="textblack" dir="rtl"><?=$row_box[MailDate]?></td>

<td    dir="rtl">
 <? if($row_box[UserFromID]==1) {echo $row_send[UserName];} ?>
		  <? if($row_box[UserFromID]!=1) {?>
<a href="?Plink=profile&id=<?=$row_box[UserFromID]?>" class="textblack" title="<?=$row_send[UserName]?>"><?=$row_send[UserName]?></a><? }?></td>

<td width="47%" height="25" dir="rtl"><a href="?Plink=message&I_id=<?=$row_box[Mail_id]?>" class="textblack" title="<?=$MailTitle?>"><? if(strlen($MailTitle)>25){echo substr($MailTitle,0,25)."...";}else{echo $MailTitle;}?></a></td>

<td width="3%" dir="rtl"><img src="smilies/smile%20(<?=$row_box[SmilyeID]?>).gif" ></td>

</tr>

<? mysql_free_result($res_send);}?>

  <tr align="center" bgcolor="#187EA6">

    <td><input name="dell" type="hidden" id="dell" value="del_msg">

      <input name="Submit" type="image" onClick="return yesorno ('Â· «‰  „ √ﬂœ „‰ Õ–› «·—”«∆· «·„Õœœ… „‰ ’‰œÊﬁﬂ «·Ê«—œ ø')" value="Õ–›" src="images/del.gif" alt="Õ–›" width="20" height="17"></td>

    <td>

	<img src="images/check1.gif" width="13" height="13" border="0" style="cursor:pointer" onClick="UNSelectAll()" class='textwhite' title="«·€«¡ «Œ Ì«— «·—”«∆· ">&nbsp;<img src="images/check.gif" width="13" height="13" border="0" style="cursor:pointer" onClick="SelectAll()" class="textwhite" title="«Œ «— ﬂ· «·—”«∆·">



	</td>

    <td colspan="4"><? if($num<>0){?>

      <table width="10" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">

        <tr>

          <td ><?=$prev?></td>

          <td align="center"><? pageno_records($pageno,$pagenos,$Plink);?></td>

          <td ><?=$next?></td>

        </tr>

      </table>

    <? }?></td>

  </tr>

<? }else{?>  

  <tr align="center" bgcolor="#EEF5F9">

    <td height="80" colspan="6" class="textred">

	<table width="100%"  border="0" cellspacing="2" cellpadding="0">

      <tr>

        <td width="61%" align="right" class="textred">·« ÌÊÃœ »—Ìœ ’«œ— ›Ï ’‰œÊﬁﬂ Õ«·Ì«</td>

        <td width="39%"><img src="images/stop.gif" width="48" height="48"></td>

      </tr>

    </table></td>

  </tr>

<? }?>  

</table>

</form>

<? mysql_free_result($res_box);}?>