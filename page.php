<?
$res_page=mysql_query("select * from $Table_pages where name='$Plink'");
$row_page=mysql_fetch_array($res_page);
$txt=$row_page[txt];
if($txt){
?>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="92%" align="right" bgcolor="#187EA6" class="textwhite">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>
</tr>
</table></td>
</tr>
<tr>
<td height="100" align="right" valign="top" class="border_site"><span class="textblack"><?=$txt;?></span></td>
</tr>
</table>
<?
}
mysql_free_result($res_page);
?> 