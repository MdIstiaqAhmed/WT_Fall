<?php
include '../control/Signupv.php'; ?>


<html>
    <head>
        <title>Registration Form</title>
    </head>
    <body>
        <center><h1>Registration Form</h1></center>
        <form action="" method="POST">
            <center>
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name"placeholder="First Name"></td>
                <td><?php echo $firstnameerror;?></td>
            </tr>           
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name"placeholder="Last Name"></td>
                <td><?php echo $lastnameerror?></td>
            </tr>
            <tr>
                <td>Date of Birth :</td>
                <td><input type="date" name="date_of_birth" ></td>
            </tr>
            <tr>
                <td>Gender:</td>
                 <td>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="others">Others
                </td>
            </tr>
                <tr>
                <td>Mobile Number :</td>
                <td><input type="number" name="mobile_no" placeholder="01....">
                </td>
            </tr>

            <tr>
                <td>NID :</td>
                <td><input type="number" name="nid" placeholder="Enter your valid NID number">
                <td><?php echo $niderror;?></td>
            </td>
            <td>
             </tr>
            <tr>
                <td>Enter your Email:</td>
                <td><input type="email" name = "email"placeholder="Enter your Email"></td>
            </tr>
            <tr>
                <td>Enter your Password:</td>
                <td><input type="password" name = "password"placeholder="Enter your Password"></td>
                <td><?php echo $passworderror;?></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name = "confirm_password"placeholder="Confirm Password"></td>
                <td><?php echo  $confirmpassworderror;?></td>
            </tr>

            <tr>
                <td>Please choose a file:</td>
                <td><input type="file" name = "file"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name ="submit"value="Submit">
                    <input type="reset" value="Reset">
                </td>   
            </tr>
        </table>
</center>
        </form>
    </body>
</html>