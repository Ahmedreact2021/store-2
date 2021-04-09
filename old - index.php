<? 
session_start(); 


require("config.php");

ob_start();

include("sendmail.php");

?>



<html>



<head>



<style type="text/css">

body
 {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>



<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">



<link href="style.css" rel="stylesheet" type="text/css">



</head>


<body topmargin="0" bgcolor="#FFa7a6" >




<? function adv($place,$srcnoadv)
{
$srcnoadv=$path.$srcnoadv;
  require("config.php");

$res_adv=mysql_query(" select * from $Table_adv where place='$place' order by rand() limit 1");

if(mysql_num_rows($res_adv)<>0){

$row_adv=mysql_fetch_array($res_adv);

echo $row_adv['url'];

}else{

echo "<img src='$srcnoadv' alt='ضع اعلانك هنا'  border='0'>";

}

mysql_free_result($res_adv);

} 
?>

<table width="770" border="0" align="center" cellpadding="0" cellspacing="2" id="table1" bgcolor="#FBD1DE" >
<tr><td align="left">
	<table ><tr><td  class="sizeadv728_90"><? adv(top_left,'images/728_90.jpg'); ?></td>
	            <td style="padding-left:35px" align="center" class="sizeadv180_90" ><? adv(top_right,'images/180_90.jpg');?></td>
	        </tr>
	</table><b >
</td></tr>

<tr>

  <td width="60%" align="center" valign="top"  ><table width="770" bgcolor="#FBD1DE"   align="center" cellpadding="0" cellspacing="0"  class="border_black">

    <tr>

      <td width="70%" align="center" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">

          <tr>
            <td align="right" valign="middle"><? include("header.php");?></td>
          </tr>
          <tr>
            <td class="sizeadv728_90"  align="left" style="padding-left:12px">

		


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
  
</tr>
<tr>
<td align="center" valign="top" class="border_red" rowspan="2">
<table border="0" width="100%" id="table1">
<tr><td>dddddddddddddddddddd
<script type="text/javascript"><!--
google_ad_client = "pub-1382570900719908";
/* 250x250, تم إنشاؤها 14/07/09 */
google_ad_slot = "6877220637";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</td>
</tr>

</table>





</body>



</html>



<?



ob_end_flush();



?>