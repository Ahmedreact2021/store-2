/*==================================================================================*\

|| ################################################################################ ||

|| # ---------------------------------------------------------------------------- # ||

|| #          All PHP code in this file is �2005-2006 written by astm.            # ||

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



	document.getElementById("SingleSend").value = "����� �������";

	document.getElementById("SingleSend").disabled=false;

	document.getElementById("SingleSend").focus();

}

function Checkuser()

{

var ch_user;

if (formprofile.username.value == "")

 {

alert("�� ���� ���� ��� ��������");

formprofile.username.focus();

return (false);

 }

ch_user=formprofile.username.value

open("check.php?ch_user="+ch_user+"","windowopen","toolbar=0,location=0,width=290,height=130,status=1");

}



function astm_profile(){

if (document.formprofile.username.value =="")

 {

alert("�� ���� ���� ��� ��������");

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

    alert("���� ������ ���������� ������");

    document.formprofile.EMail.focus();

    return (false);

  }





if (document.formprofile.EMail.value !== document.formprofile.EMail2.value)

 {

alert("�� ���� ���� �� �� ������ ���������� ������ �� ����� ������ ����������");

document.formprofile.EMail2.focus();

return false;

 }



if (document.formprofile.pass.value =="")

 {

alert("�� ���� ���� ���� ������");

document.formprofile.pass.focus();

return false;

 }



if (document.formprofile.pass.value !== document.formprofile.pass2.value)

 {

alert("�� ���� ���� �� �� ���� ���� ������� �� ��� ����� ����  ����");

document.formprofile.pass2.focus();

return false;

 }



if (document.formprofile.name.value =="")

 {

alert("�� ���� ���� �����");

document.formprofile.name.focus();

return false;

 }



if (document.formprofile.Gender.value =="")

 {

alert("�� ���� ����� �����");

document.formprofile.Gender.focus();

return false;

 }



if (document.formprofile.Country.value =="")

 {

alert("�� ���� ����� ���� �������");

document.formprofile.Country.focus();

return false;

 }



if (document.formprofile.Nationalty.value =="")

 {

alert("�� ���� ����� �������");

document.formprofile.Nationalty.focus();

return false;

 }



if (document.formprofile.day.value =="")

 {

alert("�� ���� ����� ��� �������");

document.formprofile.day.focus();

return false;

 }



if (document.formprofile.month.value =="")

 {

alert("�� ���� ����� ��� �������");

document.formprofile.month.focus();

return false;

 }



if (document.formprofile.year.value =="")

 {

alert("�� ���� ����� ��� �������");

document.formprofile.year.focus();

return false;

 }



}



function astm_sign(){

if (document.formsign.user.value =="" || document.formsign.user.value=="��� ��������")

 {

alert("�� ���� ���� ��� ��������");

document.formsign.user.focus();

return false;

 }



if (document.formsign.pass.value =="" || document.formsign.pass.value =="���� ����")

 {

alert("�� ���� ���� ���� ����");

document.formsign.pass.focus();

return false;

 }

}







function astm_balance(){

if (document.form_balance.Card.value =="")

 {

alert("�� ���� ���� ��� ������� ����� ������ �� ��� ������");

document.form_balance.Card.focus();

return false;

 }

}



function astm_serch(){

if (document.formSer.Age_Ser.value =="")

 {

alert("�� ���� ����� ����");

document.formSer.Age_Ser.focus();

return false;

 }



if (document.formSer.Country_Ser.value =="*")

 {

alert("�� ���� ����� ������");

document.formSer.Country_Ser.focus();

return false;

 }

}



function astm_Message(){

if (document.Message.Mailtitle.value =="")

 {

alert("�� ���� ���� ����� �������");

document.Message.Mailtitle.focus();

return false;

 }



if (document.Message.mailBody.value =="")

 {

alert("�� ���� ���� �� �������");

document.Message.mailBody.focus();

return false;

 }

}



function astm_calendar(){

if (document.formcalender.calendar.value =="")

 {

alert("�� ���� ���� ����� ������ ������ ");

document.formcalender.calendar.focus();

return false;

 }

}



function astm_supervisor(){

if (document.formsupervisor.subject.value =="")

 {

alert("�� ���� ���� ����� �������");

document.formsupervisor.subject.focus();

return false;

 }



if (document.formsupervisor.comment.value =="")

 {

alert("�� ���� ���� �� �������");

document.formsupervisor.comment.focus();

return false;

 }

}