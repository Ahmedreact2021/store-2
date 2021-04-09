<head>

<title>زواج منتيات شات تبحث عن زوج تبحث عن شريك  - زوجتى دوت كوم</title>

<link rel="SHORTCUT ICON" href="images/favicon.ico"> 

<META http-equiv=Content-Type content="text/html; charset=windows-1256">

<meta name="keywords"  content="زواج  تعارف خطوبة نصيب شات مسيار نساء بنات عربيات عرفى خاطبة مأذون مأزون  بحث عن زواج صداقة منتديات شات حب فتيات شباب بنات دليل اخبار مفكرة مفضلة كروت اهداءات صور مقالات زوجتي زوج زوجتي دوت كوم استشارات marred zogty love women girl girls">

<meta name="description" content="زواج  تعارف خطوبة نصيب شات مسيار نساء بنات عربيات عرفى خاطبة مأذون مأزون  بحث عن زواج صداقة حب فتيات شباب بنات دليل اخبار مفكرة مفضلة كروت اهداءات صور مقالات زوجتي زوج زوجتي دوت كوم استشارات marred zogty love women girl girls ">

<meta name="verify-v1" content="+9vGXjJ4of9pOwPIY3ufs2becA9cIZhSTuWyQgicJRY=" /> 

<STYLE type="text/css">

<!--

BODY {

scrollbar-face-color:#187EA6;

scrollbar-highlight-color:#999375;

scrollbar-3dlight-color:#EBEAE6;

scrollbar-darkshadow-color:#000000;

scrollbar-shadow-color:#808080;

scrollbar-arrow-color:#D10000;

scrollbar-track-color:#E8F3F9;

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;



}

-->

</STYLE>

</head>



<!--================================================================================*\

|| ################################################################################ ||

|| # ---------------------------------------------------------------------------- # ||

|| #          All PHP code in this file is ©2005-2006 written by astm.            # ||

|| #     This file may not be redistributed in whole or significant part.		  # ||

|| # ------------------------ THIS IS NOT FREE SOFTWARE ------------------------- # ||

|| # 				     Developed by  astm_desig@hotmail.com 			          # ||

|| ################################################################################ ||

==================================================================================-->

<?

@extract($_POST);
@extract($_GET);
@extract($_SESSION);
@extract($_COOKIE); 

$db_pass="111"; /// كلمة السر  

$db_user="root"; /// اسم المستخدم     zaogaty_user

$db_name="zaogaty"; //// اسم قاعدة البيانات   zaogaty_zaogaty



$conn=mysql_pconnect("localhost","$db_user","$db_pass");  /// 

mysql_select_db($db_name);



///////////////////                 ////////////////////

$Site_url="http://www.zaogaty.com/";

$Site_mail="zaogaty@zaogaty.com";

/////////////////// db tables name /////////////////////

//$path="http://server/1/test/";
$path="http://localhost/test/";

/*1*/ $Table_admin="admin";

/*2*/ $Table_adv="adv";

/*3*/ $Table_calendar="calendar";

/*4*/ $Table_card="card";

/*5*/ $Table_comments="comments";

/*6*/ $Table_country="country";

/*6*/ $Table_country2="country2";

/*14*/ $Table_country_ip="country_ip";

/*7*/ $Table_fav="fav";

/*8*/ $Table_mailbox="mailbox";

/*9*/ $Table_pages="pages";

/*10*/ $Table_user_statistics="user_statistics";

/*11*/ $Table_usrs="usrs";

/*12*/ $Table_setting="setting";

/*13*/ $Table_vote="vote";

/*13*/ $Table_conv="conv";

/*13*/ $Table_conv2="conv2";

/*16*/ $Table_mailboxwink="mailboxwink";

////////////////////////////////////////////////////////////

?>