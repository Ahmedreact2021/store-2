<head>
<script src="astm.js"></script>
<!---------------��� ����� ����------------->
  <SCRIPT LANGUAGE="JavaScript">

var initialsubj="���� �������� ����� ����� ��� ���"
var initialmsg="�����:\n .... ����� ����� �� �������� ���� ��� ������ � ����� �� ���� ������ ....... ������ ��: "+window.location
var good;
function checkEmailAddress(field) {

var goodEmail = field.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\.info)|(\.sex)|(\.biz)|(\.aero)|(\.coop)|(\.museum)|(\.name)|(\.pro)|(\..{2,2}))$)\b/gi);
if (goodEmail) {
good = true;
}
else {
alert('���� ����� ���� �������� ����');
field.focus();
field.select();
good = false;
   }
}
u = window.location;
function mailThisUrl() 
{
  good = false
  checkEmailAddress(document.eMailer.email);
  if (good) 
		{
		document.eMailer.submit();
	//window.location = "mailto:"+document.eMailer.email.value+"&from="+info@zaogaty.com+"&subject="+initialsubj+"&body="+initialmsg;
		}
}
//  End -->
</script>
<? if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['email']!="")
{$initialsubj="���� �������� ����� ����� ��� ���";
$initialmsg="�����:\n .... ����� ����� �� �������� ���� ��� ������ � ����� �� ���� ������ ....... ������ ��: "."www.zaogaty.com";

$sendmail=@mail($_POST['email'],$initialsubj,$initialmsg,'www.zaogaty.com');} ?>
<!--------------->
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1256" /></head>
  
<table width="100%"  border="0" cellpadding="0" cellspacing="0">

  <tr>
