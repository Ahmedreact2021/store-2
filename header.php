<? 
error_reporting(0);
session_start();
///////////////

// corn job //

/////////////

require("corn/time.php");

require("corn/calendar.php");

////////////



if($Signout=="out"){

mysql_query("update $Table_usrs set online='false' where user_id='$_SESSION[Site_User_ID]'");

$Plink='main';

session_unregister("Site_User_ID");session_unregister("Site_User");session_unregister("Site_User_Name");session_unregister("Site_User_Laston_time");session_unregister("Site_User_Card");}

if(!isset($_SESSION[HTTP_REFERER])){$_SESSION[HTTP_REFERER]=$HTTP_REFERER;}



if(isset($_SESSION[Site_User_ID])){

$lasttime=time();

mysql_query("update $Table_usrs set Laston_time='$lasttime',online='true' where user_id='$_SESSION[Site_User_ID]'");

}





?>


<table width="700"  border="0" align="center" cellpadding="0" cellspacing="0">
<? /*/ 
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-4868231-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>

/*/ ?> 

  <tr>

    <td colspan="2"><div class="menublock">
		<div class="left_menublock"></div>
		<div class="center_menublock">
			<div class="menuitemsblock">
				<div class="menuitemsblock">
					<ul>
						<li style="width:80px"><a href="<?=$path?>?Plink=main"  title="��������" >��������</a></li>
						<li style="width:80px">
                        
                        
                        
                        
<? if(!empty($_SESSION[Site_User_ID]) && !empty($_SESSION[Site_User])){?>
   
<a href="<?=$path?>?Plink=Identity" title="�������" > �������</a>
         
<? }else{?>     
                                   
<a href="<?=$path?>?Plink=help"  title="��� ����� � ">
 ��� ����� </a> 
      
<? }?>    
                    </li>
					
                        
                        
                        
              <li style="width:80px">          
                        
                   	<? if(!empty($_SESSION[Site_User_ID]) && !empty($_SESSION[Site_User])){?>     
               
	<a href="<?=$path?>?Plink=balance" title="�����" >  �����</a>        
<? }else{?>
 <a href="<?=$path?>?Plink=balance"  title="��� ������ ">
              ��� ������ </a> 	<? }?>   
              	    
                
                
                            
            </li>            
                        
                        
                        
                        
                        
						<li style="width:80px"><a href="<?=$path?>?Plink=husband" title="���� ���" >    ���� ���</a> </li>
						<li style="width:80px">
    
                    <a href="<?=$path?>?Plink=wife" title="���� ����" >    
                        
                       ���� ����  </a>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        </li>
						<li style="width:80px">
                        
                        
                        <a href="<?=$path?>?Plink=online"  title="�������� ����">
                        
                        
                      �������� ���� </a></li>
                      
                   	<li style="width:80px">
                        
                        
             <a href="<?=$path?>?Plink=agent"  title="�������" >
                        
                        
                ������� </a></li>
                      
                         
                      
                      
                      
                      
                      
                      
					</ul>
				</div>
			</div>
			
		</div>
		<div class="right_menublock"></div>
	</div></td>

  </tr>

  <tr>

    <td width="200" height="200" valign="middle">
