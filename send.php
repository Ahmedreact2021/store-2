<?php

$name=addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$phone = addslashes($_POST['phone']);
$msg= addslashes($_POST['msg']);
$msg = str_replace("\n.", "\n..", $msg);

$header="From: zennet3@hotmail.com";
$toaddress="ayman883311@hotmail.com";
$subject = "���� ��������� �� ����";

    $content = "�� ���� ������������ ���� ��������� ���� ���� ��� �� ��� ���� ���� ��� �� ";
    if(mail($toaddress,$subject,$content,$header))
    {
        
        echo "<font>���� �� ��� �������� <br> ��� ���� ����� ����� �� ���� ���</font>";
        
    }
    else//*/
    {
        
        echo "����� ���� ... �� ����� �� ����� ������� <br> ���� ������ �� ����� ���� ������ ��������";
        
    }




?>
