<?php
setcookie("user","visited",time()+3600*2);
include("../model/db.php");

$error_count=0;
$hasError=0;
$image="";
$firstnameerror=$lastnameerror = $gender = $niderror =$passworderror= $confirmpassworderror="";
if(isset($_REQUEST["submit"]))
{
    if(empty($_FILES["file"]["name"]))
    {
        echo"no file uploaded";
    }
    else{
        echo"your file name is".$_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],"../Upload/".$_REQUEST["first_name"].".jpj");
        $image="../upload".$_REQUEST["first_name"].".jpg"
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
       
        $lastnameerror = "Your last Name is ".$_REQUEST['last_name'];
    }



echo"<br>";


if (empty($_Request['nid']))
 {
    $niderror = $_REQUEST['nid'];

    if (strlen($_REQUEST['nid'])== 13)
     {
        $error_count++;
        
        $niderror  = 'Correct';
    }
    else
    {
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

$db=new mydb();
$connobj=$db->openCon();
$result=$db->insertUser($connobj,"user",$_REQUEST["first_name"],$_REQUEST["age"],$_REQUEST["gender"],$profession,$image);
if($result==true)
{
    echo"data inserted";
}
else{
    echo"error".$conobj->error;
}
  }

   /* $existingdata=file_get_contents("../data/Data.json");
    $existingdatainphp=json_decode($existingdata);

    $myarr=array

    ("First_Name"=>$_REQUEST["first_name"],
    "Last_Name"=>$_REQUEST["last_name"],
    "Date_of_Birth"=>$_REQUEST["date_of_birth"], 
    "Email_ID"=>$_REQUEST["email"],
    "Mobile_Number"=>$_REQUEST["mobile_no"],
    "NID_Number"=>$_REQUEST["nid"],
    "Password"=>$_REQUEST["password"],
    )
    
    ;
    


    $existingdatainphp[]=$myarr;

    $myJsonObj=json_encode($existingdatainphp,JSON_PRETTY_PRINT);

    file_put_contents("../data/Data.json",$myJsonObj);

    $mydata=file_get_contents("../data/Data.json");

    $myPHPdata=json_decode($mydata);

    echo"<br>Print From json: ".$myPHPdata[0]->First_Name;
    echo"<br>Print From json: ".$myPHPdata[0]->Last_Name;
    echo"<br>Print From json: ".$myPHPdata[0]->Date_of_Birth;
    echo"<br>Print From json: ".$myPHPdata[0]->Email_ID;
    echo"<br>Print From json: ".$myPHPdata[0]->Mobile_Number;
    echo"<br>Print From json: ".$myPHPdata[0]->NID_Number;
    

  

  }*/


}






?>
