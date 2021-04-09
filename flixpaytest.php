<? session_start();

require("config.php");

/*------------############# charge with flixpay.com ##########--------------*/
if( $_SERVER['REQUEST_METHOD']=="POST" and 
    $_POST['referer']=="http://www.flixpay.com" and
	$_POST['buyer']=='nobalaa' and $_POST['pname']=='zaogaty' and
	$_POST['action'] == 'payment' )
 { 

  $user_vars = base64_decode($_POST['comments']);
  $user_vars = explode("::",$user_vars); 
  $_POST['txt2'] = $user_vars[0];
  $_POST['txt3'] = $user_vars[1]; 

///////////select last id 
$res_last=mysql_query("select max(id) as astm_last_id from $Table_card");
$row_last=mysql_fetch_array($res_last);
$last_old_card=$row_last[astm_last_id];
mysql_free_result($res_last);
////////////////// insert new ids
$rs= check($_POST['txt2'],$_POST['txt3'],$Table_usrs);
     mysql_query("insert into $Table_card set package ='FlixPay',userid='$rs'");
 
	//////////// to make card_id 
	$dbrusult=mysql_query("select * from $Table_card where id > '$last_old_card'");
	while ($row=mysql_fetch_array($dbrusult))
	{
	$no=$row[id];
    $t1 =md5(md5(md5("$no")));
    $tn1=substr($t1,1,1);
    $tn2=substr($t1,4,3);
	$tn3=substr($t1,8,3);
	$tn4=substr($t1,11,3);
	
	 $card_id=$tn1.$tn4.$no."U".$tn3.$tn2.$tn1;
	

     //////////////SELECT CASH U TIME /////////////////////////	

	     if($_POST['pid']=='1'){$TIME=mysql_fetch_array(mysql_query("select CashU_Time1 from $Table_setting where sid='1'"));}
	 elseif($_POST['pid']=='2'){$TIME=mysql_fetch_array(mysql_query("select CashU_Time2 from $Table_setting where sid='1'"));}
	 elseif($_POST['pid']=='3'){$TIME=mysql_fetch_array(mysql_query("select CashU_Time3 from $Table_setting where sid='1'"));}
	 	 /*-------------increase cashu card-------------------*/
	 $val= Remainder($rs,$Table_card);
	 
	 if($val[0]>0)
     $TIME[0]=$TIME[0]+$val[0];
	 /*---------------------------------------------------*/

	$start=date("Y-m-d");
      $end= date( "Y-m-d", strtotime( "$start +$TIME[0] days" ) );
	///////////////// update card_id on db 
	mysql_query("update $Table_card set cardid='$card_id',valid='$TIME[0]',enable='true',start='$start',end='$end' where id='$no'");
    mysql_query("update $Table_usrs set balance='$TIME[0]' where user_id='$rs'");
	mysql_query("update $Table_card set valid='$val[0]' , enable='false' where userid='$val[1]'");
	
		$card_valid=$TIME[0];
		$start_date=$start;
		$end_date=$end;
		

	$increase_baland="Done";
		


	} // end while
    mysql_free_result($dbrusult);
}
/*-------------###### END FlixPay.com Procedure ######## ---------*/