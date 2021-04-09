

<? 
//session_start(); 


require("config.php");

ob_start();

if(!isset($_SESSION['URL']))
{
$_SESSION['URL']=$_SERVER['HTTP_REFERER'];
$_SESSION['URL2']=$_SESSION['URL'];
}

$_SESSION['URL']=$_SERVER['HTTP_REFERER'];











$stautes=mysql_fetch_array(mysql_query(" select stautes from $Table_setting where sid='1'"));





if($stautes[0]=='1')
{

include("sendmail.php");
//phpmy admin -> $stautes
?>





<? function adv($place,$srcnoadv)
{
$srcnoadv=$path.$srcnoadv;
  require("config.php");

$res_adv=mysql_query(" select * from $Table_adv where place='$place' order by rand() limit 1");
// you can change this to appear the adv by this 
// alter this code to be like this 
// from : if(mysql_num_rows($res_adv)==0){
//to   if(mysql_num_rows($res_adv)<>0){


if(mysql_num_rows($res_adv)==0){

$row_adv=mysql_fetch_array($res_adv);

echo $row_adv['url'];

}else{

echo "<img src='$srcnoadv' alt='?? ?????? ???'  border='0'>";

}

mysql_free_result($res_adv);

} 
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style.css" type="text/css" />

<link href="style3.css" rel="stylesheet" type="text/css">


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dating agency-Home</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<div id="main">
	<div class="header">
		<div class="header_imageblock">
			<div class="header_image"></div>
		</div>
		<div class="logoblock">
			<div class="logo"></div>
		</div>
		<div class="searchblock"></div>
</div>
	<div class="sub_content_middleblock">
    
<div class="border_black">
<?php  //  <div class="left_sub_content_middleblock">
      /*//*/  ?>  
      
<table width="770" border="0" align="center" cellpadding="0" cellspacing="2" id="table1" bgcolor="#FBD1DE" >

<tr>

  <td width="60%" align="center" valign="top"  ><table width="1000"  background="images/back.jpg"      class="border_black">

    <tr>

      <td width="70%" align="center" valign="top">
        <div align="center"></div>
      <table width="100%"  border="0" cellpadding="0" cellspacing="0">

          <tr>
            <td align="right" valign="middle"><? include("header.php");?></td>
          </tr>
          <tr>
            <td class="sizeadv728_90" class="border_black" align="center" valign="middle" style="padding-left:12px">

		


<? adv(above_members,'images/728_90.jpg');?></td>

            
          <tr>
            <td align="center" valign="top"><?
	if(!isset($Plink) || empty($Plink)){$Plink='main';}
		switch($Plink)



		{



		case "main":



  include("main.php");
	



		break;



		case "Identity":







	    include("Identity.php");







		break;







		case "husband":







	    include("find.php");







		break;







		case "wife":







	    include("find.php");







		break;







		case "online":







	    include("online.php");







		break;







		case "help":







	 //   include("page.php");


echo "page" ; 







		break;







        //----____----//







		case "inbox":







	    include("inbox.php");







		break;







		case "outbox":







	    include("outbox.php");







		break;







		case "message":







	    include("message.php");







		break;







		case "Mymsn":







	    include("Mymsn.php");







		break;







		case "calendar":







	    include("Calendar.php");







		break;







		case "supervisor":







	    include("supervisor.php");







		break;







        //----____----//	







		case "balance":







	    include("balance.php");







		break;		







		case "register":











	    include("register.php");







		break;		







		case "activation":







	    include("register2.php");







		break;		







		case "search":







	    include("search.php");







		break;			







		case "profile":







	    include("profile.php");







		break;		







		 //----____----//







		case "faq":







	    include("page.php");







		break;







		case "about":







	    include("page.php");







		break;







		case "condition":







	    include("page.php");








        break;







		case "pag":







	    include("page.php");







		break;







		case "agent":







	    include("page.php");







		break;







		}







	?></td>
          </tr>
<tr>
<td align="center"  class="sizeadv728_90" valign="middle">
<? adv(under_members,'images/728_90.jpg');?></td>
</tr>
                
          
          <tr>

            <td align="center" valign="top">
			<p align="justify" dir="rtl"><b><span lang="ar-sa">
			<font face="Tahoma" size="2" color="#FF0000">هام : يتم حذف الرسائل 
			المرسلة من اي عضو بغرض غير الزواج وسيتم سحب جميع رسائله من صندوق 
			الوارد الخاص بكل مشترك كما يرجى التبيلغ عن اي مخالفة من خلال قسم 
			الشكاوي</span></font></b><span style="font-size: 25px" lang="ar-sa">
			</span></p>
						<p>
			<a href="zawaj.htm" class="textred" style="font-size:25px; text-align:center;">زواج</a> <br>

                <span class="textred">زوجتى كوم-&nbsp; زواج -&nbsp; صداقة - تعارف -&nbsp; بحث عن زوجة - مجاني موقع زواج مجاني شات منتيات </span>			</p>
			<p dir="ltr"><span class="textred"><span lang="en-us">Chat - Friends 
			- Wife - Dating - English Dating - My wife - I'm man - I'm woman</span></span></td>
          </tr>
      </table></td>
          <div align="center"></div>
      

      <td width="30%" align="left" valign="top">
        
        <div align="center">
          <? include("menu.php");
	  
	  
	 // echo "menu" ; 
	  
	  ?>
          </div></td>

    </tr>

    <tr align="center">

      <td height="18" colspan="2">
        
        <div align="center">
          <? include("footer.php");
	  
	  
	
	  
	  
	  
	  ?>
        </div></td>
    </tr>

  </table>
  </td>
  
</tr>
<tr>
<td align="center" valign="top" class="border_red" rowspan="2">
<table border="0" width="100%" id="table1">


</table>





</body>



</html>


<?
}
else
{
?>
<div align="center">عذرا الموقع قيد الصيانة </br></br></br>يرجى العودة لاحقا </br></br></br>شكرا لاهتمامكم</div>
<?
}


