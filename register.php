<? session_start();?>
<?
 


if($_SERVER['REQUEST_METHOD']=="POST" && $Sign=="sign"){

/*----------------------------*/
include('class.upload.php');


// „”«— «·„·› «·„—«œ  Õ„Ì·Â
$handle = new upload($_FILES['picture']);

// «·ÕÃ„ «·√ﬁ’Ï ··„·›
$handle->file_max_size = '20000'; // 2MB
// Â‰« ÕÊ·  ⁄ÿÌ· œ«·… «· Õﬁﬁ „‰ ‰Ê⁄ «·„·›
// · ›⁄Ì·Â «Ã⁄· «·ﬁÌ„… true
$handle->mime_check = true;
// ›Ì Õ«·  ›⁄Ì· œ«·… «· Õﬁﬁ „‰ ‰Ê⁄ «·„·›«  Â–Â «·„’›Ê›…
//  ﬂ » ›ÌÂ« √‰Ê«⁄ «·„·›«  «·„”„ÊÕ  Õ„Ì·Â«
$handle->forbidden = array('application/*');

// „Ã·œ «·–Ì ” Õ„· «·ÌÂ «·„·›«  ⁄·Ï «·”Ì—›—
$handle->Process('usersimage');

// œ«·…  Õ„Ì· «·„·›
if ($handle->uploaded) 
{

// «· Õﬁﬁ „‰  Õ„Ì· «·„·›    
          if ($handle->processed) 
		  {
            // everything was fine !
                   
            echo '<fieldset>';
  
          } 
		  else 
		  {
            // one error occured
            echo '<fieldset>';
            echo '  <legend>·„ Ì „  Õ„Ì· «·„·›</legend>';
            echo '  «·Œÿ√: ' . $handle->error . '';
            echo '</fieldset>';
          }
}
/*----------------------*/


$res_check=mysql_query("select * from $Table_usrs where UserName='$username'");

if(mysql_num_rows($res_check)<>0){$done='name';$agreement="yes";}else{

$res_check=mysql_query("select * from $Table_usrs where EMail='$EMail'");



if(mysql_num_rows($res_check)<>0){$done='email';$agreement="yes";}else{
if ($_POST["vercode"] != $_SESSION["vercod"] OR $_POST["vercode"]==''){$done='errcode';$agreement="yes";}else{
///////////////////////////

$Age=gmdate("Y")-$year;

$birth=$day.'-'.$month.'-'.$year;

$wife=strip_tags($wife,"\n");

$wife=str_replace("\n","<br>",$wife);

$personal=strip_tags($personal,"\n");

$personal=str_replace("\n","<br>",$personal);


  if($_SERVER['REMOTE_ADDR']){$ip=$_SERVER['REMOTE_ADDR'];}
  elseif (getenv(HTTP_X_FORWARDED_FOR)){$ip=getenv(HTTP_X_FORWARDED_FOR);}
  else {$ip=getenv(REMOTE_ADDR);}




$register_time=date("Y-m-d");

$dirname = "usersimage";

$image=$dirname."/".$handle->file_dst_name;
/*---------------------filter words-------------------*/
   $words=mysql_fetch_array(mysql_query("select txt from $Table_pages where name='disallowwords'")); 
   
     
	   require_once('filter.string.class.php') ;;  
		 
	   $filter = new Filter_String;  
	   $words=explode(',',$words[0]);
	   $filter->strings=$words;  
	   $filter->text = $username;  
	   $new_username = $filter->filter();  
	   
	   /*-----*/
 
	   $filter->text = $name;  
	   $new_name = $filter->filter();
	   
	   /*-----*/
 
	   $filter->text = $Religion;  
	   $new_Religion = $filter->filter();

      /*-----*/
 
	   $filter->text = $wife;  
	   $new_wife = $filter->filter();


	     
   
/*---------------------------------------------*/
/*---------------allow_register------------------*/
$allow_register=true;
$disallowcon=mysql_fetch_array(mysql_query("select allow_country from $Table_setting"));
$contries=explode(',',$disallowcon[0]);
for($i=0;$i<count($contries);$i++)
{
   if($Country==$contries[$i])
	{$allow_register=false;break;}
											
}											  																							
/*--------------------*/

$url=$_SESSION['URL2'];

if($allow_register==true)
mysql_query("insert into $Table_usrs set

PassWord='$pass',

UserName='$username', 

EMail='$EMail',

Name='$name',

Nationalty_id='$Nationalty',

Country_id='$Country',

Gender='$Gender', 

Age='$Age',

birth='$birth', 

wife='$wife',

Weight='$Weight', 

Height='$Height', 

Language='$Language', 

Build='$Build',

EyeColor='$EyeColor', 

HairColor='$HairColor',

Education='$Education', 

Profession='$Profession',

MaritalStatus='$MaritalStatus', 

Religion='$Religion',

personal='$personal',

ip='$ip',

register_time='$register_time',

register_url='$url',

login='true',  
image='$image'

");
mysql_query("insert into $Table_prochatrooms_users set password='$pass',user_name='$username', email='$EMail'");

$res_id=mysql_query("select * from $Table_usrs where UserName='$username' and EMail='$EMail'");

$row_id=mysql_fetch_array($res_id);

$userid=$row_id[user_id];

mysql_free_result($res_id);

mail_active($userid,$name,$username,$pass,$EMail,$Site_mail,$Site_url);

echo "<meta http-equiv=\"refresh\" content=\"0;URL=?Plink=activation&Sign=finish\">";

}

}

mysql_free_result($res_check);

}

}
?>

<link href="style.css" rel="stylesheet" type="text/css">



<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

        <tr>

          <td width="92%" align="right" bgcolor="#187EA6" class="textwhite"> ”ÃÌ· ﬂ⁄÷Ê ÃœÌœ &nbsp;&nbsp;&nbsp;&nbsp;</td>

          <td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>

        </tr>

    </table></td>

  </tr>

  <tr>

    <td class="border_site">

	<br>

    <? if($done=='email'){?>

    <table width="90%"  border="0" align="center" cellpadding="0" cellspacing="2" class="border_site">

      <tr>

        <td height="30" align="center" bgcolor="#EEF5F9" ><table width="100%"  border="0" cellpadding="0" cellspacing="2">

            <tr>

              <td width="76%" align="right" class="textred">Â–« «·»—Ìœ «·«ﬂ —Ê‰Ï „” Œœ„ „‰ Œ·«· ⁄÷Ê «Œ— „‰ ›÷·ﬂ  √ﬂœ „‰ «·»—Ìœ «·«ﬂ —Ê‰Ï „—… «Œ—Ï</td>

              <td width="24%"><img src="images/stop.gif" width="48" height="48"></td>

            </tr>

        </table></td>

      </tr>

    </table>

    <? }?>
    <? if($done=='errcode'){?>

    <table width="90%"  border="0" align="center" cellpadding="0" cellspacing="2" class="border_site">

      <tr>

        <td height="30" align="center" bgcolor="#EEF5F9" ><table width="100%"  border="0" cellpadding="0" cellspacing="2">

            <tr>

              <td width="75%" align="right" class="textred">«·—Ã«¡ «⁄«œ… ﬂ «»… —„“ «· √ﬂÌœ</td>

              <td width="25%"><img src="images/stop.gif" width="48" height="48"></td>

            </tr>

        </table></td>

      </tr>

    </table>

    <? }?>
    <? if($done=='name'){?>

    <table width="90%"  border="0" align="center" cellpadding="0" cellspacing="2" class="border_site">

      <tr>

        <td height="30" align="center" bgcolor="#EEF5F9" ><table width="100%"  border="0" cellpadding="0" cellspacing="2">

            <tr>

              <td width="75%" align="right" class="textred">„‰ ›÷·ﬂ «Œ «— «”„ «Œ— ›Â–« «·«”„ „” Œœ„ „‰ ⁄÷Ê «Œ— </td>

              <td width="25%"><img src="images/stop.gif" width="48" height="48"></td>

            </tr>

        </table></td>

      </tr>

    </table>

    <? }?>

<? if($agreement<>"yes"){?>	

<form action="?Plink=<?=$Plink?>" method="post">

<table width="100%"  border="0" cellspacing="2" cellpadding="0">

<tr>

<td height="30" align="center" class="textheader"> ‘—Êÿ Ê≈ ›«ﬁÌ… «” Œœ«„ «·„Êﬁ⁄

<SCRIPT LANGUAGE="JavaScript">

<!--

window.open("http://www.TOHAPPYLIFE.com","windowname","height=400,width=700,scrollbars,resizable")

// -->

</SCRIPT></td>

</tr>

<tr>

<td align="center">

<textarea name="textarea" cols="114" rows="13" class="textsite" dir="rtl" style="background-image:url(images/register.gif)" readonly><? $res_agreement=mysql_query("select * from $Table_pages where name='agreement' ");

$row_agreement=mysql_fetch_array($res_agreement);

$show_agreement=str_replace("<BR>","\n",$row_agreement[txt]);

$show_agreement=str_replace("<br>","\n",$show_agreement);

echo strip_tags($show_agreement);

mysql_free_result($res_agreement);

?></textarea>

</td>

</tr>



<tr>

<td align="center">

<input name="agreement" type="hidden" id="agreement" value="yes">

<input type="submit" name="SingleSend" value="„Ê«›ﬁ ⁄·Ï «·« ›«ﬁÌ…" >
<input type="button" value="€Ì— „Ê«›ﬁ" onclick="javascript:location.replace('index.php')" /></td>



</tr>

</table>

</form>

	<? }else{?>

	<form action="" method="post" onSubmit="return astm_profile();" name="formprofile" enctype="multipart/form-data">

	<table width="100%"  border="0" cellspacing="2" cellpadding="3">

      <tr>

        <td width="42%" align="right">&nbsp;</td>

        <td width="19%" align="center" class="textsite"><span class="textred" onclick="Checkuser();" style="cursor:pointer">«›Õ’ «·«”„</span></td>

        <td width="15%" align="center"><input dir="rtl" name="username" type="text" class="textblack" id="username2" value="<?=$username?>" size="20"  style="width:120; text-align:center" tabindex="1"></td>

        <td width="24%" class="textsite">√”„ «·„” Œœ„ </td>

      </tr>

      <tr>

        <td align="right"><input name="EMail2" type="text" class="textblack"  id="EMail2" style="width:120; text-align:center"  dir="rtl" value="<?=$EMail2?>" size="30"  tabindex="3"></td>

        <td class="textsite">  √ﬂÌœ «·»—Ìœ </td>

        <td align="center"><input name="EMail" type="text" class="textblack"  id="EMail" style="width:120; text-align:center"  dir="rtl" value="<?=$EMail?>" size="30"  tabindex="2"></td>

        <td class="textsite">«·»—Ìœ «·√·ﬂ —Ê‰Ì </td>

      </tr>

      <tr>

        <td align="right"><input name="pass2" type="password" class="textblack"  id="pass4" style="width:120; text-align:center" dir="rtl" value="<?=$pass2?>" size="20" tabindex="5"></td>

        <td class="textsite"> «ﬂÌœ ﬂ·„… «·„—Ê— </td>

        <td align="center"><input name="pass" type="password" class="textblack"  id="pass4" style="width:120; text-align:center" dir="rtl" value="<?=$pass?>" size="20" tabindex="4"></td>

        <td class="textsite">ﬂ·„Â «·„—Ê—</td>

      </tr>

      <tr>

        <td align="right">

		<select name="Gender" class="textblack" style="width:120;" tabindex="7">

        <option value="">«Œ — ‰Ê⁄</option>

		<option value="male" <? if($Gender=="male"){?> selected<? }?>>–ﬂ—</option>

        <option value="female" <? if($Gender=="female"){?> selected<? }?>>«‰ÀÌ</option>

        </select>

        </td>

        <td align="left" class="textsite">«·‰Ê⁄</td>

        <td align="center"><input dir="rtl" name="name" type="text" class="textblack" id="username2" value="<?=$name?>" size="20"  style="width:120; text-align:center" tabindex="6"></td>

        <td align="left" class="textsite">«·«”„ «·ÕﬁÌﬁÏ</td>

      </tr>

      <tr>

        <td align="right">

		

<select name='Nationalty' class=textblack id="Nationalty" style="width:120;" tabindex="9">

<option value="">«·œÊ·…</option>

<?

$res_nation=mysql_query("select * from $Table_country order by co_name asc");

while($row_nation=mysql_fetch_array($res_nation))

{

?>

<option value="<?=$row_nation[co_id]?>" <? if($Nationalty==$row_nation[co_id]){?> selected<? }?>><?=$row_nation[co_name]?></option>

<?

} 

mysql_free_result($res_nation); 

?>

</select>



		</td>

        <td align="left" class="textsite">«·Ã‰”Ì…</td>

        <td align="center">

		

<select name='Country' class=textblack id="Country" style="width:120;" tabindex="8">

<option value="">«Œ «— œÊ·…</option>

<?

$res_count=mysql_query("select * from $Table_country order by co_name asc");

while($row_country=mysql_fetch_array($res_count))

{

?>

<option value="<?=$row_country[co_id]?>" <? if($Country==$row_country[co_id]){?> selected<? }?>><?=$row_country[co_name]?></option>

<?

} 

mysql_free_result($res_count); 

?>

</select>

		

		</td>

        <td align="left" class="textsite">œÊ·… «·«ﬁ«„… </td>

      </tr>

      <tr>

        <td colspan="3" align="right"><table width="99%"  border="0" cellspacing="0" cellpadding="0">

            <tr class="scrept">

              <td width="50%" align="right"><select name=year class="textblack" id="year" style="width:65" tabindex="12">

                  <option value='<?=$year?>'><?=$year?></option>

                  <option value='1940'>1940</option>

                  <option value='1941'>1941</option>

                  <option value='1942'>1942</option>

                  <option value='1943'>1943</option>

                  <option value='1944'>1944</option>

                  <option value='1945'>1945</option>

                  <option value='1946'>1946</option>

                  <option value='1947'>1947</option>

                  <option value='1948'>1948</option>

                  <option value='1949'>1949</option>

                  <option value='1950'>1950</option>

                  <option value='1951'>1951</option>

                  <option value='1952'>1952</option>

                  <option value='1953'>1953</option>

                  <option value='1954'>1954</option>

                  <option value='1955'>1955</option>

                  <option value='1956'>1956</option>

                  <option value='1957'>1957</option>

                  <option value='1958'>1958</option>

                  <option value='1959'>1959</option>

                  <option value='1960'>1960</option>

                  <option value='1961'>1961</option>

                  <option value='1962'>1962</option>

                  <option value='1963'>1963</option>

                  <option value='1964'>1964</option>

                  <option value='1965'>1965</option>

                  <option value='1966'>1966</option>

                  <option value='1967'>1967</option>

                  <option value='1968'>1968</option>

                  <option value='1969'>1969</option>

                  <option value='1970'>1970</option>

                  <option value='1971'>1971</option>

                  <option value='1972'>1972</option>

                  <option value='1973'>1973</option>

                  <option value='1974'>1974</option>

                  <option value='1975'>1975</option>

                  <option value='1976'>1976</option>

                  <option value='1977'>1977</option>

                  <option value='1978'>1978</option>

                  <option value='1979'>1979</option>

                  <option value='1980'>1980</option>

                  <option value='1981'>1981</option>

                  <option value='1982'>1982</option>

                  <option value='1983'>1983</option>

                  <option value='1984'>1984</option>

                  <option value='1985'>1985</option>

                  <option value='1986'>1986</option>

                  <option value='1987'>1987</option>

                  <option value='1988'>1988</option>

                  <option value='1989'>1989</option>

                  <option value='1990'>1990</option>

                  <option value='1991'>1991</option>

                  <option value='1992'>1992</option>

                  <option value='1993'>1993</option>

                  <option value='1994'>1994</option>

                  <option value='1995'>1995</option>

                  <option value='1996'>1996</option>

                  <option value='1997'>1997</option>

                  <option value='1998'>1998</option>

                  <option value='1999'>1999</option>

                  <option value='2000'>2000</option>

                  <option value='2001'>2001</option>

                  <option value='2002'>2002</option>

                  <option value='2003'>2003</option>

                  <option value='2004'>2004</option>

                  <option value='2005'>2005</option>

                  <option value='2006'>2006</option>

                  <option value='2007'>2007</option>

                </select>

              </td>

              <td width="8%" align="center" class="textsite">«·”‰…</td>

              <td width="11%"><select name=month class="textblack" id="month" style="width:65" tabindex="11">

                  <option value='<?=$month?>'><?=$month?></option>

                  <option value='01'>01</option>

                  <option value='02'>02</option>

                  <option value='03'>03</option>

                  <option value='04'>04</option>

                  <option value='05'>05</option>

                  <option value='06'>06</option>

                  <option value='07'>07</option>

                  <option value='08'>08</option>

                  <option value='09'>09</option>

                  <option value='10'>10</option>

                  <option value='11'>11</option>

                  <option value='12'>12</option>

              </select></td>

              <td width="8%" class="textsite">«·‘Â—</td>

              <td width="11%"><select name=day class="textblack" id="day" style="width:65" tabindex="10">

                  <option value='<?=$day?>'><?=$day?></option>

                  <option value='01'>01</option>

                  <option value='02'>02</option>

                  <option value='03'>03</option>

                  <option value='04'>04</option>

                  <option value='05'>05</option>

                  <option value='06'>06</option>

                  <option value='07'>07</option>

                  <option value='08'>08</option>

                  <option value='09'>09</option>

                  <option value='10'>10</option>

                  <option value='11'>11</option>

                  <option value='12'>12</option>

                  <option value='13'>13</option>

                  <option value='14'>14</option>

                  <option value='15'>15</option>

                  <option value='16'>16</option>

                  <option value='17'>17</option>

                  <option value='18'>18</option>

                  <option value='19'>19</option>

                  <option value='20'>20</option>

                  <option value='21'>21</option>

                  <option value='22'>22</option>

                  <option value='23'>23</option>

                  <option value='24'>24</option>

                  <option value='25'>25</option>

                  <option value='26'>26</option>

                  <option value='27'>27</option>

                  <option value='28'>28</option>

                  <option value='29'>29</option>

                  <option value='30'>30</option>

                  <option value='31'>31</option>

              </select></td>

              <td width="12%" align="left" class="textsite">«·ÌÊ„</td>

            </tr>

        </table></td>

        <td align="left" class="textsite"> «—ÌŒ «·„Ì·«œ </td>

      </tr>

      <tr>

        <td align="right"><select name=Education class="textblack"  style="width:120" tabindex="14">

            <option value="">«Œ — „” ÊÏ</option>

            <option value='«·À«‰ÊÌ…' <? if($Education=="«·À«‰ÊÌ…"){?> selected<? }?>>«·À«‰ÊÌ…</option>

            <option value='ÿ«·»'     <? if($Education=="ÿ«·»"){?> selected<? }?>>ÿ«·»</option>

            <option value='„Â‰Ì'     <? if($Education=="„Â‰Ì"){?> selected<? }?>>„Â‰Ì</option>

            <option value='»ﬂ«·—ÌÊ”' <? if($Education=="»ﬂ«·—ÌÊ”"){?> selected<? }?>>»ﬂ«·—ÌÊ”</option>

            <option value='„«Ã” Ì—'  <? if($Education=="„«Ã” Ì—"){?> selected<? }?>>„«Ã” Ì—</option>

            <option value='œﬂ Ê—«Â'  <? if($Education=="œﬂ Ê—«Â"){?> selected<? }?>>œﬂ Ê—«Â</option>

            <option value='“„«·…'    <? if($Education=="“„«·…"){?> selected<? }?>>“„«·…</option>

            <option value='Ã«„⁄Ì'    <? if($Education=="Ã«„⁄Ì"){?> selected<? }?>>Ã«„⁄Ì</option>

        </select></td>

        <td align="left" class="textsite">«·„” ÊÌ «· ⁄·Ì„Ï </td>

        <td align="center"><select name=MaritalStatus class="textblack"  style="width:120" tabindex="13">

            <option value="">«Œ «— Õ«·…</option>

            <option value='«⁄“»' <? if($MaritalStatus=="«⁄“»"){?>selected<? }?>>«⁄“»</option>

            <option value='„ÿ·ﬁ' <? if($MaritalStatus=="„ÿ·ﬁ"){?>selected<? }?>>„ÿ·ﬁ</option>

            <option value='«—„·' <? if($MaritalStatus=="«—„·"){?>selected<? }?>>«—„·</option>

            <option value='„‰›’·' <? if($MaritalStatus=="„‰›’·"){?>selected<? }?>>„‰›’·</option>

			<option value='„ “ÊÃ' <? if($MaritalStatus=="„ “ÊÃ"){?>selected<? }?>>„ “ÊÃ</option>

        </select></td>

        <td align="left" class="textsite">«·Õ«·… «·«Ã „«⁄Ì… </td>

      </tr>

      <tr>

        <td align="right">

		<select name=Profession class="textblack"  style="width:120" tabindex="16">

            <option value="">«Œ — „Â‰…</option>

            <option value='«·«⁄·«‰« ' <? if($Profession=="«·«⁄·«‰« "){?>selected<? }?>>«·«⁄·«‰« </option>

            <option value='«·„Õ«”»…' <? if($Profession=="«·„Õ«”»…"){?>selected<? }?>>«·„Õ«”»…</option>

            <option value='„ƒ·› / „·Õ‰ / „Œ—Ã' <? if($Profession=="„ƒ·› / „·Õ‰ / „Œ—Ã"){?>selected<? }?>>„ƒ·› / „·Õ‰ / „Œ—Ã</option>

            <option value='«” ‘«—Ì' <? if($Profession=="«” ‘«—Ì"){?>selected<? }?>>«” ‘«—Ì</option>

            <option value='ÿ»Ì» / „Ã«· ÿ»Ì' <? if($Profession=="ÿ»Ì» / „Ã«· ÿ»Ì"){?>selected<? }?>>ÿ»Ì» / „Ã«· ÿ»Ì</option>

            <option value='„«·Ì / „Õ«”»Ì' <? if($Profession=="„«·Ì / „Õ«”»Ì"){?>selected<? }?>>„«·Ì / „Õ«”»Ì</option>

            <option value='—”«„ / „’„„' <? if($Profession=="—”«„ / „’„„"){?>selected<? }?>>—”«„ / „’„„</option>

            <option value='⁄„· „‰“·Ì' <? if($Profession=="⁄„· „‰“·Ì"){?>selected<? }?>>⁄„· „‰“·Ì</option>

            <option value='„Ã«· «·ﬁ«‰Ê‰' <? if($Profession=="„Ã«· «·ﬁ«‰Ê‰"){?>selected<? }?>>„Ã«· «·ﬁ«‰Ê‰</option>

            <option value='«·≈œ«—…' <? if($Profession=="«·≈œ«—…"){?>selected<? }?>>«·≈œ«—…</option>

            <option value='»—„Ã… / ‰Ÿ„ „⁄·Ê„« ' <? if($Profession=="»—„Ã… / ‰Ÿ„ „⁄·Ê„« "){?>selected<? }?>>»—„Ã… / ‰Ÿ„ „⁄·Ê„« </option>

            <option value='ÿ«·»'      <? if($Profession=="ÿ«·»"){?>selected<? }?>>ÿ«·»</option>

            <option value='”Ì«”…'      <? if($Profession=="”Ì«”…"){?>selected<? }?>>”Ì«”…</option>

            <option value='„Õ —›  ﬁ‰Ì' <? if($Profession=="„Õ —›  ﬁ‰Ì"){?>selected<? }?>>„Õ —›  ﬁ‰Ì</option>

            <option value='„Ã«· «·Â‰œ”… / «·⁄·Ê„' <? if($Profession=="„Ã«· «·Â‰œ”… / «·⁄·Ê„"){?>selected<? }?>>„Ã«· «·Â‰œ”… / «·⁄·Ê„</option>

            <option value='„ ﬁ«⁄œ'         <? if($Profession=="„ ﬁ«⁄œ"){?>selected<? }?>>„ ﬁ«⁄œ</option>

            <option value='„»Ì⁄«  /  ”ÊÌﬁ' <? if($Profession=="„»Ì⁄«  /  ”ÊÌﬁ"){?>selected<? }?>>„»Ì⁄«  /  ”ÊÌﬁ</option>

            <option value='⁄«·„ / »«ÕÀ'  <? if($Profession=="⁄«·„ / »«ÕÀ"){?> selected<? }?>>⁄«·„ / »«ÕÀ</option>

            <option value='«œ«—…  ﬁ‰Ì…'   <? if($Profession=="«œ«—…  ﬁ‰Ì…"){?>selected<? }?>>«œ«—…  ﬁ‰Ì…</option>

            <option value='”Ì«Õ…'         <? if($Profession=="”Ì«Õ…"){?>selected<? }?>>”Ì«Õ…</option>

            <option value=' «Ã—'          <? if($Profession==" «Ã—"){?>selected<? }?>> «Ã—</option>

            <option value='„Ã«· «· œ—Ì”'  <? if($Profession=="„Ã«· «· œ—Ì”"){?>selected<? }?>>„Ã«· «· œ—Ì”</option>

            <option value='ÿ«·» Ã«„⁄Ì'    <? if($Profession=="ÿ«·» Ã«„⁄Ì"){?>selected<? }?>>ÿ«·» Ã«„⁄Ì</option>

            <option value='«œ«—…  ‰›Ì–Ì…' <? if($Profession=="«œ«—…  ‰›Ì–Ì…"){?>selected<? }?>>«œ«—…  ‰›Ì–Ì…</option>

             <option value='‘Ì¡ «Œ—'      <? if($Profession=="‘Ì¡ «Œ—"){?>selected<? }?>>‘Ì¡ «Œ—</option>

       </select></td>

        <td align="left" class="textsite">«·„Â‰…</td>

        <td align="center">

		<select name=Religion class="textblack"  style="width:120" tabindex="15">

            <option value="">«Œ — œÌ«‰…</option>

            <option value='„”ÌÕÌ…' <? if($Religion=="„”ÌÕÌ…"){?>selected<? }?>>„”ÌÕÌ…</option>

            <option value='«·≈”·«„'  <? if($Religion=="«·≈”·«„"){?>selected<? }?>>«·≈”·«„</option>

            <option value='«Œ—Ï'   <? if($Religion=="«Œ—Ï"){?>selected<? }?>>«Œ—Ï</option>

             </select>

			 

		    </td>

        <td align="left" class="textsite">«·œÌ«‰…</td>

      </tr>

      <tr>

        <td align="right">

		   <select name=Height class="textblack"  style="width:120" tabindex="18">

            <option value="">«Œ — ÿÊ·</option>

            <option value='127”„' <? if($Height=="127”„"){?> selected<? }?>>127”„</option>

            <option value='132”„' <? if($Height=="132”„"){?> selected<? }?>>132”„</option>

            <option value='137”„' <? if($Height=="137”„"){?> selected<? }?>>137”„</option>

            <option value='142”„' <? if($Height=="142”„"){?> selected<? }?>>142”„</option>

            <option value='147”„' <? if($Height=="147”„"){?> selected<? }?>>147”„</option>

            <option value='152”„' <? if($Height=="152”„"){?> selected<? }?>>152”„</option>

            <option value='157”„' <? if($Height=="157”„"){?> selected<? }?>>157”„</option>

            <option value='163”„' <? if($Height=="163”„"){?> selected<? }?>>163”„</option>

            <option value='165”„' <? if($Height=="165”„"){?> selected<? }?>>165”„</option>

            <option value='168”„' <? if($Height=="168”„"){?> selected<? }?>>168”„</option>

            <option value='173”„' <? if($Height=="173”„"){?> selected<? }?>>173”„</option>

            <option value='178”„' <? if($Height=="178”„"){?> selected<? }?>>178”„</option>

            <option value='183”„' <? if($Height=="183”„"){?> selected<? }?>>183”„</option>

            <option value='188”„' <? if($Height=="188”„"){?> selected<? }?>>188”„</option>

            <option value='193”„' <? if($Height=="193”„"){?> selected<? }?>>193”„</option>

            <option value='198”„' <? if($Height=="198”„"){?> selected<? }?>>198”„</option>

            <option value='203”„' <? if($Height=="203”„"){?> selected<? }?>>203”„</option>

            <option value='208”„' <? if($Height=="208”„"){?> selected<? }?>>208”„</option>

            <option value='213”„' <? if($Height=="213”„"){?> selected<? }?>>213”„</option>

        </select></td>

        <td align="left" class="textsite">«·ÿÊ·</td>

        <td align="center"><select name=Language class="textblack"  style="width:120" tabindex="17">

            <option value="">«Œ — ·€…</option>

            <option value='«·≈‰Ã·Ì“Ì…' <? if($Language=="«·≈‰Ã·Ì“Ì…"){?> selected<? }?>>«·≈‰Ã·Ì“Ì…</option>

            <option value='«·›—‰”Ì…'  <? if($Language=="«·›—‰”Ì…"){?> selected<? }?>>«·›—‰”Ì…</option>

            <option value='«·√·„«‰Ì…'  <? if($Language=="«·√·„«‰Ì…"){?> selected<? }?>>«·√·„«‰Ì…</option>

            <option value='«·≈”»«‰Ì…'  <? if($Language=="«·≈”»«‰Ì…"){?> selected<? }?>>«·≈”»«‰Ì…</option>

            <option value='«·≈Ìÿ«·Ì…'  <? if($Language=="«·≈Ìÿ«·Ì…"){?> selected<? }?>>«·≈Ìÿ«·Ì…</option>

            <option value='«·—Ê”Ì…'   <? if($Language=="«·—Ê”Ì…"){?> selected<? }?>>«·—Ê”Ì…</option>

            <option value='«·⁄—»Ì…'   <? if($Language=="«·⁄—»Ì…"){?> selected<? }?>>«·⁄—»Ì…</option>

            <option value='«·»— €«·Ì…'<? if($Language=="«·»— €«·Ì…"){?> selected<? }?>>«·»— €«·Ì…</option>

            <option value='‘Ì¡ «Œ—'   <? if($Language=="‘Ì¡ «Œ—"){?> selected<? }?>>‘Ì¡ «Œ—</option>

        </select></td>

        <td align="left" class="textsite">«··€…</td>

      </tr>

      <tr>

        <td align="right">

		

		<select name=Build class="textblack"  style="width:120" tabindex="20">

            <option value="">«Œ «— ‰Ê⁄</option>

            <option value='„ Ê”ÿ «·»‰Ì…'    <? if($Build=="„ Ê”ÿ «·»‰Ì…"){?> selected<? }?>>„ Ê”ÿ «·»‰Ì…</option>

            <option value='”„Ì‰ / ÷Œ„'      <? if($Build=="”„Ì‰ / ÷Œ„"){?> selected<? }?>>”„Ì‰ / ÷Œ„</option>

            <option value='ﬁÊ«„ —Ì«÷Ì'      <? if($Build=="ﬁÊ«„ —Ì«÷Ì"){?> selected<? }?>>ﬁÊ«„ —Ì«÷Ì</option>

            <option value='“«∆œ «·Ê“‰ ﬁ·Ì·«' <? if($Build=="“«∆œ «·Ê“‰ ﬁ·Ì·«"){?> selected<? }?>>“«∆œ «·Ê“‰ ﬁ·Ì·« </option>

            <option value='‰ÕÌ› / —›Ì⁄'     <? if($Build=="‰ÕÌ› / —›Ì⁄"){?> selected<? }?>>‰ÕÌ› / —›Ì⁄</option>

            <option value='‘Ì¡ «Œ—'         <? if($Build=="‘Ì¡ «Œ—"){?> selected<? }?>>‘Ì¡ «Œ—</option>

        </select></td>

        <td align="left" class="textsite">«·Ã”„</td>

        <td align="center">

		

		<select name=Weight  size="1" class="textblack" style="width:120" tabindex="19">

            <option value="">«Œ — Ê“‰</option>

            <option value="41ﬂ€„"  <? if($Weight=="41ﬂ€„"){?> selected<? }?>>41ﬂ€„</option>

            <option value="43ﬂ€„"  <? if($Weight=="43ﬂ€„"){?> selected<? }?>>43ﬂ€„ </option>

            <option value="45ﬂ€„"  <? if($Weight=="45ﬂ€„"){?> selected<? }?>>45ﬂ€„ </option>

            <option value="48ﬂ€„"  <? if($Weight=="48ﬂ€„"){?> selected<? }?>>48ﬂ€„ </option>

            <option value="50ﬂ€„"  <? if($Weight=="50ﬂ€„"){?> selected<? }?>>50ﬂ€„ </option>

            <option value="52ﬂ€„"  <? if($Weight=="52ﬂ€„"){?> selected<? }?>>52ﬂ€„ </option>

            <option value="54ﬂ€„"  <? if($Weight=="54ﬂ€„"){?> selected<? }?>>54ﬂ€„ </option>

            <option value="57ﬂ€„"  <? if($Weight=="57ﬂ€„"){?> selected<? }?>>57ﬂ€„ </option>

            <option value="59ﬂ€„"  <? if($Weight=="59ﬂ€„"){?> selected<? }?>>59ﬂ€„ </option>

            <option value="61ﬂ€„"  <? if($Weight=="61ﬂ€„"){?> selected<? }?>>61ﬂ€„ </option>

            <option value="63ﬂ€„"  <? if($Weight=="63ﬂ€„"){?> selected<? }?>>63ﬂ€„ </option>

            <option value="66ﬂ€„"  <? if($Weight=="66ﬂ€„"){?> selected<? }?>>66ﬂ€„ </option>

            <option value="68ﬂ€„"  <? if($Weight=="68ﬂ€„"){?> selected<? }?>>68ﬂ€„ </option>

            <option value="70ﬂ€„"  <? if($Weight=="70ﬂ€„"){?> selected<? }?>>70ﬂ€„ </option>

            <option value="73ﬂ€„"  <? if($Weight=="73ﬂ€„"){?> selected<? }?>>73ﬂ€„ </option>

            <option value="75ﬂ€„"  <? if($Weight=="75ﬂ€„"){?> selected<? }?>>75ﬂ€„ </option>

            <option value="77ﬂ€„"  <? if($Weight=="77ﬂ€„"){?> selected<? }?>>77ﬂ€„ </option>

            <option value="79ﬂ€„"  <? if($Weight=="79ﬂ€„"){?> selected<? }?>>79ﬂ€„ </option>

            <option value="82ﬂ€„"  <? if($Weight=="82ﬂ€„"){?> selected<? }?>>82ﬂ€„ </option>

            <option value="84ﬂ€„"  <? if($Weight=="84ﬂ€„"){?> selected<? }?>>84ﬂ€„ </option>

            <option value="86ﬂ€„"  <? if($Weight=="86ﬂ€„"){?> selected<? }?>>86ﬂ€„ </option>

            <option value="89ﬂ€„"  <? if($Weight=="89ﬂ€„"){?> selected<? }?>>89ﬂ€„ </option>

            <option value="91ﬂ€„"  <? if($Weight=="91ﬂ€„"){?> selected<? }?>>91ﬂ€„ </option>

            <option value="93ﬂ€„"  <? if($Weight=="93ﬂ€„"){?> selected<? }?>>93ﬂ€„ </option>

            <option value="95ﬂ€„"  <? if($Weight=="95ﬂ€„"){?> selected<? }?>>95ﬂ€„ </option>

            <option value="97ﬂ€„"  <? if($Weight=="97ﬂ€„"){?> selected<? }?>>97ﬂ€„ </option>

            <option value="100ﬂ€„"  <? if($Weight=="100ﬂ€„"){?> selected<? }?>>100ﬂ€„ </option>

            <option value="102ﬂ€„"  <? if($Weight=="102ﬂ€„"){?> selected<? }?>>102ﬂ€„ </option>

            <option value="104ﬂ€„"  <? if($Weight=="104ﬂ€„"){?> selected<? }?>>104ﬂ€„ </option>

            <option value="107ﬂ€„"  <? if($Weight=="107ﬂ€„"){?> selected<? }?>>107ﬂ€„ </option>

            <option value="125ﬂ€„"  <? if($Weight=="125ﬂ€„"){?> selected<? }?>>125ﬂ€„ </option>

            <option value="127ﬂ€„"  <? if($Weight=="127ﬂ€„"){?> selected<? }?>>127ﬂ€„ </option>

            <option value="129ﬂ€„"  <? if($Weight=="129ﬂ€„"){?> selected<? }?>>129ﬂ€„ </option>

            <option value="131ﬂ€„"  <? if($Weight=="131ﬂ€„"){?> selected<? }?>>131ﬂ€„ </option>

            <option value="134ﬂ€„"  <? if($Weight=="134ﬂ€„"){?> selected<? }?>>134ﬂ€„ </option>

            <option value="136ﬂ€„"  <? if($Weight=="136ﬂ€„"){?> selected<? }?>>136ﬂ€„ </option>

        </select></td>

        <td align="left" class="textsite">«·Ê“‰</td>

      </tr>

      <tr>

        <td align="right">

		

		<select name=HairColor class="textblack"  style="width:120" tabindex="22">

            <option value="">«Œ — ·Ê‰</option>

            <option value='»‰Ì œ«ﬂ‰'   <? if($HairColor=="»‰Ì œ«ﬂ‰"){?> selected<? }?>>»‰Ì œ«ﬂ‰</option>

            <option value='√”Êœ'       <? if($HairColor=="√”Êœ"){?> selected<? }?>>√”Êœ</option>

            <option value='√‘ﬁ—'       <? if($HairColor=="√‘ﬁ—"){?> selected<? }?>>√‘ﬁ—</option>

            <option value='»‰Ì ›« Õ'   <? if($HairColor=="»‰Ì ›« Õ"){?> selected<? }?>>»‰Ì ›« Õ</option>

            <option value='√‘ﬁ— œ«ﬂ‰'  <? if($HairColor=="√‘ﬁ— œ«ﬂ‰"){?> selected<? }?>>√‘ﬁ— œ«ﬂ‰</option>

            <option value='√Õ„—'       <? if($HairColor=="√Õ„—"){?> selected<? }?>>√Õ„—</option>

            <option value='—„«œÌ / ›÷Ì' <? if($HairColor=="—„«œÌ / ›÷Ì"){?> selected<? }?>>—„«œÌ / ›÷Ì</option>

            <option value='‘Ì¡ «Œ—'    <? if($HairColor=="‘Ì¡ «Œ—"){?> selected<? }?>>‘Ì¡ «Œ—</option>

        </select></td>

        <td align="left" class="textsite">·Ê‰ «·‘⁄— </td>

        <td align="center">

		

		<select name=EyeColor class="textblack"  style="width:120" tabindex="21">

            <option value="">«Œ — ·Ê‰</option>

            <option value='√“—ﬁ' <? if($EyeColor=="√“—ﬁ"){?> selected<? }?>>√“—ﬁ</option>

            <option value='»‰Ì'  <? if($EyeColor=="»‰Ì"){?> selected<? }?>>»‰Ì</option>

            <option value='⁄”·Ì' <? if($EyeColor=="⁄”·Ì"){?> selected<? }?>>⁄”·Ì</option>

            <option value='√Œ÷—' <? if($EyeColor=="√Œ÷—"){?> selected<? }?>>√Œ÷—</option>

            <option value='√”Êœ' <? if($EyeColor=="√”Êœ"){?> selected<? }?>>√”Êœ</option>

            <option value='‘Ì¡ «Œ—' <? if($EyeColor=="‘Ì¡ «Œ—"){?> selected<? }?>>‘Ì¡ «Œ—</option>

        </select></td>

        <td align="left" class="textsite">·Ê‰ «·⁄Ì‰ </td>

      </tr>
	  
      <tr><td colspan="4" align="center" class="textsite"><input type="file" name="picture" />&nbsp;’Ê—… ‘Œ’Ì…</td></tr>
	   

      <tr>

        <td colspan="3" align="right"><textarea name="personal" cols="65" rows="7" class="textblack"  id="personal" dir="rtl" tabindex="23"><? $personal=str_replace("<br>","\n",$personal);echo $personal;?></textarea></td>

        <td class="textsite">„Ê«’›« Ï</td>

      </tr>

      <tr>

        <td colspan="3" align="right"><textarea name="wife" cols="65" rows="7" class="textblack"  id="wife" dir="rtl" tabindex="24"><? $wife=str_replace("<br>","\n",$wife);echo $wife;?></textarea></td>

        <td class="textsite">„Ê«’›«  ‘—Ìﬂ «·ÕÌ«…</td>

      </tr>
		<tr><td align="right" colspan="1" >
		
		<img src="captcha.php"></td><td colspan="3" class="textsite"><input type="text" name="vercode" style="width:65" >	Ì—ÃÏ «Œ«· ‰’ «· «ﬂÌœ ›Ì «·„—»⁄ 
			
			
			
		</td></tr>
      <tr align="center">

        <td colspan="4"><input name="Submit2" type="image" src="images/update.gif" class="scrept"  alt="«Õ›Ÿ «· ⁄œÌ·" tabindex="25">

          <input name="Sign" type="hidden" id="Sign" value="sign"></td>

      </tr>

    </table>

	</form>

	<? }?>

	</td>

  </tr>

</table>







