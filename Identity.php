<script src="astm.js"></script>
<? 

if($_SERVER['REQUEST_METHOD']=="POST"){

/*--------------����� ������ --------------*/
include('class.upload.php');


// ���� ����� ������ ������
$handle = new upload($_FILES['picture']);

// ����� ������ �����
$handle->file_max_size = '100000'; // 2MB
// ��� ��� ����� ���� ������ �� ��� �����
// ������� ���� ������ true
$handle->mime_check = true;
// �� ��� ����� ���� ������ �� ��� ������� ��� ��������
// ���� ���� ����� ������� ������� �������
$handle->forbidden = array('application/*');

// ���� ���� ����� ���� ������� ��� �������
$handle->Process('usersimage');

// ���� ����� �����
if ($handle->uploaded) 
{

// ������ �� ����� �����    
          if ($handle->processed) 
		  {
            // everything was fine !
                   
            echo '<fieldset>';
  
          } 
		  else 
		  {
            // one error occured
            echo '<fieldset>';
            echo '  <legend>�� ��� ����� �����</legend>';
            echo '  �����: ' . $handle->error . '';
            echo '</fieldset>';
          }
}
/*----------------------*/

$Age=gmdate("Y")-$year;

$birth=$day.'-'.$month.'-'.$year;

$wife=strip_tags($wife,"\n");

$wife=str_replace("\n","<br>",$wife);

$personal=strip_tags($personal,"\n");

$personal=str_replace("\n","<br>",$personal);

$dirname = "usersimage";
$image=$dirname."/".$handle->file_dst_name;
/*----*/

$num=count($checkboxs);
for($i=0;$i<=$num;$i++)
{
   $nation.=$checkboxs[$i].",";
}
/*---*/

mysql_query("update $Table_usrs set 

PassWord='$pass',

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

wife_Nationalty='$nation',

image='$image'

where user_id='$_SESSION[Site_User_ID]'");
/**/
$update='done'; 

}



$res_prfile=mysql_query("select * from $Table_usrs where user_id='$_SESSION[Site_User_ID]'");

$row_prfile=mysql_fetch_array($res_prfile);

?>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="92%" align="right" bgcolor="#187EA6" class="textwhite">����� �������� ������� &nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td width="5%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td class="border_site"><br>
      <? if($update=='done'){?>
      <table width="90%"  border="0" align="center" cellpadding="0" cellspacing="2" class="border_site">
        <tr>
          <td height="30" align="center" bgcolor="#EEF5F9" ><table width="100%"  border="0" cellpadding="0" cellspacing="2">
              <tr>
                <td width="63%" align="right" class="textorange">�� ��� ������� �����</td>
                <td width="37%"><img src="images/do.gif" width="48" height="48"></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <? }?>
      <form action="" method="post" onSubmit="return astm_profile();" name="formprofile" enctype="multipart/form-data">
        <table width="100%"  border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td width="40%" align="right"><input name="EMail" type="text" class="textblack"  id="EMail2" style="width:120; text-align:center"  dir="rtl" value="<?=$row_prfile[EMail]?>" size="30" readonly="" tabindex="2"></td>
            <td width="5%" class="textsite">������ ���������� </td>
            <td width="27%" align="center"><input dir="rtl" name="username" type="text" class="textred" id="username2" value="<?=$row_prfile[UserName]?>" size="20" readonly="" style="width:120; text-align:center" tabindex="1"></td>
            <td width="28%" class="textsite">��� �������� </td>
          </tr>
          <tr>
            <td align="right"><input name="pass2" type="password" class="textblack"  id="pass4" style="width:120; text-align:center" dir="rtl" value="<?=$row_prfile[PassWord]?>" size="20" tabindex="4"></td>
            <td class="textsite">����� ���� ������ </td>
            <td align="center"><input name="pass" type="password" class="textblack"  id="pass4" style="width:120; text-align:center" dir="rtl" value="<?=$row_prfile[PassWord]?>" size="20" tabindex="3"></td>
            <td class="textsite">���� ������</td>
          </tr>
          <tr>
            <td align="right"><select name="Gender" class="textblack" style="width:120;" tabindex="6">
                <option value="male" <? if($row_prfile[Gender]=="male"){?> selected<? }?>>���</option>
                <option value="female" <? if($row_prfile[Gender]=="female"){?> selected<? }?>>����</option>
              </select>
            </td>
            <td align="left" class="textsite">�����</td>
            <td align="center"><input dir="rtl" name="name" type="text" class="textblack" id="username2" value="<?=$row_prfile[Name]?>" size="20"  style="width:120; text-align:center" tabindex="5"></td>
            <td align="left" class="textsite">����� �������</td>
          </tr>
          <tr>
            <td align="right"><select name='Nationalty' class=textblack id="Nationalty" style="width:120;" tabindex="8">
                <option value="">������</option>
                <?

$res_nation=mysql_query("select * from $Table_country order by binary co_name desc");

while($row_nation=mysql_fetch_array($res_nation))

{

?>
                <option value="<?=$row_nation[co_id]?>" <? if($row_prfile[Nationalty_id]==$row_nation[co_id]){?> selected<? }?>>
                <?=$row_nation[co_name]?>
                </option>
                <?

} 

mysql_free_result($res_nation); 

?>
              </select>
            </td>
            <td align="left" class="textsite">�������</td>
            <td align="center"><select name='Country' class=textblack id="Country" style="width:120;" tabindex="7">
                <option value="">����� ����</option>
                <?

$res_count=mysql_query("select * from $Table_country order by binary co_name desc");

while($row_country=mysql_fetch_array($res_count))

{

?>
                <option value="<?=$row_country[co_id]?>" <? if($row_prfile[Country_id]==$row_country[co_id]){?> selected<? }?>>
                <?=$row_country[co_name]?>
                </option>
                <?

} 

mysql_free_result($res_count); 

?>
              </select>
            </td>
            <td align="left" class="textsite">���� ������� </td>
          </tr>
          <tr>
            <td colspan="3" align="right"><table width="99%"  border="0" cellspacing="0" cellpadding="0">
                <tr class="scrept">
                  <td width="50%" align="right"><select name=year class="textblack" id="year" style="width:65" tabindex="11">
                      <option value='<?=$u_day=substr($row_prfile[birth],6,10)?>'>
                      <?=$u_day=substr($row_prfile[birth],6,10)?>
                      </option>
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
                  <td width="8%" align="center" class="textsite">�����</td>
                  <td width="11%"><select name=month class="textblack" id="month" style="width:65" tabindex="10">
                      <option value='<?=$u_day=substr($row_prfile[birth],3,2)?>'>
                      <?=$u_day=substr($row_prfile[birth],3,2)?>
                      </option>
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
                  <td width="8%" class="textsite">�����</td>
                  <td width="11%"><select name=day class="textblack" id="day" style="width:65" tabindex="9">
                      <option value='<?=$u_day=substr($row_prfile[birth],0,2)?>'>
                      <?=$u_day=substr($row_prfile[birth],0,2)?>
                      </option>
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
                  <td width="12%" align="left" class="textsite">�����</td>
                </tr>
              </table></td>
            <td align="left" class="textsite">����� ������� </td>
          </tr>
          <tr>
            <td align="right"><select name=Education class="textblack"  style="width:120" tabindex="13">
                <option value="">���� �����</option>
                <option value='��������' <? if($row_prfile[Education]=="��������"){?> selected<? }?>>��������</option>
                <option value='����'     <? if($row_prfile[Education]=="����"){?> selected<? }?>>����</option>
                <option value='����'     <? if($row_prfile[Education]=="����"){?> selected<? }?>>����</option>
                <option value='��������' <? if($row_prfile[Education]=="��������"){?> selected<? }?>>��������</option>
                <option value='�������'  <? if($row_prfile[Education]=="�������"){?> selected<? }?>>�������</option>
                <option value='�������'  <? if($row_prfile[Education]=="�������"){?> selected<? }?>>�������</option>
                <option value='�����'    <? if($row_prfile[Education]=="�����"){?> selected<? }?>>�����</option>
                <option value='�����'    <? if($row_prfile[Education]=="�����"){?> selected<? }?>>�����</option>
              </select></td>
            <td align="left" class="textsite">������� �������� </td>
            <td align="center"><select name=MaritalStatus class="textblack"  style="width:120" tabindex="12">
                <option value="">����� ����</option>
                <option value='����' <? if($row_prfile[MaritalStatus]=="����"){?>selected<? }?>>����</option>
                <option value='����' <? if($row_prfile[MaritalStatus]=="����"){?>selected<? }?>>����</option>
                <option value='����' <? if($row_prfile[MaritalStatus]=="����"){?>selected<? }?>>����</option>
                <option value='�����' <? if($row_prfile[MaritalStatus]=="�����"){?>selected<? }?>>�����</option>
                <option value='�����' <? if($row_prfile[MaritalStatus]=="�����"){?>selected<? }?>>�����</option>
              </select></td>
            <td align="left" class="textsite">������ ���������� </td>
          </tr>
          <tr>
            <td align="right"><select name=Profession class="textblack"  style="width:120" tabindex="15">
                <option value="">���� ����</option>
                <option value='���������' <? if($row_prfile[Profession]=="���������"){?>selected<? }?>>���������</option>
                <option value='��������' <? if($row_prfile[Profession]=="��������"){?>selected<? }?>>��������</option>
                <option value='���� / ���� / ����' <? if($row_prfile[Profession]=="���� / ���� / ����"){?>selected<? }?>>���� / ���� / ����</option>
                <option value='�������' <? if($row_prfile[Profession]=="�������"){?>selected<? }?>>�������</option>
                <option value='���� / ���� ���' <? if($row_prfile[Profession]=="���� / ���� ���"){?>selected<? }?>>���� / ���� ���</option>
                <option value='���� / ������' <? if($row_prfile[Profession]=="���� / ������"){?>selected<? }?>>���� / ������</option>
                <option value='���� / ����' <? if($row_prfile[Profession]=="���� / ����"){?>selected<? }?>>���� / ����</option>
                <option value='��� �����' <? if($row_prfile[Profession]=="��� �����"){?>selected<? }?>>��� �����</option>
                <option value='���� �������' <? if($row_prfile[Profession]=="���� �������"){?>selected<? }?>>���� �������</option>
                <option value='�������' <? if($row_prfile[Profession]=="�������"){?>selected<? }?>>�������</option>
                <option value='����� / ��� �������' <? if($row_prfile[Profession]=="����� / ��� �������"){?>selected<? }?>>����� / ��� �������</option>
                <option value='����'      <? if($row_prfile[Profession]=="����"){?>selected<? }?>>����</option>
                <option value='�����'      <? if($row_prfile[Profession]=="�����"){?>selected<? }?>>�����</option>
                <option value='����� ����' <? if($row_prfile[Profession]=="����� ����"){?>selected<? }?>>����� ����</option>
                <option value='���� ������� / ������' <? if($row_prfile[Profession]=="���� ������� / ������"){?>selected<? }?>>���� ������� / ������</option>
                <option value='������'         <? if($row_prfile[Profession]=="������"){?>selected<? }?>>������</option>
                <option value='������ / �����' <? if($row_prfile[Profession]=="������ / �����"){?>selected<? }?>>������ / �����</option>
                <option value='���� / ����'  <? if($row_prfile[Profession]=="���� / ����"){?> selected<? }?>>���� / ����</option>
                <option value='����� �����'   <? if($row_prfile[Profession]=="����� �����"){?>selected<? }?>>����� �����</option>
                <option value='�����'         <? if($row_prfile[Profession]=="�����"){?>selected<? }?>>�����</option>
                <option value='����'          <? if($row_prfile[Profession]=="����"){?>selected<? }?>>����</option>
                <option value='���� �������'  <? if($row_prfile[Profession]=="���� �������"){?>selected<? }?>>���� �������</option>
                <option value='���� �����'    <? if($row_prfile[Profession]=="���� �����"){?>selected<? }?>>���� �����</option>
                <option value='����� �������' <? if($row_prfile[Profession]=="����� �������"){?>selected<? }?>>����� �������</option>
                <option value='��� ���'      <? if($row_prfile[Profession]=="��� ���"){?>selected<? }?>>��� ���</option>
              </select></td>
            <td align="left" class="textsite">������</td>
            <td align="center"><select name=Religion class="textblack"  style="width:120" tabindex="14">
                <option value="">���� �����</option>
                <option value='������' <? if($row_prfile[Religion]=="������"){?>selected<? }?>>������</option>
                <option value='�������'  <? if($row_prfile[Religion]=="�������"){?>selected<? }?>>�������</option>
                <option value='����'   <? if($row_prfile[Religion]=="����"){?>selected<? }?>>����</option>
              </select>
            </td>
            <td align="left" class="textsite">�������</td>
          </tr>
          <tr>
            <td align="right"><select name=Height class="textblack"  style="width:120" tabindex="17">
                <option value="">���� ���</option>
                <option value='127��' <? if($row_prfile[Height]=="127��"){?> selected<? }?>>127��</option>
                <option value='132��' <? if($row_prfile[Height]=="132��"){?> selected<? }?>>132��</option>
                <option value='137��' <? if($row_prfile[Height]=="137��"){?> selected<? }?>>137��</option>
                <option value='142��' <? if($row_prfile[Height]=="142��"){?> selected<? }?>>142��</option>
                <option value='147��' <? if($row_prfile[Height]=="147��"){?> selected<? }?>>147��</option>
                <option value='152��' <? if($row_prfile[Height]=="152��"){?> selected<? }?>>152��</option>
                <option value='157��' <? if($row_prfile[Height]=="157��"){?> selected<? }?>>157��</option>
                <option value='163��' <? if($row_prfile[Height]=="163��"){?> selected<? }?>>163��</option>
                <option value='165��' <? if($row_prfile[Height]=="165��"){?> selected<? }?>>165��</option>
                <option value='168��' <? if($row_prfile[Height]=="168��"){?> selected<? }?>>168��</option>
                <option value='173��' <? if($row_prfile[Height]=="173��"){?> selected<? }?>>173��</option>
                <option value='178��' <? if($row_prfile[Height]=="178��"){?> selected<? }?>>178��</option>
                <option value='183��' <? if($row_prfile[Height]=="183��"){?> selected<? }?>>183��</option>
                <option value='188��' <? if($row_prfile[Height]=="188��"){?> selected<? }?>>188��</option>
                <option value='193��' <? if($row_prfile[Height]=="193��"){?> selected<? }?>>193��</option>
                <option value='198��' <? if($row_prfile[Height]=="198��"){?> selected<? }?>>198��</option>
                <option value='203��' <? if($row_prfile[Height]=="203��"){?> selected<? }?>>203��</option>
                <option value='208��' <? if($row_prfile[Height]=="208��"){?> selected<? }?>>208��</option>
                <option value='213��' <? if($row_prfile[Height]=="213��"){?> selected<? }?>>213��</option>
              </select></td>
            <td align="left" class="textsite">�����</td>
            <td align="center"><select name=Language class="textblack"  style="width:120" tabindex="16">
                <option value="">���� ���</option>
                <option value='����������' <? if($row_prfile[Language]=="����������"){?> selected<? }?>>����������</option>
                <option value='��������'  <? if($row_prfile[Language]=="��������"){?> selected<? }?>>��������</option>
                <option value='���������'  <? if($row_prfile[Language]=="���������"){?> selected<? }?>>���������</option>
                <option value='���������'  <? if($row_prfile[Language]=="���������"){?> selected<? }?>>���������</option>
                <option value='���������'  <? if($row_prfile[Language]=="���������"){?> selected<? }?>>���������</option>
                <option value='�������'   <? if($row_prfile[Language]=="�������"){?> selected<? }?>>�������</option>
                <option value='�������'   <? if($row_prfile[Language]=="�������"){?> selected<? }?>>�������</option>
                <option value='����������' <? if($row_prfile[Language]=="����������"){?> selected<? }?>>����������</option>
                <option value='��� ���'   <? if($row_prfile[Language]=="��� ���"){?> selected<? }?>>��� ���</option>
              </select></td>
            <td align="left" class="textsite">�����</td>
          </tr>
          <tr>
            <td align="right"><select name=Build class="textblack"  style="width:120" tabindex="19">
                <option value="">����� ���</option>
                <option value='����� ������'    <? if($row_prfile[Build]=="����� ������"){?> selected<? }?>>����� ������</option>
                <option value='���� / ���'      <? if($row_prfile[Build]=="���� / ���"){?> selected<? }?>>���� / ���</option>
                <option value='���� �����'      <? if($row_prfile[Build]=="���� �����"){?> selected<? }?>>���� �����</option>
                <option value='���� ����� �����' <? if($row_prfile[Build]=="���� ����� �����"){?> selected<? }?>>���� ����� ����� </option>
                <option value='���� / ����'     <? if($row_prfile[Build]=="���� / ����"){?> selected<? }?>>���� / ����</option>
                <option value='��� ���'         <? if($row_prfile[Build]=="��� ���"){?> selected<? }?>>��� ���</option>
              </select></td>
            <td align="left" class="textsite">�����</td>
            <td align="center"><select name=Weight  size="1" class="textblack" style="width:120" tabindex="18">
                <option value="">���� ���</option>
                <option value="41���"  <? if($row_prfile[Weight]=="41���"){?> selected<? }?>>41���</option>
                <option value="43���"  <? if($row_prfile[Weight]=="43���"){?> selected<? }?>>43��� </option>
                <option value="45���"  <? if($row_prfile[Weight]=="45���"){?> selected<? }?>>45��� </option>
                <option value="48���"  <? if($row_prfile[Weight]=="48���"){?> selected<? }?>>48��� </option>
                <option value="50���"  <? if($row_prfile[Weight]=="50���"){?> selected<? }?>>50��� </option>
                <option value="52���"  <? if($row_prfile[Weight]=="52���"){?> selected<? }?>>52��� </option>
                <option value="54���"  <? if($row_prfile[Weight]=="54���"){?> selected<? }?>>54��� </option>
                <option value="57���"  <? if($row_prfile[Weight]=="57���"){?> selected<? }?>>57��� </option>
                <option value="59���"  <? if($row_prfile[Weight]=="59���"){?> selected<? }?>>59��� </option>
                <option value="61���"  <? if($row_prfile[Weight]=="61���"){?> selected<? }?>>61��� </option>
                <option value="63���"  <? if($row_prfile[Weight]=="63���"){?> selected<? }?>>63��� </option>
                <option value="66���"  <? if($row_prfile[Weight]=="66���"){?> selected<? }?>>66��� </option>
                <option value="68���"  <? if($row_prfile[Weight]=="68���"){?> selected<? }?>>68��� </option>
                <option value="70���"  <? if($row_prfile[Weight]=="70���"){?> selected<? }?>>70��� </option>
                <option value="73���"  <? if($row_prfile[Weight]=="73���"){?> selected<? }?>>73��� </option>
                <option value="75���"  <? if($row_prfile[Weight]=="75���"){?> selected<? }?>>75��� </option>
                <option value="77���"  <? if($row_prfile[Weight]=="77���"){?> selected<? }?>>77��� </option>
                <option value="79���"  <? if($row_prfile[Weight]=="79���"){?> selected<? }?>>79��� </option>
                <option value="82���"  <? if($row_prfile[Weight]=="82���"){?> selected<? }?>>82��� </option>
                <option value="84���"  <? if($row_prfile[Weight]=="84���"){?> selected<? }?>>84��� </option>
                <option value="86���"  <? if($row_prfile[Weight]=="86���"){?> selected<? }?>>86��� </option>
                <option value="89���"  <? if($row_prfile[Weight]=="89���"){?> selected<? }?>>89��� </option>
                <option value="91���"  <? if($row_prfile[Weight]=="91���"){?> selected<? }?>>91��� </option>
                <option value="93���"  <? if($row_prfile[Weight]=="93���"){?> selected<? }?>>93��� </option>
                <option value="95���"  <? if($row_prfile[Weight]=="95���"){?> selected<? }?>>95��� </option>
                <option value="97���"  <? if($row_prfile[Weight]=="97���"){?> selected<? }?>>97��� </option>
                <option value="100���"  <? if($row_prfile[Weight]=="100���"){?> selected<? }?>>100��� </option>
                <option value="102���"  <? if($row_prfile[Weight]=="102���"){?> selected<? }?>>102��� </option>
                <option value="104���"  <? if($row_prfile[Weight]=="104���"){?> selected<? }?>>104��� </option>
                <option value="107���"  <? if($row_prfile[Weight]=="107���"){?> selected<? }?>>107��� </option>
                <option value="125���"  <? if($row_prfile[Weight]=="125���"){?> selected<? }?>>125��� </option>
                <option value="127���"  <? if($row_prfile[Weight]=="127���"){?> selected<? }?>>127��� </option>
                <option value="129���"  <? if($row_prfile[Weight]=="129���"){?> selected<? }?>>129��� </option>
                <option value="131���"  <? if($row_prfile[Weight]=="131���"){?> selected<? }?>>131��� </option>
                <option value="134���"  <? if($row_prfile[Weight]=="134���"){?> selected<? }?>>134��� </option>
                <option value="136���"  <? if($row_prfile[Weight]=="136���"){?> selected<? }?>>136��� </option>
              </select></td>
            <td align="left" class="textsite">�����</td>
          </tr>
          <tr>
            <td align="right"><select name=HairColor class="textblack"  style="width:120" tabindex="21">
                <option value="">���� ���</option>
                <option value='��� ����'  <? if($row_prfile[HairColor]=="��� ����"){?> selected<? }?>>��� ����</option>
                <option value='����'      <? if($row_prfile[HairColor]=="����"){?> selected<? }?>>����</option>
                <option value='����'      <? if($row_prfile[HairColor]=="����"){?> selected<? }?>>����</option>
                <option value='��� ����'  <? if($row_prfile[HairColor]=="��� ����"){?> selected<? }?>>��� ����</option>
                <option value='���� ����' <? if($row_prfile[HairColor]=="���� ����"){?> selected<? }?>>���� ����</option>
                <option value='����'      <? if($row_prfile[HairColor]=="����"){?> selected<? }?>>����</option>
                <option value='����� / ���' <? if($row_prfile[HairColor]=="����� / ���"){?> selected<? }?>>����� / ���</option>
                <option value='��� ���'    <? if($row_prfile[HairColor]=="��� ���"){?> selected<? }?>>��� ���</option>
              </select></td>
            <td align="left" class="textsite">��� ����� </td>
            <td align="center"><select  name="EyeColor" class="textblack"  style="width:120" tabindex="20">
                <option value="">���� ���</option>
                <option value='����' <? if($row_prfile[EyeColor]=="����"){?> selected<? }?>>����</option>
                <option value='���'  <? if($row_prfile[EyeColor]=="���"){?> selected<? }?>>���</option>
                <option value='����' <? if($row_prfile[EyeColor]=="����"){?> selected<? }?>>����</option>
                <option value='����' <? if($row_prfile[EyeColor]=="����"){?> selected<? }?>>����</option>
                <option value='����' <? if($row_prfile[EyeColor]=="����"){?> selected<? }?>>����</option>
                <option value='��� ���' <? if($row_prfile[EyeColor]=="��� ���"){?> selected<? }?>>��� ���</option>
              </select></td>
            <td align="left" class="textsite">��� ����� </td>
          </tr>
		   <tr><td colspan="4" align="center" class="textsite"><input type="file" name="picture" />&nbsp;���� �����</td></tr>
          <tr >

             <td colspan="3" align="center" > <div style="overflow:auto;width:180px;height:75px;border:1px solid #336699;padding-left:5px">
			 
                <? $res_nation=mysql_query("select * from $Table_country order by binary co_name desc");
				
				while($row_nation=mysql_fetch_array($res_nation))
				
				{?><input name="checkboxs[]" type="checkbox" title="<?=$row_nation[co_name];?>" value="<?=$row_nation[co_id]?>"/>
				  <?=$row_nation[co_name];?><br />
                <? }?></div> 
               
             </td>
			 <td  align="left" class="textsite">���� �������� ���� �� ���� �������� ������� ���� </td>
          </tr>
          <tr>
            <td colspan="3" align="right"><textarea name="personal" cols="65" rows="7" class="textblack"  id="personal" dir="rtl" tabindex="22"><? $personal=str_replace("<br>","\n",$row_prfile[personal]);echo $personal;?>
</textarea></td>
            <td class="textsite">��������</td>
          </tr>
          <tr>
            <td colspan="3" align="right"><textarea name="wife" cols="65" rows="7" class="textblack"  id="wife" dir="rtl" tabindex="23"><? $wife=str_replace("<br>","\n",$row_prfile[wife]);echo $wife;?>
</textarea></td>
            <td class="textsite">������� ���� ������</td>
          </tr>
          <tr align="center">
            <td colspan="4"><input name="Submit2" type="image" src="images/update.gif" class="scrept"  alt="���� �������" tabindex="24"></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
<? mysql_free_result($res_prfile);?>
