<? session_start();

require("config.php");



if($_SERVER['REQUEST_METHOD']=="POST" && $LOGIN=="ASTM_MENU")
{


$res=mysql_query(" select * from  $Table_usrs where UserName='$user' and PassWord='$pass' ");


$row=mysql_fetch_array($res);

if($row[UserName] && $row[PassWord])
{
if($row[login]=="Active")
{ 
// „‰ Ÿ—  ‰‘Ìÿ «·«Ì„Ì· // 

echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?Sign=Active\">";

}
	elseif($row[login]=="block")
{

//  „ «Ìﬁ«› «·⁄÷ÊÌ… „‰ «·„‘—›" // 

echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?Sign=block\">";
}
elseif($row[login]=="true")
{
	$_SESSION[Site_User_ID]=$row[user_id];
	
	$_SESSION[Site_User]=$row[UserName];
	
	$_SESSION[Site_User_Name]=$row[Name];
	
	if($row[Laston_time]=="0"){$_SESSION[Site_User_Laston_time]="";}else{$_SESSION[Site_User_Laston_time]=$row[Laston_time];}
	
	
	
	
			
$res_balance=mysql_query(" select `balance` from $Table_setting where sid='1'");
$res1=mysql_fetch_array($res_balance);
if($res1[balance]=='1')/*>>>------«–« ﬂ«‰ «·„Êﬁ⁄ „«ÃÊ—-------------------*/
{
	/////////////////////// ‘Õ‰ «·—’Ìœ ///////////
	
	$res_card=mysql_query(" select * from $Table_card where userid='$_SESSION[Site_User_ID]' and enable='true'");
	
	$IsPremium=mysql_fetch_array(mysql_query("select free_account from $Table_setting where sid='1'"));

		if(mysql_num_rows($res_card)!=0)
		
		{
		
			$row_card=mysql_fetch_array($res_card);
			
			
			
			$daynow=date("Y-m-d");
			
			$end=$row_card['end'];
			
			$day = strtotime($end) - strtotime($daynow);
			
			
			 $valid=ceil ($day / (60*60*24));
			

				if($valid>0)
				{
					$_SESSION[Site_User_Card]=$valid;
				}
				else
				{
				
				   echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?Sign=exp\">";
					
					$valid=0;
					
					mysql_query("update $Table_card set valid='$valid' , enable='false' where id='$row_card[id]'");
					if($IsPremium[free_account]=='0')
					{
					unset($_SESSION[Site_User_Card]);
					unset($_SESSION[Site_User_ID]);
					unset($_SESSION[Site_User]);
					unset($_SESSION[Site_User_Name]);
					}
	
				
				}
					
					mysql_query("update $Table_card set valid='$valid' where id='$row_card[id]'");
					
					mysql_query("update $Table_usrs set balance='$valid' where user_id='$_SESSION[Site_User_ID]'");
					
		}
		
			else 
				{
				
					echo "<meta http-equiv='refresh' content='0;URL=index.php?Sign=exp'>";
					if($IsPremium[free_account]=='0')
					{
					unset($_SESSION[Site_User_ID]);
					unset($_SESSION[Site_User]);
					unset($_SESSION[Site_User_Name]);
					}
					exit;
					
				
				 }
		
		mysql_free_result($res_card);
}		


		///////////////////////////////////////////////////

		////////////////////////////
		
		$day=date("Y-m-d");
		
		$time=time();
		
		$ip=$REMOTE_ADDR;
		
		mysql_query("update $Table_usrs set ip='$ip',Laston_time='$time',online='true' where user_id='$_SESSION[Site_User_ID]'");
		
		$res_user_statistics=mysql_query("select * from $Table_user_statistics where s_usrerid='$_SESSION[Site_User_ID]' and s_day='$day'");
		
		if(mysql_num_rows($res_user_statistics)==0)
		{
		
				mysql_query("insert into $Table_user_statistics set                                                                                            s_usrerid='$_SESSION[Site_User_ID]',s_username='$_SESSION[Site_User]',s_day='$day',s_time='$time',s_total='1',s_from                                        ='$_SESSION[HTTP_REFERER]',s_kind='$row[Gender]'");
		
		}
		else
		{
		
		$row_stat=mysql_fetch_array($res_user_statistics);
		
		$s_total=$row_stat[s_total]+1;
		
		mysql_query("update $Table_user_statistics set s_time='$time',s_total='$s_total',s_from='$_SESSION[HTTP_REFERER]' where s_usrerid='$_SESSION[Site_User_ID]'");
		
		
		}
		mysql_free_result($res_user_statistics);
		
		//„” Œœ„ ’ÕÌÕ //
		
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
	    
	}
	
	

}

else{

//Œÿ«¡ »«· ”ÃÌ· //

echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?Sign=Error\">";

}

mysql_free_result($res);

}else{

// œŒÊ· €Ì— ‘—⁄Ï //

echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";

}

?>
