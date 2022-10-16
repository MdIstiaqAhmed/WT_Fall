<?php
$error_count=0;
$firstnameerror=$lastnameerror = $gender = $niderror =$passworderror= $confirmpassworderror="";
if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["first_name"]))
    {
        $firstnameerror="*Your first name is required";
    }else{
        $firstnameerror= "Your first name is ".$_REQUEST["first_name"];
    }
    echo "<br>";

    if (empty($_REQUEST['last_name']))
    {
        $lastnameerror = '*Empty field.Please write your last name!';
    }
        else 
    {
       
        $lastnameerror = $_REQUEST['last_name'];
    }



echo"<br>";


if (empty($_Request['nid']))
 {
    $niderror = $_REQUEST['nid'];

    if (strlen($niderror) != 13) {
        $error_count++;
        $niderror  = '*Invalid NID!.NID must contain 13 digit';
    }
}
echo "<br>";

if (empty($_REQUEST['password'])) {
    $passworderror = $_REQUEST['password'];
}

if ( empty($_REQUEST['confirm_password']))
   
 {
    $confirmpassworderror = $_REQUEST['confirm_password'];
}

if ($passworderror!= $confirmpassworderror) {
    $error_count++;
    $confirmpassworderror = '*Password mismatch !';
}



if ( strlen($passworderror) < 8)
 {
    $passworderror = '*Weak password.Please try again!';
    $error_count++;
 }
    
else{
    $passworderror ="Accepted.";
}
}






?>