<td rowspan="7" width="120"></td>
    <td align="right">

      <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>

          

          <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

             

              <tr>

               <td><img src="images/logo.gif" /></td>
				
              </tr>

          </table></td>
        </tr>
    </table></td></tr>

  <tr>

    <td align="center">

	<span class="textred"><b>

	<? if($Sign=="Error"){?>����� ���� �����<? }?>

	<? if($Sign=="Active"){?>������ ������ �������<? }?>

	<? if($Sign=="block"){?>�� ����� ������� �� ������<? }?>
	
	<? if($Sign=="exp"){?>�� ���� ����<br>��� ���� �� ������ �������<? }?>

	</b></span>

	<form action="login.php" method="post" name="formsign" style="margin-bottom:0; margin-left:0; margin-right:0; margin-top:0 " onSubmit="return astm_sign()">

	  <table width="100%"  border="0" cellpadding="0" cellspacing="0" >

        <tr>

          <td align="center">

		  

		 <? if(empty($_SESSION[Site_User_ID]) || empty($_SESSION[Site_User])){?> 

		  <table width="100%"  border="0" cellpadding="0" cellspacing="2">
<!--<tr><td align="center" class="textred">�����&nbsp;&nbsp;&nbsp;<input type="radio" name="inter" title="����� �� ������� ���� ����� ������"/>�����<input type="radio" name="inter" title="����� ����� �������� ����� ������� ��� ����� ������� �������" /></td></tr>
            <tr>-->
<td width="43%" rowspan="2" align="center" valign="middle">
	<input type="image" src="images/menu_10.png" width="49" height="40" alt="����� ������" name="Submit" value="Submit"> 
	<input name="LOGIN" type="hidden" id="LOGIN" value="ASTM_MENU">
</td>
              <td width="57%" align="center"><input name="user" type="text" class="textred" id="user" style=" width:130; text-align:center" onFocus="value=''" value="��� ��������"></td>
			  
              </tr>

            <tr>

              <td align="center"><input name="pass" type="password" class="textred" id="pass" style=" width:130; text-align:center" onFocus="value=''" value="���� ����" ></td>
              </tr>

            <tr>

              <td colspan="3"><table width="100%"  border="0" cellpadding="0" cellspacing="0">

                <tr>

                  

                  <td width="60%" height="22" valign="middle"   align="center"><a href='javascript:;' title="������ ���� ���� ��������" class="textred" onClick="MM_openBrWindow('ForgetPassword.php','Forget','status=yes,scrollbars=yes,width=400,height=210')">���� ���� ���� � </a></td>
                </tr>

                <tr>
                
<? $reguser=mysql_fetch_array(mysql_query(" select reguser from $Table_setting where sid='1' "));
if($reguser[0]=='1')
{
?>
 <td height="23"  valign="middle" align="center" ><a href='<?=$path?>?Plink=register' title="��� ���� ���� ���� ����" class="textred">������ ����</a>&nbsp;&nbsp;</td>
 <? }
 else{?>
  <td height="23"  valign="middle" align="center" ><a  title="���� �������� �����" class="textred">�� ����� ������� ���������� ����� �����</a>&nbsp;&nbsp;</td>
  <? }?>
                </tr>

              </table></td>
            </tr>
          </table>

		  <? }else{?>

		  <table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">

            <tr align="right">

              <td height="40" colspan="2" class="textred" dir="rtl">&nbsp;����� �� <?=$_SESSION[Site_User_Name];?><br>

			  &nbsp;��� ����� ������

              <? 
			  if($_SESSION[Site_User_Laston_time]==0)
			  echo "�����";
			  else
			  echo date('d-m-Y',$_SESSION[Site_User_Laston_time]);
			  ?>
              		
              	  </td>
			
              </tr>

            <tr>

              <td align="right" dir="rtl">&nbsp;<img src="images/bnr_11.gif" width="12" height="13" border="0"> &nbsp;<a href="?Plink=Identity" class="textred"  title="������ �������">������ ������ </a></td>

              <td width="8%" height="35" align="center" bgcolor="#FF99CC" class="textred">&raquo;</td>
            </tr>

     

              <td align="right" dir="rtl">&nbsp;<img src="images/bnr_11.gif" width="12" height="13" border="0"> &nbsp;<a href="http://zaogaty.com/chat/?username=<?=$_SESSION[Site_User_Name];?>" class="textred" title="����� �����">����� ����� �������</a></td>

              <td height="35" align="center" bgcolor="#FF99CC" class="textred">&raquo;</td>

 
          </table>		  

		  <? }?>		  </td>
        </tr>
      </table>
	</form>	</td>
  </tr>

  <tr>

    <td align="center">

	<table width="100%"  border="0" cellpadding="0" cellspacing="2">

      <tr>

        <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

                <tr>

                  <td width="92%" align="right" background="images/blueback.jpg" class="textwhite">��� �� ����� &nbsp;&nbsp;&nbsp;</td>

                  <td width="8%" height="25" align="center" bgcolor="#0099FF" class="textred">&raquo;</td>
                </tr>

            </table></td>
          </tr>

          <tr>

            <td align="center" valign="top"  class="border_site">

						  <form action="?Plink=search" method="post" name="formSer" onSubmit="return astm_serch()" style="margin-bottom:0; margin-left:0; margin-right:0; margin-top:0 ">

                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">

                    <tr>

                      <td colspan="3" align="right" class="button1">

					  <table width="100%"  border="0">

                          <tr>

                            <td width="55%" align="right" class="textsite">���</td>

                            <td width="7%"><input name='Gender_Ser' type=radio value="1"   <? if($Gender_Ser=="1"){?> checked<? }?>></td>

                            <td width="7%" align="right" class="textsite">�����</td>

                            <td width="31%"><input  name='Gender_Ser' type=radio value="0" <? if($Gender_Ser=="0" || !isset($Gender_Ser)){?> checked<? }?>></td>
                          </tr>
                      </table></td>
                    </tr>

                    <tr align="right">
<td width="83%"  align="right" class="textsite"><input type="text" name="UserName" style="width:80" /></td>
<td width="5%"  align="right" class="textsite">��������</td>

                      <td width="8%">



<select name="Age_Ser" class="textblack" id="age" style="width:80">

<option value="all" <? if($Age_Ser=="all"){?> selected<? }?>>����</option>

<option dir="rtl"  value="18-20"  <? if($Age_Ser=="18-20"){?> selected<? }?>>18-20</option>

<option dir="rtl"  value="20-25"   <? if($Age_Ser=="20-25"){?> selected<? }?>>20-25</option>

