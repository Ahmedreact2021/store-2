/*==================================================================================*\

|| ################################################################################ ||

|| # ---------------------------------------------------------------------------- # ||

|| #          All PHP code in this file is ©2005-2006 written by astm.            # ||

|| #     This file may not be redistributed in whole or significant part.		  # ||

|| # ------------------------ THIS IS NOT FREE SOFTWARE ------------------------- # ||

|| # 				     Developed by  astm_desig@hotmail.com 			          # ||

|| ################################################################################ ||

\*==================================================================================*/

function MM_openBrWindow(theURL,winName,features) { //v2.0

  window.open(theURL,winName,features);

}

function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}



function EC(TheTR,img)

{

var DataTR = eval('document.all.' + TheTR);

if (DataTR.style.display=="block" || DataTR.style.display=="" )

{

DataTR.style.display="none";

}

else

{

DataTR.style.display="block";

}

}



function yesorno (astm) 

{ 

x=confirm(astm);

if (x==true) 

{

return true

}

if (x==false) 

{

return false

}

}



function SelectAll()

{

    for(var i=0;i<document.theForm.elements.length;i++)

    {

        if(document.theForm.elements[i].type == "checkbox")

        {

            document.theForm.elements[i].checked = true;

        }

    }

}

function UNSelectAll()

{

    for(var i=0;i<document.theForm.elements.length;i++)

    {

        if(document.theForm.elements[i].type == "checkbox")

        {

            document.theForm.elements[i].checked = false;

        }

    }

}



function rbDeSelect(){



	document.getElementById("SingleSend").value = "ÇÈÏÇÁ ÇáÊÓÌíá";

	document.getElementById("SingleSend").disabled=false;

	document.getElementById("SingleSend").focus();

}

function Checkuser()

{

var ch_user;

if (formprofile.username.value == "")

 {

alert("ãä ÝÖáß ÇßÊÈ ÇÓã ÇáãÓÊÎÏã");

formprofile.username.focus();

return (false);

 }

ch_user=formprofile.username.value

open("check.php?ch_user="+ch_user+"","windowopen","toolbar=0,location=0,width=290,height=130,status=1");

}



function astm_profile(){

if (document.formprofile.username.value =="")

 {

alert("ãä ÝÖáß ÇßÊÈ ÇÓã ÇáãÓÊÎÏã");

document.formprofile.username.focus();

return false;

 }



  var checkEmail = "@.";

  var checkStr = document.formprofile.EMail.value;

  var EmailValid = false;

  var EmailAt = false;

  var EmailPeriod = false;

  for (i = 0;  i < checkStr.length;  i++)

  {

    ch = checkStr.charAt(i);

    for (j = 0;  j < checkEmail.length;  j++)

    {

      if (ch == checkEmail.charAt(j) && ch == "@")

        EmailAt = true;

      if (ch == checkEmail.charAt(j) && ch == ".")

        EmailPeriod = true;

	  if (EmailAt && EmailPeriod)

		break;

	  if (j == checkEmail.length)

		break;

	}

	// if both the @ and . were in the string

    if (EmailAt && EmailPeriod)

    {

		EmailValid = true

		break;

	}

  }

  if (!EmailValid)

  {

    alert("ÇÏÎá ÇáÈÑíÏ ÇáÇáßÊÑæäí ÇáÕÍíÍ");

    document.formprofile.EMail.focus();

    return (false);

  }





if (document.formprofile.EMail.value !== document.formprofile.EMail2.value)

 {

alert("ãä ÝÖáß ÊÃßÏ ãä Çä ÇáÈÑíÏ ÇáÇáßÊÑæäì ãÊØÇÈÞ ãä ÊÃßíÏ ÇáÈÑíÏ ÇáÇáßÊÑæäì");

document.formprofile.EMail2.focus();

return false;

 }



if (document.formprofile.pass.value =="")

 {

alert("ãä ÝÖáß ÇßÊÈ ßáãÉ ÇáãÑæÑ");

document.formprofile.pass.focus();

return false;

 }



if (document.formprofile.pass.value !== document.formprofile.pass2.value)

 {

alert("ãä ÝÖáß ÊÃßÏ ãä Çä ßáãÉ ÇáÓÑ ãÊÓÇæíÉ ãÚ ÍÞá ÊÃßíÏ ßáãÉ  ÇáÓÑ");

document.formprofile.pass2.focus();

return false;

 }



if (document.formprofile.name.value =="")

 {

alert("ãä ÝÖáß ÇßÊÈ ÇáÇÓã");

document.formprofile.name.focus();

return false;

 }



if (document.formprofile.Gender.value =="")

 {

alert("ãä ÝÖáß ÇÎÊÇÑ ÇáäæÚ");

document.formprofile.Gender.focus();

return false;

 }



if (document.formprofile.Country.value =="")

 {

alert("ãä ÝÖáß ÇÎÊÇÑ ÏæáÉ ÇáÇÞÇãÉ");

document.formprofile.Country.focus();

return false;

 }



if (document.formprofile.Nationalty.value =="")

 {

alert("ãä ÝÖáß ÇÎÊÇÑ ÇáÌäÓíÉ");

document.formprofile.Nationalty.focus();

return false;

 }



if (document.formprofile.day.value =="")

 {

alert("ãä ÝÖáß ÇÎÊÇÑ íæã ÇáãíáÇÏ");

document.formprofile.day.focus();

return false;

 }



if (document.formprofile.month.value =="")

 {

alert("ãä ÝÖáß ÇÎÊÇÑ ÔåÑ ÇáãíáÇÏ");

document.formprofile.month.focus();

return false;

 }



if (document.formprofile.year.value =="")

 {

alert("ãä ÝÖáß ÇÎÊÇÑ ÓäÉ ÇáãíáÇÏ");

document.formprofile.year.focus();

return false;

 }



}