ob_end_flush();



?>   
      
      
      
      
      
      
      
      <div>
      
      
      
      
      
      
      

      
      
     
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <?  /*/
      
				<div class="right_sub_content_middleblock">	
					<div class="right_sub_content_middleblock_top"><span></span></div>
					<div class="right_sub_content_middleblock_center">
						<div class="sub_lastaddedblock">
							<div class="last_addedblock">
								
									<div class="lastaddedimg"></div>
								    <div class="borderimg_block"></div>
								
							</div>
							<div class="pair_block1">
									<div class="pair_img"></div>
									<div class="namemorablock">
										<div class="nameblock">Monali,Sujit</div>
										<div class="moreblock"><a href="#" class="moreblock">more.....</a></div>
									</div>
							</div>
							<div class="pair_block">
									<div class="pair_img"></div>
									<div class="namemorablock">
										<div class="nameblock">Tippu,praneet</div>
										<div class="moreblock"><a href="#" class="moreblock">more.....</a></div>
									</div>
							</div>
						</div>
					</div>
					<div class="right_sub_content_middleblock_bottom"></div>
				</div>
</div>
			<div class="footerblock">
				<div class="sub_footerblock">
					<div class="privacyblock">Dating agency <img src="images/c_img.jpg" alt="#" />    2010 | <u><a href="#" class="privacytext">Privacy policy</a></u> </div>
					<div class="privacyblock1">Provided By <a href="http://www.template4all.com/" title="Free css Templates">Free CSSTemplates</a></div>
					<div class="privacyblock1"><center><a href="http://www.freethemes4all.com" title="Free Website Templates">Freethemes4all.com</a></center></div>
			</div>
</div>
</body>
</html>
  /*/?> 
