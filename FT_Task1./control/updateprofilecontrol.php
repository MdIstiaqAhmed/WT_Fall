<?php
session_start();
include("../model/db.php")


$mydb=new mydb();
$conobj=$mydb->openCon();
$mydb->showUser($conobj,"user",$_SESSION["name"]);

if($result->num_rows >0)
{
   
 foreach($result as $row)
  {

    $name=$row ["first_name"];
    $age=$row ["Age"];
    $gender=$row ["gender"];
    $proffesion=$row ["proffesion"];
    $image=$row ["image"];
    $id=$row ["id"];
   
  }
}
if(isset($_REQUEST["submit"]))
{
  if(!empty($_FILES["file"]["first_name"]))
  (
    move_uploaded_file($_FILES["file"]["tmp_name"],"../Upload/".$_REQUEST["first_name"].".jpj");
  $image="../upload".$_REQUEST["first_name"].".jpg"
  )
  $mydb=new mydb();
$conobj=$mydb->openCon();
$mydb->update($conobj,"user",$_REQUEST["name"],$_REQUEST["age"],$_REQUEST["gender"],$image,$id);
if($result==true)
{
echo "Updated";
}
else{
  echo "Not Updated";
}
}
?>
