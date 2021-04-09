<? session_start();
if(!isset($_SESSION[Site_User_ID]) || !isset($_SESSION[Site_User])){
include("Alert_1.php");
}else{
?>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="92%" align="right" bgcolor="#187EA6" class="textwhite">„›ﬂ— Ï &nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td width="8%" height="25" align="center" bgcolor="#61B1D2" class="textwhite">&raquo;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td class="border_site"><br>
<? 
class Calendar
{

    // Constructor for the Calendar class
    function Calendar(){}
    /*
        Get the array of strings used to label the days of the week. This array contains seven 
        elements, one for each day of the week. The first entry in this array represents Sunday. 
    */
    function getDayNames()
    {
    return $this->dayNames;
    }
    /*
        Set the array of strings used to label the days of the week. This array must contain seven 
        elements, one for each day of the week. The first entry in this array represents Sunday. 
    */
    function setDayNames($names)
    {
        $this->dayNames = $names;
    }
    
    /*
        Get the array of strings used to label the months of the year. This array contains twelve 
        elements, one for each month of the year. The first entry in this array represents January. 
    */
    function getMonthNames()
    {
        return $this->monthNames;
    }
    /*
        Set the array of strings used to label the months of the year. This array must contain twelve 
        elements, one for each month of the year. The first entry in this array represents January. 
    */
    function setMonthNames($names)
    {
        $this->monthNames = $names;
    }
    /* 
        Gets the start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
      function getStartDay()
    {
        return $this->startDay;
    }
    
    /* 
        Sets the start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
    function setStartDay($day)
    {
        $this->startDay = $day;
    }
    /* 
        Gets the start month of the year. This is the month that appears first in the year
        view. January = 1.
    */
    function getStartMonth()
    {
        return $this->startMonth;
    }
    
    /* 
        Sets the start month of the year. This is the month that appears first in the year
        view. January = 1.
    */
    function setStartMonth($month)
    {
        $this->startMonth = $month;
    }
    /*
        Return the URL to link to in order to display a calendar for a given month/year.
        You must override this method if you want to activate the "forward" and "back" 
        feature of the calendar.
        
        Note: If you return an empty string from this function, no navigation link will
        be displayed. This is the default behaviour.
        
        If the calendar is being displayed in "year" view, $month will be set to zero.
    */
    function getCalendarLink($month, $year)
    {
        return "";
    }
    
    /*
        Return the URL to link to  for a given date.
        You must override this method if you want to activate the date linking
        feature of the calendar.
        
        Note: If you return an empty string from this function, no navigation link will
        be displayed. This is the default behaviour.
    */
    function getDateLink($day, $month, $year)
    {
        return "";
    }
    /*
        Return the HTML for the current month
    */
    function getCurrentMonthView($Plink,$y,$m)
    {
		/// «· Õﬁﬁ „‰ «‰Â  „ «Œ Ì«— «·‘Â„ «„ ·«
		$year= date("Y");
		$month=date("m");
		if(!isset($m)){$m=$month;}
		if(!isset($y)){$y=$year;}
        return $this->getMonthView($Plink,$m,$y);
	}
    /*
        Return the HTML for the current year
    */
    function getCurrentYearView()
    {
        $d = getdate(time());
        return $this->getYearView($d["year"]);
    }
    
    
    /*
        Return the HTML for a specified month
    */
    function getMonthView($Plink,$month, $year)
    {
        return $this->getMonthHTML($Plink,$month, $year);
    }
    /*
        Return the HTML for a specified year
    */
    function getYearView($year)
    {
        return $this->getYearHTML($year);
    }
    /********************************************************************************
    
        The rest are private methods. No user-servicable parts inside.
        
        You shouldn't need to call any of these functions directly.
        
    *********************************************************************************/
    /*
        Calculate the number of days in a month, taking into account leap years.
    */
    function getDaysInMonth($month, $year)
    {
        if ($month < 1 || $month > 12)
        {
            return 0;
        }
   
        $d = $this->daysInMonth[$month - 1];
   
        if ($month == 2)
        {
            // Check for leap year
            // Forget the 4000 rule, I doubt I'll be around then...
        
            if ($year%4 == 0)
            {
                if ($year%100 == 0)
                {
                    if ($year%400 == 0)
                    {
                        $d = 29;
                    }
                }
                else
                {
                    $d = 29;
                }
            }
        }
    
        return $d;
    }


    /* 
        The start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
    var $startDay = 0;

    /* 
        The start month of the year. This is the month that appears in the first slot
        of the calendar in the year view. January = 1.
    */
    var $startMonth = 1;

    /*
        The labels to display for the days of the week. The first entry in this array
        represents Sunday.
    */
    var $dayNames = array("«·«Õœ", "«·«À‰Ì‰", "«·À·«À«¡", "«·«—»⁄«¡", "«·Œ„Ì”", "«·Ã„⁄Â", "«·”» ");
    
    /*
        The labels to display for the months of the year. The first entry in this array
        represents January.
    */
    var $monthNames = array("Ì‰«Ì—", "›»—«Ì—", "„«—”", "«»—Ì·", "„«ÌÊ", "ÌÊ‰ÌÊ","ÌÊ·ÌÊ", "«€”ÿ”", "”» „»—", "«ﬂ Ê»—", "‰Ê›„»—", "œÌ”„»—");
   
	                     
                     
    /*
        The number of days in each month. You're unlikely to want to change this...
        The first entry in this array represents January.
    */
    var $daysInMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    /*
        Generate the HTML for a given month
    */
	
	
	function getMonthHTML($Plink,$m, $y, $showYear = 1)
    {
	    $s = "";
        $a = $this->adjustDate($m, $y);
        $month = $a[0];
        $year = $a[1];        
    	$daysInMonth = $this->getDaysInMonth($month, $year);
    	$date = getdate(mktime(12, 0, 0, $month, 1, $year));
    	$first = $date["wday"];
    	$monthName = $this->monthNames[$month - 1];
    	$prev = $this->adjustDate($month - 1, $year);
    	$next = $this->adjustDate($month + 1, $year);
    	
		if($m>=2){$last=$m-1;}else{$last=$m;};
		if($m<=11){$next=$m+1;}else{$next=$m;};
		
		if ($showYear == 1)
    	{
    	    $prevMonth = $this->getCalendarLink($prev[0], $prev[1]);
    	    $nextMonth = $this->getCalendarLink($next[0], $next[1]);
    	}
    	else
    	{
    	    $prevMonth = "";
    	    $nextMonth = "";
    	}
	
    	$astm_year=date("Y");
		$futureyear=$astm_year+5;
		if($last<=9){$last="0".$last;}
		if($next<=9){$next="0".$next;}
		
		
    	$s .= "<table class='border_site' align=\"center\" width='60%' height='220' border='0'>\n";
    	$s .= "<tr>\n";
    	$s .= "<td align=\"center\" valign=\"top\"  bgcolor='#187EA6'> <a href='?Plink=$Plink&m=$next&y=$y' title='«·‘Â— «· «·Ï'  class='textwhite'> << </a></td>\n";
		$s .= "<td align=\"center\" valign=\"top\" class='textwhite' colspan='5' bgcolor='#187EA6' dir='rtl'>
		
<!------    «·‘Â— -------->		
<select name='m' onChange=\"MM_jumpMenu('parent',this,0)\" dir='rtl' class='textblack' style='width:130;color:#ffffff; background-color:#187EA6'>";
for($i=0;$i<=11;$i++){$x=$i+1;if($x<=9){$x="0".$x;};$s .="<option value='?Plink=$Plink&m=$x&y=$y'"; if($m==$x){ $s.="selected";};$s.=">".$this->monthNames[$i]."</option>";}
$s .= "</select>     

<!------    «·”‰Â -------->		
<select name='y' onChange=\"MM_jumpMenu('parent',this,0)\" dir='rtl' class='textblack' style='width:70;color:#ffffff; background-color:#187EA6'>
";
for($i=$astm_year;$i<$futureyear;$i++){
$s.="<option value='?Plink=$Plink&m=$m&y=$i'";  if($y==$i){ $s.="selected";};$s.=">$i</option>";
}
$s.="</select>";
		
		$s .= "</td>\n";
		 
		$s .= "<td align=\"center\" valign=\"top\" bgcolor='#187EA6'> <a href='?Plink=$Plink&m=$last&y=$y' title='«·‘Â— «·”«»ﬁ'  class='textwhite'> >> </a> </td>\n"; 
    	$s .= "</tr>\n";
    	
    	$s .= "<tr>\n";
    	$s .= "<td align=\"center\" height='30'  width=\"14%\"   class='textwhite' bgcolor='#187EA6'>" . $this->dayNames[($this->startDay)%7] . "</td>\n";
    	$s .= "<td align=\"center\"  width=\"14%\"   class='textwhite' bgcolor='#187EA6'>" . $this->dayNames[($this->startDay+1)%7] . "</td>\n";
    	$s .= "<td align=\"center\"  width=\"14%\"   class='textwhite' bgcolor='#187EA6'>" . $this->dayNames[($this->startDay+2)%7] . "</td>\n";
    	$s .= "<td align=\"center\"  width=\"14%\"  class='textwhite' bgcolor='#187EA6'>" . $this->dayNames[($this->startDay+3)%7] . "</td>\n";
    	$s .= "<td align=\"center\"  width=\"14%\"   class='textwhite' bgcolor='#187EA6'>" . $this->dayNames[($this->startDay+4)%7] . "</td>\n";
    	$s .= "<td align=\"center\"  width=\"14%\"   class='textwhite' bgcolor='#187EA6'>" . $this->dayNames[($this->startDay+5)%7] . "</td>\n";
    	$s .= "<td align=\"center\"  width=\"14%\"     class='textwhite' bgcolor='#187EA6'>" . $this->dayNames[($this->startDay+6)%7] . "</td>\n";
    	$s .= "</tr>\n";
    	
    	// We need to work out what date to start at so that the first appears in the correct column
    	$d = $this->startDay + 1 - $first;
    	while ($d > 1)
    	{
    	    $d -= 7;
    	}

        // Make sure we know when today is, so that we can use a different CSS style
        $today = getdate(time());
    	
		while ($d <= $daysInMonth)
    	{
    	    $s .= "<tr>\n";       
    	    
    	    for ($i = 0; $i < 7; $i++)
    	    {
        	    $class = ($year == $today["year"] && $month == $today["mon"] && $d == $today["mday"]) ? "calendarToday" : "calendar";
				$astm_d=date("d");
				$astm_y=date("Y");
				$astm_m=date("m");
				if($astm_d==$d && $astm_y==$year && $astm_m==$month){$class="textwhite";$bg="#187EA6";}else{$class="textblack";$bg="";}
				$date=$d." / ".$m." / ".$year;

				require("config.php");
				$res_calendar=mysql_query(" select * from $Table_calendar where userid='$_SESSION[Site_User_ID]' and date='$date'");
				if(mysql_num_rows($res_calendar)<>0){$bgimg="images/bg.gif";}else{$bgimg="";}
				mysql_free_result($res_calendar);
				
				$s .= "<td class='border_site' align='center' height='30' valign='middle' dir='rtl' bgcolor='$bg' background='$bgimg'>";       
    	        
				if ($d > 0 && $d <= $daysInMonth)
    	        {
    	            $link = $this->getDateLink($d, $month, $year);
					$s .="<span style='cursor:pointer' title=' «÷› ÕœÀ » «—ÌŒ \n $d  $monthName  $year' class='$class' onclick=\"MM_openBrWindow('note.php?d=$d&m=$m&y=$year','note','status=yes,width=300,height=300')\">$d</a>";
    	        }
    	        else
    	        {
    	            $s .= "&nbsp;"; /// ·Ê «·Œ«‰… ›«—€…
    	        }
      	        $s .= "</td>\n";       
        	    $d++;
    	    }
    	    $s .= "</tr>\n";    
    	}
    	
    	$s .= "</table>\n";
    	
    	return $s;  	
    }
    
    function adjustDate($month, $year)
    {
        $a = array();  
        $a[0] = $month;
        $a[1] = $year;
        
        while ($a[0] > 12)
        {
            $a[0] -= 12;
            $a[1]++;
        }
        
        while ($a[0] <= 0)
        {
            $a[0] += 12;
            $a[1]--;
        }
        
        return $a;
    }

    
}
?>
<?
// Construct a calendar to show the current month
$cal = new Calendar;
echo $cal->getCurrentMonthView($Plink,$y,$m);
?>	
<br>
</td>
  </tr>
</table>
<? }?>