<option dir="rtl"  value="25-30"   <? if($Age_Ser=="25-30"){?> selected<? }?>>25-30</option>

<option dir="rtl"  value="30-35"   <? if($Age_Ser=="30-35"){?> selected<? }?>>30-35</option>

<option dir="rtl"  value="35-40"   <? if($Age_Ser=="35-40"){?> selected<? }?>>35-40</option>

<option dir="rtl"  value="40-45"   <? if($Age_Ser=="40-45"){?> selected<? }?>>40-45</option>

<option dir="rtl"  value="45-50"   <? if($Age_Ser=="45-50"){?> selected<? }?>>45-50</option>

<option dir="rtl"  value="50-55"   <? if($Age_Ser=="50-55"){?> selected<? }?>>50-55</option>

<option dir="rtl"  value="55-60"   <? if($Age_Ser=="55-60"){?> selected<? }?>>55-60</option>

<option dir="rtl"  value="60-65"   <? if($Age_Ser=="60-65"){?> selected<? }?>>60-65</option>

<option dir="rtl"  value="65-70"   <? if($Age_Ser=="65-70"){?> selected<? }?>>65-70</option>

<option dir="rtl"  value="70-75"   <? if($Age_Ser=="70-75"){?> selected<? }?>>70-75</option>

<option dir="rtl"  value="75-80<"   <? if($Age_Ser=="75-80"){?> selected<? }?>>75-80</option>
</select>					</td>

                      <td width="4%"  align="left" class="textsite">����</td>
                    </tr>

                    <tr align="right">
          <!------------------------------------------------------------->
               <td align="right">
                 <select name='Nationalty' class=textblack id="Country_Ser" style="width:80">

                          <option value="all" selected>�� ��������</option>

						  <?

						  $res_nat=mysql_query("select * from $Table_country order by binary co_name desc");

						  while($row_nat=mysql_fetch_array($res_nat))

						  {

						  ?>

						  <option value="<?=$row_nat[co_id]?>"  <? if($Nationalty==$row_nat[co_id]){?> selected<? }?>><?=$row_nat[co_name]?>                          </option>

						  <?

						  } 

						  mysql_free_result($res_nat); 
						  ?>
						  </select>
                       </td>
                      <td  align="right" class="textsite">�������</td>
					  
			<!-------------------------------------------------------------->
					   
                       <td align="right">                      

					      <select name='Country_Ser' class=textblack id="Country_Ser" style="width:80" >

                          <option value="all" selected>�� �����</option>

						  <?

						  $res_coun=mysql_query("select * from $Table_country order by binary co_name desc");

						  while($row_coun=mysql_fetch_array($res_coun))

						  {

						  ?>

						  <option value="<?=$row_coun[co_id]?>" <? if($Country_Ser==$row_coun[co_id]){?> selected<? }?>><?=$row_coun[co_name]?>		                          </option>

						  <?

						  } 

						  mysql_free_result($res_coun); 

						  ?>
					    </select>					  </td>

                      <td align="left" class="textsite">������</td>
					  
		<!----------------------------------------------------------------->
			
                    </tr>

                    <tr>

                      <td align="right" colspan="2"><input name="Submit" type="image" src="images/search.gif" title="���" class="screpte"  value="���">                          <input name="Lang" type="hidden" id="Lang" value="<?=$Lang?>">                      </td>

                      <td>&nbsp;</td>
                    </tr>
                </table>
            </form>			</td>
          </tr>

        </table></td>
      </tr>
    </table></td>
  </tr>
  <!------------���� �����------------>
<tr>
 <td align="center" > 
			
   <form name="eMailer" style="height:5" method="post" >