function astm_sign(){

if (document.formsign.user.value =="" || document.formsign.user.value=="ÇÓã ÇáãÓÊÎÏã")

 {

alert("ãä ÝÖáß ÇßÊÈ ÇÓã ÇáãÓÊÎÏã");

document.formsign.user.focus();

return false;

 }



if (document.formsign.pass.value =="" || document.formsign.pass.value =="ßáãÉ ÇáÓÑ")

 {

alert("ãä ÝÖáß ÇßÊÈ ßáãÉ ÇáÓÑ");

document.formsign.pass.focus();

return false;

 }

}







function astm_balance(){

if (document.form_balance.Card.value =="")

 {

alert("ãä ÝÖáß ÇÏÎá ÑÞã ÇáÈØÇÞÉ ÇáÓÑì áÊÊãßä ãä ÔÍä ÇáÑÕíÏ");

document.form_balance.Card.focus();

return false;

 }

}



function astm_serch(){

if (document.formSer.Age_Ser.value =="")

 {

alert("ãä ÝÖáß ÇÎÊÇÑ ÇáÓä");

document.formSer.Age_Ser.focus();

return false;

 }



if (document.formSer.Country_Ser.value =="*")

 {

alert("ãä ÝÖáß ÇÎÊÇÑ ÇáÏæáÉ");

document.formSer.Country_Ser.focus();

return false;

 }

}



function astm_Message(){

if (document.Message.Mailtitle.value =="")

 {

alert("ãä ÝÖáß ÇßÊÈ ÚäæÇä ÇáÑÓÇáÉ");

document.Message.Mailtitle.focus();

return false;

 }



if (document.Message.mailBody.value =="")

 {

alert("ãä ÝÖáß ÇßÊÈ äÕ ÇáÑÓÇáÉ");

document.Message.mailBody.focus();

return false;

 }

}



function astm_calendar(){

if (document.formcalender.calendar.value =="")

 {

alert("ãä ÝÖáß ÇßÊÈ ÇáÍÏË ÇáãÑÇÏ ÊÓÌíáå ");

document.formcalender.calendar.focus();

return false;

 }

}



function astm_supervisor(){

if (document.formsupervisor.subject.value =="")

 {

alert("ãä ÝÖáß ÇßÊÈ ÚäæÇä ÇáÑÓÇáÉ");

document.formsupervisor.subject.focus();

return false;

 }



if (document.formsupervisor.comment.value =="")

 {

alert("ãä ÝÖáß ÇßÊÈ äÕ ÇáÑÓÇáÉ");

document.formsupervisor.comment.focus();

return false;

 }

}