<? session_start(); 

require("config.php");

ob_start();

include("sendmail.php");

?>



<html>



<head>



<style type="text/css">



<!--



body {



	margin-left: 0px;



	margin-top: 0px;



	margin-right: 0px;



	margin-bottom: 0px;



}



-->



</style>



<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">



<link href="style.css" rel="stylesheet" type="text/css">



</head>



<body topmargin="0">



<script src="astm.js"></script>





<table width="970" border="0" align="center" cellpadding="0" cellspacing="2" id="table1" >



<tr>



  <td width="20%" align="center"  class="border_red" rowspan="2" valign="top">&nbsp;<script type="text/javascript"><!--
google_ad_client = "pub-1382570900719908";
//120x600, تم إنشاؤها 21/01/08
google_ad_slot = "2332479137";
google_ad_width = 120;
google_ad_height = 600;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	<a target="_blank" href="http://www.zaogaty.com/ads1.html">
	<img border="0" src="../images/adv11.gif" width="120" height="60"></a><p>
	<a target="_blank" href="http://www.zaogaty.com/ads1.html">
	<img border="0" src="../images/adv11.gif" width="120" height="60"></a></p>
	<p>
	<a target="_blank" href="http://www.zaogaty.com/ads1.html">
	<img border="0" src="../images/adv11.gif" width="120" height="60"></a></td>



  <td width="60%" align="center" valign="top"  ><table width="770"  border="0" align="center" cellpadding="0" cellspacing="0"  class="border_black">

    <tr>

      <td width="70%" align="center" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">

          <tr>
            <td align="center" valign="top" colspan="2"><? include("header.php");?></td>
          </tr>
          <tr>
            <td height="27" align="center" class="border_black" width="24%">
			<a target="_blank" href="http://www.tohappylife.com">
			<img border="0" src="../images/movies.gif" width="122" height="56" align="left"></a></td>
            <td height="27" align="center" class="border_black" width="76%"><script type="text/javascript"><!--
google_ad_client = "pub-1382570900719908";
//468x60, تم إنشاؤها 23/01/08
google_ad_slot = "6759038860";
google_ad_width = 468;
google_ad_height = 60;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td>
          </tr>
          <tr>
            <td align="center" valign="top" class="border_black" colspan="2"><table border="0" width="100%" id="table2" height="90">
                <tr>
                  <td width="74%" align="center" class="textred">
<script type="text/javascript"><!--
google_ad_client = "pub-1382570900719908";
//468x60, تم إنشاؤها 21/01/08
google_ad_slot = "4243406809";
google_ad_width = 468;
google_ad_height = 60;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<script type="text/javascript"><!--
google_ad_client = "pub-1382570900719908";
//468x15, تم إنشاؤها 21/01/08
google_ad_slot = "3662276130";
google_ad_width = 468;
google_ad_height = 15;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<script type="text/javascript"><!--
google_ad_client = "pub-1382570900719908";
//468x15, تم إنشاؤها 21/01/08
google_ad_slot = "4096756121";
google_ad_width = 468;
google_ad_height = 15;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td>
                    <td align="center">
					<a target="_blank" href="http://www.tohappylife.com">
					<img border="0" src="../images/photo%20ad.gif" width="120" height="56"></a>
					<a target="_blank" href="http://www.tohappylife.com">
					<img border="0" src="../images/wslaat-Girls.gif" width="120" height="35"></a></td>
                </tr>
                </table></td>
          </tr>
          <tr>
            <td align="center" valign="top" colspan="2"><?
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







	    include("page.php");







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







		case "agent":







	    include("page.php");







		break;







		}







	?></td>

          </tr>

          <tr>

            <td align="center" valign="top" colspan="2">
			<p align="justify" dir="rtl"><b><span lang="ar-sa">
			<font face="Tahoma" size="2" color="#FF0000">هام : يتم حذف الرسائل 
			المرسلة من اي عضو بغرض غير الزواج وسيتم سحب جميع رسائله من صندوق 
			الوارد الخاص بكل مشترك كما يرجى التبيلغ عن اي مخالفة من خلال قسم 
			الشكاوي</span></font></b><span style="font-size: 25px" lang="ar-sa">
			</span></p>
			<p>
			<a href="zawaj.htm" class="textred" style="font-size:25px; text-align:center;">زواج</a> <br>

                <span class="textred">زوجتى كوم-&nbsp; زواج -&nbsp; صداقة - تعارف -&nbsp; بحث عن زوجة - مجاني موقع زواج مجاني شات منتيات </span>
			</p>
			<p dir="ltr"><span class="textred"><span lang="en-us">Chat - Friends 
			- Wife - Dating - English Dating - My wife - I'm man - I'm woman</span></span></td>

          </tr>

      </table></td>

      <td width="30%" align="left" valign="top"><? include("menu.php");?></td>

    </tr>

    <tr align="center">

      <td colspan="2"><? include("footer.php");?></td>

    </tr>

  </table></td>



  <td width="20%" align="center" class="border_red" rowspan="2" valign="top">&nbsp;
  <script type='text/javascript'>
	var up_domainID = 'DF645AD7F1AF06F6F7D5700ED78E6F3D';
	var up_app = 'ch';
	var up_initialRoom = '';
	var up_rootURL = 'http://www.userplane.com/directory/';