<INPUT maxLength="25" style="width:110px" type="text" name="email"  value="���� ������ ����������" onFocus="this.value=''" onMouseOver="window.status='Enter email address here and tell a friend about this site...'; return true" onMouseOut="window.status='';return true">
		 <INPUT  type="button" value="���� ����� �� ������" onMouseOver="window.status='���� �������� ������ �� ���� ��� ��� ����'; return true" onMouseOut="window.status='';return true" onClick="mailThisUrl();" style="color: #FFFFFF; font-family: Tahoma; background-color: #660066">
      </form>
  </td>
  </tr>
	  <!---------------------------->
  <tr>

    <td align="center"><table width="100%"  border="0" cellpadding="0" cellspacing="2">

      <tr>

        <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

                <tr>

                  <td width="92%" align="right" background="images/blueback.jpg" class="textwhite">��� ������� �������� &nbsp;&nbsp;&nbsp;&nbsp;</td>

                  <td width="8%" height="25" align="center" bgcolor="#0099FF" class="textred">&raquo;</td>
                </tr>

            </table></td>
          </tr>

          <tr>

            <td class="border_site">

			

			

			

<table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFCCCC" >

<tr align="center"  class="textred">

<td width="36%"  dir="rtl">������</td>

<td width="6%"   dir="rtl">�����</td>

<td height="25" colspan="2"  dir="rtl">�����</td>
</tr>

<?

$res_last_register=mysql_query("select * from $Table_usrs where login='true' order by user_id desc limit 10");

//require_once('filter.string.class.php') ;   
//$filter = new Filter_String;  
	    
///while($row_last_register=mysql_fetch_array($res_last_register))

///{
/*---------------------filter words-------------------*/
   /*/$words=mysql_fetch_array(mysql_query("select txt from $Table_pages where name='disallowwords'")); 
   $words=explode(',',$words[0]);
	 		$filter->strings=$words;
	   $filter->text = $row_last_register[UserName];  
	   $UserName = $filter->filter();     
   
/*---------------------------------------------*/
?>

<tr align="center" onMouseMove="bgColor='#EBF5FA'" onMouseOut="bgColor=''">

<td  dir="rtl"><a href='<?=$path?>?Plink=profile&id=<?=$row_last_register[user_id]?>' title="<?=$UserName?>" style="text-decoration:none" class="textblack">

<?

$last_register_country=mysql_query("select * from $Table_country where co_id='$row_last_register[Country_id]'");

$row_register_country=mysql_fetch_array($last_register_country);

echo $row_register_country[co_name];

mysql_free_result($last_register_country);

?></a></td>

<td  dir="rtl"><a href='<?=$path?>?Plink=profile&id=<?=$row_last_register[user_id]?>' title="<?=$UserName?>" style="text-decoration:none" class="textblack"><?=$row_last_register[Age]?></a></td>

<td width="55%" height="20"  dir="rtl"><a href='<?=$path?>?Plink=profile&id=<?=$row_last_register[user_id]?>' title="<?=$UserName?>" style="text-decoration:none" class="textsite"><?=substr($UserName,0,10)?></a></td>

<td width="3%"  dir="rtl"><img src="images/<? if($row_last_register[Gender]=="female"){$kind='����';echo"sfe";}else{$kind='���';echo"s";}?>male.gif"  title="<?=$kind;?>"></td>
</tr>

<?

} 

mysql_free_result($res_last_register);

?>
</table>	            </td>
          </tr>

        </table></td>
      </tr>

    </table></td>
  </tr>

  <tr>

    <td align="center"><table width="100%"  border="0" cellpadding="0" cellspacing="2">

      <tr>

        <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">

                <tr>

                  <td width="92%" align="right" background="images/blueback.jpg" class="textwhite">��� ������� ���� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                  <td width="8%" height="25" align="center" bgcolor="#0099FF" class="textred">&raquo;</td>
                </tr>

            </table></td>
          </tr>

          <tr>

            <td align="center" valign="top" class="border_site">

			

			

<table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFCCCC">

<tr align="center"  class="textred" >

<td width="36%"  dir="rtl">������</td>

<td width="5%"  dir="rtl">�����</td>

<td height="25" colspan="2"  dir="rtl">�����</td>
</tr>

<?

$res_last_log=mysql_query("select * from $Table_usrs where  login='true' order by Laston_time desc limit 10");

while($row_last_log=mysql_fetch_array($res_last_log))

