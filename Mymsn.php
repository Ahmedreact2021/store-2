<?
if(empty($_SESSION[Site_User_ID]) || empty($_SESSION[Site_User])){include("Alert_1.php");}else{

if($del){mysql_query(" delete from $Table_fav where id='$del' and user_id='$_SESSION[Site_User_ID]'");}

$res_friend=mysql_query("select * from $Table_fav where user_id='$_SESSION[Site_User_ID]' order by id desc");
$num = mysql_num_rows($res_friend);
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
$next = "<a href='?Plink=$Plink&pageno=$pagenoplus' title='«· «·Ì $pp >>' dir='rtl' class='textblack'>ª</a>";
}
if($pageno - 1 < $pagenos AND $pageno)
{
$prev = "<a href='?Plink=$Plink&pageno=$pagenomin' title='<< «·”«»ﬁ $pp' dir='ltr' class='textblack'>ª</a>";
}
else
{
$prev = "<font color='#CC0000' class='textsite' dir='ltr'>ª</font>";
}
if($pagenoplus > $pagenos)
{
$next = "<font color='#CC0000' class='textsite' dir=rtl>ª</font>";
}
function pageno_records($pageno,$pagenos,$Plink){
?>
<table align="center" width="50%" >
<tr>
<?
if ($pagenos>9){$toppagenos=9; $dotz="...";}
else {$toppagenos=$pagenos;} 
for ($i=0; $i <= $toppagenos;$i++){ 
$maa=$i+1;
if($i!=$pageno){ 
echo"<td align=center dir=rtl onMouseOver=bgColor='#DEECF3'  onMouseOut=bgColor='' class='border_site'><a class=textblack href=\"?Plink=$Plink&pageno=$i\">$maa</a></td>"; 
} 
else 
{ 
echo "<td  align=center dir=rtl class=textsite  style=' border-bottom: 1px solid #DBD9D9; border-right: 1px solid #DBD9D9; border-left: 1px solid #DBD9D9;border-top: 1px solid #DBD9D9'>$maa</td>"; 
}
}
?>
<td><? $dotz?></td>
</tr>
</table>
<?
} // function
$res_friend=mysql_query("select * from $Table_fav where user_id='$_SESSION[Site_User_ID]' order by id desc LIMIT $a,$b");
///////////////////////////////////////////
?>
<table width="100%"  border="0" cellpadding="0" cellspacing="2" class="border_site">
  <tr align="center" >
    <td height="25" colspan="7"  class="textwhite"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="92%" align="right" bgcolor="#187EA6" class="textwhite" dir="rtl">&nbsp;&nbsp;&nbsp;ﬁ«∆„… «’œﬁ«∆Ï (&nbsp;<?=$num?>&nbsp;)</td>
        <td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>
      </tr>
    </table>
    </td>
  </tr>
  <? if($num<>0){?>  
  <tr align="center" bgcolor="#187EA6" class="textwhite">
    <td width="7%">Õ–›</td>
    <td width="7%">—«”·…</td>
    <td width="14%">«Œ— œŒÊ· </td>
    <td width="15%"> «—ÌŒ «· ”ÃÌ· </td>
    <td width="7%">«·Õ«·…</td>
    <td height="25" colspan="2">«·«”„</td>
  </tr>
<? 
while($row_friend=mysql_fetch_array($res_friend)){
$res_friend_data=mysql_query("select * from $Table_usrs where user_id='$row_friend[user_id_fav]'");
$row_friend_data=mysql_fetch_array($res_friend_data);
/*---------------------filter words-------------------*/
   /*/$words=mysql_fetch_array(mysql_query("select txt from $Table_pages where name='disallowwords'")); 
	 		
require_once('filter.string.class.php') ;;  
		 
	   $filter = new Filter_String;
	   $words=explode(',',$words[0]);  
	   $filter->strings=$words;   
	   $filter->text = $row_friend_data[UserName];  
	   $UserName = $filter->filter(); /*/
	   /*---------------*/
?>
<tr align="center" bgcolor="#EEF5F9" onMouseMove="bgColor='#DEECF3'" onMouseOut="bgColor='#EEF5F9'">
<td  class="textblack"   dir="rtl"><a href="?Plink=<?=$Plink."&del=".$row_friend[id]; if($pageno){echo "&pageno=$pageno";}?>" onClick="return yesorno ('Â· «‰  „ √ﬂœ „‰ Õ–› <?=$UserName;?> „‰ ﬁ«∆„ ﬂ ø')"><img src="images/del.gif" alt="«Õ–› <?=$UserName;?> „‰ «·ﬁ«∆„…" width="20" height="17" border="0"></a></td>
<td  class="textblack"    dir="rtl"><a href="?Plink=profile&id=<?=$row_friend[user_id_fav]?>" ><img src="images/mail.gif" width="15" height="11" border="0" title="«÷€ÿ Â‰« ·„—«”·… <?=$UserName;?>"></a></td>
<td  class="textblack"    dir="rtl"><? if($row_friend_data[Laston_time]<>"0"){echo date("d-m-Y",$row_friend_data[Laston_time]);}else{echo "·„ Ì”Ã· œŒÊ· »«·„Êﬁ⁄";}?></td>
<td  class="textblack"   dir="rtl"><?=$row_friend_data[register_time];?></td>
<td class="textblack"   dir="rtl"><img src="images/<? if($row_friend_data[online]=="true"){$alt='„ Ê«Ãœ';?>online.gif<? }else{$alt='€Ì— „ Ê«Ãœ';?>offline.gif<? }?>" width="23" height="20" alt="<?=$alt?>"></td>
<td width="47%" height="25" dir="rtl"><a href="?Plink=profile&id=<?=$row_friend[user_id_fav]?>" class="textblack" title="<?=$UserName;?>"><?=$UserName;?></a></td>
<td width="3%" dir="rtl"><img src="images/<? if($row_friend_data[Gender]=="female"){$kind='«‰ÀÏ';echo"sfe";}else{$kind='–ﬂ—';echo"s";}?>male.gif"  title="<?=$kind;?>"></td>
</tr>
<? mysql_free_result($res_friend_data);}?>
  <tr align="center" bgcolor="#EEF5F9">
    <td colspan="7">
<? if($num<>0){?>
<table width="10" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
  <tr>
  <td ><?=$prev?></td>
  <td align="center"><? pageno_records($pageno,$pagenos,$Plink);?></td>
  <td ><?=$next?></td>
  </tr>
</table><? }?>	</td>
  </tr>
<? }else{?>  
  <tr align="center" bgcolor="#EEF5F9">
    <td height="80" colspan="7" class="textred">
	<table width="100%"  border="0" cellspacing="2" cellpadding="0">
      <tr>
        <td width="61%" align="right" class="textred">·« ÌÊÃœ «’œﬁ«¡ „”Ã·Ì‰ ›Ï «·ﬁ«∆„… Õ«·Ì« </td>
        <td width="39%"><img src="images/stop.gif" width="48" height="48"></td>
      </tr>
    </table></td>
  </tr>
<? }?>  
</table>
<? mysql_free_result($res_friend);}?>