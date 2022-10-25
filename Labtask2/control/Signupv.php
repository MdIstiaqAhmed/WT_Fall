<?php
$error_count=0;
$hasError=0;
$firstnameerror=$lastnameerror = $gender = $niderror =$passworderror= $confirmpassworderror="";
if(isset($_REQUEST["submit"]))
{
    if(empty($_FILES["file"]["name"]))
    {
        echo"no file uploaded";
    }
    else{
        echo"your file name is".$_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],"../Upload/".$_REQUEST["first_name"].".pdf");
    }
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

if ($_REQUEST['password'] !=$_REQUEST['confirm_password']) {
    $error_count++;
    $confirmpassworderror = '*Password mismatch !';
}



if ( strlen($_REQUEST['password'] ) < 8)
 {
    $passworderror = '*Weak password.Please try again!';
    $error_count++;
 }
    
else{
    $passworderror ="Accepted.";
}

if($hasError==0)

  {
    $existingdata=file_get_contents("../data/Data.json");
    $existingdatainphp=json_decode($existingdata);

    $myarr=array

    ("FirstNAME"=>$_REQUEST["first_name"]);
    


    $existingdatainphp[]=$myarr;

    $myJsonObj=json_encode($existingdatainphp,JSON_PRETTY_PRINT);

    file_put_contents("../data/Data.json",$myJsonObj);

    $mydata=file_get_contents("../data/Data.json");

    $myPHPdata=json_decode($mydata);

    echo"<br>Print From json: ".$myPHPdata[0]->FirstNAME;
    
  }

  }









?>
