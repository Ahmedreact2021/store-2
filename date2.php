<? require("config.php");
 $res=mysql_query("select MailDate from $Table_mailbox where `MailDate` NOT like '2009%'")or die(mysql_error()); 

	while($row=mysql_fetch_array($res))
	{
	//echo $row[0];
		$date = $row[MailDate];
		$date= explode('-',$date);
		//if($date[2]=='0000') continue;
		$date=$date[2]."-".$date[1]."-".$date[0];
		
		 mysql_query("update $Table_mailbox set
		  MailDate='$date' where MailDate='$row[MailDate]'"); 
    }
						
echo "sucsess";
						  ?>