{
/*---------------------filter words-------------------*/
  /*/ $words=mysql_fetch_array(mysql_query("select txt from $Table_pages where name='disallowwords'")); 
	 		
	   $filter->text = $row_last_log[UserName];  
	   $UserName2 = $filter->filter();     
   
/*---------------------------------------------*/
?>

<tr align="center" onMouseMove="bgColor='#EBF5FA'" onMouseOut="bgColor=''">

<td dir="rtl"><a href='<?=$path?>?Plink=profile&id=<?=$row_last_log[user_id]?>' title="<?=$UserName2?>" style="text-decoration:none" class="textblack"><?

$last_log_country=mysql_query("select * from $Table_country where co_id='$row_last_log[Country_id]'");

$row_last_log_country=mysql_fetch_array($last_log_country);

echo $row_last_log_country[co_name];

mysql_free_result($last_log_country);

?></a></td>

<td  dir="rtl"><a href='<?=$path?>?Plink=profile&id=<?=$row_last_log[user_id]?>' title="<?=$UserName2?>" style="text-decoration:none" class="textblack"><?=$row_last_log[Age]?></a></td>

<td width="55%" height="20"  dir="rtl"><a href='<?=$path?>?Plink=profile&id=<?=$row_last_log[user_id]?>' title="<?=$UserName2?>" style="text-decoration:none" class="textsite"><?=substr($UserName2,0,10)?></a></td>

<td width="3%"  dir="rtl"><img src="images/<? if($row_last_log[Gender]=="female"){$kind='����';echo"sfe";}else{$kind='���';echo"s";}?>male.gif"  title="<?=$kind;?>"></td>
</tr>

<?

}

mysql_free_result($res_last_log);

?>
</table>			</td>
          </tr>

        </table></td>
      </tr>

    </table></td>
  </tr>
 
  
  <tr>
    <td align="center">
<table width="100%" border="1" cellspacing="0" bordercolor="#FFCCCC" id="table3">
<tr>
<td align="center" >
<table width="100%"  border="0" cellpadding="0" cellspacing="0">

  
  
<tr>

<td width="92%" align="right" background="images/blueback.jpg" class="textwhite">����� ���� &nbsp;&nbsp;&nbsp;&nbsp;</td>

<td width="8%" height="25" align="center" bgcolor="#0099FF" class="textred">&raquo;</td>
</tr>

</table>			  
</td>
</tr>
<tr>
<td align="center">


<a target="_blank" href="http://www.family-education.info/" class="textblack">������� �������</a></td>
</tr>
<tr>
<td align="center"><a target="_blank" href="http://www.zaojaty.com/"  class="textblack">����� ������</a></td>
</tr>
<tr>
<td align="center"><a tppabs="http://www.zawaj.ws/new/index.htm" href="http://www.zaojaty.com/new/index.htm"  class="textblack">�������� ��� ������</a></td>
</tr>
<tr>
<td align="center"><a tppabs="http://www.zawaj.ws/med/index.htm" href="http://www.zaojaty.com/med/index.htm"  class="textblack">������� �������</a></td>
</tr>
<tr>
<td align="center"><a tppabs="http://www.zawaj.ws/edu/index.htm" href="http://www.zaojaty.com/edu/index.htm"  class="textblack">������� �������</a></td>
</tr>
<tr>
<td align="center"><a tppabs="http://www.zawaj.ws/pics/index.html" href="http://www.zaojaty.com/pics/index.html"  class="textblack">������ �����</a></td>
</tr>
<tr>
<td align="center"><a target="_blank" href="http://www.zaogaty.com/abraj/index.htm"  class="textblack">�������</a></td>
</tr>
<tr>
<td align="center"><a target="_blank" href="http://www.zaogaty.com/forex.htm"  class="textblack">���� �������</a></td>
</tr>
<tr>
<td align="center"><a target="_blank" href="http://www.forex4arab.biz"  class="textblack">�� �� ���� �� �������</a></td>
</tr>
<tr>
<td align="center">
<a target="_blank" href="http://www.zaogaty.com/chat.htm"  class="textblack">��� ������</a></td>
</tr>
<tr>
<td align="center">
<a target="_blank" href="http://zaogaty.com/dream/"  class="textblack">����� �������</a></td>
</tr>
<tr>
<td align="center">
<a target="_blank" href="http://www.sy4job.com"  class="textblack">����� �����</a></td>
</tr>
</table>	
	</td>
  </tr>

</table>
