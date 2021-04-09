

<html> 

<head> 

<body> 

 <link rel="stylesheet" href="style.css" type="text/css" />

<link href="style3.css" rel="stylesheet" type="text/css">



<link href="style.css" rel="stylesheet" type="text/css">


<link href="style2.css" rel="stylesheet" type="text/css">








<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                              <tr>
                                <td colspan="3" align="right" class="button1"><table width="100%"  border="0">
                                    <tr>
                                      <td width="55%" align="right" class="textsite">رجل</td>
                                      <td width="7%"><input name='Gender_Ser' type=radio value="1"   <? if($Gender_Ser=="1"){?> checked<? }?> /></td>
                                      <td width="7%" align="right" class="textsite">امرأة</td>
                                      <td width="31%"><input  name='Gender_Ser' type=radio value="0" <? if($Gender_Ser=="0" || !isset($Gender_Ser)){?> checked<? }?> /></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr align="right">
                                <td width="83%"  align="right" class="textsite"><input type="text" name="UserName" style="width:80" /></td>
                                <td width="5%"  align="right" class="textsite">الاســـم</td>
                                <td width="8%"><select name="Age_Ser" class="textblack" id="age" style="width:80">
                                    <option value="all" <? if($Age_Ser=="all"){?> selected<? }?>>الكل</option>
                                    <option dir="rtl"  value="18-20"  <? if($Age_Ser=="18-20"){?> selected<? }?>>18-20</option>
                                    <option dir="rtl"  value="20-25"   <? if($Age_Ser=="20-25"){?> selected<? }?>>20-25</option>
                                    <option dir="rtl"  value="25-30"   <? if($Age_Ser=="25-30"){?> selected<? }?>>25-30</option>
                                    <option dir="rtl"  value="30-35"   <? if($Age_Ser=="30-35"){?> selected<? }?>>30-35</option>
                                    <option dir="rtl"  value="35-40"   <? if($Age_Ser=="35-40"){?> selected<? }?>>35-40</option>
                                    <option dir="rtl"  value="40-45"   <? if($Age_Ser=="40-45"){?> selected<? }?>>40-45</option>
                                    <option dir="rtl"  value="45-50"   <? if($Age_Ser=="45-50"){?> selected<? }?>>45-50</option>
                                    <option dir="rtl"  value="50-55"   <? if($Age_Ser=="50-55"){?> selected<? }?>>50-55</option>
                                    <option dir="rtl"  value="55-60"   <? if($Age_Ser=="55-60"){?> selected<? }?>>55-60</option>
                                    <option dir="rtl"  value="60-65"   <? if($Age_Ser=="60-65"){?> selected<? }?>>60-65</option>
                                    <option dir="rtl"  value="65-70"   <? if($Age_Ser=="65-70"){?> selected<? }?>>65-70</option>
                                    <option dir="rtl"  value="70-75"   <? if($Age_Ser=="70-75"){?> selected<? }?>>70-75</option>
                                    <option dir="rtl"  value="75-80<"   <? if($Age_Ser=="75-80"){?> selected<? }?>>75-80</option>
                                  </select>                                </td>
                                <td width="4%"  align="left" class="textsite">السن</td>
                              </tr>
                              <tr align="right">
                                <!------------------------------------------------------------->
                                <td align="right"><select name='Nationalty' class=textblack id="Country_Ser" style="width:80">
                                    <option value="all" selected>كل الجنسيات</option>
                                    <?

						  $res_nat=mysql_query("select * from $Table_country order by binary co_name desc");

						  while($row_nat=mysql_fetch_array($res_nat))

						  {

						  ?>
                                    <option value="<?=$row_nat[co_id]?>"  <? if($Nationalty==$row_nat[co_id]){?> selected<? }?>>
                                      <?=$row_nat[co_name]?>
                                    </option>
                                    <?

						  } 

						  mysql_free_result($res_nat); 
						  ?>
                                  </select>                                </td>
                                <td  align="right" class="textsite">الجنسية</td>
                                <!-------------------------------------------------------------->
                                <td align="right"><select name='Country_Ser' class=textblack id="Country_Ser" style="width:80" >
                                    <option value="all" selected>كل الدول</option>
                                    <?

						  $res_coun=mysql_query("select * from $Table_country order by binary co_name desc");

						  while($row_coun=mysql_fetch_array($res_coun))

						  {

						  ?>
                                    <option value="<?=$row_coun[co_id]?>" <? if($Country_Ser==$row_coun[co_id]){?> selected<? }?>>
                                      <?=$row_coun[co_name]?>
                                    </option>
                                    <?

						  } 

						  mysql_free_result($res_coun); 

						  ?>
                                  </select>                                </td>
                                <td align="left" class="textsite">الدولة</td>
                                <!----------------------------------------------------------------->
                              </tr>
                              <tr>
                                <td align="right" colspan="2"><input name="Submit2" type="image" src="images/search.gif" title="بحث" class="screpte"  value="بحث" />
                                    <input name="Lang" type="hidden" id="Lang" value="<?=$Lang?>" />                                </td>
                                <td>&nbsp;</td>
                              </tr>
                            </table>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="searchimg">
				<div class="searchtext_block">

					<div class="searchtext">Quick Search</div>
				</div>
				<div class="main_searchblock">
				<div class="selectboxblock1">
					<div class="iamablock">
						<div class="text_iam">&#1571;&#1606;&#1575;</div>
						<div class="sbox_iam">
							<select class="sbox_iam">
								<option>- select -</option>
								<option>woman</option>
								<option>man</option>
							</select>
						</div>
					</div>
					<div class="iamablock">
						<div class="text_iam">&#1575;&#1576;&#1581;&#1579; &#1593;&#1606; </div>
						<div class="sbox_iam">
					
                            
                 
                            
                            <select  class="sbox_iam" >
                     	<option>- select -</option>
                  

						                           
   
       	<option name='Gender_Ser'type=radio value="1" <? if($Gender_Ser=="1"){?> checked<? }?>> men</option>
	
                       	<option name='Gender_Ser'type=radio value="0" <? if($Gender_Ser=="0"){?> checked<? }?>> women</option>
	     
					
							</select>
                            
        
                            
                            
                            
						</div>
					</div>
				</div>
				<div class="selectboxblock">
					<div class="lookingforblock">
						<div class="lookingfor">&#1575;&#1585;&#1610;&#1583; </div>
						<div class="sbox_lookingfor">
										<select name="Age_Ser"  class="sbox_lookingfor"  id="age" >