</script>
<script type='text/javascript' src='http://www.userplane.com/directory/api/js/ii.js'></script>
<div style='width:200px;margin:6px 0;padding:0;color:#AAA;font-size:9px;'><a href='http://www.userplane.com/directory' title='Userplane Directory' target='_blank' style='color:#AAA;font-size:9px;'>Chat</a> Powered by <a href='http://www.userplane.com' title='Userplane' target='_blank' style='color:#AAA;font-size:9px;'>Userplane</a></div><script type="text/javascript"><!--
google_ad_client = "pub-1382570900719908";
//120x600، تم الإنشاء 21/01/08
google_ad_slot = "4894897317";
google_ad_width = 120;
google_ad_height = 600;
google_cpa_choice = ""; // on file
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	<p>&nbsp;<script type="text/javascript"><!--
google_ad_client = "pub-1382570900719908";
//125x125، تم الإنشاء 21/01/08
google_ad_slot = "2925752306";
google_ad_width = 125;
google_ad_height = 125;
google_cpa_choice = ""; // on file
//--></script>
</p>
	<p>
	&nbsp;</p><p>
	&nbsp;
</tr>
<tr>
<td align="center" valign="top" class="border_red" rowspan="2">
<table border="0" width="100%" id="table1">
<tr>
<td align="center">
<script src="http://www.ratteb.com/js.js" Language="JavaScript" Type="Text/JavaScript"></script>



  <script Language="JavaScript" Type="Text/JavaScript">



_rid = 20669;



_rd = "zaogaty.com";



_rs = 1;



_rz = 0;



_rfunction(_rid, _rd, _rs, _rz);



</script>



<noscript>



<a href="http://www.ratteb.com" target="_blank"><img src="http://www.ratteb.com/ratteb_icon.gif" alt="&#1585;&#1578;&#1576; &#1604;&#1582;&#1583;&#1605;&#1575;&#1578; &#1575;&#1581;&#1589;&#1575;&#1574;&#1610;&#1575;&#1578; &#1608; &#1578;&#1585;&#1578;&#1610;&#1576; &#1575;&#1604;&#1605;&#1608;&#1575;&#1602;&#1593;" border="0" height="18" width="18"></a> | 



<a href="http://www.ratteb.com/zaogaty.com"><img src="http://www.ratteb.com/ratteb_icon.gif" alt="&#1586;&#1608;&#1575;&#1580; &#1603;&#1608;&#1605; - &#1575;&#1581;&#1589;&#1575;&#1574;&#1610;&#1575;&#1578; &#1608; &#1578;&#1585;&#1578;&#1610;&#1576;" border="0" height="18" width="18"></a>



</noscript></td>



</tr>



</table>





<p align="left" dir="ltr">

<font color="#C0C0C0"><span lang="en-us">-</span></font><script type="text/javascript">



_uacct = "UA-3283817-1";



urchinTracker();



</script></td>



</tr>



</table>





</body>



</html>



<?



ob_end_flush();



?>