<div style="width:200px;height:200px">
	<? if(!empty($_SESSION[Site_User_ID]) && !empty($_SESSION[Site_User])){?>

	<table width="100%"  border="0" cellpadding="1" cellspacing="1">

      <tr>

        <td align="right" background="images/blueback.jpg"><table width="100%"  border="0" cellpadding="0">

            <tr>

              <td width="86%" align="right" dir="rtl"><a href="<?=$path?>?Plink=outbox" title="������ ������" class="textwhite">������ ������ (&nbsp;<?=mysql_num_rows(mysql_query("select * from $Table_mailbox where UserFromID='$_SESSION[Site_User_ID]' and m_show='true' order by Mail_id desc"));?>&nbsp;)</a></td>

              <td width="14%" height="28" align="center"><img src="<?=$path?>images/bnr_11.gif" width="12" height="13"></td>

            </tr>

        </table></td>

        <td width="5%" bgcolor="#61B1D2">&nbsp;</td>

      </tr>

      <tr>

        <td align="right" background="images/blueback.jpg"><table width="100%"  border="0" cellpadding="0" cellspacing="2">

          <tr>
		 <? $IsPremium=mysql_fetch_array(mysql_query("select balance from $Table_setting where sid='1'"));?>
<? if(($_SESSION[Site_User_Card]!=0 && $IsPremium[balance]=='1')|| $IsPremium[balance]=='0'){?>

            <td width="86%" align="right" dir="rtl"><a href="<?=$path?>?Plink=inbox" title="������ ������" class="textwhite">������ ������  (&nbsp;<?=mysql_num_rows(mysql_query("select * from $Table_mailbox where User_Id='$_SESSION[Site_User_ID]' and m_show='true' and m_reads='0' order by Mail_id desc"));?>&nbsp;)</a></td>
			<? }else{?><td width="86%" align="right" dir="rtl" class="textwhite">�� ������ ������ ������<br/>���� ����� �����</td><? }?>

            <td width="14%" height="26" align="center"><img src="<?=$path?>images/bnr_11.gif" width="12" height="13"></td>

          </tr>

        </table></td>

        <td bgcolor="#61B1D2">&nbsp;</td>

      </tr>

      <tr>

        <td align="right" background="images/blueback.jpg"><table width="100%"  border="0" cellpadding="0" cellspacing="2">

          <tr>

            <td width="86%" align="right" ><a href="<?=$path?>?Plink=Mymsn" title="����� �������" class="textwhite">����� ������� </a></td>

            <td width="14%" height="26" align="center"><img src="<?=$path?>images/bnr_11.gif" width="12" height="13"></td>

          </tr>

        </table></td>

        <td bgcolor="#61B1D2">&nbsp;</td>

      </tr>

      <tr>

        <td align="right" background="images/blueback.jpg"><table width="100%"  border="0" cellpadding="0" cellspacing="2">

          <tr>

            <td width="86%" align="right" class="textwhite"><a href="<?=$path?>?Plink=calendar" title="������" class="textwhite">������</a></td>

            <td width="14%" height="26" align="center"><img src="<?=$path?>images/bnr_11.gif" width="12" height="13"></td>

          </tr>

        </table></td>

        <td bgcolor="#61B1D2">&nbsp;</td>

      </tr>

      <tr>

        <td align="right" background="images/blueback.jpg"><table width="100%"  border="0" cellpadding="0" cellspacing="2">

          <tr>
         <!-- log in to chat room system -->
         <? $chatuser=mysql_fetch_array(mysql_query("select UserName,PassWord from $Table_usrs where user_id='$_SESSION[Site_User_ID]'"));?>
            <form method="post" action="chat/index.php" name="chat" id="chat">
            <input type="hidden" id="uname" name="uname" value="<? echo $chatuser['UserName'];?>" />
            <input type="hidden" id="password" name="password" value="<? echo $chatuser['PassWord'];?>" />
            <input type="hidden" name="doLogin" value="1">
            </form>
<!--onclick="javascript:document.chat.submit()"-->
            <td width="86%" align="right" ><a href="<?=$path?>#"  title="����� �����" class="textwhite">����� �����</a></td>

            <td width="14%" height="26" align="center"><img src="<?=$path?>images/bnr_11.gif" width="12" height="13"></td>

          </tr>

        </table></td>

        <td bgcolor="#61B1D2">&nbsp;</td>

      </tr>

      <tr>

        <td align="right" background="images/blueback.jpg"><table width="100%"  border="0" cellpadding="0" cellspacing="2">

          <tr>

            <td width="86%" align="right"><a href="<?=$path?>?Plink=<?=$Plink?>&Signout=out" title="����� ������" class="textwhite">����� ������ </a></td>

            <td width="14%" height="28" align="center"><img src="<?=$path?>images/bnr_11.gif" width="12" height="13"></td>

          </tr>

        </table></td>

           <td bgcolor="#61B1D2">&nbsp;</td>
      </tr>

    </table>

	<? }else{?>

	<table width="100%"  border="0" cellspacing="0">

      <tr>

        <td  class="sizeadv200_200" valign="middle" align="right" ><? adv(under_menu_left,'images/200_200.jpg');?></td>

      </tr>

    </table>

	<? }?>

	</td>
    <td rowspan="7" valign="bottom">
	<table cellspacing="0"><tr>
    
          <img src="<?=$path?>images/header.gif" width="550" height="110">
         
	      </tr>
		  <tr>
              <td  ><img src="images/right-arrow.gif" /></td>
		     <td class="sizeadv468_60" valign="middle" align="right" style="float:right">
			   <? adv(under_banner,'images/200_200.jpg');?>
             	
             </td>
               <td ><img src="images/left-arrow.gif" /></td>
              
               
	    </tr>
	</table>
	</td></div>

  </tr>

</table>