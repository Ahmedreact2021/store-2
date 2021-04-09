<? 

$Age_Ser_for=substr($Age_Ser,3,4);

$Age_Ser_to=substr($Age_Ser,0,2);

if($Age_Ser=="all"){$Sear_Conditoin="";}else{$Sear_Conditoin=" and Age between '$Age_Ser_to' and '$Age_Ser_for' ";}

if($Country_Ser=="all"){$Country_Conditoin="";}else{$Country_Conditoin=" and Country_id='$Country_Ser' ";}

if($Nationalty=="all"){$Nationalty_Conditoin="";}else{$Nationalty_Conditoin=" and Nationalty_id='$Nationalty' ";}

if($Gender_Ser=='1'){$Gender='male';}elseif($Gender_Ser=='0'){$Gender='female';}

if($UserName==""){$name_Conditoin="";}else{$name_Conditoin=" and UserName like '%$UserName%'";}

$C_link="Gender_Ser=".$Gender_Ser."&Age_Ser=".$Age_Ser."&Country_Ser=".$Country_Ser."&";



$res_mate=mysql_query("SELECT * from $Table_usrs where Gender='$Gender'  ".$Nationalty_Conditoin."
".$Country_Conditoin."".$Sear_Conditoin."".$name_Conditoin."and login='true' order by user_id desc");

$num= mysql_num_rows($res_mate);


?>
<style type="text/css">
<!--
.style1 {color: #0000FF}
-->
</style>


<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" class="border_site">

  <tr align="center" valign="top">

    <td class="textsite"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="border_site">

        <tr>

          <td width="92%" align="right"  background="images/icon_menu.jpg"bgcolor="#187EA6" class="style1 textwhite" dir="rtl" ><strong>&nbsp;&nbsp;&nbsp; «Ã„«·Ï ‰« Ã «·»ÕÀ (&nbsp;
            <?=$num?>
          &nbsp;)</strong></td>

          <td width="5%" height="25" align="center" bgcolor="#FF99CC" class="textwhite">&raquo;</td>


        </tr>

    </table></td>

  </tr>



  <tr align="right">

    <td align="center">

<table width="100%"  border="0" cellspacing="1" cellpadding="1" dir="rtl">

<?

if ($num > 0) {

///////////////////////////////

$pp= 32;

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

$next = "<a href='?Plink=$Plink&".$C_link."pageno=$pagenoplus' title='«· «·Ì $pp >>' dir='rtl' class='textblack'>ª</a>";

}

if($pageno - 1 < $pagenos AND $pageno)

{

$prev = "<a href='?Plink=$Plink&".$C_link."pageno=$pagenomin' title='<< «·”«»ﬁ $pp' dir='ltr' class='textblack'>ª</a>";

}

else

{

$prev = "<font color='#CC0000' class='textsite' dir='ltr'>ª</font>";

}

if($pagenoplus > $pagenos)

{

$next = "<font color='#CC0000' class='textsite' dir=rtl>ª</font>";

}

$res_mate=mysql_query("SELECT * from $Table_usrs where Gender='$Gender'  ".$Nationalty_Conditoin."
".$Country_Conditoin."".$Sear_Conditoin."".$name_Conditoin."and login='true' order by user_id desc LIMIT $a,$b");

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


/*---------------------filter words----------*/
 /*/ $words=mysql_fetch_array(mysql_query("select txt from $Table_pages where name='disallowwords'")); 
	 		require_once('filter.string.class.php') ;;  
		 
	   $filter = new Filter_String;
	   $words=explode(',',$words[0]);  
	   $filter->strings=$words;  
	
       /*------*/
	   
	/*/    $filter->text = $show_mate[UserName];  
	   $show_mate[UserName] = $filter->filter(); 
	   
	    /*------*/
	   
	   /*/ $filter->text = $show_mate[personal];  
	   $show_mate[personal] = $filter->filter();

   
/*---------------------------------------------*/

?>

<td align="center"  dir="ltr" width="25%">



<table width="100%"  border="0" cellpadding="0" cellspacing="0" height="74" class="border_site"  background="images/back2.jpg"  >

<tr>

<td align="center"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1" >

<tr>

<td align="center" valign="top" dir="rtl"><?

echo "<a href='?Plink=profile&id=$show_mate[user_id]' title='$show_mate[UserName]' style='text-decoration:none' class=\"textred\">".substr($show_mate[UserName],0,10)."</a> - ";

$us_country=mysql_query("select * from $Table_country where co_id='$show_mate[Country_id]'");

$row_us_country=mysql_fetch_array($us_country);

echo "<span class='textsite'>".$row_us_country[co_name]."</span>";

?>&nbsp;&nbsp;<? if($show_mate[online]=="true"){?><img src="images/online.gif" width="20" height="20" border="0" title="„ Ê«Ãœ »«·„Êﬁ⁄"><? }?></td>

</tr>

<tr>

<td align="center" valign="top" dir="rtl" class="textblack"><? if(!empty($show_mate[personal])){echo substr($show_mate[personal],0,43)."...";}else{echo "·„ Ì–ﬂ—  ›«’Ì·";}?></td>

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

    <td width="69%" align="right" class="textred">·« ÌÊÃœ ‰« Ã »ÕÀ <br>

„‰ ›÷·ﬂ Õ«Ê· «·»ÕÀ »„›—«œ«  «Œ—Ï</td>

    <td width="31%"><img src="images/stop.gif" width="48" height="48"></td>

  </tr>

</table>

</td>

</tr>

<? }?>

</table>	

	</td>

  </tr>

</table>