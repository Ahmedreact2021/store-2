<head><script src="astm.js"></script> <meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
<style type="text/css">
<!--
.style1 {color: #0000FF}
-->
</style>
</head>
<? 
if($Plink=="wife"){$mate="الزوجة";$Gender='female';}else{$mate="الزوج";$Gender='male';}
if($C_id){$Condition=" and Country_id='$C_id'";$C_link='C_id='.$C_id.'&';}else{$Condition="";$C_link='';}
$res_mate=mysql_query("SELECT * from $Table_usrs where Gender='$Gender' ".$Condition." and login='true' order by user_id desc");
$num= mysql_num_rows($res_mate);
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" class="border_site" >
  <tr align="center" valign="top">
    <td class="textsite" colspan="2"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="border_site">
        <tr>
          <td width="92%" align="right" bgcolor="#187EA6" class="textwhite" dir="rtl" ><TABLE width="68%" border="0" cellpadding="0" cellspacing="1">
          <TBODY>
            <TR>
			<TD width="24%" align="right" class="textwhite style1">اختار دولة <?=$mate?></TD>
              <TD width="36%" align="left">
<select name="menu1" class="textblack style1" style="width:130" onChange="MM_jumpMenu('parent',this,0)">
<option value="?Plink=<?=$Plink?>" >كل البلاد</option>
<?
$res_mate_country=mysql_query("select * from $Table_country order by binary co_name desc");
while($row_mate_country=mysql_fetch_array($res_mate_country)){
?>
<option value="?Plink=<?=$Plink?>&C_id=<?=$row_mate_country[co_id]?>" <? if($C_id==$row_mate_country[co_id]){$c_pic=$row_mate_country[co_pic];?> selected <? }?>><?=$row_mate_country[co_name]?></option>
<? };mysql_free_result($res_mate_country);?>
</select>			  </TD>
              <TD width="8%" align="center">&nbsp;<IMG height="20" src="<? if(!$c_pic){echo "images/spacer.gif";}else{?>flags/<?=$c_pic;?><? }?>" width="32" name="user_flag"></TD>
              <TD width="32%" align="center" class="textwhite style1" dir="rtl"> ناتج البحث (&nbsp;<?=$num?>&nbsp;)</TD>
            </TR>
          </TBODY>
        </TABLE>
		
		  </td>
          <td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>
        </tr>
    </table></td>
  </tr>

  <tr align="right">
    <td align="center">
<table width="100%"  border="0" cellspacing="1" cellpadding="1" dir="rtl">
<?
if ($num > 0) {
///////////////////////////////
$pp= 28;
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
$next = "<a href='?Plink=$Plink&".$C_link."pageno=$pagenoplus' title='التالي $pp >>' dir='rtl' class='textblack'>»</a>";
}
if($pageno - 1 < $pagenos AND $pageno)
{
$prev = "<a href='?Plink=$Plink&".$C_link."pageno=$pagenomin' title='<< السابق $pp' dir='ltr' class='textblack'>»</a>";
}
else
{
$prev = "<font color='#CC0000' class='textsite' dir='ltr'>»</font>";
}
if($pagenoplus > $pagenos)
{
$next = "<font color='#CC0000' class='textsite' dir=rtl>»</font>";
}
$res_mate=mysql_query("SELECT * from $Table_usrs where Gender='$Gender' ".$Condition." and login='true' order by user_id desc LIMIT $a,$b");
$n=mysql_num_rows($res_mate);
///////////////////////////////////////////
function pageno_records($pageno,$pagenos,$Plink,$C_link){
?>
<table align="center" width="100%" border="0" >
<tr>
<?
if ($pagenos>8){$toppagenos=8; $dotz="...";}
else {$toppagenos=$pagenos;} 
for ($i=0; $i <= $toppagenos;$i++){ 
$maa=$i+1;
if($i!=$pageno){ 
echo"<td align=center dir=rtl class='border_site' onMouseOver=bgColor='#DEECF3'  onMouseOut=bgColor=''><a class=textblack href=\"?Plink=$Plink&".$C_link."pageno=$i\">$maa</a></td>"; 
} 
else 
{ 
echo "<td class=textsite align=center dir=rtl style=' border-bottom: 1px solid #DBD9D9; border-right: 1px solid #DBD9D9; border-left: 1px solid #DBD9D9;border-top: 1px solid #DBD9D9'>$maa</td>"; 
}
}
?>
<td><?=$dotz?></td>
</tr>
</table>
<?
} // function
///////////////////////////////////////////
for($i=0; $i<$n; $i++){
if(!($i%4))
echo "<tr>";
$show_mate= mysql_fetch_array($res_mate);
?>
<td align="center"  dir="ltr" width="25%" height="80">

<table width="100%"  border="0" cellpadding="0" cellspacing="0" height="74" class="border_site">
<tr>
<td align="center"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1" >
<tr>
<td align="center" valign="top" dir="rtl"><?
echo "<a href='?Plink=profile&id=$show_mate[user_id]' title='$show_mate[UserName]' style='text-decoration:none' class=\"textred\">".substr($show_mate[UserName],0,10)."</a> - ";
$us_country=mysql_query("select * from $Table_country where co_id='$show_mate[Country_id]'");
$row_us_country=mysql_fetch_array($us_country);
echo "<span class='textsite'>".$row_us_country[co_name]."</span>";
?>&nbsp;&nbsp;<? if($show_mate[online]=="true"){?><img src="images/online.gif" width="20" height="20" border="0" title="متواجد بالموقع"><? }?></td>
</tr>
<tr>
<td align="center" valign="top" dir="rtl" class="textblack"><? if(!empty($show_mate[personal])){echo substr($show_mate[personal],0,43)."...";}else{echo "لم يذكر تفاصيل";}?></td>
</tr>
</table></td>
</tr>
</table>

	
</td>
<? }// end for?>

</tr>
<tr>
<td align="center" colspan="<?=$n?>">
<table width="10" border="0" align="center" cellpadding="1" cellspacing="1" dir="rtl" class="dcitbc">
<tr>
<td><?=$prev?></td>
<td align="center"><? pageno_records($pageno,$pagenos,$Plink,$C_link);?></td>
<td><?=$next?></td>
</tr>
</table>
</td>
</tr>
<? } else {?>
<tr>
<td height="100" colspan="<?=$n?>" align="center">
  <table width="90%"  border="0" cellspacing="2" cellpadding="0" dir="ltr">
  <tr>
    <td width="69%" align="right" class="textred">لا يوجد اعضاء متاح بياناتهم حاليا <br>
من فضلك تابعنا فى وقت اخر</td>
    <td width="31%"><img src="images/stop.gif" width="48" height="48"></td>
  </tr>
</table>
</td>
</tr>
<? }?>
</table>	
	</td><td class="sizeadv600_160" valign="middle" align="right" ><? adv(all_pages,'images/160_600.jpg');?></td>
  </tr>
</table>