<link href="style.css" rel="stylesheet" type="text/css">
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td align="center" valign="top">

<table width="100%"  align="center" cellpadding="0"  dir="rtl" >
<?  

/*-----------------------’Ê— «Œ— ⁄‘— «⁄÷«¡  ”ÃÌ· ----------------------*/
$x=4;
$user_image=mysql_query("select * from $Table_usrs where login='true' and image!='false' and  allow_img='1' order by user_id desc limit 8");
$n=mysql_num_rows($user_image);

for($i=0; $i<$n; $i++)
{
if(!($i%$x))
echo "<tr>";
$row_rand_user= mysql_fetch_array($user_image);

/*---------------------filter words----------*/
 $words=mysql_fetch_array(mysql_query("select txt from $Table_pages where name='disallowwords'")); 
	 		require_once('filter.string.class.php') ;;  
		 
	   $filter = new Filter_String;
	   $words=explode(',',$words[0]);  
	   $filter->strings=$words;  
	
       /*------*/
	   
	   $filter->text = $row_rand_user[UserName];  
	   $row_rand_user[UserName] = $filter->filter(); 

   
/*---------------------------------------------*/ 
{?>
<td width="180px" background="images/members_background.gif" dir="ltr"><table width="100%"  border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td height="90px" align="left" valign="top" dir="rtl"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1">
      <tr><?
	  
      echo"<td align='center' valign='top' dir='rtl'> ";
		
echo "<a href='?Plink=profile&id=$row_rand_user[user_id]' title='$row_rand_user[UserName]' style='text-decoration:none' class=\"textred\">".substr($row_rand_user[UserName],0,10)."</a> - ";
$us_country=mysql_query("select * from $Table_country where co_id='$row_rand_user[Country_id]'");
$row_us_country=mysql_fetch_array($us_country);
echo "<span class='textsite'>".$row_us_country[co_name]."</span>";
?>
</td>
      </tr>
      <tr>
        <td align="center" valign="top" dir="rtl" class="textblack">
		<IMG src="<? echo "./".$row_rand_user[image];?>" border="0" width="60" height="60">
		<a href='?Plink=profile&id=<?=$row_rand_user[user_id]?>' title='«·„“Ìœ ⁄‰ <?=$row_rand_user[UserName]?>' style='text-decoration:none' class="textred">«·„“Ìœ &raquo; &nbsp;</a></td>
      </tr>
    </table></td>
  </tr>
 
</table>
  </td><? }?>
<?
} // end for
mysql_free_result($user_image);
?>
</tr>
<?
/*------------------------------------*/
$x=4;
$rand_user=mysql_query("select * from $Table_usrs  where special='true' and login='true' order by  RAND() LIMIT 32");
$n=mysql_num_rows($rand_user);

for($i=0; $i<$n; $i++)
{
if(!($i%$x))
echo "<tr>";
$row_rand_user= mysql_fetch_array($rand_user);

/*---------------------filter words----------*/

	   
	   $filter->text = $row_rand_user[UserName];  
	   $row_rand_user[UserName] = $filter->filter(); 
	   
	    $filter->text = $row_rand_user[personal];  
	   $row_rand_user[personal] = $filter->filter(); 

   
/*---------------------------------------------*/ 

if($i==21 ){echo "<td align='center' class='sizeadv180_90' valign='middle'   >"?><? adv(Between_Members_buttom_left,'images/180_90.jpg');?><? echo"</td>";}
elseif($i==22  ){echo "<td align='center' class='sizeadv180_90' valign='middle'  >"?><? adv(Between_Members_buttom_right,'images/180_90.jpg');?><? echo"</td>";}
		else{?>
<td width="180px" background="images/members_background.gif" dir="ltr"><table width="100%"  border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td height="90px" align="left" valign="top" dir="rtl"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1">
      <tr><?
	  
      echo"<td align='center' valign='top' dir='rtl'> ";
		
echo "<a href='?Plink=profile&id=$row_rand_user[user_id]' title='$row_rand_user[UserName]' style='text-decoration:none' class=\"textred\">".substr($row_rand_user[UserName],0,10)."</a> - ";
$us_country=mysql_query("select * from $Table_country where co_id='$row_rand_user[Country_id]'");
$row_us_country=mysql_fetch_array($us_country);
echo "<span class='textsite'>".$row_us_country[co_name]."</span>";
?>
</td>
      </tr>
      <tr>
        <td align="center" valign="top" dir="rtl" class="textblack"><? if(!empty($row_rand_user[personal])){echo substr($row_rand_user[personal],0,40)."...";}else{echo "·„ Ì–ﬂ—  ›«’Ì·";}?></td>
      </tr>
    </table><a href='?Plink=profile&id=<?=$row_rand_user[user_id]?>' title='«·„“Ìœ ⁄‰ <?=$row_rand_user[UserName]?>' style='text-decoration:none' class="textred">«·„“Ìœ &raquo; &nbsp;</a></td>
  </tr>
</table>
  </td><? }?>
<?
} // end for
mysql_free_result($rand_user);
?>
</tr>
</table>



</td>
  </tr>
</table>