<option value="all" <? if($Age_Ser=="all"){?> selected<? }?>>الكل</option>

<option dir="rtl"  value="18-20"  <? if($Age_Ser=="18-20"){?> selected<? }?>>18-20</option>

<option dir="rtl"  value="20-25"   <? if($Age_Ser=="20-25"){?> selected<? }?>>20-25</option>

<option dir="rtl"  value="25-30"   <? if($Age_Ser=="25-30"){?> selected<? }?>>25-30</option>

<option dir="rtl"  value="30-35"   <? if($Age_Ser=="30-35"){?> selected<? }?>>30-35</option>

<option dir="rtl"  value="35-40"   <? if($Age_Ser=="35-40"){?> selected<? }?>>35-40</option>

<option dir="rtl"  value="40-45"   <? if($Age_Ser=="40-45"){?> selected<? }?>>40-45</option>

<option dir="rtl"  value="45-50"   <? if($Age_Ser=="45-50"){?> selected<? }?>>45-50</option>

<option dir="rtl"  value="50-55"   <? if($Age_Ser=="50-55"){?> selected<? }?>>50-55</option>

<option dir="rtl"  value="55-60"   <? if($Age_Ser=="55-60"){?> selected<? }?>>55-60</option>

<option dir="rtl"  value="60-65"   <? if($Age_Ser=="60-65"){?> selected<? }?>>60-65</option>

<option dir="rtl"  value="65-70"   <? if($Age_Ser=="65-70"){?> selected<? }?>>65-70</option>

<option dir="rtl"  value="70-75"   <? if($Age_Ser=="70-75"){?> selected<? }?>>70-75</option>

<option dir="rtl"  value="75-80<"   <? if($Age_Ser=="75-80"){?> selected<? }?>>75-80</option>
</select>





                            
                            
                            
                            
    

                            
                            
                            
                            
						</div>
					</div>
				</div>
				<div class="selectboxblock">
					<div class="lookingforblock">
						<div class="lookingfor">الدولة</div>
				  <div class="sbox_iam">
							<select name='Country_Ser' class="sbox_iam" id="Country_Ser"  >

                          <option value="all" selected>كل الدول</option>

						  <?

						  $res_coun=mysql_query("select * from $Table_country order by binary co_name desc");

						  while($row_coun=mysql_fetch_array($res_coun))

						  {

						  ?>

						  <option value="<?=$row_coun[co_id]?>" <? if($Country_Ser==$row_coun[co_id]){?> selected<? }?>><?=$row_coun[co_name]?>		                          </option>

						  <?

						  } 

						  mysql_free_result($res_coun); 

						  ?>
				    </select>
					  </div>
						<div>
							<select name='Nationalty' class="sbox_dob" id="Country_Ser" style="width:80">

                          <option value="all" selected>كل الجنسيات</option>

						  <?

						  $res_nat=mysql_query("select * from $Table_country order by binary co_name desc");

						  while($row_nat=mysql_fetch_array($res_nat))

						  {

						  ?>

						  <option value="<?=$row_nat[co_id]?>"  <? if($Nationalty==$row_nat[co_id]){?> selected<? }?>><?=$row_nat[co_name]?>                          </option>

						  <?

						  } 

						  mysql_free_result($res_nat); 
						  ?>
						  </select>
					  </div>
						<div></div>
				        <span class="style1">الجنس</span></div>
				</div>
				<div class="selectboxblock">
					<div class="lookingforblock">
						<div class="lookingfor">&#1576;&#1575;&#1604;&#1585;&#1602;&#1605; </div>
						<div><input type="text" name="UserName"style="width:231px; height:18px;"/>
                        
                        
                        
                        
               
                        
                        
                        
                        
                        
                        
                        
                        
                        </div>
					</div>
				</div>
				</div>
				<div class="searchnowblock">
				
<div class="searchnowimg"><a class="searchnowimg" href="#"></a>



<input name="Submit" type="image" value="بحث"  > 




</div>
				</div>
			</div>
            
            
            
            
            </body>
            </head>
            
            </html>
            