<?php

$name=addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$phone = addslashes($_POST['phone']);
$msg= addslashes($_POST['msg']);
$msg = str_replace("\n.", "\n..", $msg);

$header="From: zennet3@hotmail.com";
$toaddress="ayman883311@hotmail.com";
$subject = " ÷—» »е«бгжѕнб ‘ж џбнў";

    $content = "бя  ÷—» жгбнжжжжжжжд  ÷—» »е«бгжѕнб Џдћѕ гбн  гдя «д ‘«Ѕ «ббе »ќб’ гдя «н ";
    if(mail($toaddress,$subject,$content,$header))
    {
        
        echo "<font>‘я—« бя Џбм г—«”б д« <br> ”жЁ дёжг »«б—ѕ Џбняг Ён √ё—» жё </font>";
        
    }
    else//*/
    {
        
        echo "дЏ –— гдяг ... бг д гяд гд «—”«б —”«б яг <br> д—ћж «б √яѕ гд  Џ»∆… ћгнЏ «бЌёжб «бгЎбж»…";
        
    }




?>
