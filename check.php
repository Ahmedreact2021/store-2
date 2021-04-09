<? require("config.php");
$res=mysql_query("select * from $Table_usrs where UserName='$ch_user'");
if(mysql_num_rows($res)==0){$done="done";}else{$done="fine";}
mysql_free_result($res);
?>
<link href="style.css" rel="stylesheet" type="text/css">

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="92%" align="right" bgcolor="#187EA6" class="textwhite">ЧсЪЧпЯ уф есЧЭэЩ Чгу ЧсугЪЮЯу &nbsp;&nbsp;&nbsp;</td>
          <td width="8%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" class="border_site" dir="rtl" height="100">
<? if($done=="done"){?>
<span class="textsite">уЪЧЭ сп ЧсЪгЬэс ШЧсЧгу 
</span><span class="textred"><?=$ch_user;?></span>
<? }elseif($done=="fine"){?> 
<span class="textred">
фУгн
</span>
<span class="textsite">
скЯу Ъупфп ЧсЪгЬэс ШЧсЧгу 
</span>
<span class="textred">
<?=$ch_user;?>&nbsp;
</span> <span class="textsite">
сЧф 
ЧсЧгу угЪЮЯу ук кжц ЧЮб ШЧсуцок 
<br>
сасп
фбЬц ЧсЪгЬэс ШЧгу ЧЮб</span>
<? }?>
	</td>
  </tr>
</table>
