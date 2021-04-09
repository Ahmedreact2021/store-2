<? require("config.php");
 $res_coun=mysql_query("select title from $Table_conv2 ")or die(mysql_error()); 
$i=1;
	while($row_coun=mysql_fetch_array($res_coun))
	{
		$new=iconv("windows-1256", "UTF-8", $row_coun[0]);
 		
		 mysql_query("update $Table_conv2 set title =$new where id =$i");
		 $i++;
    }
						
echo "sucsess";
						  ?>